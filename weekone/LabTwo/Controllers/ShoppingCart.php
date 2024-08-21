<?php
session_start();

if (!isset($_SESSION["cart_list"])) {
    $_SESSION["cart_list"] = [];
}

class ShoppingCart
{
    private $cart_list;

    public function __construct()
    {
        $this->cart_list = isset($_SESSION["cart_list"]) ? $_SESSION["cart_list"] : [];
    }


    public function insertCart($product_id, $product_name, $product_price, $quantity)
    {
        $isExit = false;
        foreach ($this->cart_list as &$product) {
            if ($product_id == $product['product_id']) {
                $product['quantity'] += $quantity;
                $isExit = true;
                break;
            }
        }

        if (!$isExit) {
            $this->cart_list[] = [
                "product_id" => $product_id,
                "product_name" => $product_name,
                "product_price" => $product_price,
                "quantity" => $quantity,
            ];
        }

        $_SESSION["cart_list"] = $this->cart_list;
    }

    public function updateCart($product_id, $quantity)
    {
        $this->cart_list = array_map(function ($item) use ($quantity, $product_id) {
            if ($product_id === $item['product_id']) {
                $item['quantity'] = $quantity;
            }
            return $item;
        }, $this->cart_list);

        $_SESSION["cart_list"] = $this->cart_list;
    }

    public function deleteCart($product_id)
    {
        $this->cart_list = array_filter($this->cart_list, function ($item) use ($product_id) {
            return $item["product_id"] !== $product_id;
        });

        $_SESSION["cart_list"] = $this->cart_list;
    }

    public function totalCart()
    {
        return count($this->cart_list);
    }

    public function contentCart()
    {
        return $this->cart_list;
    }
}
