$('#toggle').click(function () {
  $(this).toggleClass('active');
  $('#overlay').toggleClass('open');
});

$('.mb-nav.onee').click(function () {
  $('.mobile-nav.s-onee').toggleClass('open');
  $('.mobile-nav.s-twoo').removeClass('open');
  $('.mobile-nav.s-threee').removeClass('open');
});
$('.mb-nav.twoo').click(function () {
  $('.mobile-nav.s-twoo').toggleClass('open');
  $('.mobile-nav.s-onee').removeClass('open');
  $('.mobile-nav.s-threee').removeClass('open');
});
$('.mb-nav.threee').click(function () {
  $('.mobile-nav.s-threee').toggleClass('open');
  $('.mobile-nav.s-twoo').removeClass('open');
  $('.mobile-nav.s-onee').removeClass('open');
});