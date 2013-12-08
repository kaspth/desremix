<header>
  <h1>Your Cart</h1>
</header>

<?php if (cart_is_empty($cart)) { ?>
  <h3>Your cart is empty.</h3>
<?php } else { ?>
  <table>
    <thead>
      <tr>
        <th>Pieces</th>
        <th>Name</th>
        <th>Price</th>
      </tr>
    </thead>

    <tbody>
      <?php echo render($cart['line_items'], 'line_item'); ?>
    </tbody>

    <tfoot>
      <?php echo render(total_cart_amount($cart), 'amount'); ?>
    </tfoot>
  </table>
  <button data-empty-cart>Empty cart</button>  <button data-checkout-cart>Checkout</button>
<?php } ?>