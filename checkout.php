<?php
# include helpers
# setup needed variables for the page
include_once 'helpers/render_helper.php';
include_once 'helpers/cart_helper.php';

$cart = current_cart();

if (cart_is_empty($cart))
  header("Location: index.php");

$order_id = rand(1000, 100000);
$amount = dibs_appropriate_cart_amount($cart);
$accept_url = "http://{$_SERVER[HTTP_HOST]}/receipt.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes/head.php'; ?>
    <title>Checking out - Designers Remix</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
      <section class="main">

        <section class="order">
          <table>
            <thead>
              <th>Pieces</th>
              <th>Name</th>
              <th>Price</th>
            </thead>

            <tbody>
              <?php echo render($cart['line_items'], 'line_item'); ?>
            </tbody>
          </table>
          <input type="submit" form="checkout">
        </section>

        <form id="checkout" method="post" action="https://payment.architrade.com/paymentweb/start.action">
          <input type="hidden" name="test" value="yes">
          <input type="hidden" name="merchant" value="90192232">
          <input type="hidden" name="orderid"
              value="<?php echo $order_id; ?>">

          <input type="hidden" name="currency" value="DKK">
          <input type="hidden" name="amount"
              value="<?php echo $amount; ?>">

          <input type="hidden" name="accepturl"
              value="<?php echo $accept_url; ?>">

          <fieldset>
            <legend>Contactinformation</legend>

            <ul>
              <li>
                <label for="first_name">First name</label>
                <input id="first_name" name="first_name" type="text" required="required">
              </li>
              <li>
                <label for="last_name">Last name</label>
                <input id="last_name" name="last_name" type="text" required="required">
              </li>

              <li>
                <label for="email">Email</label>
                <input id="email" name="email" type="text" required="required">
              </li>
              <li>
                <label for="phone_number">Phone number</label>
                <input id="phone_number" name="phone_number" type="text" required="required">
              </li>

              <li>
                <label for="street_name">Street name</label>
                <input id="street_name" name="street_name" type="text" required="required">
              </li>
              <li>
                <label for="zipcode">Zipcode</label>
                <input id="zipcode" name="zipcode" type="text" required="required">
              </li>
              <li>
                <label for="city">City</label>
                <input id="city" name="city" type="text" required="required">
              </li>
            </ul>
          </fieldset>
        </form>

      </section>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
  </body>
</html>