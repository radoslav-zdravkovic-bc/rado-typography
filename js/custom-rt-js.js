var checkReady = function(callback) {
  if (window.jQuery) {
    callback(jQuery);
  }
  else {
    window.setTimeout(function() { checkReady(callback); }, 100);
  }
};
checkReady(function(jQuery) {
  //Check for complete load of page.
  jQuery(document).ready(function(jQuery) {
    (function( $ ) {
      $(function() {
          // Add Color Picker to all inputs that have 'color-field' class
          $( '.element-color-picker' ).wpColorPicker();
      });
    })( jQuery );

  }); // END OF DOCUMENT READY
}); // END OF CHECKREADY
