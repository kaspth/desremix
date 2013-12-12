$(document).ready(function() {
  $('[data-add-to-cart]').on('click', function() {
    var id = $(this).closest('.product').data('id');

    $.post('cart.php', { 'product_id': id }, function(update) {
      var cart = $('.cart');

      switch (update.cartUpdateType) {
        case 'add':
          if (cart.find('tbody').length === 0)
            cart.load('cart.php');
          else
            cart.find('tbody:last').append(update.html);

          break;
        case 'update':
          cart.find('tr[data-product-id="' + id + '"]').replaceWith(update.html);
          break;
      }

      cart.find('tfoot tr').replaceWith(update.totalPriceHtml);
    }, 'json');
  });

  $('.cart').on('click', '[data-empty-cart]', function() {
    $.post('cart.php', { 'empty': true }, function(data) {
      $('.cart').empty().append(data);
    });
  });

  $('.cart').on('click', '[data-checkout-cart]', function() {
    document.location.pathname = "checkout.php";
  });
});