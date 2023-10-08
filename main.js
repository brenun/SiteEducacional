$(document).ready(function(){
  $('.fa-bars').click(function() {
    $(this).toggleClass('fa-times');
    $('.navbar').toggleClass('nav-toggle');
  });

  $(window).on('scroll load', function(){
    $('.fa-bars').removeClass('fa-times');
    $('.navbar').removeClass('nav-toggle');

    if ($(window).scrollTop() > 30) {
      $('header').addClass('header-active');
    } else {
      $('header').removeClass('header-active');
    }

    $('section').each(function(){
      var top = $(window).scrollTop();
      var id = $(this).attr('id');
      var height = $(this).height();
      var sectionTop = $(this).offset().top - 200;

      if(top >= sectionTop && top < (sectionTop + height)){
        $('.navbar ul li a').removeClass('active');
        $('.navbar ul li').find('[href="#' + id + '"]').addClass('active');
      }
    });
  });

  // Adiciona um evento de clique para rolar suavemente para as seções
  $('.navbar ul li a').click(function(e) {
    e.preventDefault();
    var target = $($(this).attr('href'));
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 1000);
    }
  });
});