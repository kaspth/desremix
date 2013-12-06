<?php
include_once 'helpers/render_helper.php';
include_once 'helpers/products_helper.php';
include_once 'helpers/cart_helper.php';

if (!isset($_GET['id']))
  header("Location: index.php");

$product = fetch_product_by_id($_GET['id']);
$cart = current_cart();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes/head.php'; ?>
    <title><?php echo $product['name']; ?> - Designers Remix</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
      <?php include 'includes/sidebar.php'; ?>

      <section class="main">
        <section class="product" data-id="<?php echo $product['id']; ?>">
          <?php echo product_image_tag($product); ?>

          <div class="information">
            <header>
              <h1><?php echo $product["name"]; ?></h1>
              <h3>DKK <?php echo $product["price"]; ?></h3>
            </header>

            <p><?php echo $product["description"]; ?></p>
            <button data-add-to-cart>Læg i kurv</button>
          </div>
        </section>
      </section>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
  </body>
</html>