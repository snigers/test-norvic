$(document).ready(function() {

  $("body").on("click", "div#upload", function () {

    const selector = $(this);
    // console.log("test");
    // console.log(urlAJAX());
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