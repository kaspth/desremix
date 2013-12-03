<section class="sidebar">
  <section class="cart">

    <?php echo render($cart, 'cart', function() { ?>
      <header>
        <h1>Your Cart</h1>
      </header>
      <h3>Your cart is empty.</h3>
    <?php }); ?>

  </section>
</section>