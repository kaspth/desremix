<?php
include_once 'helpers/cart_helper.php';

destroy_cart();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes/head.php'; ?>
    <title>Thanks for purchasing - Designers Remix</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
      <section class="main">
        <section class="receipt">
          <div id="heart"></div>
          <header>
            <h1>Hello <em>you</em></h1>
          </header>
          <p>You've just bought something from us.</p>
          <p>Yes, we think you're pretty great.</p>
        </section>
      </section>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
  </body>
</html>