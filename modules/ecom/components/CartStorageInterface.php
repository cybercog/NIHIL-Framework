<?php
namespace app\modules\ecom\components;

use app\modules\ecom\components\Cart;

/**
 * Interface CartStorageInterface
 */
interface CartStorageInterface
{
    /**
     * @param app\modules\ecom\components\Cart $cart
     * @return mixed
     */
    public function load(Cart $cart);

    /**
     * @param app\modules\ecom\components\Cart $cart
     * @return void
     */
    public function save(Cart $cart);
}