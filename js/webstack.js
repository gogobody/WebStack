console.log(' %c Theme WebStack %c https://github.com/gogobody/WebStack', 'color:#444;background:#eee;padding:5px 0', 'color:#eee;background:#444;padding:5px');

/**
 * prefetch
 */
(function (e) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? e(require("jquery")) : e(jQuery)
})(function (e) {
    "use strict";

    function t(e) {
        return "string" == typeof e ? parseInt(e, 10) : ~~e
    }

    var o = {
        wheelSpeed: 1,
        wheelPropagation: !1,
        swipePropagation: !0,
        minScrollbarLength: null,
        maxScrollbarLength: null,
        useBothWheelAxes: !1,
        useKeyboard: !0,
        suppressScrollX: !1,
        suppressScrollY: !1,
        scrollXMarginOffset: 0,
        scrollYMarginOffset: 0,
        includePadding: !1
    }, n = 0, r = function () {
        var e = n++;
        return function (t) {
            var o = ".perfect-scrollbar-" + e;
            return t === void 0 ? o : t + o
        }
    }, l = "WebkitAppearance" in document.documentElement.style;
    e.fn.perfectScrollbar = function (n, i) {
        return this.each(function () {
            function a(e, o) {
                var n = e + o, r = D - R;
                j = 0 > n ? 0 : n > r ? r : n;
                var l = t(j * (Y - D) / (D - R));
                M.scrollTop(l)
            }

            function s(e, o) {
                var n = e + o, r = E - k;
                W = 0 > n ? 0 : n > r ? r : n;
                var l = t(W * (C - E) / (E - k));
                M.scrollLeft(l)
            }

            function c(e) {
                return P.minScrollbarLength && (e = Math.max(e, P.minScrollbarLength)), P.maxScrollbarLength && (e = Math.min(e, P.maxScrollbarLength)), e
            }

            function u() {
                var e = {width: I};
                e.left = B ? M.scrollLeft() + E - C : M.scrollLeft(), N ? e.bottom = _ - M.scrollTop() : e.top = Q + M.scrollTop(), H.css(e);
                var t = {top: M.scrollTop(), height: A};
                Z ? t.right = B ? C - M.scrollLeft() - V - J.outerWidth() : V - M.scrollLeft() : t.left = B ? M.scrollLeft() + 2 * E - C - $ - J.outerWidth() : $ + M.scrollLeft(), G.css(t), U.css({
                    left: W,
                    width: k - z
                }), J.css({top: j, height: R - et})
            }

            function d() {
                M.removeClass("ps-active-x"), M.removeClass("ps-active-y"), E = P.includePadding ? M.innerWidth() : M.width(), D = P.includePadding ? M.innerHeight() : M.height(), C = M.prop("scrollWidth"), Y = M.prop("scrollHeight"), !P.suppressScrollX && C > E + P.scrollXMarginOffset ? (X = !0, I = E - F, k = c(t(I * E / C)), W = t(M.scrollLeft() * (I - k) / (C - E))) : (X = !1, k = 0, W = 0, M.scrollLeft(0)), !P.suppressScrollY && Y > D + P.scrollYMarginOffset ? (O = !0, A = D - tt, R = c(t(A * D / Y)), j = t(M.scrollTop() * (A - R) / (Y - D))) : (O = !1, R = 0, j = 0, M.scrollTop(0)), W >= I - k && (W = I - k), j >= A - R && (j = A - R), u(), X && M.addClass("ps-active-x"), O && M.addClass("ps-active-y")
            }

            function p() {
                var t, o, n = function (e) {
                    s(t, e.pageX - o), d(), e.stopPropagation(), e.preventDefault()
                }, r = function () {
                    H.removeClass("in-scrolling"), e(q).unbind(K("mousemove"), n)
                };
                U.bind(K("mousedown"), function (l) {
                    o = l.pageX, t = U.position().left, H.addClass("in-scrolling"), e(q).bind(K("mousemove"), n), e(q).one(K("mouseup"), r), l.stopPropagation(), l.preventDefault()
                }), t = o = null
            }

            function f() {
                var t, o, n = function (e) {
                    a(t, e.pageY - o), d(), e.stopPropagation(), e.preventDefault()
                }, r = function () {
                    G.removeClass("in-scrolling"), e(q).unbind(K("mousemove"), n)
                };
                J.bind(K("mousedown"), function (l) {
                    o = l.pageY, t = J.position().top, G.addClass("in-scrolling"), e(q).bind(K("mousemove"), n), e(q).one(K("mouseup"), r), l.stopPropagation(), l.preventDefault()
                }), t = o = null
            }

            function v(e, t) {
                var o = M.scrollTop();
                if (0 === e) {
                    if (!O) return !1;
                    if (0 === o && t > 0 || o >= Y - D && 0 > t) return !P.wheelPropagation
                }
                var n = M.scrollLeft();
                if (0 === t) {
                    if (!X) return !1;
                    if (0 === n && 0 > e || n >= C - E && e > 0) return !P.wheelPropagation
                }
                return !0
            }

            function g(e, t) {
                var o = M.scrollTop(), n = M.scrollLeft(), r = Math.abs(e), l = Math.abs(t);
                if (l > r) {
                    if (0 > t && o === Y - D || t > 0 && 0 === o) return !P.swipePropagation
                } else if (r > l && (0 > e && n === C - E || e > 0 && 0 === n)) return !P.swipePropagation;
                return !0
            }

            function b() {
                function e(e) {
                    var t = e.originalEvent.deltaX, o = -1 * e.originalEvent.deltaY;
                    return (t === void 0 || o === void 0) && (t = -1 * e.originalEvent.wheelDeltaX / 6, o = e.originalEvent.wheelDeltaY / 6), e.originalEvent.deltaMode && 1 === e.originalEvent.deltaMode && (t *= 10, o *= 10), t !== t && o !== o && (t = 0, o = e.originalEvent.wheelDelta), [t, o]
                }

                function t(t) {
                    if (l || !(M.find("select:focus").length > 0)) {
                        var n = e(t), r = n[0], i = n[1];
                        o = !1, P.useBothWheelAxes ? O && !X ? (i ? M.scrollTop(M.scrollTop() - i * P.wheelSpeed) : M.scrollTop(M.scrollTop() + r * P.wheelSpeed), o = !0) : X && !O && (r ? M.scrollLeft(M.scrollLeft() + r * P.wheelSpeed) : M.scrollLeft(M.scrollLeft() - i * P.wheelSpeed), o = !0) : (M.scrollTop(M.scrollTop() - i * P.wheelSpeed), M.scrollLeft(M.scrollLeft() + r * P.wheelSpeed)), d(), o = o || v(r, i), o && (t.stopPropagation(), t.preventDefault())
                    }
                }

                var o = !1;
                window.onwheel !== void 0 ? M.bind(K("wheel"), t) : window.onmousewheel !== void 0 && M.bind(K("mousewheel"), t)
            }

            function h() {
                var t = !1;
                M.bind(K("mouseenter"), function () {
                    t = !0
                }), M.bind(K("mouseleave"), function () {
                    t = !1
                });
                var o = !1;
                e(q).bind(K("keydown"), function (n) {
                    if ((!n.isDefaultPrevented || !n.isDefaultPrevented()) && t) {
                        for (var r = document.activeElement ? document.activeElement : q.activeElement; r.shadowRoot;) r = r.shadowRoot.activeElement;
                        if (!e(r).is(":input,[contenteditable]")) {
                            var l = 0, i = 0;
                            switch (n.which) {
                                case 37:
                                    l = -30;
                                    break;
                                case 38:
                                    i = 30;
                                    break;
                                case 39:
                                    l = 30;
                                    break;
                                case 40:
                                    i = -30;
                                    break;
                                case 33:
                                    i = 90;
                                    break;
                                case 32:
                                case 34:
                                    i = -90;
                                    break;
                                case 35:
                                    i = n.ctrlKey ? -Y : -D;
                                    break;
                                case 36:
                                    i = n.ctrlKey ? M.scrollTop() : D;
                                    break;
                                default:
                                    return
                            }
                            M.scrollTop(M.scrollTop() - i), M.scrollLeft(M.scrollLeft() + l), o = v(l, i), o && n.preventDefault()
                        }
                    }
                })
            }

            function w() {
                function e(e) {
                    e.stopPropagation()
                }

                J.bind(K("click"), e), G.bind(K("click"), function (e) {
                    var o = t(R / 2), n = e.pageY - G.offset().top - o, r = D - R, l = n / r;
                    0 > l ? l = 0 : l > 1 && (l = 1), M.scrollTop((Y - D) * l)
                }), U.bind(K("click"), e), H.bind(K("click"), function (e) {
                    var o = t(k / 2), n = e.pageX - H.offset().left - o, r = E - k, l = n / r;
                    0 > l ? l = 0 : l > 1 && (l = 1), M.scrollLeft((C - E) * l)
                })
            }

            function m() {
                function t() {
                    var e = window.getSelection ? window.getSelection() : document.getSlection ? document.getSlection() : {rangeCount: 0};
                    return 0 === e.rangeCount ? null : e.getRangeAt(0).commonAncestorContainer
                }

                function o() {
                    r || (r = setInterval(function () {
                        return x() ? (M.scrollTop(M.scrollTop() + l.top), M.scrollLeft(M.scrollLeft() + l.left), d(), void 0) : (clearInterval(r), void 0)
                    }, 50))
                }

                function n() {
                    r && (clearInterval(r), r = null), H.removeClass("in-scrolling"), G.removeClass("in-scrolling")
                }

                var r = null, l = {top: 0, left: 0}, i = !1;
                e(q).bind(K("selectionchange"), function () {
                    e.contains(M[0], t()) ? i = !0 : (i = !1, n())
                }), e(window).bind(K("mouseup"), function () {
                    i && (i = !1, n())
                }), e(window).bind(K("mousemove"), function (e) {
                    if (i) {
                        var t = {x: e.pageX, y: e.pageY}, r = M.offset(), a = {
                            left: r.left,
                            right: r.left + M.outerWidth(),
                            top: r.top,
                            bottom: r.top + M.outerHeight()
                        };
                        t.x < a.left + 3 ? (l.left = -5, H.addClass("in-scrolling")) : t.x > a.right - 3 ? (l.left = 5, H.addClass("in-scrolling")) : l.left = 0, t.y < a.top + 3 ? (l.top = 5 > a.top + 3 - t.y ? -5 : -20, G.addClass("in-scrolling")) : t.y > a.bottom - 3 ? (l.top = 5 > t.y - a.bottom + 3 ? 5 : 20, G.addClass("in-scrolling")) : l.top = 0, 0 === l.top && 0 === l.left ? n() : o()
                    }
                })
            }

            function T(t, o) {
                function n(e, t) {
                    M.scrollTop(M.scrollTop() - t), M.scrollLeft(M.scrollLeft() - e), d()
                }

                function r() {
                    h = !0
                }

                function l() {
                    h = !1
                }

                function i(e) {
                    return e.originalEvent.targetTouches ? e.originalEvent.targetTouches[0] : e.originalEvent
                }

                function a(e) {
                    var t = e.originalEvent;
                    return t.targetTouches && 1 === t.targetTouches.length ? !0 : t.pointerType && "mouse" !== t.pointerType && t.pointerType !== t.MSPOINTER_TYPE_MOUSE ? !0 : !1
                }

                function s(e) {
                    if (a(e)) {
                        w = !0;
                        var t = i(e);
                        p.pageX = t.pageX, p.pageY = t.pageY, f = (new Date).getTime(), null !== b && clearInterval(b), e.stopPropagation()
                    }
                }

                function c(e) {
                    if (!h && w && a(e)) {
                        var t = i(e), o = {pageX: t.pageX, pageY: t.pageY}, r = o.pageX - p.pageX,
                            l = o.pageY - p.pageY;
                        n(r, l), p = o;
                        var s = (new Date).getTime(), c = s - f;
                        c > 0 && (v.x = r / c, v.y = l / c, f = s), g(r, l) && (e.stopPropagation(), e.preventDefault())
                    }
                }

                function u() {
                    !h && w && (w = !1, clearInterval(b), b = setInterval(function () {
                        return x() ? .01 > Math.abs(v.x) && .01 > Math.abs(v.y) ? (clearInterval(b), void 0) : (n(30 * v.x, 30 * v.y), v.x *= .8, v.y *= .8, void 0) : (clearInterval(b), void 0)
                    }, 10))
                }

                var p = {}, f = 0, v = {}, b = null, h = !1, w = !1;
                t && (e(window).bind(K("touchstart"), r), e(window).bind(K("touchend"), l), M.bind(K("touchstart"), s), M.bind(K("touchmove"), c), M.bind(K("touchend"), u)), o && (window.PointerEvent ? (e(window).bind(K("pointerdown"), r), e(window).bind(K("pointerup"), l), M.bind(K("pointerdown"), s), M.bind(K("pointermove"), c), M.bind(K("pointerup"), u)) : window.MSPointerEvent && (e(window).bind(K("MSPointerDown"), r), e(window).bind(K("MSPointerUp"), l), M.bind(K("MSPointerDown"), s), M.bind(K("MSPointerMove"), c), M.bind(K("MSPointerUp"), u)))
            }

            function y() {
                M.bind(K("scroll"), function () {
                    d()
                })
            }

            function L() {
                M.unbind(K()), e(window).unbind(K()), e(q).unbind(K()), M.data("perfect-scrollbar", null), M.data("perfect-scrollbar-update", null), M.data("perfect-scrollbar-destroy", null), U.remove(), J.remove(), H.remove(), G.remove(), M = H = G = U = J = X = O = E = D = C = Y = k = W = _ = N = Q = R = j = V = Z = $ = B = K = null
            }

            function S() {
                d(), y(), p(), f(), w(), m(), b(), (ot || nt) && T(ot, nt), P.useKeyboard && h(), M.data("perfect-scrollbar", M), M.data("perfect-scrollbar-update", d), M.data("perfect-scrollbar-destroy", L)
            }

            var P = e.extend(!0, {}, o), M = e(this), x = function () {
                return !!M
            };
            if ("object" == typeof n ? e.extend(!0, P, n) : i = n, "update" === i) return M.data("perfect-scrollbar-update") && M.data("perfect-scrollbar-update")(), M;
            if ("destroy" === i) return M.data("perfect-scrollbar-destroy") && M.data("perfect-scrollbar-destroy")(), M;
            if (M.data("perfect-scrollbar")) return M.data("perfect-scrollbar");
            M.addClass("ps-container");
            var E, D, C, Y, X, k, W, I, O, R, j, A, B = "rtl" === M.css("direction"), K = r(),
                q = this.ownerDocument || document, H = e("<div class='ps-scrollbar-x-rail'>").appendTo(M),
                U = e("<div class='ps-scrollbar-x'>").appendTo(H), _ = t(H.css("bottom")), N = _ === _,
                Q = N ? null : t(H.css("top")), z = t(H.css("borderLeftWidth")) + t(H.css("borderRightWidth")),
                F = t(H.css("marginLeft")) + t(H.css("marginRight")),
                G = e("<div class='ps-scrollbar-y-rail'>").appendTo(M),
                J = e("<div class='ps-scrollbar-y'>").appendTo(G), V = t(G.css("right")), Z = V === V,
                $ = Z ? null : t(G.css("left")), et = t(G.css("borderTopWidth")) + t(G.css("borderBottomWidth")),
                tt = t(G.css("marginTop")) + t(G.css("marginBottom")),
                ot = "ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch,
                nt = null !== window.navigator.msMaxTouchPoints;
            return S(), M
        })
    }
});
jQuery.extend({

    // Assume jQuery is ready without the ready module
    isReady: true,

    error: function (msg) {
        throw new Error(msg);
    },

    noop: function () {
    },

    isFunction: function (obj) {
        return jQuery.type(obj) === "function";
    },
})
/**
 * gloabl vars
 */

