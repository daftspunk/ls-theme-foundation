window.site = {
  message: {
    remove: function() {
      $.removebar();
    },
    custom: function(message, params) {
      if(!message)
        return;
      
      var params = $.extend({
        position: 'top',
        removebutton: false,
        color: '#666',
        message: message,
        time: 5000,
        background_color: '#393536'
      }, params || {});
      
      jQuery(document).ready(function($) {
        $.bar(params);
      });
    },
    addToCart: function() {
      site.message.custom('Your selection has been added to the cart!', {time: 3000});
    }
  }
};

Phpr.showLoadingIndicator = function() {
  site.message.custom('Processing...', {background_color: '#f7c809', color: '#000', time: 999999});
};

Phpr.hideLoadingIndicator = function() {
  site.message.remove();
};

Phpr.response.popupError = function() {
  site.message.custom(this.html.replace('@AJAX-ERROR@', ''), {background_color: '#c32611', color: '#fff', time: 10000});
};

function custom_alert(text) {
  site.message.custom(text, {color: '#fff', time: 10000});
}