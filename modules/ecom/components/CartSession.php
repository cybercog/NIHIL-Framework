<?php
namespace app\modules\ecom\components;

use app\modules\ecom\components\Cart;
use app\modules\ecom\components\CartStorageInterface;

/**
 * Class CartSession
 *
 * @author Ivo Kund <ivo@opus.ee>
 * @package opus\ecom\basket
 */
class CartSession implements CartStorageInterface
{
    /**
     * @var string
     */
    public $cartName = 'nihil-cart';

    /**
     * @inheritdoc
     */
    public function load(Cart $cart)
    {
        $cartData = [];
        if (false !== ($session = ($cart->session->get($this->cartName, false)))) {
            $cartData = unserialize($session);
        }
        return $cartData;
    }

    /**
     * @inheritdoc
     */
    public function save(Cart $cart)
    {
        //$sessionData = serialize($cart->getItems());
		$sessionData = serialize($cart->getCart());
        $cart->session->set($this->cartName, $sessionData);
    }
}