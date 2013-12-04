<?php
include_once 'helpers/render_helper.php';
include_once 'helpers/cart_helper.php';

function response_from_data($type, $line_item, $index = null) {
  $response = array(
    'cartUpdateType' => $type,
    'html' => render_inline($line_item, 'line_item')
  );
  if (isset($index)) $response['updatedLineItemIndex'] = $index;
  return $response;
}

$cart = current_cart();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $product_id = $_POST['product_id'];

  $line_items = $cart['line_items'];
  $response = null;
  $product = fetch_product_by_id($product_id);

  $index = line_items_has_product($line_items, $product);
  if (isset($index)) {
    $line_item = increment_line_item($line_items[$index]);
    $line_items[$index] = $line_item;
    $response = response_from_data('update', $line_item, $index);
  } else {
    $line_item = build_line_item($product);
    $line_items[] = $line_item;
    $response = response_from_data('add', $line_item);
  }

  $cart['line_items'] = $line_items;
  update_cart($cart);
}
?>

<?php if (isset($response)) { ?>
  <?php echo json_encode($response); ?>
<?php } else { ?>
  <?php echo render($cart, 'cart'); ?>
<?php } ?>