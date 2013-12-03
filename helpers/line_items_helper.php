<?php

function update_line_item_for_product($line_items, $product) {
  if (!isset($line_items)) return;

  $exists = line_items_has_product($line_items, $product);
  if (isset($exists))
    increment_line_item($line_item);
  else
    $line_items[] = build_line_item($product);
}

function line_items_has_product($line_items, $product) {
  foreach ($line_items as $line_item)
    if ($line_item['product_id'] == $product['id'])
      return $line_item;

  return null;
}

function increment_line_item($line_item) {
  $line_item['count']++;
  $line_item['total_price'] = $line_item['price'] * $line_item['count'];
}

function build_line_item($product) {
  return array(
    'count' => 1,
    'product_id' => $product['id'],
    'name' => $product['name'],
    'price' => $product['price'],
    'total_price' => $product['price']
  );
}

?>