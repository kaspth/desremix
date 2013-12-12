<article class="product" data-id="<?php echo $product['id']; ?>">
  <a href="product.php?id=<?php echo $product["id"]; ?>">
    <?php echo product_image_tag($product); ?>
  </a>
  <div class="background">
    <button data-add-to-cart>Læg i kurv</button>
    <h3><?php echo $product["name"]; ?></h3>
    <em>DKK <?php echo $product["price"]; ?></em>
  </div>
</article>