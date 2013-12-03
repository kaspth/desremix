<?php

if (session_status() == PHP_SESSION_NONE)
  session_start();

include_once 'products_helper.php';
include_once 'line_items_helper.php';

function add_product_id_to_cart($cart, $product_id) {
  $product = fetch_product_by_id($product_id);
  update_line_item_for_product($cart['line_items'], $product);
}

function current_cart() {
  if (current_cart_exists())
    return $_SESSION['cart'];

  return create_cart();
}

function current_cart_exists() {
  return isset($_SESSION['cart']);
}

function create_cart() {
  $cart = array('line_items' => array());
  $_SESSION['cart'] = $cart;
  return $cart;
}

?>