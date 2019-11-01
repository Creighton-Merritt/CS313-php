$(function() {
    $("a").click(function(e) {
        e.preventDefault();
        $("a").removeClass("selected");
        $(this).addClass("selected");
      });
    });