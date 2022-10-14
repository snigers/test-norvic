$(document).ready(function() {

  $("body").on("click", "div#upload", function () {

    const selector = $(this);

    $.ajax({
      url: urlAJAX(),
      type: "POST",
      success: function( html ){

        console.log("success");
        $(selector).append($('<div>').text('Выгрузка сделана'));
      }
    });


  });


});