// Sidebar Toggle
var public_vars = public_vars || {};

// Sideber Menu Setup function
var sm_duration = .2,
    sm_transition_delay = 150;

public_vars.$body = $("body");
public_vars.$pageContainer = public_vars.$body.find(".page-container");

public_vars.$sidebarMenu = public_vars.$pageContainer.find('.sidebar-menu');
public_vars.$sidebarProfile = public_vars.$sidebarMenu.find('.sidebar-user-info');
public_vars.$mainMenu = public_vars.$sidebarMenu.find('.main-menu');

public_vars.$horizontalNavbar = public_vars.$body.find('.navbar.horizontal-menu');
public_vars.$horizontalMenu = public_vars.$horizontalNavbar.find('.navbar-nav');

public_vars.$mainContent = public_vars.$pageContainer.find('.main-content');
public_vars.$userInfoMenu = public_vars.$body.find('nav.navbar.user-info-navbar');
/**
 * main func
 * @type {{init: webStack.init, nightModeInit: webStack.nightModeInit, weatherWidgetInit: webStack.weatherWidgetInit}}
 */
var webStack = {
    init: function () {
        this.weatherWidgetInit()
        this.siteEventInit()
        this.toggleBarInit()
    },
    weatherWidgetInit: function () {
        if (!$("#tp-weather-widget")) return;
        (function (a, h, g, f, e, d, c, b) {
            b = function () {
                d = h.createElement(g);
                c = h.getElementsByTagName(g)[0];
                d.src = e;
                d.charset = "utf-8";
                d.async = 1;
                c.parentNode.insertBefore(d, c)
            };
            a["SeniverseWeatherWidgetObject"] = f;
            a[f] || (a[f] = function () {
                (a[f].q = a[f].q || []).push(arguments)
            });
            a[f].l = +new Date();
            if (a.attachEvent) {
                a.attachEvent("onload", b)
            } else {
                a.addEventListener("load", b, false)
            }
        }(window, document, "script", "SeniverseWeatherWidget", "//cdn.sencdn.com/widget2/static/js/bundle.js?t=" + parseInt((new Date().getTime() / 100000000).toString(), 10)));

        window.SeniverseWeatherWidget('show', {
            flavor: "slim",
            location: "WX4FBXXFKE4F",
            geolocation: true,
            language: "zh-Hans",
            unit: "c",
            theme: "auto",
            token: "6cc2a314-5422-4e9c-b3ad-7b9217f4e494",
            hover: "enabled",
            container: "tp-weather-widget"
        })
    },
    nightModeInit: function () {
        if (document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") === '') {
            if (new Date().getHours() > 22 || new Date().getHours() < 6) {
                document.body.classList.add('night');
                document.cookie = "night=1;path=/";
            } else {
                document.body.classList.remove('night');
                document.cookie = "night=0;path=/";
            }
        } else {
            var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || 0;
            if (parseInt(night) === 0) {
                document.body.classList.remove('night');
                document.querySelector('nav.navbar').classList.remove('night');
            } else {
                document.body.classList.add('night');
                document.querySelector('nav.navbar').classList.add('night');
            }
        }
    },
    siteEventInit: function () {
        $(document).on('click', '.has-sub', function () {
            var _this = $(this)
            if (!$(this).hasClass('expanded')) {
                setTimeout(function () {
                    _this.find('ul').attr("style", "")
                }, 300);

            } else {
                $('.has-sub ul').each(function (id, ele) {
                    var _that = $(this)
                    if (_this.find('ul')[0] !== ele) {
                        setTimeout(function () {
                            _that.attr("style", "")
                        }, 300);
                    }
                })
            }
        })
        $('.user-info-menu .hidden-sm').click(function () {
            if ($('.sidebar-menu').hasClass('collapsed')) {
                $('.has-sub.expanded > ul').attr("style", "")
            } else {
                $('.has-sub.expanded > ul').show()
            }
        })
        $("#main-menu li ul li").click(function () {
            $(this).siblings('li').removeClass('active'); // 删除其他兄弟元素的样式
            $(this).addClass('active'); // 添加当前元素的样式
        });
    },
    toggleBarInit: function () {
        // toggle
        $("a.smooth").click(function (ev) {
            if (npage !== 'index') {
                window.location.href = siteUrl + $(this).attr("href")
                return false
            }

            ev.preventDefault();
            $("#main-menu li").each(function () {
                $(this).removeClass("active");
            });
            $(this).parent("li").addClass("active");

            public_vars.$mainMenu.add(public_vars.$sidebarProfile).toggleClass('mobile-is-visible');
            ps_destroy();
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top - 105
            }, {
                duration: 500,
                easing: "swing"
            });
        });
        // Setup Sidebar Menu
        setup_sidebar_menu();


        // Setup Horizontal Menu
        setup_horizontal_menu();

        $('a[data-toggle="sidebar"]').each(function (i, el) {
            $(el).on('click', function (ev) {
                ev.preventDefault();


                if (public_vars.$sidebarMenu.hasClass('collapsed')) {
                    public_vars.$sidebarMenu.removeClass('collapsed');
                    ps_init();
                } else {
                    public_vars.$sidebarMenu.addClass('collapsed');
                    ps_destroy();
                }

                $(window).trigger('xenon.resize');
            });
        });

        // Mobile Menu Trigger
        $('a[data-toggle="mobile-menu"]').on('click', function (ev) {
            ev.preventDefault();

            public_vars.$mainMenu.add(public_vars.$sidebarProfile).toggleClass('mobile-is-visible');
            ps_destroy();
        });
        // Mobile User Info Menu Trigger
        $('a[data-toggle="user-info-menu"]').on('click', function (ev) {
            ev.preventDefault();

            public_vars.$userInfoMenu.toggleClass('mobile-is-visible');

        });
    }
}

