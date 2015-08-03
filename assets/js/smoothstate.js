$(document).ready(function(){
  ;(function ($) {
    'use strict';
    var content  = $('#main').smoothState({
          onStart : {
                    
            duration: 250,
            
            render: function () {

              content.toggleAnimationClass('is-exiting');

              $body.animate({ 'scrollTop': 0 });
            }
          }
        }).data('smoothState');
  })(jQuery);   
});