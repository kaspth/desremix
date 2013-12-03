<article class="product">
  <a href="product.php?id=<?php echo $product["id"]; ?>">
    <img src="<?php echo $product["image_url"]; ?>" alt="<?php echo $product["name"]; ?>">
    <div class="background">
      <h3><?php echo $product["name"]; ?></h3>
      <em data-hover-replace><?php echo $product["price"]; ?> kr.</em>
      <button data-hover-replacement data-add-to-cart>Læg i kurv</button>
    </div>
  </a>
</article>