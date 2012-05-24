;(function ($) {
    $.fn.ftabs = function (options) {

        function activateTab($tab) {
            var $activeTab = $tab.closest('dl').find('a.active'),
                    contentLocation = $tab.attr("href") + 'Tab';

            // Strip off the current url that IE adds
            contentLocation = contentLocation.replace(/^.+#/, '#');

            //Make Tab Active
            $activeTab.removeClass('active');
            $tab.addClass('active');

            //Show Tab Content
            $(contentLocation).closest('.tabs-content').children('li').hide();
            $(contentLocation).css('display', 'block');
        };

        $(this).each(function () {

            var self = this;

            // Prevent duplicate loading
            if ($(this).attr('data-ftabs-enabled'))
                return;

            $(this).attr('data-ftabs-enabled', true);

            //Get all tabs
            var tabs = $(this).children('dd').children('a');
            tabs.click(function (e) {
                activateTab($(this));
                $(self).trigger('ftabs:tab_click');
            });

            //Get active tab from hash
            if (window.location.hash) {
                activateTab($('a[href="' + window.location.hash + '"]'));
            }

        });

        return this;
    }
} (jQuery));