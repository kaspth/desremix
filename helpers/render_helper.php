<?php

const PARTIALS_DIR = 'includes/';
const PARTIALS_PREFIX = '_';

# First argument is the object or objects to render
# Second is the name of the partial to render
# Third argument is a function to run if there are no $objects to render
function render($objects, $partial_name, $null_function = null) {
  if (!isset($objects))
    return isset($null_function) ? $null_function() : false;

  if (is_array($objects))
    return render_collection($objects, $partial_name, $null_function);

  return render_member($objects, $partial_name, $null_function);
}

function render_collection($objects, $partial_name) {
  $rendered = array();
  foreach ($objects as $object)
      $rendered[] = render_member($object, $partial_name);

  return $rendered;
}

function render_member($object, $partial_name) {
  eval("\${$partial_name} = \$object;"); # $product = $object;
  return include(partial_path($partial_name));
}

function partial_path($name) {
  return PARTIALS_DIR . PARTIALS_PREFIX . $name . '.php';
}
?>