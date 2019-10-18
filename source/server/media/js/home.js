(function($) {
    $.fn.theiaStickySidebar = function(options) {
        var defaults = {
            'containerSelector': '',
            'additionalMarginTop': 0,
            'additionalMarginBottom': 0,
            'updateSidebarHeight': true,
            'minWidth': 0,
            'disableOnResponsiveLayouts': true,
            'sidebarBehavior': 'modern',
            'defaultPosition': 'relative',
            'namespace': 'TSS'
        };
        options = $.extend(defaults, options);
        options.additionalMarginTop = parseInt(options.additionalMarginTop) || 0;
        options.additionalMarginBottom = parseInt(options.additionalMarginBottom) || 0;
        tryInitOrHookIntoEvents(options, this);

        function tryInitOrHookIntoEvents(options, $that) {
            var success = tryInit(options, $that);
            if (!success) {
                console.log('TSS: Body width smaller than options.minWidth. Init is delayed.');
                $(document).on('scroll.' + options.namespace, function(options, $that) {
                    return function(evt) {
                        var success = tryInit(options, $that);
                        if (success) {
                            $(this).unbind(evt);
                        }
                    };
                }(options, $that));
                $(window).on('resize.' + options.namespace, function(options, $that) {
                    return function(evt) {
                        var success = tryInit(options, $that);
                        if (success) {
                            $(this).unbind(evt);
                        }
                    };
                }(options, $that))
            }
        }

        function tryInit(options, $that) {
            if (options.initialized === true) {
                return true;
            }
            if ($('body').width() < options.minWidth) {
                return false;
            }
            init(options, $that);
            return true;
        }

        function init(options, $that) {
            options.initialized = true;
            var existingStylesheet = $('#theia-sticky-sidebar-stylesheet-' + options.namespace);
            if (existingStylesheet.length === 0) {
                $('head').append($('<style id="theia-sticky-sidebar-stylesheet-' + options.namespace + '">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>'));
            }
            $that.each(function() {
                var o = {};
                o.sidebar = $(this);
                o.options = options || {};
                o.container = $(o.options.containerSelector);
                if (o.container.length == 0) {
                    o.container = o.sidebar.parent();
                }
                o.sidebar.parents().css('-webkit-transform', 'none');
                o.sidebar.css({
                    'position': o.options.defaultPosition,
                    'overflow': 'visible',
                    '-webkit-box-sizing': 'border-box',
                    '-moz-box-sizing': 'border-box',
                    'box-sizing': 'border-box'
                });
                o.stickySidebar = o.sidebar.find('.theiaStickySidebar');
                if (o.stickySidebar.length == 0) {
                    var javaScriptMIMETypes = /(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i;
                    o.sidebar.find('script').filter(function(index, script) {
                        return script.type.length === 0 || script.type.match(javaScriptMIMETypes);
                    }).remove();
                    o.stickySidebar = $('<div>').addClass('theiaStickySidebar').append(o.sidebar.children());
                    o.sidebar.append(o.stickySidebar);
                }
                o.marginBottom = parseInt(o.sidebar.css('margin-bottom'));
                o.paddingTop = parseInt(o.sidebar.css('padding-top'));
                o.paddingBottom = parseInt(o.sidebar.css('padding-bottom'));
                var collapsedTopHeight = o.stickySidebar.offset().top;
                var collapsedBottomHeight = o.stickySidebar.outerHeight();
                o.stickySidebar.css('padding-top', 1);
                o.stickySidebar.css('padding-bottom', 1);
                collapsedTopHeight -= o.stickySidebar.offset().top;
                collapsedBottomHeight = o.stickySidebar.outerHeight() - collapsedBottomHeight - collapsedTopHeight;
                if (collapsedTopHeight == 0) {
                    o.stickySidebar.css('padding-top', 0);
                    o.stickySidebarPaddingTop = 0;
                } else {
                    o.stickySidebarPaddingTop = 1;
                }
                if (collapsedBottomHeight == 0) {
                    o.stickySidebar.css('padding-bottom', 0);
                    o.stickySidebarPaddingBottom = 0;
                } else {
                    o.stickySidebarPaddingBottom = 1;
                }
                o.previousScrollTop = null;
                o.fixedScrollTop = 0;
                resetSidebar();
                o.onScroll = function(o) {
                    if (!o.stickySidebar.is(":visible")) {
                        return;
                    }
                    if ($('body').width() < o.options.minWidth) {
                        resetSidebar();
                        return;
                    }
                    if (o.options.disableOnResponsiveLayouts) {
                        var sidebarWidth = o.sidebar.outerWidth(o.sidebar.css('float') == 'none');
                        if (sidebarWidth + 50 > o.container.width()) {
                            resetSidebar();
                            return;
                        }
                    }
                    var scrollTop = $(document).scrollTop();
                    var position = 'static';
                    if (scrollTop >= o.sidebar.offset().top + (o.paddingTop - o.options.additionalMarginTop)) {
                        var offsetTop = o.paddingTop + options.additionalMarginTop;
                        var offsetBottom = o.paddingBottom + o.marginBottom + options.additionalMarginBottom;
                        var containerTop = o.sidebar.offset().top;
                        var containerBottom = o.sidebar.offset().top + getClearedHeight(o.container);
                        var windowOffsetTop = 0 + options.additionalMarginTop;
                        var windowOffsetBottom;
                        var sidebarSmallerThanWindow = (o.stickySidebar.outerHeight() + offsetTop + offsetBottom) < $(window).height();
                        if (sidebarSmallerThanWindow) {
                            windowOffsetBottom = windowOffsetTop + o.stickySidebar.outerHeight();
                        } else {
                            windowOffsetBottom = $(window).height() - o.marginBottom - o.paddingBottom - options.additionalMarginBottom;
                        }
                        var staticLimitTop = containerTop - scrollTop + o.paddingTop;
                        var staticLimitBottom = containerBottom - scrollTop - o.paddingBottom - o.marginBottom;
                        var top = o.stickySidebar.offset().top - scrollTop;
                        var scrollTopDiff = o.previousScrollTop - scrollTop;
                        if (o.stickySidebar.css('position') == 'fixed') {
                            if (o.options.sidebarBehavior == 'modern') {
                                top += scrollTopDiff;
                            }
                        }
                        if (o.options.sidebarBehavior == 'stick-to-top') {
                            top = options.additionalMarginTop;
                        }
                        if (o.options.sidebarBehavior == 'stick-to-bottom') {
                            top = windowOffsetBottom - o.stickySidebar.outerHeight();
                        }
                        if (scrollTopDiff > 0) {
                            top = Math.min(top, windowOffsetTop);
                        } else {
                            top = Math.max(top, windowOffsetBottom - o.stickySidebar.outerHeight());
                        }
                        top = Math.max(top, staticLimitTop);
                        top = Math.min(top, staticLimitBottom - o.stickySidebar.outerHeight());
                        var sidebarSameHeightAsContainer = o.container.height() == o.stickySidebar.outerHeight();
                        if (!sidebarSameHeightAsContainer && top == windowOffsetTop) {
                            position = 'fixed';
                        } else if (!sidebarSameHeightAsContainer && top == windowOffsetBottom - o.stickySidebar.outerHeight()) {
                            position = 'fixed';
                        } else if (scrollTop + top - o.sidebar.offset().top - o.paddingTop <= options.additionalMarginTop) {
                            position = 'static';
                        } else {
                            position = 'absolute';
                        }
                    }
                    if (position == 'fixed') {
                        var scrollLeft = $(document).scrollLeft();
                        o.stickySidebar.css({
                            'position': 'fixed',
                            'width': getWidthForObject(o.stickySidebar) + 'px',
                            'transform': 'translateY(' + top + 'px)',
                            'left': (o.sidebar.offset().left + parseInt(o.sidebar.css('padding-left')) - scrollLeft) + 'px',
                            'top': '0px'
                        });
                    } else if (position == 'absolute') {
                        var css = {};
                        if (o.stickySidebar.css('position') != 'absolute') {
                            css.position = 'absolute';
                            css.transform = 'translateY(' + (scrollTop + top - o.sidebar.offset().top - o.stickySidebarPaddingTop - o.stickySidebarPaddingBottom) + 'px)';
                            css.top = '0px';
                        }
                        css.width = getWidthForObject(o.stickySidebar) + 'px';
                        css.left = '';
                        o.stickySidebar.css(css);
                    } else if (position == 'static') {
                        resetSidebar();
                    }
                    if (position != 'static') {
                        if (o.options.updateSidebarHeight == true) {
                            o.sidebar.css({
                                'min-height': o.stickySidebar.outerHeight() + o.stickySidebar.offset().top - o.sidebar.offset().top + o.paddingBottom
                            });
                        }
                    }
                    o.previousScrollTop = scrollTop;
                };
                o.onScroll(o);
                $(document).on('scroll.' + o.options.namespace, function(o) {
                    return function() {
                        o.onScroll(o);
                    };
                }(o));
                $(window).on('resize.' + o.options.namespace, function(o) {
                    return function() {
                        o.stickySidebar.css({
                            'position': 'static'
                        });
                        o.onScroll(o);
                    };
                }(o));
                if (typeof ResizeSensor !== 'undefined') {
                    new ResizeSensor(o.stickySidebar[0], function(o) {
                        return function() {
                            o.onScroll(o);
                        };
                    }(o));
                }

                function resetSidebar() {
                    o.fixedScrollTop = 0;
                    o.sidebar.css({
                        'min-height': '1px'
                    });
                    o.stickySidebar.css({
                        'position': 'static',
                        'width': '',
                        'transform': 'none'
                    });
                }

                function getClearedHeight(e) {
                    var height = e.height();
                    e.children().each(function() {
                        height = Math.max(height, $(this).height());
                    });
                    return height;
                }
            });
        }

        function getWidthForObject(object) {
            var width;
            try {
                width = object[0].getBoundingClientRect().width;
            } catch (err) {}
            if (typeof width === "undefined") {
                width = object.width();
            }
            return width;
        }
        return this;
    }

    var owl = $('.owl-them-center');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
    });

    var owl1 = $('#slider-center');
    owl1.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
    });

    var owl2 = $('.owl-them-center2');
    owl2.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        dots: false,
        nav: true
    });

    var owl3 = $('.owl-them-work');
    owl3.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
    });
    
    var owl4 = $('.owl-them-work-salary');
    owl4.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        animateOut: "fadeOut",
    });

    if(!isMobile){  
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
            $('.scroll-top').fadeIn();
            } else {
            $('.scroll-top').fadeOut();
            }
        });
    }
    
    $('.scroll-top').click(function () {
        $("html, body").animate({
        scrollTop: 0
        }, 100);
        return false;
    });

    jQuery('.link-new-jobs').click( function(){
        jQuery('.link-new-jobs a').fadeToggle( "slow", "linear" );
    })

    $('.clicklink').on('click', function(){
        window.open($(this).attr('data-url'), '_blank');
    })

    $("#search-home-page").hover(function(){
        $('.overlay').css('display', 'block')
        }, function(){
            $('.overlay').css('display', 'none')
    });

    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myUl li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#myInput-location").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myUl-location li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('.menu-thumbnail-home .item').on('click', function(){
        if($(this).attr('data')){
            document.cookie = "link="+ $(this).attr('data');
            document.cookie = "role="+ $(this).attr('role');
        }
    })

    $('.post-job-btn').on('click', function(){
        if($(this).attr('data')){
            document.cookie = "link="+ $(this).attr('data');
            document.cookie = "role="+ $(this).attr('role');
        }
    })
})(jQuery);

