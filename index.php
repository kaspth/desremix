<?php
include_once 'helpers/products_helper.php';
include_once 'helpers/render_helper.php';

$products = fetch_products();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes/head.php'; ?>
    <title>Designers Remix</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
      <section class="main">
        <?php echo render($products, 'product', function() { ?>
          <h1>No products found.</h1>
        <?php }); ?>
      </section>

      <?php include 'includes/sidebar.php'; ?>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
  </body>
</html>