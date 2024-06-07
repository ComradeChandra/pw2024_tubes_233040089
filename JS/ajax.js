$(document).ready(function() {
    // Event ketika keyword ditulis
    $("#keyword").on("keyup", function() {
      // $.get()
      $.get("../ajax/search.php?keyword=" + $("#keyword").val(), function(data) {
        $("#container").html(data);
      });
    });
  });