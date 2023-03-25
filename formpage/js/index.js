/* Global $ , alert , console */

$(function () {
  "use strict";

  var userErrors = true,
    emailError = true,
    megError = true;


  $(".username").blur(function () {
    if ($(this).val().length < 4) {
      //Show Error
      $(this).css("border", "1px solid #f00");
      $(this).parent().find(".custom-alert").fadeIn(300).end().find(".astersx").fadeIn(100);
      // $(this).parent().find(".astersx").fadeIn(100);
      userErrors = true;
    } else {
      // No Errors
      $(this).css("border", "1px solid #0f0");

      $(this).parent().find(".custom-alert").fadeOut(300).end().find(".astersx").fadeOut(100);
      // $(this).parent().find(".astersx").fadeOut(100);
      userErrors = false;
    }
  });

  $(".email").blur(function () {
    if ($(this).val() === "") {
      $(this).css("border", "1px solid #f00");
      $(this).parent().find(".custom-alert").fadeIn(300).end().find(".astersx").fadeIn(100);
      // $(this).parent().find(".astersx").fadeIn(100);
      emailError = true;
    } else {
      $(this).css("border", "1px solid #0f0");

      $(this).parent().find(".astersx").fadeOut(100).end().find(".custom-alert").fadeOut(300);
      // $(this).parent().find(".custom-alert").fadeOut(300);
      emailError = false;
    }
  });

  $(".message").blur(function () {
    if ($(this).val().length < 11) {
      $(this).css("border", "1px solid #f00");
      $(this).parent().find(".custom-alert").fadeIn(300).end().find(".astersx").fadeIn(100);
      // $(this).parent().find(".astersx").fadeIn(100);
      megError = true;
    } else {
      $(this).css("border", "1px solid #0f0");

      $(this).parent().find(".astersx").fadeOut(100).end().find(".custom-alert").fadeOut(300);
      // $(this).parent().find(".custom-alert").fadeOut(300);
      megError = false;
    }
  });

  // Submit Form Validation
  $(".contact-form").submit(function(e){
    if (emailError === true || userErrors === true || megError === true){
    e.preventDefault();
    $('.username , .email , .message').blur(); 
    }
  })

});
