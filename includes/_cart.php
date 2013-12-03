<header>
  <h1>Your Cart</h1>
</header>

<?php if (!isset($cart['line_items'])) { ?>
  <h3>Your cart is empty.</h3>
<?php else ?>
  <table>
    <thead>
      <th>Antal</th>
      <th>Produkter</th>
      <th>Pris</th>
    </thead>

    <tbody>
      <?php echo render($cart['line_items'], 'line_item'); ?>
    </tbody>
  </table>
<?php } ?>