var searchWidget = {
    init: function () {
        this.search()
    },
    search: function () {
        var searchIcon = $(".search-icon")
        searchIcon.css("opacity", "1");
        var listIndex = -1;
        var hotList = 0;
        var searchData = {
            "thisSearch": "https://www.baidu.com/s?wd=",
            "thisSearchIcon": "url('/usr/themes/WebStack/images/search_icon.png')",
            "hotStatus": true,
            "data": [{
                name: "百度",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -80px 0px",
                position: "0px 0px",
                url: "https://www.baidu.com/s?wd="
            }, {
                name: "谷歌",
                img: "url('/usr/themes/WebStack/images/search_icon.png')  -105px 0px",
                position: "-40px 0px",
                url: "https://www.google.com/search?q="
            }, {
                name: "必应",
                img: "url('/usr/themes/WebStack/images/search_icon.png')  -80px -25px",
                position: "0px -40px",
                url: "https://cn.bing.com/search?q="
            }, {
                name: "好搜",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -105px -25px",
                position: "-40px -40px",
                url: "https://www.so.com/s?q="
            }, {
                name: "搜狗",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -80px -50px",
                position: "0px -80px",
                url: "https://www.sogou.com/web?query="
            }, {
                name: "淘宝",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -105px -50px",
                position: "-40px -80px",
                url: "https://s.taobao.com/search?q="
            }, {
                name: "京东",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -80px -75px",
                position: "0px -120px",
                url: "http://search.jd.com/Search?keyword="
            }, {
                name: "天猫",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -105px -75px",
                position: "-40px -120px",
                url: "https://list.tmall.com/search_product.htm?q="
            }, {
                name: "1688",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -80px -100px",
                position: "0px -160px",
                url: "https://s.1688.com/selloffer/offer_search.htm?keywords="
            }, {
                name: "知乎",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -105px -100px",
                position: "-40px -160px",
                url: "https://www.zhihu.com/search?type=content&q="
            }, {
                name: "微博",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -80px -125px",
                position: "0px -200px",
                url: "https://s.weibo.com/weibo/"
            }, {
                name: "B站",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -105px -125px",
                position: "-40px -200px",
                url: "http://search.bilibili.com/all?keyword="
            }, {
                name: "豆瓣",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -80px -150px",
                position: "0px -240px",
                url: "https://www.douban.com/search?source=suggest&q="
            }, {
                name: "优酷",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -105px -150px",
                position: "-40px -240px",
                url: "https://so.youku.com/search_video/q_"
            }, {
                name: "GitHub",
                img: "url('/usr/themes/WebStack/images/search_icon.png') -80px -175px",
                position: "0px -280px",
                url: "https://github.com/search?utf8=✓&q="
            }]
        };
        var localSearchData = localStorage.getItem("searchData");
        if (localSearchData) {
            searchData = JSON.parse(localSearchData)
        }
        var txt_ = $("#txt")
        var box_ul_li = $("#box ul li")

        function filterChildren(element) {
            return $(element).contents().filter(function (index, content) {
                return content.nodeType === 3
            }).text().trim()
        }

        function getHotkeyword(value) {
            $.ajax({
                type: "GET",
                url: "https://sp0.baidu.com/5a1Fazu8AA54nxGko9WTAnF6hhy/su",
                async: true,
                data: {wd: value},
                dataType: "jsonp",
                jsonp: "cb",
                success: function (res) {
                    $("#box ul").text("");
                    hotList = res.s.length;
                    if (hotList) {
                        $("#box").css("display", "block");
                        for (var i = 0; i < hotList; i++) {
                            $("#box ul").append("<li><span>" + (i + 1) + "</span> " + res.s[i] + "</li>");
                            box_ul_li.eq(i).click(function () {
                                var thisText = filterChildren(this);
                                txt_.val(thisText);
                                window.open(searchData.thisSearch + thisText);
                                $("#box").css("display", "none")
                            });
                            if (i === 0) {
                                box_ul_li.eq(i).css({"border-top": "none"});
                                $("#box ul span").eq(i).css({"color": "#fff", "background": "#f54545"})
                            } else {
                                if (i === 1) {
                                    $("#box ul span").eq(i).css({"color": "#fff", "background": "#ff8547"})
                                } else {
                                    if (i === 2) {
                                        $("#box ul span").eq(i).css({"color": "#fff", "background": "#ffac38"})
                                    }
                                }
                            }
                        }
                    } else {
                        $("#box").css("display", "none")
                    }
                },
                error: function (res) {
                    console.log(res)
                }
            })
        }

        txt_.keyup(function (e) {
            if ($(this).val()) {
                if (e.keyCode === 38 || e.keyCode === 40 || !searchData.hotStatus) {
                    return
                }
                getHotkeyword($(this).val())
            } else {
                $(".search-clear").css("display", "none");
                $("#box").css("display", "none")
            }
        });
        txt_.keydown(function (e) {
            if (e.keyCode === 40) {
                listIndex === (hotList - 1) ? listIndex = 0 : listIndex++;
                box_ul_li.eq(listIndex).addClass("current").siblings().removeClass("current");
                var hotValue = filterChildren(box_ul_li.eq(listIndex));
                txt_.val(hotValue)
            } else if (e.keyCode === 38) {
                if (e.preventDefault) {
                    e.preventDefault()
                }
                if (e.returnValue) {
                    e.returnValue = false
                }
                listIndex === 0 || listIndex === -1 ? listIndex = (hotList - 1) : listIndex--;
                box_ul_li.eq(listIndex).addClass("current").siblings().removeClass("current");
                var hotValue = filterChildren(box_ul_li.eq(listIndex));
                txt_.val(hotValue)
            } else if (e.keyCode === 13) {
                window.open(searchData.thisSearch + txt_.val());
                $("#box").css("display", "none");
                txt_.blur();
                box_ul_li.removeClass("current");
                listIndex = -1
            }
        });
        txt_.focus(function () {
            $(".search-box").css("box-show", "inset 0 1px 2px rgba(27,31,35,.075), 0 0 0 0.2em rgba(3,102,214,.3)");
            if ($(this).val() && searchData.hotStatus) {
                getHotkeyword($(this).val())
            }
        });
        txt_.blur(function () {
            setTimeout(function () {
                $("#box").css("display", "none")
            }, 250)
        });
        for (var i = 0; i < searchData.data.length; i++) {
            $(".search-engine-list").append('<li><span style="background:' + searchData.data[i].img + '"/></span>' + searchData.data[i].name + "</li>")
        }
        $(".search-icon, .search-engine").hover(function () {
            $(".search-engine").css("display", "block")
        }, function () {
            $(".search-engine").css("display", "none")
        });
        var hotBtn = $("#hot-btn")
        hotBtn.click(function () {
            $(this).toggleClass("off");
            searchData.hotStatus = !searchData.hotStatus;
            localStorage.searchData = JSON.stringify(searchData)
        });
        searchData.hotStatus ? hotBtn.removeClass("off") : hotBtn.addClass("off");
        $(".search-engine-list li").click(function () {
            var index = $(this).index();
            searchData.thisSearchIcon = searchData.data[index].position;
            searchIcon.css("background-position", searchData.thisSearchIcon);
            searchData.thisSearch = searchData.data[index].url;
            $(".search-engine").css("display", "none");
            localStorage.searchData = JSON.stringify(searchData)
        });
        searchIcon.css("background-position", searchData.thisSearchIcon);
        $("#search-btn").click(function () {
            var textValue = txt_.val();
            if (textValue) {
                window.open(searchData.thisSearch + textValue);
                $("#box ul").html("")
            } else {
                layer.msg("请输入关键词！", {time: 500}, function () {
                    txt_.focus()
                })
            }
        })
    }
}


