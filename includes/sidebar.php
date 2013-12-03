<section class="sidebar">
  <section class="cart">

    <?php echo render($cart, 'cart', function() { ?>
      <h3>Your cart is empty.</h3>
    <?php }); ?>

  </section>
</section>