<?php
include_once 'helpers/render_helper.php';
include_once 'helpers/cart_helper.php';
include_once 'helpers/products_helper.php';
include_once 'helpers/cart_response_helper.php';

if (isset($_POST['empty']))
  create_cart();

if (isset($_POST['product_id'])) {
  $product = fetch_product_by_id($_POST['product_id']);
  echo json_response_for_product($product);
  return;
}

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
  $product = fetch_product_by_id($_REQUEST['product_id']);
  remove_product_from_current_cart($product);
  header("Status: 200");
  return;
}

echo render(current_cart(), 'cart');
?>