var WebStackInit = function () {
    $('[data-toggle="tooltip"]').tooltip();
    webStack.init()
    searchWidget.init()
}


//global function
//夜间模式切换
function switchNightMode() {
    var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || 0;

    if (parseInt(night) === 0) {
        document.body.classList.add('night');
        document.querySelector('nav.navbar').classList.add('night');
        document.cookie = "night=1;path=/"
    } else {
        document.body.classList.remove('night');
        document.querySelector('nav.navbar').classList.remove('night');
        document.cookie = "night=0;path=/"
    }
}


// Is xs device
function isxs() {
    return is('devicescreen') || is('sdevicescreen');
}

// Get current breakpoint
function get_current_breakpoint() {
    var width = jQuery(window).width(),
        breakpoints = public_vars.breakpoints;

    for (var breakpont_label in breakpoints) {
        var bp_arr = breakpoints[breakpont_label],
            min = bp_arr[0],
            max = bp_arr[1];

        if (max === -1)
            max = width;

        if (min <= width && max >= width) {
            return breakpont_label;
        }
    }

    return null;
}

// Check current screen breakpoint
function is(screen_label) {
    return get_current_breakpoint() === screen_label;
}


function ps_init() {
    if (isxs())
        return;

    if (jQuery.isFunction(jQuery.fn.perfectScrollbar)) {
        if (public_vars.$sidebarMenu.hasClass('collapsed') || !public_vars.$sidebarMenu.hasClass('fixed')) {
            return;
        }

        public_vars.$sidebarMenu.find('.sidebar-menu-inner').perfectScrollbar({
            wheelSpeed: 1,
            wheelPropagation: public_vars.wheelPropagation
        });
    }
}

