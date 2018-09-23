"use strict";

/**
 * @class KApp
 */

var KApp = function() {
    /** @type {object} colors State colors **/
    var colors = {
        brand:      '#716aca',
        metal:      '#c4c5d6',
        light:      '#ffffff',
        accent:     '#00c5dc',
        
        primary:    '#5867dd',
        success:    '#34bfa3',
        info:       '#36a3f7',
        warning:    '#ffb822',
        danger:     '#f4516c',
        focus:      '#9816f4'
    }

    /**
    * Initializes bootstrap tooltip
    */
    var initTooltip = function(el) {
        var skin = el.data('skin') ? 'tooltip-' + el.data('skin') : '';
        var width = el.data('width') == 'auto' ? 'tooltop-auto-width' : '';
        var triggerValue = el.data('trigger') ? el.data('trigger') : 'hover';
        var placement = el.data('placement') ? el.data('placement') : 'left';
                    
        el.tooltip({
            trigger: triggerValue,
            template: '<div class="tooltip ' + skin + ' ' + width + '" role="tooltip">\
                <div class="arrow"></div>\
                <div class="tooltip-inner"></div>\
            </div>'
        });
    }
    
    /**
    * Initializes bootstrap tooltips
    */
    var initTooltips = function() {
        // init bootstrap tooltips
        $('[data-toggle="k-tooltip"]').each(function() {
            initTooltip($(this));
        });
    }

    /**
    * Initializes bootstrap popover
    */
    var initPopover = function(el) {
        var skin = el.data('skin') ? 'popover-' + el.data('skin') : '';
        var triggerValue = el.data('trigger') ? el.data('trigger') : 'hover';
            
        el.popover({
            trigger: triggerValue,
            template: '\
            <div class="popover ' + skin + '" role="tooltip">\
                <div class="arrow"></div>\
                <h3 class="popover-header"></h3>\
                <div class="popover-body"></div>\
            </div>'
        });
    }

    /**
    * Initializes bootstrap popovers
    */
    var initPopovers = function() {
        // init bootstrap popover
        $('[data-toggle="k-popover"]').each(function() {
            initPopover($(this));
        });
    }

    /**
    * Initializes bootstrap file input
    */
    var initFileInput = function() {
        // init bootstrap popover
        $('.custom-file-input').on('change',function(){
            var fileName = $(this).val();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    }           

    /**
    * Initializes portlet
    */
    var initPortlet = function(el, options) {
        // init portlet tools
        var el = $(el);
        var portlet = new mPortlet(el[0], options);
    }

    /**
    * Initializes portlets
    */
    var initPortlets = function() {
        // init portlet tools
        $('[k-portlet="true"]').each(function() {
            var el = $(this);

            if ( el.data('portlet-initialized') !== true ) {
                initPortlet(el, {});
                el.data('portlet-initialized', true);
            }
        });
    }

    /**
    * Initializes scrollable contents
    */
    var initScroll = function() {
        $('[data-scroll="true"]').each(function(){
            var el = $(this);
            KUtil.scrollInit(this, {disableForMobile: true, handleWindowResize: true, height: function() {
                if (KUtil.isInResponsiveRange('tablet-and-mobile') && el.data('mobile-height')) {
                    return el.data('mobile-height');
                } else {
                    return el.data('height');
                }
            }});
        });
    }

    /**
    * Initializes bootstrap alerts
    */
    var initAlerts = function() {
        // init bootstrap popover
        $('body').on('click', '[data-close=alert]', function() {
            $(this).closest('.alert').hide();
        });
    }

    return {
        /**
        * Main class initializer
        */
        init: function(options) {
            if (options && options.colors) {
                colors = options.colors;
            }
            KApp.initComponents();
        },

        /**
        * Initializes components
        */
        initComponents: function() {
            initScroll();
            initTooltips();
            initPopovers();
            initAlerts();
            initPortlets();
            initFileInput();
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // wrJangoer function to scroll(focus) to an element
        initTooltips: function() {
            initTooltips();
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // wrJangoer function to scroll(focus) to an element
        initTooltip: function(el) {
            initTooltip(el);
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // wrJangoer function to scroll(focus) to an element
        initPopovers: function() {
            initPopovers();
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // wrJangoer function to scroll(focus) to an element
        initPopover: function(el) {
            initPopover(el);
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // function to init portlet
        initPortlet: function(el, options) {
            initPortlet(el, options);
        },

        /**
        * 
        * @param {object} el jQuery element object
        */
        // function to init portlets
        initPortlets: function() {
            initPortlets();
        },

        /**
        * Blocks element with loading indiciator using http://malsup.com/jquery/block/
        * @param {object} target jQuery element object
        * @param {object} options 
        */
        block: function(target, options) {
            var el = $(target);

            options = $.extend(true, {
                opacity: 0.03,
                overlayColor: '#000000',
                type: '',
                size: '',
                state: 'brand',
                centerX: true,
                centerY: true,
                message: '',
                shadow: true,
                width: 'auto'
            }, options);

            var html;
            var version = options.type ? 'k-spinner--' + options.type : '';
            var state = options.state ? 'k-spinner--' + options.state : '';
            var size = options.size ? 'k-spinner--' + options.size : '';
            var spinner = '<div class="k-spinner '  + version + ' ' + state + ' ' + size + '"></div';

            if (options.message && options.message.length > 0) {
                var classes = 'blockui ' + (options.shadow === false ? 'blockui' : '');

                html = '<div class="' + classes + '"><span>' + options.message + '</span><span>' + spinner + '</span></div>';

                var el = document.createElement('div');
                KUtil.get('body').prepend(el);
                KUtil.addClass(el, classes);
                el.innerHTML = '<span>' + options.message + '</span><span>' + spinner + '</span>';
                options.width = KUtil.actualWidth(el) + 10;
                KUtil.remove(el);

                if (target == 'body') {
                    html = '<div class="' + classes + '" style="margin-left:-'+ (options.width / 2) +'px;"><span>' + options.message + '</span><span>' + spinner + '</span></div>';
                }
            } else {
                html = spinner;
            }

            var params = {
                message: html,
                centerY: options.centerY,
                centerX: options.centerX,
                css: {
                    top: '30%',
                    left: '50%',
                    border: '0',
                    padding: '0',
                    backgroundColor: 'none',
                    width: options.width
                },
                overlayCSS: {
                    backgroundColor: options.overlayColor,
                    opacity: options.opacity,
                    cursor: 'wait',
                    zIndex: '10'
                },
                onUnblock: function() {
                    if (el && el[0]) {
                        KUtil.css(el[0], 'position', '');
                        KUtil.css(el[0], 'zoom', '');
                    }                    
                }
            };

            if (target == 'body') {
                params.css.top = '50%';
                $.blockUI(params);
            } else {
                var el = $(target);
                el.block(params);
            }
        },

        /**
        * Un-blocks the blocked element 
        * @param {object} target jQuery element object
        */
        unblock: function(target) {
            if (target && target != 'body') {
                $(target).unblock();
            } else {
                $.unblockUI();
            }
        },

        /**
        * Blocks the page body element with loading indicator
        * @param {object} options 
        */
        blockPage: function(options) {
            return KApp.block('body', options);
        },

        /**
        * Un-blocks the blocked page body element
        */
        unblockPage: function() {
            return KApp.unblock('body');
        },

        /**
        * Enable loader progress for button and other elements
        * @param {object} target jQuery element object
        * @param {object} options
        */
        progress: function(target, options) {
            var skin = (options && options.skin) ? options.skin : 'light';
            var alignment = (options && options.alignment) ? options.alignment : 'right'; 
            var size = (options && options.size) ? 'k-spinner--' + options.size : ''; 
            var classes = 'k-loader ' + 'k-loader--' + skin + ' k-loader--' + alignment + ' k-loader--' + size;

            KApp.unprogress(target);
            
            $(target).addClass(classes);
            $(target).data('progress-classes', classes);
        },

        /**
        * Disable loader progress for button and other elements
        * @param {object} target jQuery element object
        */
        unprogress: function(target) {
            $(target).removeClass($(target).data('progress-classes'));
        },

        /**
        * Gets state color's hex code by color name
        * @param {string} name Color name
        * @returns {string}  
        */
        getColor: function(name) {
            return colors[name];
        }
    };
}();

//== Initialize KApp class on document ready
$(document).ready(function() {
    KApp.init(KAppOptions);
});