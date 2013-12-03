<header>
  <h1>Your Cart</h1>
</header>

<table>
  <thead>
    <th>Antal</th>
    <th>Produkter</th>
    <th>Pris</th>
  </thead>

  <tbody>
    <?php render($cart['line_items'], 'line_item'); ?>
  </tbody>
</table>