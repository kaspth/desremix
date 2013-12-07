<?php

if (session_status() == PHP_SESSION_NONE)
  session_start();

function dibs_appropriate_cart_amount($cart) {
  $cent_multiplier = 100;
  return total_cart_amount($cart) * $cent_multiplier;
}

function total_cart_amount($cart) {
  return array_reduce($cart['line_items'], function ($sum, $line_item) {
    $sum += $line_item['total_price'];
    return $sum;
  }, 0.0);
}

function remove_product_from_current_cart($product) {
  $cart = current_cart();
  foreach ($cart['line_items'] as $index => $line_item) {
    if ($line_item['product_id'] == $product['id']) {
      unset($cart['line_items'][$index]);
      return;
    }
  }
}

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

function destroy_cart() {
  $_SESSION['cart'] = null;
}

?>