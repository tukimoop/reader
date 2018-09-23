"use strict";
var KOffcanvas = function(elementId, options) {
    //== Main object
    var the = this;
    var init = false;

    //== Get element object
    var element = KUtil.get(elementId);
    var body = KUtil.get('body');

    if (!element) {
        return;
    }

    //== Default options
    var defaultOptions = {};

    ////////////////////////////
    // ** Private Methods  ** //
    ////////////////////////////

    var Plugin = {
        /**
         * Run plugin
         * @returns {moffcanvas}
         */
        construct: function(options) {
            if (KUtil.data(element).has('offcanvas')) {
                the = KUtil.data(element).get('offcanvas');
            } else {
                // reset offcanvas
                Plugin.init(options);
                
                // build offcanvas
                Plugin.build();

                KUtil.data(element).set('offcanvas', the);
            }

            return the;
        },

        /**
         * Handles suboffcanvas click toggle
         * @returns {moffcanvas}
         */
        init: function(options) {
            the.events = [];

            // merge default and user defined options
            the.options = KUtil.deepExtend({}, defaultOptions, options);
            the.overlay;

            the.classBase = the.options.baseClass;
            the.classShown = the.classBase + '--on';
            the.classOverlay = the.classBase + '-overlay';

            the.state = KUtil.hasClass(element, the.classShown) ? 'shown' : 'hidden';
        },

        build: function() {
            //== offcanvas toggle
            if (the.options.toggleBy) {
                if (typeof the.options.toggleBy === 'string') { 
                    KUtil.addEvent( the.options.toggleBy, 'click', Plugin.toggle); 
                } else if (the.options.toggleBy && the.options.toggleBy[0] && the.options.toggleBy[0].target) {
                    for (var i in the.options.toggleBy) { 
                        KUtil.addEvent( the.options.toggleBy[i].target, 'click', Plugin.toggle); 
                    }
                } else if (the.options.toggleBy && the.options.toggleBy.target) {
                    KUtil.addEvent( the.options.toggleBy.target, 'click', Plugin.toggle); 
                } 
            }

            //== offcanvas close
            var closeBy = KUtil.get(the.options.closeBy);
            if (closeBy) {
                KUtil.addEvent(closeBy, 'click', Plugin.hide);
            }
        },


        /**
         * Handles offcanvas toggle
         */
        toggle: function() {;
            Plugin.eventTrigger('toggle'); 

            if (the.state == 'shown') {
                Plugin.hide(this);
            } else {
                Plugin.show(this);
            }
        },

        /**
         * Handles offcanvas show
         */
        show: function(target) {
            if (the.state == 'shown') {
                return;
            }

            Plugin.eventTrigger('beforeShow');

            Plugin.togglerClass(target, 'show');

            //== Offcanvas panel
            KUtil.addClass(body, the.classShown);
            KUtil.addClass(element, the.classShown);

            the.state = 'shown';

            if (the.options.overlay) {
                the.overlay = KUtil.insertAfter(document.createElement('DIV') , element );
                KUtil.addClass(the.overlay, the.classOverlay);
                KUtil.addEvent(the.overlay, 'click', function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    Plugin.hide(target);       
                });
            }

            Plugin.eventTrigger('afterShow');
        },

        /**
         * Handles offcanvas hide
         */
        hide: function(target) {
            if (the.state == 'hidden') {
                return;
            }

            Plugin.eventTrigger('beforeHide');

            Plugin.togglerClass(target, 'hide');

            KUtil.removeClass(body, the.classShown);
            KUtil.removeClass(element, the.classShown);

            the.state = 'hidden';

            if (the.options.overlay && the.overlay) {
                KUtil.remove(the.overlay);
            }

            Plugin.eventTrigger('afterHide');
        },

        /**
         * Handles toggler class
         */
        togglerClass: function(target, mode) {
            //== Toggler
            var id = KUtil.attr(target, 'id');
            var toggleBy;

            if (the.options.toggleBy && the.options.toggleBy[0] && the.options.toggleBy[0].target) {
                for (var i in the.options.toggleBy) {
                    if (the.options.toggleBy[i].target === id) {
                        toggleBy = the.options.toggleBy[i];
                    }        
                }
            } else if (the.options.toggleBy && the.options.toggleBy.target) {
                toggleBy = the.options.toggleBy;
            }

            if (toggleBy) {                
                var el = KUtil.get(toggleBy.target);
                
                if (mode === 'show') {
                    KUtil.addClass(el, toggleBy.state);
                }

                if (mode === 'hide') {
                    KUtil.removeClass(el, toggleBy.state);
                }
            }
        },

        /**
         * Trigger events
         */
        eventTrigger: function(name, args) {
            for (var i = 0; i < the.events.length; i++) {
                var event = the.events[i];
                if (event.name == name) {
                    if (event.one == true) {
                        if (event.fired == false) {
                            the.events[i].fired = true;
                            event.handler.call(this, the, args);
                        }
                    } else {
                        event.handler.call(this, the, args);
                    }
                }
            }
        },

        addEvent: function(name, handler, one) {
            the.events.push({
                name: name,
                handler: handler,
                one: one,
                fired: false
            });
        }
    };

    //////////////////////////
    // ** Public Methods ** //
    //////////////////////////

    /**
     * Set default options 
     */

    the.setDefaults = function(options) {
        defaultOptions = options;
    };

    /**
     * Hide 
     */
    the.hide = function() {
        return Plugin.hide();
    };

    /**
     * Show 
     */
    the.show = function() {
        return Plugin.show();
    };

    /**
     * Get suboffcanvas mode
     */
    the.on = function(name, handler) {
        return Plugin.addEvent(name, handler);
    };

    /**
     * Set offcanvas content
     * @returns {KOffcanvas}
     */
    the.one = function(name, handler) {
        return Plugin.addEvent(name, handler, true);
    };

    ///////////////////////////////
    // ** Plugin Construction ** //
    ///////////////////////////////

    //== Run plugin
    Plugin.construct.apply(the, [options]);

    //== Init done
    init = true;

    // Return plugin instance
    return the;
};