if (!("ace" in window)) {
    window.ace = {}
}
jQuery(function(a) {
    window.ace.click_event = a.fn.tap ? "tap" : "click"
});
jQuery(function(a) {
    ace.handle_side_menu(jQuery);
    ace.enable_search_ahead(jQuery);
    ace.general_things(jQuery);
    ace.widget_boxes(jQuery);
    ace.widget_reload_handler(jQuery)
});
ace.handle_side_menu = function($) {
    $("#menu-toggler").on(ace.click_event, function() {
        $("#sidebar").toggleClass("display");
        $(this).toggleClass("display");
        return false
    });
    $("#sidebar-collapse").on(ace.click_event, function() {
        var c = $(".sidebar").hasClass("menu-min"),
            e = $(".sidebar"),
            d = $("#sidebar-collapse").find('[class*="fa-"]'),
            b = d.data("icon1"),
            a = d.data("icon2");
        if (!c) {
            e.addClass("menu-min");
            d.removeClass(b);
            d.addClass(a);
        } else {
            e.removeClass("menu-min");
            d.removeClass(a);
            d.addClass(b);
        }
    });
    var b = navigator.userAgent.match(/OS (5|6|7)(_\d)+ like Mac OS X/i);
    $(".nav-list").on(ace.click_event, function(h) {
        var g = $(h.target).closest("a");
        if (!g || g.length == 0) {
            return
        }
        c = $("#sidebar").hasClass("menu-min");
        if (!g.hasClass("dropdown-toggle")) {
            if (c && ace.click_event == "tap" && g.get(0).parentNode.parentNode == this) {
                var i = g.find(".menu-text").get(0);
                if (h.target != i && !a.contains(i, h.target)) {
                    return false
                }
            }
            if (b) {
                document.location = g.attr("href");
                return false
            }
            return
        }
        var f = g.next().get(0);
        if (!$(f).is(":visible")) {
            var d = $(f.parentNode).closest("ul");
            if (c && d.hasClass("nav-list")) {
                return
            }
            d.find("> .open > .submenu").each(function() {
                if (this != f && !$(this.parentNode).hasClass("active")) {
                    $(this).slideUp(200).parent().removeClass("open")
                }
            })
        } else {
        }
        if (c && $(f.parentNode.parentNode).hasClass("nav-list")) {
            return false
        }
        $(f).slideToggle(200).parent().toggleClass("open");
        return false
    })
};
ace.general_things = function($) {
    $('.ace-nav [class*="fa-animated-"]').closest("a").on("click", function() {
        var d = $(this).find('[class*="fa-animated-"]').eq(0);
        var c = d.attr("class").match(/fa\-animated\-([\d\w]+)/);
        d.removeClass(c[0]);
        $(this).off("click")
    });
    $(".nav-list .badge[title],.nav-list .label[title]").tooltip({placement: "right"});
    $("#btn-scroll-up").on(ace.click_event, function() {
        var c = Math.min(400, Math.max(100, parseInt($("html").scrollTop() / 3)));
        $("html,body").animate({scrollTop: 0}, c);
        return false
    });
    try {
        $("#skin-colorpicker").ace_colorpicker()
    } catch (b) {
    }
    $("#skin-colorpicker").on("change", function() {
        var d = $(this).find("option:selected").data("skin");
        var c = $(document.body);
        c.removeClass("skin-1 skin-2 skin-3");
        if (d != "default") {
            c.addClass(d)
        }
        if (d == "skin-1") {
            $(".ace-nav > li.grey").addClass("dark")
        } else {
            $(".ace-nav > li.grey").removeClass("dark")
        }
        if (d == "skin-2") {
            $(".ace-nav > li").addClass("no-border margin-1");
            $(".ace-nav > li:not(:last-child)").addClass("light-pink").find('> a > [class*="fa-"]').addClass("pink").end().eq(0).find(".badge").addClass("badge-warning")
        } else {
            $(".ace-nav > li").removeClass("no-border margin-1");
            $(".ace-nav > li:not(:last-child)").removeClass("light-pink").find('> a > [class*="fa-"]').removeClass("pink").end().eq(0).find(".badge").removeClass("badge-warning")
        }
        if (d == "skin-3") {
            $(".ace-nav > li.grey").addClass("red").find(".badge").addClass("badge-yellow")
        } else {
            $(".ace-nav > li.grey").removeClass("red").find(".badge").removeClass("badge-yellow")
        }
    })
};
ace.widget_boxes = function($) {
    $(document).on("hide.bs.collapse show.bs.collapse", function(c) {
        var b = c.target.getAttribute("id");
        $('[href*="#' + b + '"]').find('[class*="fa-"]').each(function() {
            var e = $(this);
            var d;
            var f = null;
            var g = null;
            if ((f = e.attr("data-fa-show"))) {
                g = e.attr("data-fa-hide")
            } else {
                if (d = e.attr("class").match(/fa\-(.*)\-(up|down)/)) {
                    f = "fa-" + d[1] + "-down";
                    g = "fa-" + d[1] + "-up"
                }
            }
            if (f) {
                if (c.type == "show") {
                    e.removeClass(f).addClass(g)
                } else {
                    e.removeClass(g).addClass(f)
                }
                return false
            }
        })
    });
    $(document).on("click.ace.widget", "[data-action]", function(o) {
        o.preventDefault();
        var n = $(this);
        var action = n.data("action");
        var widget = n.closest(".widget-box");
        if (widget.hasClass("ui-sortable-helper")) {
            return
        }
        if (action == "collapse") {
            var j = widget.hasClass("collapsed") ? "show" : "hide";
            var f = j == "show" ? "shown" : "hidden";
            var c;
            widget.trigger(c = $.Event(j + ".ace.widget"));
            if (c.isDefaultPrevented()) {
                return
            }
            var g = widget.find(".widget-body");
            var m = n.find("[class*=fa-]").eq(0);
            var h = m.attr("class").match(/fa\-(.*)\-(up|down)/);
            var d = "fa-" + h[1] + "-down";
            var i = "fa-" + h[1] + "-up";
            var l = g.find(".widget-body-inner");
            if (l.length == 0) {
                g = g.wrapInner('<div class="widget-body-inner"></div>').find(":first-child").eq(0)
            } else {
                g = l.eq(0)
            }
            var e = 300;
            var k = 200;
            if (j == "show") {
                if (m) {
                    m.addClass(i).removeClass(d)
                }
                widget.removeClass("collapsed");
                g.slideUp(0, function() {
                    g.slideDown(e, function() {
                        widget.trigger(c = $.Event(f + ".ace.widget"))
                    })
                })
            } else {
                if (m) {
                    m.addClass(d).removeClass(i)
                }
                g.slideUp(k, function() {
                    widget.addClass("collapsed");
                    widget.trigger(c = $.Event(f + ".ace.widget"))
                })
            }
        } else if (action == "close") {
            var c;
            widget.trigger(c = $.Event("close.ace.widget"));
            if (c.isDefaultPrevented()) {
                return
            }
            var r = parseInt(n.data("close-speed")) || 300;
            widget.hide(r, function() {
                widget.trigger(c = $.Event("closed.ace.widget"));
                widget.remove()
            })
        } else if (action == "reload") {
            var c;
            widget.trigger(c = $.Event("reload.ace.widget"));
            if (c.isDefaultPrevented()) {
                return
            }
            n.blur();
            var q = false;
            if (widget.css("position") == "static") {
                q = true;
                widget.addClass("position-relative")
            }
            widget.append('<div class="widget-box-overlay"><i class="fa fa-spinner fa-spin fa-2x white"></i></div>');
            widget.one("reloaded.ace.widget", function() {
                widget.find(".widget-box-overlay").remove();
                if (q) {
                    widget.removeClass("position-relative")
                }
            })
        } else if (action == "settings") {
            var c = $.Event("settings.ace.widget");
            widget.trigger(c)
        }
    })
};
ace.widget_reload_handler = function($) {
    $(document).on("reload.ace.widget", ".widget-box", function(b) {
        var c = $(this);
        setTimeout(function() {
            c.trigger("reloaded.ace.widget")
        }, parseInt(Math.random() * 1000 + 1000))
    })
};
ace.enable_search_ahead = function($) {
    ace.variable_US_STATES = ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Dakota", "North Carolina", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"];
    try {
        $("#nav-search-input").typeahead({source: ace.variable_US_STATES,updater: function(c) {
                $("#nav-search-input").focus();
                return c
            }})
    } catch (b) {
    }
};
ace.switch_direction = function($) {
    var c = $(document.body);
    c.toggleClass("rtl")
     .find(".dropdown-menu:not(.datepicker-dropdown,.colorpicker)")
        .toggleClass("pull-right")
        .end()
     .find(".pull-right:not(.dropdown-menu,blockquote,.profile-skills .pull-right)")
        .removeClass("pull-right")
        .addClass("tmp-rtl-pull-right")
        .end()
     .find(".pull-left:not(.dropdown-submenu,.profile-skills .pull-left)")
        .removeClass("pull-left")
        .addClass("pull-right")
        .end()
     .find(".tmp-rtl-pull-right")
        .removeClass("tmp-rtl-pull-right")
        .addClass("pull-left")
        .end()
     .find(".chosen-container")
        .toggleClass("chosen-rtl")
        .end();
    function a(h, g) {
        c.find("." + h).removeClass(h).addClass("tmp-rtl-" + h).end()
         .find("." + g).removeClass(g).addClass(h).end()
         .find(".tmp-rtl-" + h).removeClass("tmp-rtl-" + h).addClass(g)
    }
    function b(h, g, i) {
        i.each(function() {
            var k = $(this);
            var j = k.css(g);
            k.css(g, k.css(h));
            k.css(h, j)
        })
    }
    a("align-left", "align-right");
    a("no-padding-left", "no-padding-right");
    a("arrowed", "arrowed-right");
    a("arrowed-in", "arrowed-in-right");
    a("messagebar-item-left", "messagebar-item-right");
    var e = $("#piechart-placeholder");
    if (e.size() > 0) {
        var f = $(document.body).hasClass("rtl") ? "nw" : "ne";
        e.data("draw").call(e.get(0), e, e.data("chart"), f)
    }
};
