<article class="product"
  data-hover-effect data-id="<?php echo $product['id']; ?>"
>
  <a href="product.php?id=<?php echo $product["id"]; ?>">
    <img src="<?php echo $product["image_url"]; ?>" alt="<?php echo $product["name"]; ?>">
    <div class="background">
      <button data-hover-show data-add-to-cart>Læg i kurv</button>
      <h3><?php echo $product["name"]; ?></h3>
      <em><?php echo $product["price"]; ?> kr.</em>
    </div>
  </a>
</article>