function ps_destroy() {
    if (jQuery.isFunction(jQuery.fn.perfectScrollbar)) {
        public_vars.$sidebarMenu.find('.sidebar-menu-inner').perfectScrollbar('destroy');
    }
}

// Perfect scroll bar functions by Arlind Nushi
function ps_update(destroy_init) {
    if (isxs())
        return;

    if (jQuery.isFunction(jQuery.fn.perfectScrollbar)) {
        if (public_vars.$sidebarMenu.hasClass('collapsed')) {
            return;
        }

        public_vars.$sidebarMenu.find('.sidebar-menu-inner').perfectScrollbar('update');

        if (destroy_init) {
            ps_destroy();
            ps_init();
        }
    }
}

function sidebar_menu_item_collapse($li, $sub) {
    if ($li.data('is-busy'))
        return;

    var $sub_items = $sub.children();

    $li.removeClass('expanded').data('is-busy', true);
    $sub_items.addClass('hidden-item');
    $sub.animate({height: 0}, function () {
        $li.data('is-busy', false).removeClass('opened');

        $sub.attr('style', '').hide();
        $sub_items.removeClass('hidden-item');

        $li.find('li.expanded ul').attr('style', '').hide().parent().removeClass('expanded');

        ps_update(true);
    })
}

function sidebar_menu_close_items_siblings($li) {
    $li.siblings().not($li).filter('.expanded, .opened').each(function (i, el) {
        var $_li = jQuery(el),
            $_sub = $_li.children('ul');

        sidebar_menu_item_collapse($_li, $_sub);
    });
}

