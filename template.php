<?php
# include helpers
# setup needed variables for the page
include_once 'helpers/render_helper.php';
include_once 'helpers/cart_helper.php';

$cart = current_cart();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes/head.php'; ?>
    <title><!-- insert title --></title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
      <?php include 'includes/sidebar.php'; ?>

      <section class="main">
        <!-- insert markup -->
      </section>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
  </body>
</html>