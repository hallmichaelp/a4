$(document).ready(function() {




      $(".hint").hide(); <!-- Create JSON table or hidden text field; inside click event -> go find the wrong answer or find hidden field with values and then iterate through it; google writting to JSON table; grep -->

      $(".hint").click(function() {
        $("." + $(this).name).show(); <!-- create a string that will locate the name of each hint instead of having to repeat -->
      });

      $("[name='button_0']").click(function() {
        $("#hint_0").show();
      });

      $("[name='button_1']").click(function() {
        $("#hint_1").show();
      });

      $("[name='button_2']").click(function() {
        $("#hint_2").show();
      });

      $("[name='button_3']").click(function() {
        $("#hint_3").show();
      });

      $("[name='button_4']").click(function() {
        $("#hint_4").show();
      });

      $("[name='button_5']").click(function() {
        $("#hint_5").show();
      });

      $("[name='button_6']").click(function() {
        $("#hint_6").show();
      });

      $("[name='button_7']").click(function() {
        $("#hint_7").show();
      });
      $("[name='button_8']").click(function() {
        $("#hint_8").show();
      });
      $("[name='button_9']").click(function() {
        $("#hint_9").show();
      });
      $("[name='button_10']").click(function() {
        $("#hint_10").show();
      });
      $("[name='button_11']").click(function() {
        $("#hint_11").show();
      });

  });