function sidebar_menu_item_expand($li, $sub) {
    if ($li.data('is-busy') || ($li.parent('.main-menu').length && public_vars.$sidebarMenu.hasClass('collapsed')))
        return;

    $li.addClass('expanded').data('is-busy', true);
    $sub.show();

    var $sub_items = $sub.children(),
        sub_height = $sub.outerHeight(),

        win_y = jQuery(window).height(),
        total_height = $li.outerHeight(),
        current_y = public_vars.$sidebarMenu.scrollTop(),
        item_max_y = $li.position().top + current_y,
        fit_to_viewpport = public_vars.$sidebarMenu.hasClass('fit-in-viewport');

    $sub_items.addClass('is-hidden');
    $sub.height(0);

    $sub.animate({height: sub_height},function () {
        $sub.height('');
    })

    var interval_1 = $li.data('sub_i_1'),
        interval_2 = $li.data('sub_i_2');

    window.clearTimeout(interval_1);

    interval_1 = setTimeout(function () {
        $sub_items.each(function (i, el) {
            var $sub_item = jQuery(el);

            $sub_item.addClass('is-shown');
        });

        var finish_on = sm_transition_delay * $sub_items.length,
            t_duration = parseFloat($sub_items.eq(0).css('transition-duration')),
            t_delay = parseFloat($sub_items.last().css('transition-delay'));

        if (t_duration && t_delay) {
            finish_on = (t_duration + t_delay) * 1000;
        }

        // In the end
        window.clearTimeout(interval_2);

        interval_2 = setTimeout(function () {
            $sub_items.removeClass('is-hidden is-shown');

        }, finish_on);


        $li.data('is-busy', false);

    }, 0);

    $li.data('sub_i_1', interval_1),
        $li.data('sub_i_2', interval_2);
}

