<script>
    $("div.star-wrapper i").on("mouseover", function () {
      if ($(this).siblings("i.vote-recorded").length == 0) {
        $(this)
        .prevAll()
        .addBack()
        .addClass("fa-solid yellow")
        .removeClass("fa-regular");
        $(this).nextAll().removeClass("fa-solid yellow").addClass("fa-regular");
      }
    });

    $("div.star-wrapper i").on("click", function () {
      let rating = $(this).prevAll().length + 1;
      let movie_id = $(this).closest("div.rating-wrapper").data("id");
      $("#ratting_score").val(rating);
  /*if ($(this).siblings("i.vote-recorded").length == 0) {
    
    $(this).prevAll().addBack().addClass("vote-recorded");
    
    $.post("update_ratings.php", { movie: movie_id, rating: rating }).done(
      function (data) {
        parent_div.find("p.v-data").text(data);
      }
    );
    
  }*/
});
</script>
<script type="text/javascript">
    $(function() {
     $( "#autocomplete-search" ).autocomplete({
      source: 'function/autocomplete.php',
     });
   });
 </script>
<footer class="page-footer bg-image" style="background-image: url(assets/img/footer_img.jpg);">
  <div class="container">
    <p class="text-right" id="copyright" style="color:black;">Pantry Pal</p>
  </div>
</footer>