/*global $*/
$(function(){
    $('.js-modal-open').each(function(){
        $(this).on('click',function(){
            var target = $(this).data('target');
            var modal = document.getElementById(target);
            $(modal).fadeIn();
            return false;
        });
    });
    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    }); 
    
    $(".limit-textarea").on('keydown keyup keypress change', function () {
    let count = $(this).val().length;
    let limit = 200 - count;
    if (limit <= 200) {
      $("#num").text(limit);
      $("input[type='submit']").prop('disabled', false).removeClass('disabled');
      if (limit <= 0) {
        $("#num").text('0');
        $("input[type='submit']").prop('disabled', true).addClass('disabled');
      }
    }
  });
  
});