(function($, window, document, undefined) {
    "use strict";
    var SinglePageNav = {
        init: function(options, container) {
            this.options = $.extend({}, $.fn.singlePageNav.defaults, options);
            this.container = container;
            this.$container = $(container);
            this.$links = this.$container.find('a');
            if (this.options.filter !== '') {
                this.$links = this.$links.filter(this.options.filter);
            }
            this.$window = $(window);
            this.$htmlbody = $('html, body');
            this.$links.on('click.singlePageNav', $.proxy(this.handleClick, this));
            this.didScroll = false;
            this.checkPosition();
            this.setTimer();
        },
        handleClick: function(e) {
            var self = this,
                link = e.currentTarget,
                $elem = $(link.hash);
            e.preventDefault();
            if ($elem.length) {
                self.clearTimer();
                if (typeof self.options.beforeStart === 'function') {
                    self.options.beforeStart();
                }
                self.setActiveLink(link.hash);
                self.scrollTo($elem, function() {
                    if (self.options.updateHash && history.pushState) {
                        history.pushState(null, null, link.hash);
                    }
                    self.setTimer();
                    if (typeof self.options.onComplete === 'function') {
                        self.options.onComplete();
                    }
                });
            }
        },
        scrollTo: function($elem, callback) {
            var self = this;
            var target = self.getCoords($elem).top;
            var called = false;
            self.$htmlbody.stop().animate({
                scrollTop: target
            }, {
                duration: self.options.speed,
                easing: self.options.easing,
                complete: function() {
                    if (typeof callback === 'function' && !called) {
                        callback();
                    }
                    called = true;
                }
            });
        },
        setTimer: function() {
            var self = this;
            self.$window.on('scroll.singlePageNav', function() {
                self.didScroll = true;
            });
            self.timer = setInterval(function() {
                if (self.didScroll) {
                    self.didScroll = false;
                    self.checkPosition();
                }
            }, 250);
        },
        clearTimer: function() {
            clearInterval(this.timer);
            this.$window.off('scroll.singlePageNav');
            this.didScroll = false;
        },
        checkPosition: function() {
            var scrollPos = this.$window.scrollTop();
            var currentSection = this.getCurrentSection(scrollPos);
            if (currentSection !== null) {
                this.setActiveLink(currentSection);
            }
        },
        getCoords: function($elem) {
            return {
                top: Math.round($elem.offset().top) - this.options.offset
            };
        },
        setActiveLink: function(href) {
            var $activeLink = this.$container.find("a[href$='" + href + "']");
            if (!$activeLink.hasClass(this.options.currentClass)) {
                this.$links.removeClass(this.options.currentClass);
                $activeLink.addClass(this.options.currentClass);
            }
        },
        getCurrentSection: function(scrollPos) {
            var i, hash, coords, section;
            for (i = 0; i < this.$links.length; i++) {
                hash = this.$links[i].hash;
                if ($(hash).length) {
                    coords = this.getCoords($(hash));
                    if (scrollPos >= coords.top - this.options.threshold) {
                        section = hash;
                    }
                }
            }
            var pageBottom = $(document).height() - $(window).height();
            if (scrollPos == pageBottom) {
                var numberOfLinks = this.$links.length;
                if (numberOfLinks > 0) {
                    section = this.$links[numberOfLinks - 1].hash;
                }
            }
            return section || ((this.$links.length === 0) ? (null) : (this.$links[0].hash));
        }
    };
    $.fn.singlePageNav = function(options) {
        return this.each(function() {
            var singlePageNav = Object.create(SinglePageNav);
            singlePageNav.init(options, this);
        });
    };
    $.fn.singlePageNav.defaults = {
        offset: 0,
        threshold: 120,
        speed: 400,
        currentClass: 'current',
        easing: 'swing',
        updateHash: false,
        filter: '',
        onComplete: false,
        beforeStart: false
    };
})(jQuery, window, document);

