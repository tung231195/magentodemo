define(
    [
        'jquery',
        'ko',
        'uiComponent'
    ],
    function(
        $,
        ko,
        Component
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Ecommage_HelloWorld/cms_block'
            },

            initialize: function () {
                console.log(window.checkoutConfig.cms_block);
                var self = this;
                this._super();
            }

        });
    }
);