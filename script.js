$(document).ready(function(e) {
  $(".input-file").triggerUpload();
});

$.fn.triggerUpload = function() {
  $.each(this, function(index, value) {
    var $file_input = $(value).find('.file');
    var $file_trigger = $(value).find('.btn-upload');
    var $file_text = $(value).find('.input-txt');
    $file_trigger.click(function(e){
      $file_input.trigger("click");
    });
    $file_input.on("change input", function(){
      var fileName = $(this).val().split(/(\\|\/)/g).pop();
      var fileNameSmall = (fileName.length > 30) ? fileName.substring(0,30)+"..." : fileName;
      $file_text.val(fileNameSmall);
    });
  });
};