function setup_sidebar_menu() {
    if (public_vars.$sidebarMenu.length) {
        var $items_with_subs = public_vars.$sidebarMenu.find('li:has(> ul)'),
            toggle_others = public_vars.$sidebarMenu.hasClass('toggle-others');

        $items_with_subs.filter('.active').addClass('expanded');

        // On larger screens collapse sidebar when the window is tablet screen
        if (is('largescreen') && public_vars.$sidebarMenu.hasClass('collapsed') === false) {
            $(window).on('resize', function () {
                if (is('tabletscreen')) {
                    public_vars.$sidebarMenu.addClass('collapsed');
                    ps_destroy();
                } else if (is('largescreen')) {
                    public_vars.$sidebarMenu.removeClass('collapsed');
                    ps_init();
                }
            });
        }

        $items_with_subs.each(function (i, el) {
            var $li = jQuery(el),
                $a = $li.children('a'),
                $sub = $li.children('ul');

            $li.addClass('has-sub');

            $a.on('click', function (ev) {
                ev.preventDefault();

                if (toggle_others) {
                    sidebar_menu_close_items_siblings($li);
                }

                if ($li.hasClass('expanded') || $li.hasClass('opened'))
                    sidebar_menu_item_collapse($li, $sub);
                else
                    sidebar_menu_item_expand($li, $sub);
            });
        });
    }
}

