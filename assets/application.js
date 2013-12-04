$(document).ready(function() {
  $('[data-replacement]').hide();

  $('[data-hover-replace]').on('mouseenter', function() {
    fadeAndRevealOn($(this), '[data-replace]', '[data-replacement]');
  }).on('mouseleave', function() {
    fadeAndRevealOn($(this), '[data-replacement]', '[data-replace]');
  });

  var fadeAndRevealOn = function(el, fadeSelector, revealSelector, speed) {
    if (!speed) speed = 200;
    el.find(fadeSelector).fadeOut(speed, function() {
      el.find(revealSelector).fadeIn(speed);
    });
  };

  $('[data-add-to-cart]').on('click', function(e) {
    e.preventDefault();
    var id = $(this).closest('article.product').data('id');

    $.post('cart.php', { 'product_id': id }, function(update) {
      var affectedLineItem = function() {
        return $('.cart tbody').find('tr').eq(update.updatedLineItemIndex);
      };

      switch (update.cartUpdateType) {
        case 'add':
          var cart = $('.cart');
          if (cart.find('tbody').length === 0)
            cart.load('cart.php');
          else
            cart.find('tbody:last').append(update.html);

          break;
        case 'update':
          affectedLineItem().replaceWith(update.html);
          break;
        case 'remove':
          affectedLineItem().remove();
          break;
      }
    }, 'json');
  });

  $('.cart').on('click', '[data-empty-cart]', function(e) {
    e.preventDefault();
    $.post('cart.php', { 'empty': true }, function(data) {
      $('.cart').empty().append(data);
    });
  });
});