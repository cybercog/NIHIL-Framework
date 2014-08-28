<?php
namespace app\modules\ecom\components;

use yii\base\Component;
use yii\base\InvalidParamException;
use yii\web\Session;
use app\modules\ecom\models\ProductAttribute;
use app\modules\ecom\models\Product;

class Cart extends Component
{
	
	protected $subtotal;
	protected $tax_rate = 0.00;
	protected $tax;
	protected $shipping;
	protected $total;
	protected $confirm_token;
	
	/**
     * @var array
	 *
	 *
     */
    protected $items;

    /**
     * @var Session
     */
    private $session;
	
	/**
     * @var Storage
     */
    private $storage = 'app\modules\ecom\components\CartSession';
	
	/**
     * @inheritdoc
     */
    public function init()
    {
        $this->clear(false);
		$this->setSession(\Yii::$app->session);
        $this->setStorage(\Yii::createObject($this->storage));
        //$this->items = $this->storage->load($this);
		
		$cData = $this->storage->load($this);
		//die(print_r($cData));
		if(isset($cData['confirm_token'])) {
			$this->confirm_token = $cData['confirm_token'];
		}
		
		if(!empty($cData['items'])) {
			$this->items = $cData['items'];
			$this->subtotal = $cData['subtotal'];
			$this->tax = $cData['tax'];
			$this->shipping = $cData['shipping'];
			$this->total = $cData['total'];
		}else{
			$this->recalcTotals();
		}
    }

    /**
     * Setter for the storage component
     *
     * @param \opus\ecom\basket\StorageInterface|string $storage
     * @return Basket
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
        return $this;
    }
	
	/**
     * @return \opus\ecom\basket\StorageInterface|string
     */
    protected function getStorage()
    {
        return $this->storage;
    }
	
	/**
     * @param \yii\web\Session $session
     * @return Basket
     */
    public function setSession(Session $session)
    {
        $this->session = $session;
        return $this;
    }

    /**
     * @return \yii\web\Session
     */
    public function getSession()
    {
        return $this->session;
    }
	
	/**
     * Delete all items from the basket
     *
     * @param bool $save
     * @return $this
     */
    public function clear($save = true)
    {
        $this->items = [];
		$this->subtotal = 0;
		$this->tax = 0;
		$this->shipping = 0;
		$this->total = 0;
		$this->confirm_token = NULL;

        $save && $this->storage->save($this);
        return $this;
    }
	
	/**
     * Removes an item from the basket
     *
     * @param string $uniqueId
     * @param bool $save
     * @throws \yii\base\InvalidParamException
     * @return $this
     */
    public function remove($uniqueId, $save = true)
    {
        if (!isset($this->items[$uniqueId])) {
            //throw new InvalidParamException('Item not found');
			return FALSE;
        }
        unset($this->items[$uniqueId]);
		
		$this->recalcTotals();

        $save && $this->storage->save($this);
        return $this;
    }
	
	/**
     * Add an item to the basket
     *
     * @param app\modules\ecom\models\Product $product
	 * @param int $quantity
     * @param bool $save
     * @return $this
     */
    public function add(ProductAttribute $productAttribute, $quantity, $save = true)
    {
		$key = NULL;
		$qty = NULL;
		
		foreach($this->getItems() as $k => $item) {
			if($item['productAttribute']->id == $productAttribute->id) {
				$key = $k;
				$qty = ($item['quantity'] + $quantity);
				break;
			}
		}
		
		if($key){
			//die("Same Product");
			$this->updateItem($key, $qty);
		}else{
			//die("New Product");
			$this->addItem($productAttribute, $quantity);
		}
		
        $save && $this->storage->save($this);
        return $this;
    }

    /**
     * @param app\modules\ecom\models\ProductAttribute $productAttribute
     * @param int $quantity
     */
    protected function addItem(ProductAttribute $productAttribute, $quantity)
    {
        $uniqueId = md5(uniqid('_bs', true));
        $this->items[$uniqueId] = array('productAttribute' => $productAttribute, 'quantity' => $quantity);
		$this->recalcTotals();
    }

	/**
     * @param string $itemType If specified, only items of that type will be counted
     * @return int
     */
    public function getCount($itemType = null)
    {
        return count($this->getItems($itemType));
    }
	
	/**
	 * Is Empty?
	 */
	public function isEmpty() {
		if($this->getCount() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

    /**
     * Returns all items of a given type from the basket
     *
     * @param string $itemType One of self::ITEM_ constants
     * @return BasketItemInterface[]
     */
    public function getItems($itemType = null)
    {
        $items = $this->items;
        if (!is_null($itemType)) {
            $items = array_filter($items,
                function ($item) use ($itemType) {
                    /** @var $item BasketItemInterface */
                    return is_subclass_of($item, $itemType);
                });
        }
        return $items;
    }
	
	public function getCart()
	{
		if($t = $this->getConfirmToken()) {
			return array(
				'confirm_token' => $t,
			);
		}else{
			return array(
				'items' => $this->getItems(),
				'subtotal' => $this->getSubtotal(),
				'tax' => $this->getTax(),
				'shipping' => $this->getShipping(),
				'total' => $this->getTotal(),
				'confirm_token' => $this->getConfirmToken(),
			);
		}
		
	}
	
	/**
     * Update Item Quantity
     *
     * @param string $uniqueId
	 * @param int $quantity
     * @param bool $save
     * @throws \yii\base\InvalidParamException
     * @return $this
     */
    public function updateItem($uniqueId, $quantity, $save = true)
    {
        if (!isset($this->items[$uniqueId])) {
            throw new InvalidParamException('Item not found');
        }
        
		$old = $this->items[$uniqueId];
		$this->items[$uniqueId] = array('productAttribute' => $old["productAttribute"], 'quantity' => $quantity);
		
		$this->recalcTotals();

        $save && $this->storage->save($this);
        return $this;
    }
	
	/**
     * @param \yii\web\Session $session
     * @return Basket
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * @return \yii\web\Session
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }
	
	/**
     * @param \yii\web\Session $session
     * @return Basket
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return \yii\web\Session
     */
    public function getTax()
    {
        return $this->tax;
    }
	
	/**
     * @param \yii\web\Session $session
     * @return Cart
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * @return \yii\web\Session
     */
    public function getShipping()
    {
        return $this->shipping;
    }
	
	/**
     * @param $total
     * @return Cart
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return total
     */
    public function getTotal()
    {
        return $this->total;
    }
	
	/**
     * @param $total
     * @return Cart
     */
    public function setConfirmToken($token)
    {
        $this->confirm_token = $token;
        return $this;
    }

    /**
     * @return total
     */
    public function getConfirmToken()
    {
        return $this->confirm_token;
    }
	
	public function confirmOrderCart($token, $save = TRUE) {
		$this->confirm_token = $token;
		
		$save && $this->storage->save($this);
		return $this;
	}
	
	public function recalcTotals($save = true)
	{
		if(!$this->isEmpty()){
			
			$this->subtotal = 0;
			
			foreach($this->getItems() as $item) {
				
				$product = Product::getProduct($item['productAttribute']->product_id);
				
				$this->subtotal += ($item['quantity'] * ($product->price + $item['productAttribute']->additional_price));
				$this->tax = $this->subtotal * $this->tax_rate;
				$this->total = $this->subtotal + $this->tax + $this->shipping;
			}
			
		}else{
			$this->subtotal = 0;
			$this->tax = 0;
			$this->shipping = 0;
			$this->total = 0;
		}
		
		$save && $this->storage->save($this);
        return $this;
	}
	

}