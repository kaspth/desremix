<?php
include_once 'helpers/render_helper.php';
include_once 'helpers/cart_helper.php';

$render_fragment = false;

if (isset($_POST)) {
  extract($_POST);
  $render_fragment = true;

  add_product_id_to_current_cart($product_id);
}
$cart = current_cart();
?>
<?php echo render($cart, 'cart'); ?>