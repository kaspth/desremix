<?php
include_once 'helpers/render_helper.php';
include_once 'helpers/cart_helper.php';

$render_fragment = false;

if (isset($_POST)) {
  extract($_POST);
  $render_fragment = true;

  $cart = current_cart();
  add_product_id_to_cart($cart, $product_id);
}
?>
<?php echo render($cart, 'cart'); ?>