// Horizontal Menu
function setup_horizontal_menu() {
    if (public_vars.$horizontalMenu.length) {
        var $items_with_subs = public_vars.$horizontalMenu.find('li:has(> ul)'),
            click_to_expand = public_vars.$horizontalMenu.hasClass('click-to-expand');

        if (click_to_expand) {
            public_vars.$mainContent.add(public_vars.$sidebarMenu).on('click', function (ev) {
                $items_with_subs.removeClass('hover');
            });
        }

        $items_with_subs.each(function (i, el) {
            var $li = jQuery(el),
                $a = $li.children('a'),
                $sub = $li.children('ul'),
                is_root_element = $li.parent().is('.navbar-nav');

            $li.addClass('has-sub');

            // Mobile Only
            $a.on('click', function (ev) {
                if (isxs()) {
                    ev.preventDefault();

                    // Automatically will toggle other menu items in mobile view
                    if (true) {
                        sidebar_menu_close_items_siblings($li);
                    }

                    if ($li.hasClass('expanded') || $li.hasClass('opened'))
                        sidebar_menu_item_collapse($li, $sub);
                    else
                        sidebar_menu_item_expand($li, $sub);
                }
            });

            // Click To Expand
            if (click_to_expand) {
                $a.on('click', function (ev) {
                    ev.preventDefault();

                    if (isxs())
                        return;

                    // For parents only
                    if (is_root_element) {
                        $items_with_subs.filter(function (i, el) {
                            return jQuery(el).parent().is('.navbar-nav');
                        }).not($li).removeClass('hover');
                        $li.toggleClass('hover');
                    }
                    // Sub menus
                    else {
                        var sub_height;

                        // To Expand
                        if ($li.hasClass('expanded') == false) {
                            $li.addClass('expanded');
                            $sub.addClass('is-visible');

                            sub_height = $sub.outerHeight();

                            $sub.height(0);

                            TweenLite.to($sub, .15, {
                                css: {height: sub_height},
                                ease: Sine.easeInOut,
                                onComplete: function () {
                                    $sub.attr('style', '');
                                }
                            });

                            // Hide Existing in the list
                            $li.siblings().find('> ul.is-visible').not($sub).each(function (i, el) {
                                var $el = jQuery(el);

                                sub_height = $el.outerHeight();

                                $el.removeClass('is-visible').height(sub_height);
                                $el.parent().removeClass('expanded');

                                TweenLite.to($el, .15, {
                                    css: {height: 0}, onComplete: function () {
                                        $el.attr('style', '');
                                    }
                                });
                            });
                        }
                        // To Collapse
                        else {
                            sub_height = $sub.outerHeight();

                            $li.removeClass('expanded');
                            $sub.removeClass('is-visible').height(sub_height);
                            TweenLite.to($sub, .15, {
                                css: {height: 0}, onComplete: function () {
                                    $sub.attr('style', '');
                                }
                            });
                        }
                    }
                });
            }
            // Hover To Expand
            else {
                $li.hoverIntent({
                    over: function () {
                        if (isxs())
                            return;

                        if (is_root_element) {
                            $li.addClass('hover');
                        } else {
                            $sub.addClass('is-visible');
                            sub_height = $sub.outerHeight();

                            $sub.height(0);

                            TweenLite.to($sub, .25, {
                                css: {height: sub_height},
                                ease: Sine.easeInOut,
                                onComplete: function () {
                                    $sub.attr('style', '');
                                }
                            });
                        }
                    },
                    out: function () {
                        if (isxs())
                            return;

                        if (is_root_element) {
                            $li.removeClass('hover');
                        } else {
                            sub_height = $sub.outerHeight();

                            $li.removeClass('expanded');
                            $sub.removeClass('is-visible').height(sub_height);
                            TweenLite.to($sub, .25, {
                                css: {height: 0}, onComplete: function () {
                                    $sub.attr('style', '');
                                }
                            });
                        }
                    },
                    timeout: 200,
                    interval: is_root_element ? 10 : 100
                });
            }
        });
    }
}
