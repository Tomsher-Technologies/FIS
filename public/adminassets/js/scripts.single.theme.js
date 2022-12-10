/* Dore Single Theme Initializer Script 

Table of Contents

01. Single Theme Initializer
*/

/* 01. Single Theme Initializer */

(function ($) {
  if ($().dropzone) {
    Dropzone.autoDiscover = false;
  }
  var $dore = $("body").dore();
})(jQuery);

$('.custom-file-input').change(function (e) {
  var fileName = e.target.files[0].name;
  $(this).closest('div').find('.custom-file-label').text(fileName)
})
