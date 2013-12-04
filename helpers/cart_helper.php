<?php

if (session_status() == PHP_SESSION_NONE)
  session_start();

include_once 'products_helper.php';
include_once 'line_items_helper.php';

function cart_is_empty($cart) {
  return empty($cart['line_items']);
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