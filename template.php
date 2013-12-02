<?php
# include helpers
# setup needed variables for the page
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
      <section class="main">
        <!-- insert markup -->
      </section>

      <?php if (isset($cart)) { ?>
        <?php include 'includes/sidebar.php'; ?>
      <?php } ?>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
  </body>
</html>