
(function($) {
    "use strict";
    var Plugin = function(el, options, idx) {
        this.el = el;
        this.$el = $(el);
        this.options = options;
        this.uuid = this.$el.attr('id') ? this.$el.attr('id') : idx;
        this.state = {};
        this.init();
        return this;
    };
    Plugin.prototype = {
        init: function() {
            var self = this;
            self._load();
            self.$el.find('ul').each(function(idx) {
                var sub = $(this);
                sub.attr('data-index', idx);
                if (self.options.save && self.state.hasOwnProperty(idx)) {
                    sub.parent().addClass(self.options.openClass);
                    sub.show();
                } else if (sub.parent().hasClass(self.options.openClass)) {
                    sub.show();
                    self.state[idx] = 1;
                } else {
                    sub.hide();
                }
            });
            var caret = $('<span></span>').prepend(self.options.caretHtml);
            var links = self.$el.find("li > a");
            self._trigger(caret, false);
            self._trigger(links, true);
            self.$el.find("li:has(ul) > a").prepend(caret);
        },
        _trigger: function(sources, isLink) {
            var self = this;
            sources.on('click', function(event) {
                event.stopPropagation();
                var sub = isLink ? $(this).next() : $(this).parent().next();
                var isAnchor = false;
                if (isLink) {
                    var href = $(this).attr('href');
                    isAnchor = href === undefined || href === '' || href === '#';
                }
                sub = sub.length > 0 ? sub : false;
                self.options.onClickBefore.call(this, event, sub);
                if (!isLink || sub && isAnchor) {
                    event.preventDefault();
                    self._toggle(sub, sub.is(":hidden"));
                    self._save();
                } else if (self.options.accordion) {
                    var allowed = self.state = self._parents($(this));
                    self.$el.find('ul').filter(':visible').each(function() {
                        var sub = $(this),
                            idx = sub.attr('data-index');
                        if (!allowed.hasOwnProperty(idx)) {
                            self._toggle(sub, false);
                        }
                    });
                    self._save();
                }
                self.options.onClickAfter.call(this, event, sub);
            });
        },
        _toggle: function(sub, open) {
            var self = this,
                idx = sub.attr('data-index'),
                parent = sub.parent();
            self.options.onToggleBefore.call(this, sub, open);
            if (open) {
                parent.addClass(self.options.openClass);
                sub.slideDown(self.options.slide);
                self.state[idx] = 1;
                if (self.options.accordion) {
                    var allowed = self.state = self._parents(sub);
                    allowed[idx] = self.state[idx] = 1;
                    self.$el.find('ul').filter(':visible').each(function() {
                        var sub = $(this),
                            idx = sub.attr('data-index');
                        if (!allowed.hasOwnProperty(idx)) {
                            self._toggle(sub, false);
                        }
                    });
                }
            } else {
                parent.removeClass(self.options.openClass);
                sub.slideUp(self.options.slide);
                self.state[idx] = 0;
            }
            self.options.onToggleAfter.call(this, sub, open);
        },
        _parents: function(sub, obj) {
            var result = {},
                parent = sub.parent(),
                parents = parent.parents('ul');
            parents.each(function() {
                var par = $(this),
                    idx = par.attr('data-index');
                if (!idx) {
                    return false;
                }
                result[idx] = obj ? par : 1;
            });
            return result;
        },
        _save: function() {
            if (this.options.save) {
                var save = {};
                for (var key in this.state) {
                    if (this.state[key] === 1) {
                        save[key] = 1;
                    }
                }
                cookie[this.uuid] = this.state = save;
                $.cookie(this.options.cookie.name, JSON.stringify(cookie), this.options.cookie);
            }
        },
        _load: function() {
            if (this.options.save) {
                if (cookie === null) {
                    var data = $.cookie(this.options.cookie.name);
                    cookie = (data) ? JSON.parse(data) : {};
                }
                this.state = cookie.hasOwnProperty(this.uuid) ? cookie[this.uuid] : {};
            }
        },
        toggle: function(open) {
            var self = this,
                length = arguments.length;
            if (length <= 1) {
                self.$el.find('ul').each(function() {
                    var sub = $(this);
                    self._toggle(sub, open);
                });
            } else {
                var idx, list = {},
                    args = Array.prototype.slice.call(arguments, 1);
                length--;
                for (var i = 0; i < length; i++) {
                    idx = args[i];
                    var sub = self.$el.find('ul[data-index="' + idx + '"]').first();
                    if (sub) {
                        list[idx] = sub;
                        if (open) {
                            var parents = self._parents(sub, true);
                            for (var pIdx in parents) {
                                if (!list.hasOwnProperty(pIdx)) {
                                    list[pIdx] = parents[pIdx];
                                }
                            }
                        }
                    }
                }
                for (idx in list) {
                    self._toggle(list[idx], open);
                }
            }
            self._save();
        },
        destroy: function() {
            $.removeData(this.$el);
            this.$el.find("li:has(ul) > a").unbind('click');
            this.$el.find("li:has(ul) > a > span").unbind('click');
        }
    };
    $.fn.navgoco = function(options) {
        if (typeof options === 'string' && options.charAt(0) !== '_' && options !== 'init') {
            var callback = true,
                args = Array.prototype.slice.call(arguments, 1);
        } else {
            options = $.extend({}, $.fn.navgoco.defaults, options || {});
            if (!$.cookie) {
                options.save = false;
            }
        }
        return this.each(function(idx) {
            var $this = $(this),
                obj = $this.data('navgoco');
            if (!obj) {
                obj = new Plugin(this, callback ? $.fn.navgoco.defaults : options, idx);
                $this.data('navgoco', obj);
            }
            if (callback) {
                obj[options].apply(obj, args);
            }
        });
    };
    var cookie = null;
    $.fn.navgoco.defaults = {
        caretHtml: '',
        accordion: false,
        openClass: 'open',
        save: true,
        cookie: {
            name: 'navgoco',
            expires: false,
            path: '/'
        },
        slide: {
            duration: 400,
            easing: 'swing'
        },
        onClickBefore: $.noop,
        onClickAfter: $.noop,
        onToggleBefore: $.noop,
        onToggleAfter: $.noop
    };
})(jQuery);
jQuery(document).ready(function($) {
    "use strict";
    $(".canvas-menu").navgoco({
        caretHtml: '<span class="icon-arrow"></span>',
        accordion: false,
        openClass: 'open',
        save: true,
        cookie: {
            name: 'navgoco',
            expires: false,
            path: '/'
        },
        slide: {
            duration: 300,
            easing: 'swing'
        }
    });
    var container = $('body');
    $('.off-canvas-btn, #off-canvas-close, .iw-overlay').click(function() {
        container.toggleClass('canvas-menu-open');
    });
});