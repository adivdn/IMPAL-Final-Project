$(document).ready(function() {
  // executes when HTML-Document is loaded and DOM is ready


  /*
  ################
  Add navbar background color when scrolled
  */
  $(window).scroll(function() {
    if ($(window).scrollTop() > 56) {
      $(".navbar").addClass("bg-white");
      $("#dropmenu").addClass("bg-outline-navy");
      $("#dropmenu").removeClass("bg-outline-white");
    } else {
      $(".navbar").removeClass("bg-white");
      $("#dropmenu").removeClass("bg-outline-navy");
      $("#dropmenu").addClass("bg-outline-white");
    }
  });
  // If Mobile, add background color when toggler is clicked
  $(".navbar-toggler").click(function() {
    if (!$(".navbar-collapse").hasClass("show")) {
      $(".navbar").addClass("bg-dark");
    } else {
      if ($(window).scrollTop() < 56) {
        $(".navbar").removeClass("bg-dark");
      } else {
      }
    }
  });
  // ############

  // document ready
});