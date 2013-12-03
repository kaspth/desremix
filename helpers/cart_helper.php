<?php

if (session_status() == PHP_SESSION_NONE)
  session_start();

include_once 'products_helper.php';
include_once 'line_items_helper.php';

function add_product_id_to_current_cart($product_id) {
  $cart = current_cart();
  $product = fetch_product_by_id($product_id);
  $cart['line_items'] = update_line_items($cart['line_items'], $product);
  update_cart($cart);
}

function update_cart($cart) {
  $_SESSION['cart'] = $cart;
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
  update_cart($cart);
  return $cart;
}

?>