jQuery(function($) {
    'use strict';

    InwaveStickyMenu();
    InwaveHeadingSearch();
    InwaveSelectSetup();
    InwaveScrollMenu();
    InwaveLoginRegisterBtn();
    InwaveStickySidebar();

    function update() {
        var $this = $(this),
            options = $this.data('options');
        if (typeof options === 'undefined' || !options) {
            options = {}
        }
        if (options && (options.minimumResultsForSearch && (options.minimumResultsForSearch == -1 || options.minimumResultsForSearch == 'Infinity')) || options.multiple) {
            options.dropdownCssClass = 'iwj-select-2-wsearch';
        }
        $this.siblings('.select2-container').remove();
        $this.show().select2(options);
        iwjmbSelect.bindEvents($this);
    }
    $(':input.iwjmb-select_advanced').each(update);
    $('.iwjmb-input').on('clone', ':input.iwjmb-select_advanced', update);

    function InwaveHeadingSearch() {
        $('.iw-job-advanced_search .iw-search-add-advanced').click(function() {
            var that = $(this);
            var parent = that.closest('.iw-job-advanced_search');
            parent.find('.section-filter').toggle(400);
            that.toggleClass('active');
        });
    }

    function InwaveSelectSetup() {
        if (typeof $.fn.select2 === 'function') {
            if ($('.iwj-select-2').length) {
                $(".iwj-select-2").each(function() {
                    var options = $(this).data('options');
                    options = options ? options : {};
                    $(this).select2(options);
                });
            }
            if ($('.iwj-select-2-advance').length) {
                $(".iwj-select-2-advance").each(function() {
                    var options = $(this).data('options');
                    options = options ? options : {};
                    options.dropdownCssClass = 'iwj-select-2-advance-dropdown';
                    $(this).select2(options);
                });
            }
            if ($('.iwj-select-2-wsearch').length) {
                $(".iwj-select-2-wsearch").each(function() {
                    var options = $(this).data('options');
                    options = options ? options : {
                        'minimumResultsForSearch': 'Infinity'
                    };
                    options.dropdownCssClass = 'iwj-select-2-wsearch';
                    $(this).select2(options);
                })
            }
            if ($('.iwj-find-jobs-select.style1').length) {
                $(".iwj-find-jobs-select.style1").select2({
                    dropdownCssClass: 'iwj-find-jobs-dropdown'
                })
            }
            if ($('.iwj-find-jobs-select.style2').length) {
                $(".iwj-find-jobs-select.style2").select2({
                    dropdownCssClass: 'iwj-find-jobs-dropdown style2'
                })
            }
            if ($('.iwj-find-jobs-select.style3').length) {
                $(".iwj-find-jobs-select.style3").select2({
                    dropdownCssClass: 'iwj-find-jobs-dropdown style2 style3'
                })
            }
        }
    }

    function InwaveStickyMenu() {
        var $header = $(".header-sticky");
        var $header_2 = $(".header-sticky-2");
        var h_header = $('.header.header-default').outerHeight();
        if ($header.length) {
            $header.data('sticky', '');
            $(window).on("scroll load resize", function() {
                var fromTop = $(document).scrollTop();
                if (fromTop > h_header) {
                    if ($header.data('sticky') == '') {
                        $header.data('sticky', 'true');
                        $header.addClass("clone");
                        $('body').addClass("down");
                        $('.iw-header-version3').addClass("header-clone");
                    }
                } else {
                    if ($header.data('sticky') == 'true') {
                        $header.data('sticky', '');
                        $header.removeClass("clone");
                        $('body').removeClass("down");
                        $('.iw-header-version3').removeClass("header-clone");
                    }
                }
            });
        }
        if ($header_2.length) {
            $header_2.data('sticky', '');
            $(window).on("load resize", function() {
                var fromTop = $(document).scrollTop();
                if ($header_2.data('sticky') == '') {
                    $header_2.data('sticky', 'true');
                    $header_2.addClass("clone");
                    $('body').addClass("down");
                } else {
                    $header_2.data('sticky', '');
                    $header_2.removeClass("clone");
                    $('body').removeClass("down");
                }
            });
        }
        $('.iw-menu-main ul.iw-nav-menu').singlePageNav({
            currentClass: 'current',
            filter: ':not(.external-link)',
            updateHash: false,
            offset: 100,
            threshold: 100
        });
    }

    function InwaveCarouselSetup() {
        setTimeout(function() {
            $(".owl-carousel").each(function() {
                var slider = $(this);
                var defaults = {
                    direction: $('body').hasClass('rtl') ? 'rtl' : 'ltr'
                };
                var config = $.extend({}, defaults, slider.data("plugin-options"));
                slider.owlCarousel(config).addClass("owl-carousel-init");
            });
        }, 0);
        $('.post-text .gallery').each(function() {
            var galleryOwl = $(this);
            var classNames = this.className.toString().split(' ');
            var column = 1;
            $.each(classNames, function(i, className) {
                if (className.indexOf('gallery-columns-') != -1) {
                    column = parseInt(className.replace(/gallery-columns-/, ''));
                }
            });
            galleryOwl.owlCarousel({
                direction: $('body').hasClass('rtl') ? 'rtl' : 'ltr',
                items: column,
                singleItem: true,
                navigation: true,
                pagination: false,
                navigationText: ["<i class=\"fa fa-arrow-left\"></i>", "<i class=\"fa fa-arrow-right\"></i>"],
                autoHeight: true
            });
        });
        if ($('.post-gallery .gallery-carousel').length) {
            $('.post-gallery .gallery-carousel').owlCarousel({
                direction: $('body').hasClass('rtl') ? 'rtl' : 'ltr',
                items: 1,
                singleItem: true,
                navigation: true,
                pagination: false,
                navigationText: ["<i class=\"fa fa-arrow-left\"></i>", "<i class=\"fa fa-arrow-right\"></i>"],
                autoHeight: true
            });
        }
    }

    function InwaveScrollMenu() {
        if (typeof $.fn.enscroll === 'function') {
            $('.off-canvas-menu-scroll').enscroll({
                showOnHover: true,
                verticalTrackClass: 'track3',
                verticalHandleClass: 'handle3',
                addPaddingToPane: false
            });
        }
    }

    function InwaveLoginRegisterBtn() {
        $('.top-bar-right .register-login a').hover(function() {
            if ($(this).hasClass('login')) {
                $('.top-bar-right .register-login').addClass('active-login');
            }
        }, function() {
            $('.top-bar-right .register-login').removeClass('active-login');
        });
    }

    function InwaveStickySidebar() {
        setTimeout(function() {
            if ($('.header.header-default.clone').length) {
                var h_header = $('.header.header-default.clone .iw-header').outerHeight();
                var h_wpadminbar = $('#wpadminbar').outerHeight();
                var top = h_header + h_wpadminbar;
            } else {
                if ($('body').hasClass('admin-bar')) {
                    var top = 30;
                } else {
                    var top = 0;
                }
            }
            $('.iwj-sidebar-sticky').theiaStickySidebar({
                additionalMarginTop: top
            });
        }, 0);
    }
});