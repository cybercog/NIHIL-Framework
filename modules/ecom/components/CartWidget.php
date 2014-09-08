<?php
namespace app\modules\ecom\components;

use yii\base\Widget;
use yii\helpers\Html;

use app\modules\ecom\models\Product;
use app\modules\ecom\models\ProductAttribute;

class CartWidget extends Widget
{
	protected $cart;

    public function init()
    {
		$this->cart = \Yii::$app->cart;
		parent::init();
    }
	
	public function run()
    {
        if(!$this->cart->isEmpty()) {
			$ret = '<div class="row" id="cart">
							<div class="col-xs-12">
								<h3>Cart</h3>
							</div>
							<div class="col-xs-12">
								<table class="table">
									<thead>
										<tr>
											<th>Qty</th>
											<th style="width:115px">Item</th>
											<th>Total</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>';
									
			foreach($this->cart->getItems() as $key => $item) {
				$product = Product::getProduct($item['productAttribute']->product_id);
				
				$ret .= '				<tr>
											<td>' . $item['quantity'] . '</td>
											<td>' . $product->name . '</td>
											<td>$' . number_format(($item['quantity'] * ($product->price + $item['productAttribute']->additional_price )), 2) . '</td>
											<td><a href="/cart/remove/' . $key . '"><i class="fa fa-times"></i></a></td>
										</tr>';
			}			
										
			$ret .= '				</tbody>
									<tfoot>
										<tr>
											<th colspan="2" class="text-right">Subtotal</th>
											<th colspan="2" class="text-right">$' . number_format($this->cart->subtotal, 2) . '</th>
										</tr>
										<tr>
											<th colspan="2" class="text-right">Tax</th>
											<th colspan="2" class="text-right">$' . number_format($this->cart->tax, 2) . '</th>
										</tr>
										<tr>
											<th colspan="2" class="text-right">Shipping</th>
											<th colspan="2" class="text-right">$' . number_format($this->cart->shipping, 2) . '</th>
										</tr>
										<tr style="font-size:24px;">
											<th colspan="2" class="text-right">Total</th>
											<th colspan="2" class="text-right">$' . number_format($this->cart->total, 2) . '</th>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="col-xs-12">
								<a href="/cart" class="btn btn-lg btn-block btn-success">view cart</a>
							</div>
						</div>';
		}else{
			$ret = '<div class="row" id="cart">
							<div class="col-xs-12">
								<h3>Cart</h3>
							</div>
							<div class="col-xs-12">
								<p>You have 0 items in your cart.</p>
							</div>
							<div class="col-xs-12">
								<a href="/shop" class="btn btn-lg btn-block btn-success">shop</a>
							</div>
						</div>';
		}
		
		return $ret;
    }

    public function oldrun()
    {
        return '<div class="row" id="cart">
							<div class="col-xs-12">
								<h3>Cart</h3>
							</div>
							<div class="col-xs-12">
								<table class="table">
									<thead>
										<tr>
											<th>Qty</th>
											<th style="width:115px">Item</th>
											<th>Total</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="4">You have 0 items in your cart.</td>
										</tr>
										<tr>
											<td>1</td>
											<td>Jacket</td>
											<td>$100.00</td>
											<td><a href="#"><i class="fa fa-edit"></i></a> <a href="#"><i class="fa fa-times"></i></a></td>
										</tr>
										<tr>
											<td>1</td>
											<td>Donation</td>
											<td>$59.48</td>
											<td><a href="#"><i class="fa fa-edit"></i></a> <a href="#"><i class="fa fa-times"></i></a></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th colspan="2" class="text-right">Subtotal</th>
											<th colspan="2" class="text-right">$100.00</th>
										</tr>
										<tr>
											<th colspan="2" class="text-right">Tax</th>
											<th colspan="2" class="text-right">$0.00</th>
										</tr>
										<tr>
											<th colspan="2" class="text-right">Shipping</th>
											<th colspan="2" class="text-right">$0.00</th>
										</tr>
										<tr style="font-size:24px;">
											<th colspan="2" class="text-right">Total</th>
											<th colspan="2" class="text-right">$100.00</th>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="col-xs-12">
								<a href="/cart" class="btn btn-lg btn-block btn-success">view cart</a>
							</div>
						</div>';
    }
	
}