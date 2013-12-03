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
});