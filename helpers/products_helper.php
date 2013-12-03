<?php

include_once 'json_helper.php';

function fetch_products() {
  return read_json(products_path());
}

function fetch_product_by_id($id) {
  return find_product_by("id", $id);
}

function find_product_by($key, $value) {
  $found_product = null;
  each_product(function($product) use ($key, $value, &$found_product) {
    if ($product[$key] == $value) {
      $found_product = $product;
      return true;
    }
  });
  return $found_product;
}

function each_product($operation) {
  $products = fetch_products();
  if (!isset($products)) return;

  foreach ($products as $product)
    if ($operation($product))
      break;
}

function products_path() {
  return "db/products.json";
}

?>