<?php

include_once 'json_helper.php';

function fetch_product_by_id($id) {
  return find_product_by("id", $id);
}

function find_product_by($key, $value) {
  $found_product = null;
  map_products(function($product) use ($key, $value, &$found_product) {
    if ($product[$key] == $value) {
      $found_product = $product;
      return true;
    }
  });
  return $found_product;
}

function map_products($operation) {
  $category_id = 1;
  $file = path_for_category_id($category_id);

  while(file_exists($file)) {
    $products = read_json($file);
    foreach ($products as $product)
      if ($operation($product))
        break;

    $category_id++;
    $file = path_for_category_id($category_id);
  }
  return null;
}

function path_for_category_id($id) {
  return null;
}

?>