"use strict";
var KLayout = function() {
    var body;

    var header;
    var headerMenu;
    var headerMenuOffcanvas;

    var asideMenu;
    var asideMenuOffcanvas;
    var asideToggler;

    var asideSecondary;
    var asideSecondaryToggler;

    var scrollTop;
    var quicksearch;
    var mainPortlet;

    // Header
    var initHeader = function() {
        var tmp;
        var headerEl = KUtil.get('k_header');
        var options = {
            offset: {},
            minimize: {}
        };

        if (KUtil.attr(headerEl, 'data-kheader-minimize-mobile') == 'hide') {
            options.minimize.mobile = {};
            options.minimize.mobile.on = 'k-header--hide';
            options.minimize.mobile.off = 'k-header--show';
        } else {
            options.minimize.mobile = false;
        }

        if (KUtil.attr(headerEl, 'data-kheader-minimize') == 'hide') {
            options.minimize.desktop = {};
            options.minimize.desktop.on = 'k-header--hide';
            options.minimize.desktop.off = 'k-header--show';
        } else {
            options.minimize.desktop = false;
        }

        if (tmp = KUtil.attr(headerEl, 'data-kheader-minimize-offset')) {
            options.offset.desktop = tmp;
        }

        if (tmp = KUtil.attr(headerEl, 'data-kheader-minimize-mobile-offset')) {
            options.offset.mobile = tmp;
        }

        header = new KHeader('k_header', options);
    }

    // Header Menu
    var initHeaderMenu = function() {
        // init aside left offcanvas
        headerMenuOffcanvas = new KOffcanvas('k_header_menu_wrapper', {
            overlay: true,
            baseClass: 'k-header-menu-wrapper',
            closeBy: 'k_header_menu_mobile_close_btn',
            toggleBy: {
                target: 'k_header_mobile_toggler',
                state: 'k-header-mobile__toolbar-toggler--active'
            }
        });

        headerMenu = new KMenu('k_header_menu', {
            submenu: {
                desktop: 'dropdown',
                tablet: 'accordion',
                mobile: 'accordion'
            },
            accordion: {
                slideSpeed: 200, // accordion toggle slide speed in milliseconds
                expandAll: false // allow having multiple expanded accordions in the menu
            }
        });

        $('#k_header_menu').on('click', '.k-menu__submenu .k-menu__link', function() {
            swal("You have clicked on a demo link!", "You have clicked on a non-functional demo link.<br>To browse the theme features please refer to the left aside menu.", "warning");
        });
    }

    // Header Topbar
    var initHeaderTopbar = function() {
        asideToggler = new KToggle('k_header_mobile_topbar_toggler', {
            target: 'body',
            targetState: 'k-header__topbar--mobile-on',
            togglerState: 'k-header-mobile__toolbar-topbar-toggler--active'
        });
    }

    // Aside
    var initAside = function() {
        // init aside left offcanvas
        var asidBrandHover = false;
        var aside = KUtil.get('k_aside');
        var asideBrand = KUtil.get('k_aside_brand');
        var asideOffcanvasClass = KUtil.hasClass(aside, 'k-aside--offcanvas-default') ? 'k-aside--offcanvas-default' : 'k-aside';

        asideMenuOffcanvas = new KOffcanvas('k_aside', {
            baseClass: asideOffcanvasClass,
            overlay: true,
            closeBy: 'k_aside_close_btn',
            toggleBy: {
                target: 'k_aside_mobile_toggler',
                state: 'k-header-mobile__toolbar-toggler--active'
            }
        });

        // Handle minimzied aside hover
        if (KUtil.hasClass(body, 'k-aside--fixed')) {
            var insideTm;
            var outsideTm;

            KUtil.addEvent(aside, 'mouseenter', function(e) {
                e.preventDefault();

                if (KUtil.isInResponsiveRange('desktop') === false) {
                    return;
                }

                if (outsideTm) {
                    clearTimeout(outsideTm);
                    outsideTm = null;
                }

                insideTm = setTimeout(function() {
                    if (KUtil.hasClass(body, 'k-aside--minimize') && KUtil.isInResponsiveRange('desktop')) {
                        KUtil.removeClass(body, 'k-aside--minimize');
                        
                        // Minimizing class
                        KUtil.addClass(body, 'k-aside--minimizing');
                        KUtil.transitionEnd(body, function() {
                            KUtil.removeClass(body, 'k-aside--minimizing');
                        });

                        // Hover class
                        KUtil.addClass(body, 'k-aside--minimize-hover');
                        asideMenu.scrollUpdate();
                        asideMenu.scrollTop();
                    }
                }, 300);
            });

            KUtil.addEvent(aside, 'mouseleave', function(e) {
                e.preventDefault();

                if (KUtil.isInResponsiveRange('desktop') === false) {
                    return;
                }

                if (insideTm) {
                    clearTimeout(insideTm);
                    insideTm = null;
                }

                outsideTm = setTimeout(function() {
                    if (KUtil.hasClass(body, 'k-aside--minimize-hover') && KUtil.isInResponsiveRange('desktop')) {
                        KUtil.removeClass(body, 'k-aside--minimize-hover');
                        KUtil.addClass(body, 'k-aside--minimize');

                        // Minimizing class
                        KUtil.addClass(body, 'k-aside--minimizing');
                        KUtil.transitionEnd(body, function() {
                            KUtil.removeClass(body, 'k-aside--minimizing');
                        });

                        // Hover class
                        asideMenu.scrollUpdate();
                        asideMenu.scrollTop();
                    }
                }, 500);
            });
        }
    }

    // Aside menu
    var initAsideMenu = function() {
        // Init aside menu
        var menu = KUtil.get('k_aside_menu');
        var menuDesktopMode = (KUtil.attr(menu, 'data-kmenu-dropdown') === '1' ? 'dropdown' : 'accordion');

        var scroll;
        if (KUtil.attr(menu, 'data-kmenu-scroll') === '1') {
            scroll = {
                height: function() {
                    var height;

                    if (KUtil.isInResponsiveRange('desktop')) {
                        height =  
                            parseInt(KUtil.getViewPort().height) - 
                            parseInt(KUtil.actualHeight('k_aside_brand')) - 
                            parseInt(KUtil.actualHeight('k_aside_footer'));
                    } else {
                        height =  
                            parseInt(KUtil.getViewPort().height) - 
                            parseInt(KUtil.actualHeight('k_aside_footer'));
                    }

                    return height;
                }
            };
        }

        asideMenu = new KMenu('k_aside_menu', {
            // vertical scroll
            scroll: scroll,

            // submenu setup
            submenu: {
                desktop: {
                    // by default the menu mode set to accordion in desktop mode
                    default: menuDesktopMode,
                    // whenever body has this class switch the menu mode to dropdown
                    state: {
                        body: 'k-aside--minimize',
                        mode: 'dropdown'
                    }
                },
                tablet: 'accordion', // menu set to accordion in tablet mode
                mobile: 'accordion' // menu set to accordion in mobile mode
            },

            //accordion setup
            accordion: {
                expandAll: false // allow having multiple expanded accordions in the menu
            }
        });
    }

    // Sidebar toggle
    var initAsideToggler = function() {
        if (!KUtil.get('k_aside_toggler')) {
            return;
        }

        asideToggler = new KToggle('k_aside_toggler', {
            target: 'body',
            targetState: 'k-aside--minimize',
            togglerState: 'k-aside__brand-aside-toggler--active'
        }); 

        asideToggler.on('toggle', function(toggle) {     
            if (KUtil.get('main_portlet')) {
                mainPortlet.updateSticky();      
            } 

            KUtil.addClass(body, 'k-aside--minimizing');
            KUtil.transitionEnd(body, function() {
                KUtil.removeClass(body, 'k-aside--minimizing');
            });

            headerMenu.pauseDropdownHover(800);
            asideMenu.pauseDropdownHover(800);

            // Remember state in cookie
            Cookies.set('k_aside_toggle_state', toggle.getState());
            // to set default minimized left aside use this cookie value in your 
            // server side code and add "k-brand--minimize k-aside--minimize" classes to 
            // the body tag in order to initialize the minimized left aside mode during page loading.
        });

        asideToggler.on('beforeToggle', function(toggle) {   
            var body = KUtil.get('body'); 
            if (KUtil.hasClass(body, 'k-aside--minimize') === false && KUtil.hasClass(body, 'k-aside--minimize-hover')) {
                KUtil.removeClass(body, 'k-aside--minimize-hover');
            }
        });
    }

    // Aside secondary
    var initAsideSecondary = function() {
        if (!KUtil.get('k_aside_secondary')) {
            return;
        }

        asideSecondaryToggler = new KToggle('k_aside_secondary_toggler', {
            target: 'body',
            targetState: 'k-aside-secondary--expanded'
        });
    }

    // Scrolltop
    var initScrolltop = function() {
        var scrolltop = new KScrolltop('k_scrolltop', {
            offset: 300,
            speed: 600
        });
    }

    return {
        init: function() {
            body = KUtil.get('body');

            this.initHeader();
            this.initAside();
            this.initAsideSecondary();
        },

        initHeader: function() {
            initHeader();
            initHeaderMenu();
            initHeaderTopbar();
            initScrolltop();
        },

        initAside: function() { 
            initAside();
            initAsideMenu();
            initAsideToggler();
            
            this.onAsideToggle(function(e) {
                // Update sticky portlet
                if (mainPortlet) {
                    mainPortlet.updateSticky();
                }

                // Reload datatable
                var datatables = $('.k-datatable');
                if (datatables) {
                    datatables.each(function() {
                        $(this).KDatatable('redraw');
                    });
                }                
            });
        },

        initAsideSecondary: function() { 
            initAsideSecondary();
        },

        getAsideMenu: function() {
            return asideMenu;
        },

        onAsideToggle: function(handler) {
            if (typeof asideToggler.element !== 'undefined') {
                asideToggler.on('toggle', handler);
            }
        },

        getAsideToggler: function() {
            return asideToggler;
        },

        openAsideSecondary: function() {
            asideSecondaryToggler.toggleOn();
        },

        closeAsideSecondary: function() {
            asideSecondaryToggler.toggleOff();
        },

        getAsideSecondaryToggler: function() {
            return asideSecondaryToggler;
        },

        onAsideSecondaryToggle: function(handler) {
            if (asideSecondaryToggler) {
                asideSecondaryToggler.on('toggle', handler);
            }
        },

        closeMobileAsideMenuOffcanvas: function() {
            if (KUtil.isMobileDevice()) {
                asideMenuOffcanvas.hide();
            }
        },

        closeMobileHeaderMenuOffcanvas: function() {
            if (KUtil.isMobileDevice()) {
                headerMenuOffcanvas.hide();
            }
        }
    };
}();

$(document).ready(function() {
    KLayout.init();
});