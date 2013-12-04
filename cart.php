<?php
include_once 'helpers/render_helper.php';
include_once 'helpers/cart_helper.php';
include_once 'helpers/products_helper.php';
include_once 'helpers/cart_response_helper.php';

$cart = current_cart();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['empty'])) {
    $cart = create_cart();
  } else {
    $product = fetch_product_by_id($_POST['product_id']);
    $response = response_for_product($product);
  }
}

if (isset($response))
  echo json_encode($response);
else
  echo render($cart, 'cart');
?>