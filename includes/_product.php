<article class="product"
  data-hover-effect data-id="<?php echo $product['id']; ?>"
>
  <a href="product.php?id=<?php echo $product["id"]; ?>">
    <img src="<?php echo $product["image_url"]; ?>" alt="<?php echo $product["name"]; ?>">
  </a>
  <div class="background">
    <button data-hover-show data-add-to-cart>Læg i kurv</button>
    <h3><?php echo $product["name"]; ?></h3>
    <em>DKK <?php echo $product["price"]; ?></em>
  </div>
</article>