"use strict";
!function (n, t) {
    "$:nomunge";
    var o, u = n.jQuery || n.Cowboy || (n.Cowboy = {});
    u.throttle = o = function (n, o, e, i) {
        function r() {
            function u() {
                a = +new Date, e.apply(d, g)
            }

            function r() {
                c = t
            }

            var d = this, f = +new Date - a, g = arguments;
            i && !c && u(), c && clearTimeout(c), i === t && f > n ? u() : o !== !0 && (c = setTimeout(i ? r : u, i === t ? n - f : n))
        }

        var c, a = 0;
        return "boolean" != typeof o && (i = e, e = o, o = t), u.guid && (r.guid = e.guid = e.guid || u.guid++), r
    }, u.debounce = function (n, u, e) {
        return e === t ? o(n, u, !1) : o(n, e, u !== !1)
    }
}(window);
"use strict";
!function (e) {
    for (var t = 0, n = ["ms", "moz", "webkit", "o"], i = 0; i < n.length && !e.requestAnimationFrame; ++i)e.requestAnimationFrame = e[n[i] + "RequestAnimationFrame"], e.cancelAnimationFrame = e[n[i] + "CancelAnimationFrame"] || e[n[i] + "CancelRequestAnimationFrame"];
    e.requestAnimationFrame || (e.requestAnimationFrame = function (n, i) {
        var r = (new Date).getTime(), o = Math.max(0, 16 - (r - t)), a = e.setTimeout(function () {
            n(r + o)
        }, o);
        return t = r + o, a
    }), e.cancelAnimationFrame || (e.cancelAnimationFrame = function (e) {
        clearTimeout(e)
    })
}(window), !function (e) {
    e.svg4everybody = function () {
        function t(e, t) {
            if (t) {
                var n = document.createDocumentFragment(), i = t.getAttribute("viewBox");
                e.setAttribute("viewBox", i);
                for (var r = t.cloneNode(!0); r.childNodes.length;)n.appendChild(r.firstChild);
                e.appendChild(n)
            }
        }

        function n(e) {
            e.onreadystatechange = function () {
                if (4 === e.readyState) {
                    var n = e._cachedDocument;
                    n || (n = e._cachedDocument = document.implementation.createHTMLDocument(""), n.body.innerHTML = e.responseText, e._cachedTarget = {}), e._embeds.splice(0).map(function (i) {
                        var r = e._cachedTarget[i.id];
                        r || (r = e._cachedTarget[i.id] = n.getElementById(i.id)), t(i.svg, r)
                    })
                }
            }, e.onreadystatechange()
        }

        function i(i) {
            function r() {
                for (var e = 0; e < l.length;) {
                    var i = l[e], d = i.parentNode;
                    if (d && /svg/i.test(d.nodeName)) {
                        var u = i.getAttribute("xlink:href");
                        if (o && (!a.validate || a.validate(u, d, i))) {
                            d.removeChild(i);
                            var c = u.split("#"), m = c.shift(), f = c.join("#");
                            if (m.length) {
                                var p = s[m];
                                p || (p = s[m] = new XMLHttpRequest, p.open("GET", m), p.send(), p._embeds = []), p._embeds.push({
                                    svg: d,
                                    id: f
                                }), n(p)
                            } else t(d, document.getElementById(f))
                        }
                    } else++e
                }
                v(r, 67)
            }

            var o, a = Object(i), d = /\bTrident\/[567]\b|\bMSIE (?:9|10)\.0\b/, u = /\bAppleWebKit\/(\d+)\b/, c = /\bEdge\/(\d+)\.(\d+)\b/;
            o = "polyfill" in a ? a.polyfill : d.test(navigator.userAgent) || c.test(navigator.userAgent) || (navigator.userAgent.match(u) || [])[1] < 537;
            var s = {}, v = e.requestAnimationFrame || setTimeout, l = document.getElementsByTagName("use");
            o && r()
        }

        return i
    }()
}(window), !function (e, t) {
    t.eventEmitter = {
        _JQInit: function () {
            this._JQ = t(this)
        }, emit: function (e, t) {
            return !this._JQ && this._JQInit(), this._JQ.trigger(e, t), this
        }, once: function (e, t) {
            return !this._JQ && this._JQInit(), this._JQ.one(e, t), this
        }, on: function (e, t) {
            return !this._JQ && this._JQInit(), this._JQ.bind(e, t), this
        }, off: function (e, t) {
            return !this._JQ && this._JQInit(), this._JQ.unbind(e, t), this
        }
    }
}(window, jQuery), !function (e) {
    e.makeVideoPlayableInline = function () {
        function e(e, t, n, i) {
            function r(n) {
                o = t(r, i), e(n - (a || n)), a = n
            }

            var o, a;
            return {
                start: function () {
                    o || r(0)
                }, stop: function () {
                    n(o), o = null, a = 0
                }
            }
        }

        function t(t) {
            return e(t, requestAnimationFrame, cancelAnimationFrame)
        }

        function n(e, t, n, i) {
            function r(t) {
                Boolean(e[n]) === Boolean(i) && t.stopImmediatePropagation(), delete e[n]
            }

            return e.addEventListener(t, r, !1), r
        }

        function i(e, t, n, i) {
            function r() {
                return n[t]
            }

            function o(e) {
                n[t] = e
            }

            i && o(e[t]), Object.defineProperty(e, t, {get: r, set: o})
        }

        function r(e, t, n) {
            n.addEventListener(t, function () {
                return e.dispatchEvent(new Event(t))
            })
        }

        function o(e, t) {
            Promise.resolve().then(function () {
                e.dispatchEvent(new Event(t))
            })
        }

        function a(e) {
            var t = new Audio;
            return r(e, "play", t), r(e, "playing", t), r(e, "pause", t), t.crossOrigin = e.crossOrigin, t.src = e.src || e.currentSrc || "data:", t
        }

        function d(e, t, n) {
            (p || 0) + 200 < Date.now() && (e[y] = !0, p = Date.now()), n || (e.currentTime = t), w[++_ % 3] = 100 * t | 0
        }

        function u(e) {
            return e.driver.currentTime >= e.video.duration
        }

        function c(e) {
            var t = this;
            t.video.readyState >= t.video.HAVE_FUTURE_DATA ? (t.hasAudio || (t.driver.currentTime = t.video.currentTime + e * t.video.playbackRate / 1e3, t.video.loop && u(t) && (t.driver.currentTime = 0)), d(t.video, t.driver.currentTime)) : t.video.networkState !== t.video.NETWORK_IDLE || t.video.buffered.length || t.video.load(), t.video.ended && (delete t.video[y], t.video.pause(!0))
        }

        function s() {
            var e = this, t = e[b];
            return e.webkitDisplayingFullscreen ? void e[A]() : ("data:" !== t.driver.src && t.driver.src !== e.src && (d(e, 0, !0), t.driver.src = e.src), void(e.paused && (t.paused = !1, e.buffered.length || e.load(), t.driver.play(), t.updater.start(), t.hasAudio || (o(e, "play"), t.video.readyState >= t.video.HAVE_ENOUGH_DATA && o(e, "playing")))))
        }

        function v(e) {
            var t = this, n = t[b];
            n.driver.pause(), n.updater.stop(), t.webkitDisplayingFullscreen && t[T](), n.paused && !e || (n.paused = !0, n.hasAudio || o(t, "pause"), t.ended && (t[y] = !0, o(t, "ended")))
        }

        function l(e, n) {
            var i = e[b] = {};
            i.paused = !0, i.hasAudio = n, i.video = e, i.updater = t(c.bind(i)), n ? i.driver = a(e) : (e.addEventListener("canplay", function () {
                e.paused || o(e, "playing")
            }), i.driver = {
                src: e.src || e.currentSrc || "data:", muted: !0, paused: !0, pause: function () {
                    i.driver.paused = !0
                }, play: function () {
                    i.driver.paused = !1, u(i) && d(e, 0)
                }, get ended() {
                    return u(i)
                }
            }), e.addEventListener("emptied", function () {
                var t = !i.driver.src || "data:" === i.driver.src;
                i.driver.src && i.driver.src !== e.src && (d(e, 0, !0), i.driver.src = e.src, t ? i.driver.play() : i.updater.stop())
            }, !1), e.addEventListener("webkitbeginfullscreen", function () {
                e.paused ? n && !i.driver.buffered.length && i.driver.load() : (e.pause(), e[A]())
            }), n && (e.addEventListener("webkitendfullscreen", function () {
                i.driver.currentTime = e.currentTime
            }), e.addEventListener("seeking", function () {
                w.indexOf(100 * e.currentTime | 0) < 0 && (i.driver.currentTime = e.currentTime)
            }))
        }

        function m(e) {
            var t = e[b];
            e[A] = e.play, e[T] = e.pause, e.play = s, e.pause = v, i(e, "paused", t.driver), i(e, "muted", t.driver, !0), i(e, "playbackRate", t.driver, !0), i(e, "ended", t.driver), i(e, "loop", t.driver, !0), n(e, "seeking"), n(e, "seeked"), n(e, "timeupdate", y, !1), n(e, "ended", y, !1)
        }

        function f(e, t, n) {
            void 0 === t && (t = !0), void 0 === n && (n = !0), n && !g || e[b] || (l(e, t), m(e), e.classList.add("IIV"), !t && e.autoplay && e.play(), /iPhone|iPod|iPad/.test(navigator.platform) || console.warn("iphone-inline-video is not guaranteed to work in emulated environments"))
        }

        var p, h = "undefined" == typeof Symbol ? function (e) {
            return "@" + (e || "@") + Math.random()
        } : Symbol, g = /iPhone|iPod/i.test(navigator.userAgent) && !matchMedia("(-webkit-video-playable-inline)").matches, b = h(), y = h(), A = h("nativeplay"), T = h("nativepause"), w = [], _ = 0;
        return f.isWhitelisted = g, f
    }(), e.videoImgFallback = function (e) {
        console.warn("video load error, gif fallback used");
        var t = e.querySelector("img");
        t && e.parentNode.replaceChild(t, e)
    }, e.getCookie = function (e) {
        var t = document.cookie.match(new RegExp("(?:^|; )" + e.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") + "=([^;]*)"));
        return t ? decodeURIComponent(t[1]) : void 0
    }, e.setCookie = function (e, t) {
        var n = arguments.length <= 2 || void 0 === arguments[2] ? {} : arguments[2], i = n.expires;
        if ("number" == typeof i && i) {
            var r = new Date;
            r.setTime(r.getTime() + 1e3 * i), i = n.expires = r
        }
        i && i.toUTCString && (n.expires = i.toUTCString()), t = encodeURIComponent(t);
        var o = e + "=" + t;
        for (var a in n) {
            o += "; " + a;
            var d = n[a];
            d !== !0 && (o += "=" + d)
        }
        document.cookie = o
    }, e.deleteCookie = function (e) {
        setCookie(e, "", {expires: -1})
    }, e.chunkSplit = function (e) {
        var t = arguments.length <= 1 || void 0 === arguments[1] ? 3 : arguments[1], n = arguments.length <= 2 || void 0 === arguments[2] ? " " : arguments[2];
        return e += "", e.split("").reverse().join("").match(new RegExp(".{0," + t + "}", "g")).join(n).split("").reverse().join("").trim()
    }
}(window);
"use strict";
var _extends = Object.assign || function (i) {
        for (var e = 1; e < arguments.length; e++) {
            var n = arguments[e];
            for (var s in n)Object.prototype.hasOwnProperty.call(n, s) && (i[s] = n[s])
        }
        return i
    }, is_dev = !0;
window.log = function (i) {
    is_dev && window.console && ("string" != typeof i && "number" != typeof i && window.console.dir ? window.console.dir(i) : window.console.log && window.console.log(i))
}, window.spaced_cli = {}, spaced_cli.is_admin = 0, spaced_cli.animations = 1, spaced_cli.run = {
    _init: function () {
        this.device_info(), spaced_cli.animations = !spaced_cli.is_admin, this.$update_style = $('<style id="core_style"></style>'), $("head").append(this.$update_style), this.init(), svg4everybody()
    }, init: function () {
    }, device_info: function () {
        var i = navigator.userAgent.toLowerCase();
        this.is_mobile = i.indexOf("mobile") !== -1, this.is_desktop = !this.is_mobile, this.is_touch = "ontouchstart" in window, this.is_webkit = i.indexOf("webkit") !== -1, this.is_safari = i.indexOf("safari") !== -1 && i.match(/version\/(\d+)/), this.is_firefox = i.indexOf("firefox") !== -1, this.is_mobile_ie = i.indexOf("iemobile") !== -1, this.is_ie = i.indexOf("trident") !== -1 || i.indexOf("msie") !== -1, this.is_EDGE = i.indexOf("edge") !== -1, this.is_OSX = !!i.match(/(iPad|iPhone|iPod|Macintosh)/gi), this.is_screen_mobile = window.innerWidth < 570, this.is_screen_tablet_s = window.innerWidth >= 570 && window.innerWidth < 768, this.is_screen_tablet = window.innerWidth >= 768 && window.innerWidth <= 1024, this.is_screen_small_pc = window.innerWidth > 1024 && window.innerWidth < 1200, this.is_screen_pc = window.innerWidth >= 1200
    }
}, spaced_cli.message = function (i) {
    $.get("/mod/log", {msg: i})
}, $(document).ready(function (i) {
    var e = function () {
    };
    e.prototype = _extends({}, i.eventEmitter), spaced_cli.events = new e, spaced_cli.run._init(), i("body").addClass("ready")
});
"use strict";
spaced_cli.loaded = {}, spaced_cli.require = function () {
    var e = arguments.length <= 0 || void 0 === arguments[0] ? "" : arguments[0], c = arguments.length <= 1 || void 0 === arguments[1] ? function () {
    } : arguments[1], a = !(arguments.length <= 2 || void 0 === arguments[2]) && arguments[2];
    if (e && 0 !== e.length || c(), a)if (spaced_cli.loaded[e] === !0)c(); else if (Array.isArray(spaced_cli.loaded[e]))spaced_cli.loaded[e].push(c); else {
        var i = function () {
            var c = spaced_cli.loaded[e];
            spaced_cli.loaded[e] = !0, c.forEach(function (e) {
                "function" == typeof e && e()
            })
        };
        spaced_cli.loaded[e] = [c], /\.css$/.test(e) ? ($("body").append('<link href="' + e + '" rel="stylesheet" type="text/css" media="all">'), i()) : $.ajax({
            url: e,
            dataType: "script",
            cache: !0,
            success: i
        })
    } else!function () {
        var a = function () {
            var a = e.every(function (e) {
                return spaced_cli.loaded[e] === !0
            });
            a && c()
        };
        "string" == typeof e && (e = [e]), Array.isArray(e) && e.forEach(function (e) {
            spaced_cli.require(e, a, !0)
        })
    }()
};
"use strict";
spaced_cli.lib = {
    init: function () {
        this.lg()
    }, lg: function () {
        if (!spaced_cli.is_admin) {
            var l = $(".lg-init");
            l.length && spaced_cli.require(["/_s/lib/jquery/lightGallery/css/lightgallery.min.css", "/_s/lib/jquery/lightGallery/js/lg-spaced-bundle.min.js"], function () {
                l.each(function (l, i) {
                    var e = {
                        selector: ".img_popup",
                        counter: !1,
                        download: !1,
                        slideEndAnimation: !1,
                        closable: !0,
                        loop: !1,
                        easing: "ease-out",
                        hideBarsDelay: 6e3,
                        zoomIcons: !1,
                        actualSize: !1,
                        enableSlide: !$(i).attr("data-lg-single")
                    };
                    $(i).lightGallery(e)
                })
            })
        }
    }
};
"use strict";
spaced_cli.lang = {
    current: "ru",
    basic: "ru",
    currency: "₽",
    ru: {
        form: {
            required: "Поле должно быть заполнено",
            email: "Некорректный адрес электронной почты",
            digits: "Поле должно содержать только цифры",
            minlength: "Минимальная длина - 5 цифр"
        },
        timer: {dd: "Дней", hh: "Часов", mm: "Минут", ss: "Секунд"},
        menu: "Меню",
        cart: {empty: "В корзине ничего нет"}
    },
    en: {
        form: {
            required: "This field is required",
            email: "Please enter a valid email address",
            digits: "Please enter only digits",
            minlength: "Please enter at least 5 digits"
        }, timer: {dd: "Days", hh: "Hours", mm: "Minutes", ss: "Seconds"}, menu: "Menu", cart: {empty: "Cart is empty"}
    },
    de: {
        form: {
            required: "Dieses Feld ist ein Pflichtfeld",
            email: "Geben Sie bitte eine gültige E-Mail Adresse ein",
            digits: "Geben Sie bitte nur Ziffern ein",
            minlength: "Geben Sie bitte mindestens 5 Ziffern ein"
        }, timer: {dd: "Days", hh: "Stunden", mm: "Minutes", ss: "Sekunden"}, menu: "Menü"
    },
    fr: {
        form: {
            required: "Ce champ est obligatoire",
            email: "Veuillez fournir une adresse électronique valide",
            digits: "Veuillez fournir seulement des chiffres",
            minlength: "Veuillez fournir au moins 5 chiffres"
        }, timer: {dd: "Jours", hh: "Heures", mm: "Minutes", ss: "Secondes"}, menu: "Menu"
    },
    es: {
        form: {
            required: "Este campo es obligatorio",
            email: "Escribe una dirección de correo válida",
            digits: "Escribe sólo dígitos",
            minlength: "Por favor, no escribas menos de 5 dígitos"
        }, timer: {dd: "Días", hh: "Horas", mm: "Minutos", ss: "Segundos"}, menu: "Menú"
    },
    it: {
        form: {
            required: "Campo obbligatorio",
            email: "Inserisci un indirizzo email valido",
            digits: "Inserisci solo numeri",
            minlength: "Inserisci almeno 5 numeri"
        }, timer: {dd: "Days", hh: "Ore", mm: "Minuti", ss: "Secondi"}, menu: "Menu"
    },
    pl: {
        form: {
            required: "To pole jest wymagane",
            email: "Proszę o podanie prawidłowego adresu email",
            digits: "Proszę o podanie samych cyfr",
            minlength: "Proszę o podanie przynajmniej 5 cyfr"
        }, timer: {dd: "Dni", hh: "Godziny", mm: "Minuty", ss: "Sekundy"}, menu: "Menu"
    },
    ge: {
        form: {
            required: "ეს ველი სავალდებულოა",
            email: "გთხოვთ შეიყვანოთ სწორი ფორმატით",
            digits: "დაშვებულია მხოლოდ ციფრები",
            minlength: "შეიყვანეთ მინიმუმ 5 ციფრი"
        }, timer: {dd: "დღეები", hh: "საათი", "მმ": "ოქმი", ss: "წამი"}, menu: "მენიუ"
    },
    ua: {
        form: {
            required: "Поле має бути заповнено",
            email: "Некоректна адреса електронної пошти",
            digits: "Поле повинно містити тільки цифри",
            minlength: "Мінімальна довжина - 5 цифр"
        }, timer: {dd: "Дні", hh: "Години", mm: "Хвилини", ss: "Секунди"}, menu: "Меню"
    },
    by: {
        form: {
            required: "Поле павінна быць запоўнена",
            email: "Некарэктны адрас электроннай пошты",
            digits: "Поле павінна ўтрымліваць толькі лічбы",
            minlength: "Мінімальны даўжыня - 5 лічбаў"
        }, timer: {dd: "Дні", hh: "Гадзіннік", mm: "Хвіліны", ss: "Секунды"}, menu: "Меню"
    },
    kz: {
        form: {
            required: "Міндетті өріс",
            email: "Жарамсыз электрондық пошта мекенжайы",
            digits: "Далалық тек сандардан тұруы тиіс",
            minlength: "Ең аз ұзындығы - 5 сандар"
        }, timer: {dd: "Күндері", hh: "Сағаттар", mm: "Минут", cc: "Секунд"}, menu: "Мәзір"
    },
    get: function (e, i) {
        if (e) {
            if (i && this[i] || (i = this.current || this.basic), "currency" === e)return this.currency;
            var r = e.split("."), n = this[i];
            for (var s in r) {
                var t = r[s];
                if (n = n[t], !n && i != this.basic)return this.get(e, this.basic)
            }
            return n
        }
    },
    init: function () {
        var e = this;
        $("[data-lang]").each(function (i, r) {
            var n = $(r).attr("data-lang");
            $(r).text(e.get(n))
        })
    }
};
"use strict";
spaced_cli.resize = {
    old_h: window.innerHeight,
    width: window.innerWidth,
    height: window.innerHeight,
    documentHeight: 0,
    fixedViewport: !1,
    init: function () {
        var i = this;
        this.fixViewportHeight(), $(window).on("resize orientationchange", function () {
            i.width = window.innerWidth, i.height = window.innerHeight, i.fixViewportHeight(), spaced_cli.run.device_info()
        });
        var e = document.body.getElementsByClassName("container-list")[0];
        this.documentHeight = e.offsetHeight, setInterval(function () {
            e.offsetHeight != i.documentHeight && (i.documentHeight = e.offsetHeight, $(window).trigger("documentresize"))
        }, 100)
    },
    fixViewportHeight: function () {
        var i = this;
        if (!(spaced_cli.run.is_desktop && !spaced_cli.run.is_ie || spaced_cli.run.is_screen_tablet || this.fixedViewport && Math.abs(this.height - this.old_h) < 100)) {
            var e = $(".cover");
            this.old_h = this.height, e.each(function (e, t) {
                var h = $(t), n = h.css("min-height", "").outerHeight() || i.height;
                h.css("min-height", n + "px")
            }), spaced_cli.run.is_ie && e.css("height", "100vh"), this.fixedViewport = !0
        }
    }
};
"use strict";
spaced_cli.scroll = {
    latest: window.pageYOffset, init: function () {
        var t = this, e = $("body");
        this.latest = window.pageYOffset, $(window).on("scroll.coreScroll", function (o) {
            return e.hasClass("noscroll") ? ($("html, body").scrollTop(t.latest), o.stopPropagation(), o.preventDefault(), !1) : void(t.latest = window.pageYOffset)
        }), this.scrollImprovement.init()
    }, scrollImprovement: {
        scrollTimer: 0, pointerState: 0, init: function () {
            this.stopScrollEvent(), this.pointerEvents()
        }, stopScrollEvent: function () {
            var t = this, e = spaced_cli.scroll.latest;
            $(window).on("scroll.scrollendEvent", function () {
                var o = e > spaced_cli.scroll.latest ? "up" : "down";
                clearTimeout(t.scrollTimer), t.scrollTimer = setTimeout(function () {
                    e = spaced_cli.scroll.latest, $(window).trigger("scrollend", {direction: o})
                }, 200)
            })
        }, pointerEvents: function () {
            var t = this;
            $(window).on("scroll.pointerEventsDisable", function () {
                0 === t.pointerState && ($("body").addClass("disable-pointer-events"), t.pointerState = 1)
            }), $(window).on("scrollend.pointerEventsDisable", function () {
                1 === t.pointerState && (t.pointerState = 0, $("body").removeClass("disable-pointer-events"))
            })
        }
    }, smoothScroll: function () {
        var t = this;
        spaced_cli.run.is_OSX || !function () {
            var e = $("html, body"), o = spaced_cli.resize.height / 4, i = 0, n = void 0, l = void 0, s = 0, r = void 0, c = function (o) {
                clearTimeout(l), clearTimeout(n), i += o, r = 300, s || (s = 1, e.stop().animate({scrollTop: t.latest - i}, r)), l = setTimeout(function () {
                    s = 0
                }, 16), n = setTimeout(function () {
                    e.finish(), i = 0, s = 0
                }, r)
            };
            $(window).on("mousewheel DOMMouseScroll", function (t) {
                var e = "mousewheel" == t.type ? t.originalEvent.wheelDelta / 120 : "DOMMouseScroll" == t.type ? -t.originalEvent.detail / 3 : 0, i = e * o;
                e * o !== 0 && (t.preventDefault(), c(i))
            })
        }()
    }
};
"use strict";
spaced_cli.block = {
    data: {}, css_loaded: {}, block_default: {
        require: [], _on_init: function () {
            var e = this;
            spaced_cli.require(this.require, function () {
                e.is_init = !0, e.on_load(), e._tween(), e.on_init(), spaced_cli.events.emit("block_event", {
                    event: "initialized",
                    sender: "core",
                    block: e
                })
            }), this.$block.is("[data-video-bg]") && spaced_cli.video_bg.init(this.$block, this.$block.data("video-bg"))
        }, _on_update: function (e) {
            var t = this;
            spaced_cli.require(this.require, function () {
                t.on_load(), t._tween(), t.on_update(e), spaced_cli.events.emit("block_event", {
                    event: "updated",
                    sender: "core",
                    block: t
                })
            }), this.$block.is("[data-video-bg]") && spaced_cli.video_bg.init(this.$block, this.$block.data("video-bg"))
        }, _on_focus: function (e) {
            this.on_focus(e), spaced_cli.events.emit("block_event", {
                event: "focus",
                sender: "core",
                block: this,
                state: e
            })
        }, _on_screen: function (e) {
            this.on_screen(e), spaced_cli.events.emit("block_event", {
                event: "screen",
                sender: "core",
                block: this,
                state: e
            })
        }, _on_view: function (e) {
            this.on_view(e), spaced_cli.events.emit("block_event", {
                event: "view",
                sender: "core",
                block: this,
                state: e
            })
        }, _tween: function () {
            function e() {
                var e = spaced_cli.resize.height - o;
                if (e < 0 && (e = 0), a.tween.fix = e, a.tween.position = 1 / a.tween.height * (window.pageYOffset - a.tween.start), !spaced_cli.is_admin || 0 === a.$block.offset().left) {
                    var s = t();
                    s > 0 && s < 1 ? a.tween.focus || (a.tween.focus = !0, a._on_focus(!0)) : a.tween.focus && (a.tween.focus = !1, a._on_focus(!1));
                    var d = i();
                    d ? a.tween.onscreen || (a.tween.onscreen = !0, a._on_screen(!0)) : a.tween.onscreen && (a.tween.onscreen = !1, a._on_screen(!1));
                    var c = n();
                    c ? a.tween.view || (a.tween.view = !0, a._on_view(!0)) : a.tween.view && (a.tween.view = !1, a._on_view(!1))
                }
            }

            function t() {
                var e = window.pageYOffset + spaced_cli.resize.height / 2, t = a.tween.start + a.tween.height / 2, n = e - t, i = (n + a.tween.height / 2) / a.tween.height;
                return i
            }

            function n() {
                var e = spaced_cli.resize.height >= a.tween.height ? a.tween.height / 2 : spaced_cli.resize.height / 3;
                return window.pageYOffset + spaced_cli.resize.height > a.tween.start + e && window.pageYOffset < a.tween.end - e
            }

            function i() {
                return window.pageYOffset + spaced_cli.resize.height > a.tween.start && window.pageYOffset < a.tween.end
            }

            var a = this, o = this.$block.outerHeight(), s = this.$block.outerWidth(), d = this.$block.offset().top;
            0 === this.$block.index() && o < 10 && d < 10 && (o = this.$block.next().outerHeight()), this.tween || (this.tween = {}), this.tween.width = s, this.tween.height = o, this.tween.start = d, this.tween.end = d + o, this.tween.focus = !1, this.tween.view = !1, this.tween.onscreen = !1;
            var c = this.$block.find(".container")[0];
            this.tween.color = c && getComputedStyle(c).color || "#fff", e(), $(window).off("scroll.tween_" + this.id).on("scroll.tween_" + this.id, function () {
                return e()
            })
        }, _on_msg: function (e, t) {
            switch (e) {
                case"video_bg_update":
                    spaced_cli.video_bg.init(this.$block, t);
                    break;
                case"video_bg_destroy":
                    spaced_cli.video_bg.destroy(this.$block, t)
            }
            this.on_msg(e, t)
        }, on_load: function () {
        }, on_init: function () {
        }, on_update: function () {
            this.on_init()
        }, on_focus: function () {
        }, on_screen: function () {
        }, on_view: function () {
        }, on_msg: function () {
        }
    }, init: function () {
        var e = this;
        $("[data-b-id]", ".container-list, header, footer").each(function (t, n) {
            e.bind($(n))
        }), spaced_cli.events.on("block_add", function (t, n) {
            if (n && n.id) {
                var i = $('.b_block[data-id="' + parseInt(n.id) + '"]');
                e.bind(i)
            }
        }), spaced_cli.events.on("block_render", function (e, t) {
            if (t && t.id && ~t.render.indexOf("template")) {
                var n = $('.b_block[data-id="' + parseInt(t.id, 10) + '"]'), i = n.data("_core_block");
                "undefined" != typeof i && "function" == typeof i._on_update && i._on_update(t)
            }
        }), spaced_cli.events.on("block_msg", function (e, t) {
            if (t && t.id) {
                var n = $('.b_block[data-id="' + parseInt(t.id, 10) + '"]'), i = n.data("_core_block");
                "undefined" != typeof i && i._on_msg(t.msg, t.data)
            }
        }), $(window).on("resize orientationchange documentresize", $.debounce(200, !1, this.updateTweens));
        var t = void 0;
        spaced_cli.events.off("editor_change.core_block").on("editor_change.core_block", function (n, i) {
            i && i.reason && "update_list" == i.reason && /^block/.test(i.name) && (clearTimeout(t), t = setTimeout(function () {
                e.updateTweens()
            }, 250))
        })
    }, bind: function (e) {
        var t = e.attr("data-b-id");
        if (e.data("_core_block"))return !0;
        this.data[t] || this.register(t, {});
        var n = new this.data[t](e);
        e.data("_core_block", n), n._on_init()
    }, update: function (e) {
        var t = e.data("_core_block");
        "undefined" != typeof t && "function" == typeof t._on_update && t._on_update()
    }, register: function (e, t) {
        e || console.log("Приложение должно иметь уникальный номер"), t.b_id = e, spaced_cli.block.data[e] = function (e) {
            this.$block = e, this.id = this.$block.data("id"), this.type = this.$block.data("bType")
        };
        var n = $.extend(!0, {}, this.block_default);
        spaced_cli.block.data[e].prototype = $.extend(!0, {}, n, t)
    }, updateTweens: function () {
        $("[data-b-id]", ".container-list, header, footer").each(function (e, t) {
            var n = $(t), i = n.data("_core_block");
            i ? i._tween() : console.warn("Неудачная попытка обновить tween данные блока. index: " + n.index() + ", id: " + n.data("id") + ", bId: " + n.data("bId") + ". Ошибка: нет core обьекта блока.", "Если данная ошибка произошла при добавлении секции, ее можно проигнорировать.")
        })
    }, initHeaders: function () {
        var e = this;
        this.setHeaders(), spaced_cli.events.off("editor_change.core_headers").on("editor_change.core_headers", function (t, n) {
            n && n.reason && ("update_list" == n.reason && /^block/.test(n.name) || "editor_settings" == n.reason && "overflow" == n.name) && e.setHeaders()
        }), spaced_cli.events.off("editor_abtest.core_headers").on("editor_abtest.core_headers", function () {
            e.setHeaders()
        })
    }, setHeaders: function () {
        var e = '[data-b-type*="header"][data-b-type*="overflow"]', t = $("header");
        $(".b_block > .b_head[data-header-type]").filter(e).each(function (e, n) {
            var i = $(n).attr("data-header-type"), a = $(n).removeClass("b_head").removeAttr("data-header-type");
            "site" == i && t[0] ? t.prepend(a) : a.parents(".b_block, .b_block_slide").last().before(a)
        });
        var n = $('.b_block > .b_head[data-header-type="landing"]').not(e);
        n[0] && (n.removeClass("b_head").removeAttr("data-header-type"), n.parents(".ab-test, .b_block").last().before(n));
        var i = $('.b_block > .b_head[data-header-type="site"]').not(e);
        i[0] && t[0] && (i.removeClass("b_head hidden").removeAttr("data-header-type"), t.prepend(i)), $("header > " + e + ", .container-list > " + e + ", .ab-test > " + e).each(function (e, t) {
            var n = $(t), i = $(), a = $(), o = "landing";
            n.parent("header")[0] ? (i = $(".container-list").find("> .b_block_slide, > .b_block, > .ab-test").eq(0), o = "site") : i = n.nextAll(".b_block_slide, .b_block, .ab-test").eq(0), i.hasClass("b_block") ? a = i.closest('[data-b-type*="allow_head"]') : i.hasClass("ab-test") ? (a = i.closest(".variant-b").find('[data-abtest-variant="b"][data-b-type*="allow_head"]'), a = a.add(i.closest(".variant-a").find('[data-abtest-variant="a"][data-b-type*="allow_head"]'))) : a = i.find('[data-b-type*="allow_head"]'), a.find(".b_block.b_head")[0] || a.prev().is('[data-b-type*="header"]') && !a.prev().is(n) || (a = a.find("> .container-fluid").eq(0), a[0] && (a.siblings(".b_head").remove(), a.before(n), n.attr("data-header-type", o).addClass("b_head")))
        })
    }
};
"use strict";
var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
    return typeof e
} : function (e) {
    return e && "function" == typeof Symbol && e.constructor === Symbol ? "symbol" : typeof e
};
spaced_cli.stat = {
    u_id: 0,
    time: 0,
    init: function () {
        var e = this.get_cookie("user_id");
        if (!e && !spaced_cli.is_admin) {
            var t = this.get_cookie("f_uid");
            this.AB.init(), this.ecommerce.init(), t ? (this.u_id = t, this.user_visit()) : this.user_create()
        }
    },
    reach_goal: function (e, t) {
        if (t = "undefined" != typeof t ? t : {}, !spaced_cli.is_admin)try {
            spaced_cli.yandex_id && !function () {
                var i = setInterval(function () {
                    return "undefined" != typeof Ya && "object" === _typeof(Ya._metrika.counter) && (clearInterval(i), void Ya._metrika.counter.reachGoal(e, t))
                }, 50)
            }(), "function" == typeof ga && ga("send", "event", e, "send")
        } catch (i) {
        }
    },
    ecommerce: {
        currencyCodes: {
            "€": {code: "EUR", name: "Евро"},
            Br: {code: "BYR", name: "Белорусский Рубль"},
            "₴": {code: "UAH", name: "Гривна"},
            "грн.": {code: "UAH", name: "Гривна"},
            "₸": {code: "KZT", name: "Тенге"},
            "тңг": {code: "KZT", name: "Тенге"}
        }, currencyCode: "RUB", initialized: !1, init: function () {
            spaced_cli.lang.currency && this.currencyCodes[spaced_cli.lang.currency] && (this.currencyCode = this.currencyCodes[spaced_cli.lang.currency].code), this.initialized = !0, window.dataLayer || (window.dataLayer = [])
        }, add: function (e, t, i, o) {
            if (this.initialized) {
                var c = this;
                window.dataLayer.push({
                    ecommerce: {
                        currencyCode: c.currencyCode,
                        add: {products: [{id: e, name: t, price: o, quantity: i}]}
                    }
                })
            }
        }, remove: function (e, t) {
            if (this.initialized) {
                var i = this;
                window.dataLayer.push({
                    ecommerce: {
                        currencyCode: i.currencyCode,
                        remove: {products: [{id: e, name: t}]}
                    }
                })
            }
        }, purchase: function (e) {
            var t = !(arguments.length <= 1 || void 0 === arguments[1]) && arguments[1];
            if (this.initialized && (e || 0 != e.length)) {
                var i = this;
                t || (t = Math.ceil(1e4 * Math.random()));
                try {
                    window.dataLayer.push({
                        ecommerce: {
                            currencyCode: i.currencyCode,
                            purchase: {
                                actionField: {id: t}, products: e.map(function (e) {
                                    return {id: e.id, name: e.title, price: e.price, quantity: e.count}
                                })
                            }
                        }
                    })
                } catch (o) {
                }
            }
        }
    },
    get_cookie: function (e) {
        var t = "; " + document.cookie, i = t.split("; " + e + "=");
        return 2 == i.length && i.pop().split(";").shift()
    },
    set_cookie: function (e, t) {
        var i = new Date, o = i.getTime() + 94608e6;
        document.cookie = e + "=" + escape(t) + "; path=/; domain=." + document.location.hostname + ";  expires=" + new Date(o)
    },
    get_utm: function () {
        var e = function (e) {
            if ("" === e)return {};
            for (var t = {}, i = 0; i < e.length; ++i) {
                var o = e[i].split("=");
                2 == o.length && (t[o[0]] = decodeURIComponent(o[1].replace(/\+/g, " ")))
            }
            return t
        }(window.location.search.substr(1).split("&")), t = {};
        return $.each(e, function (e, i) {
            "utm_" == e.substring(0, 4) && (t[e] = i)
        }), document.referrer && (t.url = document.referrer), t
    },
    user_create: function () {
        var e = $.ajax({
            url: "/mod/stat/",
            type: "POST",
            dataType: "json",
            data: {
                s_id: spaced_cli.s_id,
                group_id: spaced_cli.group_id,
                p_id: spaced_cli.p_id,
                utm_data: this.get_utm()
            }
        });
        e.done($.proxy(function (e) {
            "object" == ("undefined" == typeof e ? "undefined" : _typeof(e)) && null !== e && e.u_id ? (this.set_cookie("f_uid", e.u_id), this.u_id = e.u_id) : (log("cookie не установлена"), log(e))
        }, this))
    },
    user_visit: function () {
        var e = $.ajax({
            url: "/mod/stat/visit/",
            type: "POST",
            dataType: "json",
            data: {s_id: spaced_cli.s_id, group_id: spaced_cli.group_id, p_id: spaced_cli.p_id, u_id: this.u_id}
        });
        e.done($.proxy(function (e) {
            e.v_id || (log("cookie визита не установлена"), log(e))
        }, this))
    },
    AB: {
        init: function () {
            var e = this;
            spaced_cli.events.off("block_event.abstat").on("block_event.abstat", function (t, i) {
                if (i && i.event && i.state && i.block) {
                    var o = i.block.$block;
                    "focus" != i.event && "view" != i.event || !i.state || e.fixview(o.attr("data-abtest-id"), o.attr("data-abtest-variant"))
                }
            })
        }, cookie_key: "f_ab", setcookie: function (e) {
            var t = 6048e5;
            document.cookie = this.cookie_key + "=" + encodeURIComponent(JSON.stringify(e)) + "; path=/; domain=." + document.location.hostname + ";  expires=" + new Date((new Date).getTime() + t)
        }, getcookie: function () {
            var e = !0, t = spaced_cli.stat.get_cookie(this.cookie_key);
            if (t)try {
                t = JSON.parse(decodeURIComponent(t)), e = !1
            } catch (i) {
                console.warn("cant parse abtest cookie", i), e = !0
            }
            return e && (t = {view: {}, lead: []}), t
        }, proccess: {}, fixview: function (e, t) {
            return "undefined" != typeof e && "undefined" != typeof t && ("a" == t || "b" == t) && void("undefined" != typeof this.getcookie().view[e] || this.proccess[e] || (this.proccess[e] = !0, $.ajax({
                    url: "/mod/stat/abtest",
                    type: "POST",
                    dataType: "json",
                    data: {test_id: e, variant: t, s_id: spaced_cli.s_id, p_id: spaced_cli.p_id}
                }).done($.proxy(function (i) {
                    if (this.proccess[e] = !1, 1 == i.status) {
                        var o = spaced_cli.stat.AB.getcookie();
                        o.view[e] = t, spaced_cli.stat.AB.setcookie(o)
                    }
                }, this))))
        }, fixlead: function (e) {
            var t = this;
            return (!spaced_cli.bill || 1 == spaced_cli.bill.abtest) && void(e.length > 0 && !function () {
                    var i = t.getcookie(), o = $.merge(i.lead, e);
                    i.lead = $.grep(o, function (e, t) {
                        return $.inArray(e, o) === t
                    }), t.setcookie(i)
                }())
        }
    }
};
"use strict";
spaced_cli.timer = {
    list: {}, create: function (t) {
        return this.list[t.id] = new spaced_cli.timer.Timer(t), this.list[t.id]
    }
}, spaced_cli.timer.Timer = function (t) {
    this.o = t, this.create()
}, spaced_cli.timer.Timer.prototype = {
    o: {}, create: function () {
        var t = $(this.o.block).find(this.o.item), e = t.data("time"), i = new Date;
        if (this.lang(t), "date" == e.type) {
            var a = e.my.toString().split(".");
            this.final_date = new Date(a[1], parseInt(a[0], 10) - 1, e.d, e.h, e.m)
        } else if ("monthly" == e.type)this.final_date = new Date(i.getFullYear(), i.getMonth(), e.d, e.h, e.m), i.getTime() > this.final_date.getTime() && (this.final_date = new Date(i.getFullYear(), i.getMonth() + 1, e.d, e.h, e.m)), parseInt(e.d, 10) != this.final_date.getDate() && (this.final_date.setDate(0), i.getTime() > this.final_date.getTime() && (this.final_date = new Date(this.final_date.getFullYear(), this.final_date.getMonth() + 2, 0, e.h, e.m))); else if ("weekly" == e.type) {
            var s = parseInt(i.getDate(), 10) - parseInt(i.getDay(), 10) + parseInt(e.dw, 10);
            this.final_date = new Date(i.getFullYear(), i.getMonth(), s, e.h, e.m), i.getTime() > this.final_date.getTime() && this.final_date.setDate(this.final_date.getDate() + 7)
        } else"daily" == e.type ? (this.final_date = new Date(i.getFullYear(), i.getMonth(), i.getDate(), e.h, e.m), i.getTime() > this.final_date.getTime() && this.final_date.setDate(this.final_date.getDate() + 1)) : (this.final_date = new Date, this.final_date.setMonth(this.final_date.getMonth() + 1, 15));
        this.item_d_1 = t.find(".d [data-value]").eq(0), this.item_d_2 = t.find(".d [data-value]").eq(1), this.item_d_3 = t.find(".d [data-value]").eq(2), this.item_h_1 = t.find(".h [data-value]").eq(0), this.item_h_2 = t.find(".h [data-value]").eq(1), this.item_m_1 = t.find(".m [data-value]").eq(0), this.item_m_2 = t.find(".m [data-value]").eq(1), this.item_s_1 = t.find(".s [data-value]").eq(0), this.item_s_2 = t.find(".s [data-value]").eq(1), this.last_offset = {
            d: void 0,
            h: void 0,
            m: void 0,
            s: void 0
        }, !spaced_cli.is_admin && this.final_date.getTime() < (new Date).getTime() ? $(this.o.block).hide() : this.start()
    }, update: function () {
        if (this.second_left = this.final_date.getTime() - (new Date).getTime(), this.second_left = Math.ceil(this.second_left / 1e3), this.second_left = this.second_left < 0 ? 0 : this.second_left, this.offset = {
                d: Math.floor(this.second_left / 60 / 60 / 24),
                h: Math.floor(this.second_left / 60 / 60) % 24,
                m: Math.floor(this.second_left / 60) % 60,
                s: this.second_left % 60
            }, this.last_offset.d != this.offset.d) {
            var t = this.offset.d.toString().split("");
            t.length < 2 && t.unshift(0), t.length < 3 && t.unshift(0), this.item_d_1.attr("data-value", t[0]).text(t[0]), this.item_d_2.attr("data-value", t[1]).text(t[1]), this.item_d_3.attr("data-value", t[2]).text(t[2])
        }
        if (this.last_offset.h != this.offset.h) {
            var e = this.offset.h.toString().split("");
            e.length < 2 && e.unshift(0), this.item_h_1.attr("data-value", e[0]).text(e[0]), this.item_h_2.attr("data-value", e[1]).text(e[1])
        }
        if (this.last_offset.m != this.offset.m) {
            var i = this.offset.m.toString().split("");
            i.length < 2 && i.unshift(0), this.item_m_1.attr("data-value", i[0]).text(i[0]), this.item_m_2.attr("data-value", i[1]).text(i[1])
        }
        if (this.last_offset.s != this.offset.s) {
            var a = this.offset.s.toString().split("");
            a.length < 2 && a.unshift(0), this.item_s_1.attr("data-value", a[0]).text(a[0]), this.item_s_2.attr("data-value", a[1]).text(a[1])
        }
        if (this.last_offset = this.offset, this.second_left < 0)return void this.stop()
    }, start: function () {
        null !== this.interval && clearInterval(this.interval), this.update(), this.interval = setInterval($.proxy(function () {
            this.update()
        }, this), 200)
    }, stop: function () {
        clearInterval(this.interval), this.interval = null
    }, lang: function (t) {
        t.find("[data-timer-text]").each(function (t, e) {
            var i = $(e).attr("data-timer-text"), a = spaced_cli.lang.get("timer." + i);
            $(e).text(a)
        })
    }
};
"use strict";
var _extends = Object.assign || function (t) {
        for (var e = 1; e < arguments.length; e++) {
            var i = arguments[e];
            for (var n in i)Object.prototype.hasOwnProperty.call(i, n) && (t[n] = i[n])
        }
        return t
    }, _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (t) {
    return typeof t
} : function (t) {
    return t && "function" == typeof Symbol && t.constructor === Symbol ? "symbol" : typeof t
};
spaced_cli.widget = {
    data: {}, widget_default: {
        require: [], _on_init: function () {
            var t = this;
            spaced_cli.require(this.require, function () {
                t.on_load(), spaced_cli.components.init(t.$widget), t.is_init = !0, t.on_init(), spaced_cli.events.emit("widget_event", {
                    event: "initialized",
                    sender: "core",
                    widget: t
                })
            })
        }, _on_update: function () {
            var t = this;
            spaced_cli.require(this.require, function () {
                t.on_load(), spaced_cli.components.init(t.$widget), t.on_update(), spaced_cli.events.emit("widget_event", {
                    event: "updated",
                    sender: "core",
                    widget: t
                })
            })
        }, _on_msg: function (t, e) {
            this.on_msg(t, e)
        }, on_load: function () {
        }, on_init: function () {
        }, on_update: function () {
        }, on_msg: function () {
        }
    }, init: function () {
        var t = this;
        spaced_cli.events.on("widget_add", function (e, i) {
            if (i && i.id) {
                var n = $('.w_widget[data-id="' + i.id + '"]');
                t.bind(n)
            }
        }), spaced_cli.events.on("widget_render", function (t, e) {
            if (e && e.id && ~e.render.indexOf("template")) {
                var i = $('.w_widget[data-id="' + e.id + '"]'), n = i.data("_core_widget");
                "undefined" != typeof n && "function" == typeof n._on_update && n._on_update()
            }
        }), spaced_cli.events.on("widget_msg", function (t, e) {
            if (e && e.id) {
                var i = $('.w_widget[data-id="' + e.id + '"]'), n = i.data("_core_widget");
                "undefined" != typeof n && n._on_msg(e.msg, e.data)
            }
        }), $(".w_widget").each(function (e, i) {
            t.bind($(i))
        })
    }, bind: function (t) {
        var e = t.attr("data-w-id");
        if (t.data("_core_widget"))return !0;
        this.data[e] || this.register(e, {});
        var i = new this.data[e](t);
        "object" === ("undefined" == typeof i ? "undefined" : _typeof(i)) && (t.data("_core_widget", i), i._on_init())
    }, register: function (t, e) {
        t || console.log("Шаблон виджета без уник.номера!"), e.w_id = t, spaced_cli.widget.data[t] = function (t) {
            this.$widget = t, this.data = this.$widget.data("data"), this.id = this.$widget.attr("data-id")
        };
        var i = _extends({}, this.widget_default);
        spaced_cli.widget.data[t].prototype = _extends({}, i, e)
    }
};
"use strict";
var _extends = Object.assign || function (t) {
        for (var e = 1; e < arguments.length; e++) {
            var a = arguments[e];
            for (var i in a)Object.prototype.hasOwnProperty.call(a, i) && (t[i] = a[i])
        }
        return t
    };
spaced_cli.components = {
    init: function () {
        var t = this, e = function (e, a) {
            if (a && a.event && "core" == a.sender && ("block_event" != e.type || a.block && a.block.$block) && ("modal_event" != e.type || a.modal && a.modal.$modal)) {
                var i = a.block && a.block.$block || a.modal && a.modal.$modal;
                ("block_event" == e.type && a.event.match(/initialized|updated/) || "modal_event" == e.type && a.event.match(/opened|updated/)) && (t.background.init(i), t.scrollDown(i), t.button.init(i), t.image.init(i))
            }
        };
        spaced_cli.events.off("block_event.components").on("block_event.components", e), spaced_cli.events.off("modal_event.components").on("modal_event.components", e), this.links()
    },
    scrollDown: function (t) {
        if (!spaced_cli.is_admin) {
            var e = t.find(".component-scroll-down");
            e.length && e.on("click", function () {
                var e = t.next().offset().top;
                $("body, html").animate({scrollTop: e}, 700)
            })
        }
    },
    button: {
        goals: {
            modal_form: "form_open",
            modal_product: "product_show",
            cart: "cart_add",
            link: "link_open",
            file: "file_load",
            close: "modal_close",
            modal_policy: "policy_show"
        }, init: function (t) {
            var e = this, a = t.data("_core_block") || t.data("_core_modal") || t.data("_core_widget"), i = t.closest(".w_widget")[0] ? t : t.find("> .container-fluid, > .modal-data");
            i.off("click.component-button").on("click.component-button", ".component-button", function (i) {
                if (spaced_cli.is_admin)return i.preventDefault(), !1;
                var n = $(i.currentTarget), o = n.closest("[data-item-id], .modal-data").eq(0), c = n.data("action"), d = n.data("product");
                if (c) {
                    spaced_cli.stat.reach_goal(e.goals[c]);
                    try {
                        var l = n.find('[name="goal"]').val();
                        l && spaced_cli.stat.reach_goal(l);
                        var r = n.find('[name="goal_html"]').val();
                        r && ($("body").find(".button-html-goal").detach(), $("body").eq(0).append('<div class="button-html-goal" style="display:none"></div>'), $("body").find(".button-html-goal").html(r))
                    } catch (s) {
                    }
                    if (o[0] && "link" != c && "file" != c && "close" != c) {
                        var m = o.find("[data-img-id]").eq(0), p = o.find(".price, .item-price, .main-price").eq(0).clone();
                        p.find("del").remove();
                        var f = o.find(".name, .title, .item-title, .text_title").eq(0);
                        d = _extends({
                            id: spaced_cli.p_id + "_" + a.id + "_" + o.data("itemId") + (t.attr("data-multivar") || ""),
                            count: 1,
                            img: !!(m.length && m.attr("data-img-id") && m.attr("data-img-name")) && "/img/" + m.attr("data-img-id") + "_200/" + m.attr("data-img-name"),
                            title: f.text().trim() || "-",
                            price: parseFloat(p.text().replace(/[,.]/g, ".").replace(/\.$/, "").replace(/[^\d.]/g, "")) || 0
                        }, d), "-" === d.title && 0 === d.price && (d = !1)
                    }
                    if (d = !!d && [d], c.match(/^modal|^form/)) {
                        var _ = $(i.currentTarget).attr("data-modal-id"), u = $(i.currentTarget).attr("data-modal-name"), g = parseInt(String(a.id).split("_")[0], 10), h = u || g + "_" + _;
                        spaced_cli.events.emit("modal_command", {command: "open", id: h, data: {items: d}})
                    } else d[0] && c.match(/^cart$/) ? (spaced_cli.events.emit("cart_command", {
                        command: "add",
                        item: d[0]
                    }), n.addClass("animate-add-to-cart"), setTimeout(function () {
                        n.removeClass("animate-add-to-cart"), n.closest(".m_modal").length && spaced_cli.events.emit("modal_command", {command: "close"})
                    }, 1600)) : "close" == c && spaced_cli.events.emit("modal_command", {command: "close"})
                }
            })
        }
    },
    links: function () {
        $("body").off("click.component-links").on("click.component-links", "a[href]", function (t) {
            var e = $(t.target).attr("href");
            if (e)if (/^#{2}/.test(e)) {
                t.preventDefault(), t.stopPropagation();
                var a = $(t.target).closest(".b_block"), i = a.attr("data-id") + "_" + e.replace(/^#{2}/, "");
                spaced_cli.events.emit("modal_command", {command: "open", id: i, data: {}})
            } else if (/^#.+/.test(e)) {
                t.preventDefault(), t.stopPropagation(), spaced_cli.events.emit("modal_command", {command: "close"}), $("body > .mobile-menu").removeClass("show"), e = e.replace("#", "");
                var n = $('.container-fluid a[name="' + e + '"], .b_block[data-id="' + e + '"]').eq(0), o = $('.m_modal[data-id="' + e + '"]').eq(0);
                if (n.length) {
                    var c = n.closest(".b_block"), d = c.data("_core_block");
                    if (!d || !d.tween)return;
                    var l = d.tween.start - d.tween.fix / 2;
                    $("body,html").animate({scrollTop: l})
                } else o.length && spaced_cli.events.emit("modal_command", {command: "open", id: e, data: {}})
            }
        })
    },
    image: {
        init: function (t) {
            var e = this;
            $(".component-image", t).each(function (t, a) {
                e.set(a)
            })
        }, set: function (t) {
            var e = t.querySelector("img"), a = this.getData(t, e);
            a && !e.processed && (e.processed = !0, e.setAttribute("onload", ""), "background" == a.type ? t.style.backgroundImage = a.css_url : e.src = a.url)
        }, getData: function (t, e) {
            if (t && e) {
                var a = function (t, e, a) {
                    var i = Math.max(1, window.devicePixelRatio && window.devicePixelRatio) || 1;
                    return 1 === i && t <= 200 && (i = 2), e / t > a && (t = e / a), Math.floor(t * i)
                }, i = {
                    id: t.dataset.imgId,
                    type: t.dataset.imgType,
                    name: t.dataset.imgName,
                    width: a(t.offsetWidth, t.offsetHeight, e.naturalHeight / e.naturalWidth)
                };
                return !(!(i.width && i.id && i.name && i.type && "big" != i.type) || /.svg$/.test(i.name)) && (i.css_url = "url(/img/" + i.id + "_" + i.width + "/" + i.name + "), url(/img/" + i.id + "_100/" + i.name + ")", i.url = "/img/" + i.id + "_" + i.width + "/" + i.name, i)
            }
        }
    },
    background: {
        factor: .6, frames: {}, init: function (t) {
            var e = this;
            this.getOffset(t), $(window).on("resize orientationchange update_list", function () {
                e.getOffset(t)
            })
        }, getOffset: function (t) {
            var e = t.data("_core_block"), a = t.find('[data-parallax="true"]').find(".image-holder, .video_bg_container"), i = a.find(".image, .video_bg_player")[0];
            i && (spaced_cli.resize.height < e.tween.height ? a.css("height", e.tween.height + "px") : a.css("height", ""), (spaced_cli.run.is_screen_pc || spaced_cli.run.is_screen_small_pc) && spaced_cli.run.is_desktop ? spaced_cli.run.is_ie ? t.find('[data-parallax="true"]').attr("data-parallax", "half") : this.animationLoop(i, e) : (cancelAnimationFrame(this.frames[e.id]), i.style.transform = "none"))
        }, animationLoop: function (t, e) {
            var a = this;
            this.frames[e.id] && cancelAnimationFrame(this.frames[e.id]), function i() {
                a.frames[e.id] = requestAnimationFrame(i), a.animateParallax(t, e)
            }()
        }, animateParallax: function (t, e) {
            if (!(Math.abs(e.tween.position) > 1.2)) {
                var a = e.tween.start, i = 1 - (1 - this.factor) * (e.tween.height / spaced_cli.resize.height);
                i < 0 && (i = this.factor / 2), t.style.transform = "translate3d(0, " + -(window.pageYOffset - a) * i + "px, 0)"
            }
        }
    }
};
"use strict";
spaced_cli.run.init = function () {
    spaced_cli.lang.init(), spaced_cli.scroll.init(), spaced_cli.resize.init(), spaced_cli.components.init(), spaced_cli.block.init(), spaced_cli.modal.init(), spaced_cli.widget.init(), spaced_cli.lib.init(), spaced_cli.stat.init()
};
"use strict";
spaced_cli.video_bg = {
    init: function (e, i) {
        if (!("youtube" != i.type || "string" != typeof i.id || i.id.length < 1 || spaced_cli.run.is_mobile)) {
            if (e.data("video_bg_played")) {
                if (i.id == e.data("video_bg_played"))return;
                this.destroy(e)
            }
            e.data("video_bg_played", i.id), spaced_cli.require(["/_s/lib/jquery/youtubebackground/jquery.youtubebackground.js"], $.proxy(function () {
                e.YTPlayer({videoId: i.id})
            }, this))
        }
    }, destroy: function (e) {
        e.data("ytPlayer") && e.data("ytPlayer").destroy(), e.removeData("video_bg_played")
    }
};
"use strict";
window.flexbeAPI = {customLeadData: {}};
"use strict";
spaced_cli.form = {
    list: {}, create: function (t) {
        if (!spaced_cli.is_admin)return this.list[t.id] = new spaced_cli.form.Form(t), this.list[t.id]
    }
}, spaced_cli.form.Form = function (t) {
    this.o = t, this.create()
}, spaced_cli.form.Form.prototype = {
    o: {}, create: function () {
        this.$data = this.o.block.find(this.o.form), this.bind()
    }, bind: function () {
        if (this.$form = this.$data.find("form").eq(0), !(this.$form.length < 1)) {
            var t = $('<input type="hidden" name="jsform" value="' + parseInt(448312, 10) + '">');
            this.$form.prepend(t).prepend('<input type="hidden" name="p_id" value="' + spaced_cli.p_id + '">'), this.$form.find(".form_field_submit").off("click").on("click", $.proxy(function () {
                this.$form.submit()
            }, this)), this.$form.off("submit").on("submit", $.proxy(function (t) {
                if (!this.validation())return !1;
                if ("function" == typeof this.o.before_send && this.o.before_send(), "undefined" != typeof FormData)this.send_formdata(); else {
                    if (!(this.$form.find('input[type="file"]').length < 1))return !0;
                    this.send_ajax()
                }
                return !1
            }, this))
        }
    }, add_fields: function (t) {
        var e = this.$form.find(".form_fields_advanced").empty();
        t.length && e[0] && t.forEach(function (t) {
            var i = $("<input>").attr("type", t.type).attr("name", t.name).attr("value", t.value);
            e.append(i)
        })
    }, add_items: function () {
        var t = arguments.length <= 0 || void 0 === arguments[0] ? [] : arguments[0];
        if (t && t.length) {
            var e = 0, i = 0, a = "", n = [];
            t = t.map(function (t) {
                if (t)return t.count = parseInt(t.count) || 1, t.price = parseFloat(t.price) || 0, t.title = "string" == typeof t.title && t.title.trim() || t.title || "", e += t.price * t.count || 0, i += t.count, t
            });
            try {
                a = JSON.stringify(t)
            } catch (o) {
            }
            n.push({type: "hidden", name: "product[items]", value: a}), n.push({
                type: "hidden",
                name: "product[price]",
                value: e
            }), n.push({type: "hidden", name: "product[total]", value: i}), e && (n.push({
                type: "hidden",
                name: "pay[price]",
                value: e
            }), n.push({
                type: "hidden",
                name: "pay[desc]",
                value: i > 1 ? "Товаров в корзине: " + i : t[0].title
            })), this.add_fields(n)
        }
    }, send_formdata: function () {
        var t = new FormData(this.$form.get(0));
        t.append("is_ajax", "true"), "undefined" != typeof flexbeAPI && "undefined" != typeof flexbeAPI.customLeadData && t.append("customLeadData", JSON.stringify(flexbeAPI.customLeadData)), t.append("f_ab", JSON.stringify(spaced_cli.stat.AB.getcookie())), this.$form.parent().parent().addClass("submitting");
        var e = $.ajax({
            url: this.$form.attr("action"),
            type: "POST",
            dataType: "json",
            processData: !1,
            contentType: !1,
            data: t,
            xhr: $.proxy(function () {
                var t = $.ajaxSettings.xhr();
                return t.upload, t
            }, this)
        });
        e.done($.proxy(function (t) {
            setTimeout($.proxy(function () {
                this.$form.parent().parent().addClass("submit-ok step-1"), setTimeout($.proxy(function () {
                    this.$form.parent().parent().addClass("submit-ok step-2"), setTimeout($.proxy(function () {
                        this.$form.parent().parent().addClass("submit-ok step-3"), setTimeout($.proxy(function () {
                            this.$form.parent().parent().removeClass("submitting submit-ok step-1 step-2 step-3"), this.$form.get(0).reset(), t.send_formdata = !0, "undefined" != typeof t.pay && (this.pay = t.pay), this.show_done()
                        }, this), 1e3)
                    }, this), 300)
                }, this), 400)
            }, this), 500), spaced_cli.stat.AB.fixlead(t.fixed_tests)
        }, this)), e.fail($.proxy(function (t) {
            this.$form.parent().parent().removeClass("submitting")
        }, this))
    }, send_ajax: function () {
        var t = this.$form.serialize(), e = $.ajax({
            url: this.$form.attr("action"),
            type: "POST",
            dataType: "json",
            data: t + "&is_ajax=true"
        });
        e.done($.proxy(function (t) {
            this.$form.get(0).reset(), t.send_ajax = !0, "undefined" != typeof t.pay && (this.pay = t.pay), this.show_done()
        }, this)), e.fail($.proxy(function (t) {
        }, this))
    }, validation: function () {
        var t = !0;
        return this.$form.find("div[data-type]").each(function (e, i) {
            var a, n, o = $(i), r = o.attr("data-type"), s = "true" == o.attr("data-is-required");
            o.removeClass("is_error"), a = o.find("input,textarea,select").not('[type="hidden"]'), $.inArray(r, ["text", "textarea", "email", "phone", "name"]) != -1 ? n = $.trim(a.val()) : "file" == r && (n = a.get(0).files);
            try {
                if (s && "undefined" != typeof n && n.length < 1)throw spaced_cli.lang.get("form.required");
                if ("email" == r && "email" == a.attr("data-check") && n.length > 0) {
                    var d = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Zа-яёА-ЯЁ\-0-9]+\.)+[a-zA-Zа-яёА-ЯЁ]{2,}))$/;
                    d.test(n) || (o.addClass("is_error"), o.find(".error").text(spaced_cli.lang.get("form.email")), t = !1)
                }
                if ("phone" == r && "phone" == a.attr("data-check") && n.length > 0) {
                    if (/[^0-9+\(\)\-\s]/.test(n))throw spaced_cli.lang.get("form.digits");
                    var f = n.replace(/[^0-9]/g, "");
                    if (f.length < 5)throw spaced_cli.lang.get("form.minlength")
                }
            } catch (p) {
                o.addClass("is_error"), o.find(".error").text(p), t = !1
            }
        }), t
    }, show_done: function () {
        var t = this, e = this.$form.find('input[name="action"]').val();
        spaced_cli.stat.reach_goal("order_done");
        try {
            var i = this.$form.find('input[name="goal"]').val();
            "undefined" != typeof i && "" !== i && spaced_cli.stat.reach_goal(i)
        } catch (a) {
        }
        try {
            var n = this.$form.find('textarea[name="goal_html"]').val();
            "string" == typeof n && n.trim() && !function () {
                var t = document.write;
                document.write = function (t) {
                    $("body:eq(0)").append(t)
                }, $("body:eq(0)").append('<div style="display:none">' + n + "</div>"), setTimeout(function () {
                    document.write = t
                }, 1e4)
            }()
        } catch (a) {
        }
        "pay" == e && "undefined" != typeof this.pay && null !== this.pay ? this.pay.pay_link.length > 0 && !function () {
            var e = window.location.origin + window.location.pathname + (window.location.search ? window.location.search + "&" : "?") + "pay_id=" + t.pay.pay_id + "&h=" + t.pay.pay_hash;
            try {
                history.pushState(null, null, e), setTimeout(function () {
                    spaced_cli.events.emit("pay", {action: "init"})
                }, 200)
            } catch (i) {
                setTimeout(function () {
                    document.location = e
                }, 500)
            }
        }() : "redirect" == e ? !function () {
            var e = t.$form.find('input[name="action_redirect"]').val();
            e.length > 0 && setTimeout(function () {
                document.location = e
            }, 500)
        }() : spaced_cli.modal.open(this.o.form_done), "function" == typeof this.o.after_send && this.o.after_send()
    }, set_name: function (t) {
        this.o.name = t
    }, send_log: function (t, e) {
        return !1
    }
};
"use strict";
var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o
} : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol ? "symbol" : typeof o
};
spaced_cli.modal = {
    data: {}, opened: {}, css_loaded: {}, modal_default: {
        require: [], _on_init: function (o) {
            var e = this;
            spaced_cli.require(this.require, function () {
                e.on_load(o), e.is_init = !0, e.on_init(o), spaced_cli.events.emit("modal_event", {
                    event: "initialized",
                    sender: "core",
                    modal: e
                })
            })
        }, _on_open: function (o) {
            this.on_open(o), spaced_cli.events.emit("modal_event", {event: "opened", sender: "core", modal: this})
        }, _on_close: function () {
            this.on_close(), spaced_cli.events.emit("modal_event", {event: "closed", sender: "core", modal: this})
        }, _on_update: function () {
            var o = this;
            spaced_cli.require(this.require, function () {
                o.on_load(), o.on_update(), spaced_cli.events.emit("modal_event", {
                    event: "updated",
                    sender: "core",
                    modal: o
                })
            })
        }, _on_msg: function (o, e) {
            this.on_msg(o, e)
        }, on_load: function () {
        }, on_open: function () {
        }, on_close: function () {
        }, on_init: function () {
        }, on_update: function () {
        }, on_msg: function () {
        }
    }, init: function () {
        var o = this;
        $(".m_modal").each(function (e, a) {
            o.bind($(a))
        }), spaced_cli.events.on("modal_add", function (e, a) {
            if (a && a.id) {
                var t = $('.m_modal[data-id="' + a.id + '"]').last();
                o.bind(t, a)
            }
        }), spaced_cli.events.on("modal_render", function (o, e) {
            if (e && e.id && ~e.render.indexOf("template")) {
                var a = $('.m_modal[data-id="' + e.id + '"]').last(), t = a.data("_core_modal");
                "undefined" != typeof t && "function" == typeof t._on_update && t._on_update()
            }
        }), spaced_cli.events.on("modal_msg", function (o, e) {
            if (e && e.id) {
                var a = $('.m_modal[data-id="' + e.id + '"]').last(), t = a.data("_core_modal");
                "undefined" != typeof t && t._on_msg(e.msg, e.data)
            }
        }), spaced_cli.events.on("modal_command", function (e, a) {
            if (a)switch (a.command) {
                case"open":
                    o.open(a.id, a.data);
                    break;
                case"close":
                    o.close(a.id)
            }
        }), $("body").on("click.modal-close", ".m_modal .close", function (e) {
            var a = $(e.currentTarget).closest(".m_modal"), t = a.attr("data-id");
            o.close(t)
        }), $(window).on("keyup.modal-close-esc", function (e) {
            if (27 != e.keyCode)return !0;
            var a = $(".m_modal.show").eq(0).attr("data-id");
            o.close(a)
        }), $("body").on("click.modal-close-overlay", function (e) {
            if (!spaced_cli.is_admin && Object.keys(o.opened).length && $(e.target).is(".m_modal")) {
                var a = $(".m_modal.show").eq(0).attr("data-id");
                o.close(a)
            }
        }), spaced_cli.is_admin || $(".m_modal").removeAttr("data-data")
    }, bind: function (o, e) {
        var a = o.attr("data-m-id");
        if (o.data("_core_modal"))return !0;
        this.data[a] || this.register(a, {});
        var t = new this.data[a](o);
        "object" === ("undefined" == typeof t ? "undefined" : _typeof(t)) && (o.data("_core_modal", t), t._on_init(e), e && "modal_slide" == e.reason && t._on_open())
    }, register: function (o, e) {
        o || log("Приложение должно иметь уникальный номер"), e.modal_id = o, spaced_cli.modal.data[o] = function (o) {
            this.$modal = o, this.data = this.$modal.data("data"), this.id = this.$modal.attr("data-id")
        };
        var a = $.extend(!0, {}, this.modal_default);
        spaced_cli.modal.data[o].prototype = $.extend(!0, {}, a, e)
    }, open: function (o) {
        var e = arguments.length <= 1 || void 0 === arguments[1] ? {} : arguments[1], a = $(".m_modal.m_" + o), t = a.data("_core_modal");
        return !!(a.length && a.attr("data-m-id") && t) && ($(".m_modal").removeClass("show"), $("body").addClass("overflow"), a.closest(".modal-list").addClass("overlay"), setTimeout(function () {
                a.addClass("show"), t._on_open(e)
            }, 50), void(this.opened[o] = !0))
    }, close: function (o) {
        if (o) {
            var e = $(".m_modal.m_" + o), a = e.data("_core_modal");
            e.removeClass("show"), this.opened[o] = !1, $(".m_modal").hasClass("show") || ($(".modal-list").removeClass("overlay"), $("body").removeClass("overflow")), a && "function" == typeof a._on_close && a._on_close()
        } else {
            $(".m_modal").removeClass("show"), $("body").removeClass("overflow"), $(".modal-list").removeClass("overlay");
            for (var t in this.opened)if (this.opened.hasOwnProperty(t)) {
                var n = $(".m_modal.m_" + t).data("_core_modal");
                this.opened[t] = !1, n && "function" == typeof n._on_close && n._on_close()
            }
        }
    }
};
"use strict";
spaced_cli.menu = function () {
    this.options = {
        menu: ".menu",
        srollSpeed: 400,
        topOffset: 1
    }, this.items = [], this.menu_floating = !1, this.clickInit = !1, this.block_params = {}, this.init = function (t, i) {
        this.$block = i;
        var o = this;
        if (this.lang(), "undefined" != typeof t.menu && (this.options.menu = t.menu), "undefined" != typeof t.srollSpeed && (this.options.srollSpeed = t.srollSpeed), "undefined" != typeof t.topOffset && (this.options.topOffset = t.topOffset), this.getItems(), !spaced_cli.is_admin && !spaced_cli.run.is_mobile) {
            this.menu_floating = !1;
            var e = this.$block.find('input[name="menu_floating"]').val();
            "true" != e && 1 != e || (this.menu_floating = !0)
        }
        this.getBlockParams(function (t) {
            if (o.menu_floating) {
                var i = o.$block[0].className.replace(/[^0-9]/gim, "");
                $(document).off("scroll." + i).on("scroll." + i, function (t) {
                    o.floating()
                })
            } else o.realeseBlock()
        })
    }, this.getBlockParams = function () {
        var t = arguments.length <= 0 || void 0 === arguments[0] ? function () {
        } : arguments[0], i = this, o = i.$block.height();
        0 === o ? o = i.$block.data("height") || 120 : i.$block.data("height", o), setTimeout(function () {
            i.block_params.height = o, i.block_params.top = i.$block.offset().top, t(i.block_params)
        }, 100)
    }, this.getItems = function () {
        this.$block.find(this.options.menu + " a").each($.proxy(function (t, i) {
            var o = {
                el: $(i),
                type: "link",
                href: "",
                anchor: {top: 0, el: !1}
            }, e = o.el.attr("href"), n = e.split("#");
            if (s = n[1], o.href = e, "" !== s && ("" === n[0] || n[0] == window.location.pathname || n[0] == window.location.href || n[0] == window.location.origin)) {
                var s = $('a[name="' + s + '"]');
                s.length > 0 && (o.type = "anchor", o.anchor = {el: s, top: s.offset().top})
            }
            this.items[e] = o
        }, this)), this.activeItem()
    }, this.activeItem = function () {
        var t = !1, i = 99999999;
        for (var o in this.items) {
            var e = this.items[o];
            if ("anchor" == e.type && this.menu_floating) {
                var n = e.anchor.top - this.block_params.height - $(window).height() / 2.5;
                $(window).scrollTop() > n && i > $(window).scrollTop() - n && (i = $(window).scrollTop() - n, t = e.el)
            } else"link" != e.type || t || e.href != window.location.href && e.href != window.location.pathname + window.location.search && e.href != window.location.origin + window.location.pathname + window.location.search || (t = e.el)
        }
        this.$block.find(this.options.menu + " a").removeClass("active"), t && t.addClass("active")
    }, this.floating = function () {
        this.menu_floating && $(window).scrollTop() > this.block_params.top + this.options.topOffset ? this.fixBlock() : this.realeseBlock(), this.activeItem()
    }, this.fixed = !1, this.fixBlock = function () {
        this.$block.hasClass("floating") || this.$block.addClass("floating"), this.fixed || (this.$block.css("marginBottom", this.block_params.height - 30 + "px"), this.fixed = !0)
    }, this.realeseBlock = function () {
        this.fixed && (this.$block.removeClass("floating").css({marginBottom: "0px"}), this.fixed = !1)
    }, this.lang = function () {
        var t = spaced_cli.lang.get("menu");
        this.$block.find("[data-menu-text]").text(t)
    }
};
"use strict";
spaced_cli.block.register(10, {
    require: ["//api-maps.yandex.ru/2.1/?lang=ru_RU"], on_init: function () {
        this.$map = this.$block.find("[data-map]").eq(0), this.map_data = this.$map.data("map"), ymaps.ready($.proxy(function () {
            this.show_map()
        }, this)), spaced_cli.is_admin ? this.$block.find(".overlay").remove() : this.$block.find(".overlay").one("mousedown", function (a) {
            $(a.currentTarget).remove()
        })
    }, show_map: function () {
        "undefined" != typeof this.map && this.map.destroy(), this.map = new ymaps.Map(this.$map.get(0), {
            center: this.map_data.center,
            zoom: this.map_data.zoom,
            controls: ["zoomControl", "fullscreenControl"],
            behaviors: ["default", "scrollZoom"],
            type: "yandex#map"
        });
        var a;
        this.map.behaviors.disable("scrollZoom"), $(this.$map).off("mouseenter.map_scroll").on("mouseenter.map_scroll", $.proxy(function (o) {
            a = window.setTimeout($.proxy(function () {
                this.map.behaviors.enable("scrollZoom")
            }, this), 700)
        }, this)), $(this.$map).off("mouseleave.map_scroll").on("mouseleave.map_scroll", $.proxy(function (o) {
            a && (window.clearTimeout(a), this.map.behaviors.disable("scrollZoom"))
        }, this)), this.update_places(), spaced_cli.run.is_mobile && this.map.behaviors.disable("drag")
    }, update_places: function () {
        this.map.geoObjects.removeAll(), "undefined" == typeof this.map_data.marker && (this.map_data.marker = "/_app/block/10/mark_blue.png"), $.each(this.map_data.places, $.proxy(function (a, o) {
            "undefined" == typeof o.color && (o.color = "blue");
            var e = new ymaps.Placemark(o.coords, {balloonContent: o.address}, {
                iconLayout: "default#image",
                iconImageHref: "/_app/block/10/mark_" + o.color + ".png",
                iconImageSize: [50, 50],
                iconImageOffset: [-25, -50]
            });
            this.map.geoObjects.add(e)
        }, this))
    }
});
"use strict";
spaced_cli.block.register(100, {
    on_init: function () {
        this.fix_height()
    }, on_msg: function (i) {
        "on_change" == i && this.fix_height()
    }, fix_height: function () {
        var i = this;
        if (this.$block.find(".price").each(function (t, n) {
                var e = $(n).text().length;
                if (e >= 6)return i.$block.find(".plans").addClass("tiny"), !1
            }), !(window.innerWidth <= 768)) {
            var t = 0;
            this.$block.find(".item").each(function (i, n) {
                $(n).css("min-height", "");
                var e = $(n).outerHeight();
                $(n).hasClass("active") && (e -= 30), t = e >= t ? e : t
            }), this.$block.find(".item").not(".active").css("min-height", t + "px"), this.$block.find(".item.active").css("min-height", t + 30 + "px")
        }
    }
});
"use strict";
spaced_cli.block.register(101, {
    on_init: function () {
        this.fix_height()
    }, on_msg: function (i) {
        "on_change" == i && this.fix_height()
    }, fix_height: function () {
        var i = this;
        if (this.$block.find(".price").each(function (t, n) {
                var h = $(n).text().length;
                if (h >= 6)return i.$block.find(".plans").addClass("tiny"), !1
            }), !(window.innerWidth <= 768)) {
            var t = 0;
            this.$block.find(".item").each(function (i, n) {
                $(n).css("min-height", "");
                var h = $(n).outerHeight();
                $(n).hasClass("active") && (h -= 30), t = h >= t ? h : t
            }), this.$block.find(".item").css("min-height", t + "px"), this.$block.find(".count-3 .item.active").css("min-height", t + 30 + "px")
        }
    }
});
"use strict";
spaced_cli.block.register(106, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js"],
    on_init: function () {
        var e = this;
        this.row = 1;
        var i = this.$block.find(".slider").addClass("noanimate"), t = this.$block.data("slide_count") || 0;
        this.slider = i.lightSlider({
            item: this.row,
            slideMove: this.row,
            slideMargin: 0,
            useCSS: !0,
            cssEasing: "cubic-bezier(0.76, 0.91, 0.35, 1)",
            speed: 550,
            adaptiveHeight: !0,
            loop: !1,
            cycle: !0,
            pager: !0,
            gallery: !0,
            thumbItem: 4,
            galleryMargin: 15,
            thumbMargin: 15,
            enableDrag: !0,
            controls: !0,
            prevHtml: '<div class="button"><svg width="16" height="40" viewBox="0 0 16 10"><path d="M16 6H3.6L6 8.57 4.666 10 0 5l4.666-5L6 1.428 3.6 4H16z" fill="currentColor" fill-rule="evenodd"/></svg></div>',
            nextHtml: '<div class="button"><svg width="16" height="40" viewBox="0 0 16 10"><path transform="rotate(180) translate(-16, -10)" d="M16 6H3.6L6 8.57 4.666 10 0 5l4.666-5L6 1.428 3.6 4H16z" fill="currentColor" fill-rule="evenodd"/></svg></div>',
            responsive: [{breakpoint: 569, settings: {galleryMargin: 3, thumbMargin: 3, thumbItem: 3}}],
            onAfterSlide: function () {
                var t = e.slider.getCurrentSlideCount() - 1;
                e.$block.data("slide_count", t), i.removeClass("noanimate"), setTimeout(function () {
                    e.slider.refresh()
                }, 100)
            },
            onSliderLoad: function () {
                e.slider.goToSlide(t), spaced_cli.components.image.init(e.$block);
                var i = 0, r = setInterval(function () {
                    e.slider.refresh(), i++, 10 == i && clearInterval(r)
                }, 1e3)
            }
        }), this.setHeight()
    },
    setHeight: function () {
        var e = this, i = void 0, t = function () {
            e.slider && (clearTimeout(i), i = setTimeout(function () {
                var i = e.$block.find(".slider_wrap"), t = e.$block.find(".images_wrap").innerWidth() * (5 / 7);
                i.find("li.image img").css("max-height", t + "px"), e.slider.refresh()
            }, 100))
        };
        t(), $(window).off("resize." + this.id + " orientationchange." + this.id).on("resize." + this.id + " orientationchange." + this.id, function () {
            t()
        })
    },
    on_msg: function (e, i) {
        var t = this;
        this.slider && setTimeout(function () {
            var r = 0;
            "items_add" == e ? (r = Math.floor(+i.index / t.row), t.slider.goToSlide(r)) : "items_remove" == e && (r = Math.floor((+i.at - 1) / t.row), r < 0 && (r = 0), t.slider.goToSlide(r))
        }, 150)
    }
});
"use strict";
spaced_cli.block.register(107, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js"],
    on_init: function () {
        var e = this;
        e.row = 1;
        var i = e.$block.find(".slider").addClass("noanimate");
        if (i.length && e.$block.find(".img_wrap").length > 4) {
            var r = e.$block.data("slide_count") || 0;
            e.slider = i.lightSlider({
                item: e.row,
                slideMove: e.row,
                slideMargin: 0,
                useCSS: !0,
                cssEasing: "cubic-bezier(0.76, 0.91, 0.35, 1)",
                speed: 550,
                adaptiveHeight: !0,
                enableDrag: !1,
                loop: !1,
                cycle: !0,
                pager: !0,
                controls: !0,
                prevHtml: '<div class="button"><svg width="16" height="40" viewBox="0 0 16 10"><path d="M16 6H3.6L6 8.57 4.666 10 0 5l4.666-5L6 1.428 3.6 4H16z" fill="currentColor" fill-rule="evenodd"/></svg></div>',
                nextHtml: '<div class="button"><svg width="16" height="40" viewBox="0 0 16 10"><path transform="rotate(180) translate(-16, -10)" d="M16 6H3.6L6 8.57 4.666 10 0 5l4.666-5L6 1.428 3.6 4H16z" fill="currentColor" fill-rule="evenodd"/></svg></div>',
                onAfterSlide: function () {
                    var r = e.slider.getCurrentSlideCount() - 1;
                    e.$block.data("slide_count", r), i.removeClass("noanimate"), setTimeout(function () {
                        e.slider.refresh()
                    }, 100)
                },
                onSliderLoad: function () {
                    e.slider.goToSlide(r), spaced_cli.components.image.init(e.$block), e.slider.refresh()
                }
            })
        }
        e.setHeight()
    },
    setHeight: function () {
        function e() {
            var e = r.$block.find(".images_wrap"), i = e.find(".img").eq(0).innerWidth() * (5 / 7);
            i <= 20 || (e.find(".img_wrap").css("height", i + "px"), r.slider && r.slider.refresh())
        }

        var i, r = this;
        $(window).off("resize." + r.id + " orientationchange." + r.id).on("resize." + r.id + " orientationchange." + r.id, function () {
            clearTimeout(i), i = setTimeout(function () {
                e()
            }, 100)
        }), e()
    },
    on_msg: function (e, i) {
        var r = this;
        if (r.slider) {
            r.$block.find(".slider");
            setTimeout(function () {
                var t = 0;
                "items_add" == e ? (t = Math.floor(+i.index / r.row), r.slider.goToSlide(t)) : "items_remove" == e ? (t = Math.floor((+i.at - 1) / r.row), t < 0 && (t = 0), r.slider.goToSlide(t)) : "reswiper" == e && r.slider.refresh()
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(108, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js"],
    on_init: function () {
        var e = this;
        e.row = 1;
        var i = e.$block.find(".slider").addClass("noanimate"), r = e.$block.data("slide_count") || 0;
        e.slider = i.lightSlider({
            item: e.row,
            slideMove: e.row,
            slideMargin: 0,
            useCSS: !0,
            cssEasing: "cubic-bezier(0.76, 0.91, 0.35, 1)",
            speed: 550,
            adaptiveHeight: !0,
            loop: !1,
            cycle: !0,
            pager: !0,
            controls: !0,
            prevHtml: '<div class="button"><svg width="16" height="40" viewBox="0 0 16 10"><path d="M16 6H3.6L6 8.57 4.666 10 0 5l4.666-5L6 1.428 3.6 4H16z" fill="currentColor" fill-rule="evenodd"/></svg></div>',
            nextHtml: '<div class="button"><svg width="16" height="40" viewBox="0 0 16 10"><path transform="rotate(180) translate(-16, -10)" d="M16 6H3.6L6 8.57 4.666 10 0 5l4.666-5L6 1.428 3.6 4H16z" fill="currentColor" fill-rule="evenodd"/></svg></div>',
            onAfterSlide: function () {
                var r = e.slider.getCurrentSlideCount() - 1;
                e.$block.data("slide_count", r), i.removeClass("noanimate"), setTimeout(function () {
                    e.slider.refresh()
                }, 100)
            },
            onSliderLoad: function () {
                e.slider.goToSlide(r), spaced_cli.components.image.init(e.$block), e.slider.refresh()
            }
        })
    },
    on_msg: function (e, i) {
        var r = this;
        if (r.slider) {
            r.$block.find(".slider");
            setTimeout(function () {
                var l = 0;
                "items_add" == e ? (l = Math.floor(+i.index / r.row), r.slider.goToSlide(l)) : "items_remove" == e ? (l = Math.floor((+i.at - 1) / r.row), l < 0 && (l = 0), r.slider.goToSlide(l)) : "reswiper" == e && r.slider.refresh()
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(109, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js"],
    on_init: function () {
        var e = this;
        e.row = 1;
        var i = e.$block.find(".slider").addClass("noanimate"), o = e.$block.data("slide_count") || 0;
        e.slider = i.lightSlider({
            item: e.row,
            slideMove: e.row,
            slideMargin: 0,
            useCSS: !0,
            cssEasing: "cubic-bezier(0.76, 0.91, 0.35, 1)",
            speed: 550,
            adaptiveHeight: !0,
            loop: !1,
            cycle: !0,
            pager: !1,
            controls: !0,
            prevHtml: "",
            nextHtml: "",
            onBeforeSlide: function (i, o) {
                o += 1, e.$block.find(".counter .current").text(o)
            },
            onAfterSlide: function () {
                var o = e.slider.getCurrentSlideCount() - 1;
                e.$block.data("slide_count", o), i.removeClass("noanimate"), setTimeout(function () {
                    e.slider.refresh()
                }, 100)
            },
            onSliderLoad: function () {
                e.slider.goToSlide(o), spaced_cli.components.image.init(e.$block), e.slider.refresh()
            }
        }), e.$block.find(".controls .button").off("click").on("click", function (i) {
            var o = $(i.currentTarget).attr("data-action");
            e.$block.find(".slider_act ." + o).trigger("click")
        })
    },
    on_msg: function (e, i) {
        var o = this;
        if (o.slider) {
            o.$block.find(".slider");
            setTimeout(function () {
                var r = 0;
                "items_add" == e ? (r = Math.floor(+i.index / o.row), o.slider.goToSlide(r)) : "items_remove" == e && (r = Math.floor((+i.at - 1) / o.row), r < 0 && (r = 0), o.slider.goToSlide(r))
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(2, {
    on_init: function () {
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(29, {
    on_init: function () {
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(30, {
    on_init: function () {
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(31, {
    on_init: function () {
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(41, {
    on_init: function () {
        this.timer = spaced_cli.timer.create({id: this.id, block: this.$block, item: "div.timer"})
    }
});
"use strict";
spaced_cli.block.register(42, {
    on_init: function () {
        this.timer = spaced_cli.timer.create({id: this.id, block: this.$block, item: "div.timer"})
    }
});
"use strict";
spaced_cli.block.register(43, {
    on_init: function () {
        this.timer = spaced_cli.timer.create({id: this.id, block: this.$block, item: "div.timer"});
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(44, {
    on_init: function () {
        this.timer = spaced_cli.timer.create({id: this.id, block: this.$block, item: "div.timer"});
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(45, {
    on_init: function () {
        spaced_cli.run.is_desktop && this.$block.on("mouseover mouseout", ".item", $.proxy(function (e) {
            var t = $(e.currentTarget), i = t.find(".overlay"), s = 90;
            this.$block.find(".item_list").hasClass("hide_desc") && (s = 65), "mouseover" == e.type ? (t.addClass("hover"), i.css("height", s + parseInt(i.find(".img_text").outerHeight()) + "px")) : (t.removeClass("hover"), i.attr("style", ""))
        }, this))
    }, on_msg: function (e) {
        var t = this.$block.find(".item.hover");
        if (t.length > 0) {
            var i = 90;
            this.$block.find(".item_list").hasClass("hide_desc") && (i = 65);
            var s = t.find(".overlay");
            s.css("height", i + parseInt(s.find(".img_text").outerHeight()) + "px")
        }
    }
});
"use strict";
spaced_cli.block.register(48, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js"],
    on_init: function () {
        var e = this;
        e.row = 3;
        var i = e.$block.find(".slider").addClass("noanimate"), o = e.$block.data("slide_count") || 0, t = !spaced_cli.is_admin && +i.attr("data-slideshow");
        1 == t && (t = 5), e.slider = i.lightSlider({
            item: e.row,
            slideMove: e.row,
            slideMargin: 0,
            useCSS: !0,
            cssEasing: "cubic-bezier(0.76, 0.91, 0.35, 1)",
            speed: 550,
            adaptiveHeight: !0,
            loop: !1,
            cycle: !0,
            auto: t ? 1 : 0,
            pause: 1e3 * t,
            pauseOnHover: !0,
            enableDrag: !1,
            prevHtml: '<div class="button"></div>',
            nextHtml: '<div class="button"></div>',
            responsive: [{breakpoint: 960, settings: {item: 2, slideMove: 2}}, {
                breakpoint: 767,
                settings: {item: 1, slideMove: 1}
            }],
            onAfterSlide: function () {
                var o = e.slider.getCurrentSlideCount() - 1;
                e.$block.data("slide_count", o), i.removeClass("noanimate"), setTimeout(function () {
                    e.slider.refresh()
                }, 100)
            },
            onSliderLoad: function () {
                e.slider.goToSlide(o), spaced_cli.components.image.init(e.$block)
            }
        }), e.$block.find(".item").hover(function (e) {
            $(e.currentTarget).find(".img").addClass("editor_hover")
        }, function (e) {
            $(e.currentTarget).find(".img").removeClass("editor_hover")
        })
    },
    on_msg: function (e, i) {
        var o = this;
        if (o.slider) {
            o.$block.find(".slider");
            setTimeout(function () {
                var t = 0;
                "items_add" == e ? (t = Math.floor(+i.index / o.row), o.slider.goToSlide(t)) : "items_remove" == e ? (t = Math.floor((+i.at - 1) / o.row), t < 0 && (t = 0), o.slider.goToSlide(t)) : "reswiper" == e && o.slider.refresh()
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(49, {
    on_init: function () {
        this.size_render()
    }, size_render: function () {
        function i(i) {
            var e = t.find(".preview_img > img"), n = e.length;
            0 === n && i(), e.each(function (e, t) {
                var r = new Image;
                r.onload = function (e) {
                    n--, 0 === n && i()
                }, r.onerror = function (e) {
                    n--, 0 === n && i()
                }, r.src = $(t).attr("src")
            })
        }

        function e() {
            if ($(window).width() < 767)return t.css({
                position: "relative",
                height: ""
            }), t.find(".item").removeAttr("style"), !1;
            t.css("position", "relative");
            var i, e, r, o, s, a, c = 0, f = [];
            s = parseInt(n.cols || 3), i = t.find(n.item), e = t.outerWidth(), r = parseInt(n.margin || 0), o = parseInt(e / s) - r, a = 1 == s ? -r / 2 : e % (o + r) / 2;
            for (var l = 0; l < s; l++)f.push(-r / 2);
            i.each(function (i, e) {
                var t = $(e), n = $.inArray(Math.min.apply(Math, f), f);
                t.css({
                    width: o,
                    position: "absolute",
                    margin: r / 2,
                    top: f[n] + r / 2,
                    left: (o + r) * n + a
                }), f[n] += t.outerHeight() + r, c < f[n] && (c = f[n])
            }), t.css("height", c + parseInt(r / 2))
        }

        var t = this.$block.find(".item_list"), n = {item: ".item", cols: 3, margin: 10, resizable: !0};
        if (e(), i(function () {
                setTimeout(e, 200)
            }), n.resizable) {
            var r = $(window).on("resize", function () {
                e()
            });
            t.on("remove", r.unbind)
        }
        var o = 0, s = setInterval(function () {
            e(), o++, o >= 50 && clearInterval(s)
        }, 1e3)
    }
});
"use strict";
spaced_cli.block.register(63, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js"], on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(64, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js"], on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400,
            topOffset: 120
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(65, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js"], on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400,
            topOffset: 1
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(66, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js"], on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(67, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js"], on_init: function () {
        var e = this.$block.is($('div[data-b-id="67"]').eq(0));
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), e && this.$block.addClass("mobile"), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(68, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js"], on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }, on_msg: function (e) {
    }
});
"use strict";
spaced_cli.block.register(69, {
    on_init: function () {
        spaced_cli.run.is_mobile && this.$block.find(".parallax").removeClass("parallax")
    }
});
"use strict";
spaced_cli.block.register(70, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js"],
    on_init: function () {
        var e = this, i = e.$block.find(".item_list").hasClass("slidered");
        if (i) {
            var t = e.$block.find(".slider").addClass("noanimate");
            e.row = 2;
            var s = e.$block.data("slide_count") || 0;
            e.slider = t.lightSlider({
                item: e.row,
                slideMove: e.row,
                slideMargin: 50,
                useCss: !0,
                cssEasing: "cubic-bezier(0.76, 0.91, 0.35, 1)",
                speed: 550,
                adaptiveHeight: !0,
                loop: !1,
                auto: !1,
                pauseOnHover: !0,
                enableDrag: !1,
                enableTouch: !0,
                pager: !0,
                controls: !0,
                responsive: [{breakpoint: 960, settings: {slideMargin: 25}}, {
                    breakpoint: 768,
                    settings: {item: 1, slideMove: 1, slideMargin: 0}
                }],
                onAfterSlide: function () {
                    var i = e.slider.getCurrentSlideCount() - 1;
                    e.$block.data("slide_count", parseInt(i)), t.removeClass("noanimate"), setTimeout(function () {
                        e.slider.refresh()
                    }, 100)
                },
                onSliderLoad: function () {
                    e.slider.goToSlide(s), spaced_cli.components.image.init(e.$block)
                }
            }), e.controlKeys()
        }
        e.fixHeight()
    },
    controlKeys: function () {
        var e = this, i = e.$block.find(".slider_act");
        e.$block.find(".prev, .next").click(function (e) {
            var t = $(e.currentTarget).attr("data-action");
            "prev" != t && "next" != t || i.find("a.slider_" + t).trigger("click")
        })
    },
    fixHeight: function () {
        var e = this, i = {}, t = e.$block.find(".item");
        t.each(function () {
            i[this.offsetTop] = i[this.offsetTop] || [], i[this.offsetTop].push(this)
        });
        for (var s in i) {
            var r = i[s], o = 0;
            if ($(".item_data", r).css("min-height", 0), !(r.length <= 1)) {
                for (var n = 0; n < r.length; n++) {
                    var a = $(".item_data", r[n]).outerHeight();
                    o = o < a ? a : o
                }
                $(".item_data", r).css("min-height", o)
            }
        }
        e.slider && e.slider.refresh()
    },
    on_msg: function (e, i) {
        var t = this;
        if (t.slider) {
            t.$block.find(".slider");
            setTimeout(function () {
                var s = 0;
                "items_add" == e ? (s = Math.floor(+i.at / t.row), t.slider.goToSlide(s)) : "items_remove" == e && (s = Math.floor((+i.at - 1) / t.row), t.slider.goToSlide(s)), t.fixHeight()
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(71, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js"],
    on_init: function () {
        var e = this, i = e.$block.find(".slider").addClass("noanimate");
        if (!(i.find("li").length <= 1)) {
            var s = e.$block.data("slide_count") || 0, l = !spaced_cli.is_admin && +i.attr("data-slideshow");
            1 == l && (l = 5), e.slider = i.lightSlider({
                item: 1,
                slideMargin: 0,
                useCSS: !0,
                cssEasing: "cubic-bezier(0.76, 0.91, 0.35, 1)",
                speed: 550,
                adaptiveHeight: !0,
                loop: !1,
                cycle: !0,
                auto: l ? 1 : 0,
                pause: 1e3 * l,
                pauseOnHover: !0,
                enableDrag: !1,
                prevHtml: '<div class="button"></div>',
                nextHtml: '<div class="button"></div>',
                onAfterSlide: function () {
                    e.$block.data("slide_count", e.slider.getCurrentSlideCount() - 1), i.removeClass("noanimate"), setTimeout(function () {
                        e.slider.refresh()
                    }, 100)
                },
                onSliderLoad: function () {
                    e.slider.goToSlide(s), spaced_cli.components.image.init(e.$block)
                }
            })
        }
    },
    on_msg: function (e, i) {
        var s = this;
        if (s.slider) {
            s.$block.find(".slider");
            setTimeout(function () {
                if ("items_add" == e)s.slider.goToSlide(+i.index); else if ("items_remove" == e) {
                    var l = +i.at - 1;
                    l < 0 && (l = 0), s.slider.goToSlide(l)
                }
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(72, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js"],
    on_load: function () {
        var e = this, i = e.$block.find(".slider").addClass("noanimate"), s = e.$block.data("slide_count") || 0, l = !spaced_cli.is_admin && +i.attr("data-slideshow");
        1 == l && (l = 5), e.slider = i.lightSlider({
            item: 1,
            slideMargin: 0,
            useCSS: !0,
            cssEasing: "cubic-bezier(0.76, 0.91, 0.35, 1)",
            speed: 550,
            adaptiveHeight: !0,
            loop: !1,
            cycle: !0,
            auto: l ? 1 : 0,
            pause: 1e3 * l,
            pauseOnHover: !0,
            enableDrag: !1,
            prevHtml: '<div class="button"></div>',
            nextHtml: '<div class="button"></div>',
            onAfterSlide: function () {
                e.$block.data("slide_count", e.slider.getCurrentSlideCount() - 1), i.removeClass("noanimate"), setTimeout(function () {
                    e.slider.refresh()
                }, 100)
            },
            onSliderLoad: function () {
                e.slider.goToSlide(s), spaced_cli.components.image.init(e.$block)
            }
        })
    },
    on_msg: function (e, i) {
        var s = this;
        if (s.slider) {
            s.$block.find(".slider");
            setTimeout(function () {
                if ("items_add" == e)s.slider.goToSlide(i.index); else if ("items_remove" == e) {
                    var l = +i.at - 1;
                    l < 0 && (l = 0), s.slider.goToSlide(l)
                }
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(73, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js", "/_s/css/land/socials.css"],
    on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(74, {
    on_init: function () {
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(75, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js", "/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.css"],
    on_init: function () {
        var e = this;
        e.row = 1;
        var i = e.$block.find(".item_list").hasClass("slidered");
        if (i & !spaced_cli.is_admin) {
            var t = e.$block.find(".slider");
            e.slider = t.lightSlider({
                item: e.row,
                slideMargin: 0,
                useCSS: !0,
                cssEasing: "ease-in-out",
                speed: 1e3,
                adaptiveHeight: !0,
                mode: "fade",
                loop: !0,
                enableDrag: !1,
                pager: !0,
                controls: !1,
                onBeforeSlide: function () {
                    var i = e.slider.getCurrentSlideCount();
                    e.$block.data("slide_count", i);
                    var t = e.$block.find(".slider_pager");
                    i % 2 ? t.removeClass("odd") : t.addClass("odd")
                },
                onSliderLoad: function () {
                }
            }), t.data("slider", e.slider), e.slideShow(), e.fixHeight()
        }
    },
    slideShow: function () {
        var e = this, i = {}, t = e.$block.find(".slider"), o = t.parents(".item_list"), s = 1e3 * t.attr("data-timeout") || 5e3;
        i.init = function () {
            var t = [$(document).scrollTop(), $(document).scrollTop() + $(window).height()], s = [o.offset().top, o.offset().top + o.height()];
            e.inRange(s, t) ? (i.startSlideshow(), i.onHover()) : i.stopSlideshow()
        }, i.startSlideshow = function () {
            t.data("playTimeout") || t.data("playTimeout", setInterval(function () {
                e.slider.goToNextSlide()
            }, s))
        }, i.stopSlideshow = function () {
            clearInterval(t.data("playTimeout")), t.data("playTimeout", "")
        }, i.onHover = function () {
            t.off("hover"), t.hover(function () {
                i.stopSlideshow()
            }, function () {
                i.startSlideshow()
            })
        }, $(document).on("scroll", function () {
            i.init()
        }), i.init()
    },
    inRange: function (e, i) {
        for (var t = e[0]; t <= e[1]; t++)if (t >= i[0] && t <= i[1])return !0;
        return !1
    },
    fixHeight: function () {
        var e = this, i = [], t = e.$block.find(".item"), o = 0;
        t.each(function () {
            i.push(this)
        }), $(".item_data", i).css("height", 0);
        for (var s = 0; s < i.length; s++) {
            var n = $(".item_data", i[s]).outerHeight();
            o = o < n ? n : o
        }
        $(".item_data", i).css("height", o)
    }
});
"use strict";
spaced_cli.block.register(76, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js", "/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.css"],
    on_init: function () {
        var e = this;
        e.row = 1;
        var i = e.$block.data("slide_count") || 0, r = e.$block.find(".slider").addClass("noanimate");
        e.slider = r.lightSlider({
            item: e.row,
            slideMargin: 0,
            useCSS: !0,
            cssEasing: "cubic-bezier(.76,.07,.56,.56)",
            speed: 500,
            adaptiveHeight: !0,
            mode: "slide",
            loop: !1,
            cycle: !0,
            enableDrag: !1,
            pager: !0,
            controls: !0,
            onSliderLoad: function () {
                e.slider.goToSlide(i), spaced_cli.components.image.init(e.$block), e.setPager(), e.slider.refresh()
            },
            onBeforeSlide: function () {
                e.setPager()
            },
            onAfterSlide: function () {
                var i = +e.slider.getCurrentSlideCount() - 1;
                e.$block.data("slide_count", i), r.removeClass("noanimate")
            }
        }), e.controlKeys(), e.pagerClick()
    },
    controlKeys: function () {
        var e = this, i = e.$block.find(".slider_act");
        e.$block.find(".prev, .next").click(function (e) {
            var r = $(e.currentTarget).attr("data-action");
            "prev" != r && "next" != r || i.find("a.slider_" + r).trigger("click")
        })
    },
    setPager: function () {
        var e = this, i = (e.$block.find(".slider"), e.slider.getCurrentSlideCount());
        e.$block.find(".slider-pager .page-item").removeClass("active"), e.$block.find(".slider-pager .page-item[data-item-id=" + i + "]").addClass("active")
    },
    pagerClick: function () {
        var e = this;
        e.$block.find(".page-item").on("click", function () {
            var i = +$(this).data("itemId") - 1;
            e.slider.goToSlide(i)
        })
    },
    on_msg: function (e, i) {
        var r = this;
        if (r.slider) {
            r.$block.find(".slider");
            setTimeout(function () {
                "items_add" == e ? r.slider.goToSlide(i.at) : "items_remove" == e && r.slider.goToSlide(i.at - 1)
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(77, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js", "/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.css"],
    on_init: function () {
        var e = this;
        e.row = 1;
        var i = e.$block.data("slide_count") || 0, r = e.$block.find(".slider").addClass("noanimate");
        e.slider = r.lightSlider({
            item: e.row,
            slideMargin: 0,
            useCSS: !0,
            cssEasing: "cubic-bezier(.76,.07,.56,.56)",
            speed: 500,
            adaptiveHeight: !0,
            mode: "slide",
            loop: !1,
            cycle: !0,
            enableDrag: !1,
            pager: !0,
            controls: !0,
            onSliderLoad: function () {
                e.slider.goToSlide(i), spaced_cli.components.image.init(e.$block), e.setPager(), e.slider.refresh()
            },
            onBeforeSlide: function () {
                e.setPager()
            },
            onAfterSlide: function () {
                var i = +e.slider.getCurrentSlideCount() - 1;
                e.$block.data("slide_count", i), r.removeClass("noanimate")
            }
        }), e.controlKeys(), e.pagerClick()
    },
    controlKeys: function () {
        var e = this, i = e.$block.find(".slider_act");
        e.$block.find(".prev, .next").click(function (e) {
            var r = $(e.currentTarget).attr("data-action");
            "prev" != r && "next" != r || i.find("a.slider_" + r).trigger("click")
        })
    },
    setPager: function () {
        var e = this, i = (e.$block.find(".slider"), e.slider.getCurrentSlideCount());
        e.$block.find(".slider-pager .page-item").removeClass("active"), e.$block.find(".slider-pager .page-item[data-item-id=" + i + "]").addClass("active")
    },
    pagerClick: function () {
        var e = this;
        e.$block.find(".page-item").on("click", function () {
            var i = +$(this).data("itemId") - 1;
            e.slider.goToSlide(i)
        })
    },
    on_msg: function (e, i) {
        var r = this;
        if (r.slider) {
            r.$block.find(".slider");
            setTimeout(function () {
                "items_add" == e ? r.slider.goToSlide(i.at) : "items_remove" == e && r.slider.goToSlide(i.at - 1)
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(78, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js", "/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.css"],
    on_init: function () {
        var e = this;
        e.row = 1;
        var i = e.$block.data("slide_count") || 0, r = e.$block.find(".slider").addClass("noanimate");
        e.slider = r.lightSlider({
            item: e.row,
            slideMargin: 0,
            useCSS: !0,
            cssEasing: "cubic-bezier(.76,.07,.56,.56)",
            speed: 500,
            adaptiveHeight: !0,
            mode: "slide",
            loop: !1,
            cycle: !0,
            enableDrag: !1,
            pager: !0,
            controls: !0,
            onSliderLoad: function () {
                e.slider.goToSlide(i), spaced_cli.components.image.init(e.$block), e.slider.refresh()
            },
            onAfterSlide: function () {
                var i = +e.slider.getCurrentSlideCount() - 1;
                e.$block.data("slide_count", i), r.removeClass("noanimate")
            }
        }), e.controlKeys()
    },
    controlKeys: function () {
        var e = this, i = e.$block.find(".slider_act");
        e.$block.find(".prev, .next").click(function (e) {
            var r = $(e.currentTarget).attr("data-action");
            "prev" != r && "next" != r || i.find("a.slider_" + r).trigger("click")
        })
    },
    on_msg: function (e, i) {
        var r = this;
        if (r.slider) {
            r.$block.find(".slider");
            setTimeout(function () {
                "items_add" == e ? r.slider.goToSlide(i.at) : "items_remove" == e && r.slider.goToSlide(i.at - 1)
            }, 150)
        }
    }
});
"use strict";
spaced_cli.block.register(79, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js", "/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.css"],
    on_init: function () {
        var e = this;
        e.row = 1;
        var i = e.$block.data("slide_count") || 0, r = e.$block.find(".slider").addClass("noanimate");
        e.slider = r.lightSlider({
            item: e.row,
            slideMargin: 0,
            useCSS: !0,
            cssEasing: "cubic-bezier(.76,.07,.56,.56)",
            speed: 500,
            adaptiveHeight: !0,
            mode: "slide",
            loop: !1,
            cycle: !0,
            enableDrag: !1,
            pager: !1,
            controls: !0,
            onSliderLoad: function () {
                e.slider.goToSlide(i), spaced_cli.components.image.init(e.$block), e.slider.refresh()
            },
            onAfterSlide: function () {
                var i = +e.slider.getCurrentSlideCount() - 1;
                e.$block.data("slide_count", i), r.removeClass("noanimate")
            }
        }), e.controlKeys()
    },
    controlKeys: function () {
        var e = this, i = e.$block.find(".slider_act");
        e.$block.find(".prev, .next").click(function (e) {
            var r = $(e.currentTarget).attr("data-action");
            "prev" != r && "next" != r || i.find("a.slider_" + r).trigger("click")
        })
    },
    on_msg: function (e, i) {
        var r = this;
        if (r.slider) {
            r.$block.find(".slider");
            setTimeout(function () {
                "items_add" == e ? r.slider.goToSlide(i.at) : "items_remove" == e && r.slider.goToSlide(i.at - 1)
            }, 150)
        }
    }
});
"use strict";
"use strict";
spaced_cli.block.register(80, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js", "/_s/css/land/socials.css"],
    on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(81, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js", "/_s/css/land/socials.css"],
    on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(82, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js", "/_s/css/land/socials.css"],
    on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(83, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js", "/_s/css/land/socials.css"],
    on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(84, {
    require: ["/_s/lib/spaced/flexbeMenu/jquery.flexbeMenu.js", "/_s/css/land/socials.css"],
    on_init: function () {
        "undefined" == typeof this.$block.menu && (this.$block.menu = new spaced_cli.menu), this.$block.menu.init({
            menu: ".menu",
            scrollSpeed: 400
        }, this.$block), this.$block.find(".mobile-menu-button a").flexbeMenu({})
    }
});
"use strict";
spaced_cli.block.register(85, {require: ["/_s/css/land/socials.css"]});
"use strict";
spaced_cli.block.register(86, {require: ["/_s/css/land/socials.css"]});
"use strict";
spaced_cli.block.register(87, {require: ["/_s/css/land/socials.css"]});
"use strict";
spaced_cli.block.register(88, {require: ["/_s/css/land/socials.css"]});
"use strict";
spaced_cli.block.register(89, {require: ["/_s/css/land/socials.css"]});
"use strict";
spaced_cli.block.register(9, {
    require: ["/_s/lib/spaced/flexbeSlider/jquery.flexbeSlider.new.js"],
    on_init: function () {
        var e = this, i = e.$block.find(".item_list").hasClass("slidered");
        if (i) {
            var o = e.$block.find(".slider").addClass("noanimate");
            e.row = 3;
            var t = e.$block.data("slide_count") || 0;
            e.slider = o.lightSlider({
                item: e.row,
                slideMove: e.row,
                slideMargin: 0,
                useCss: !0,
                cssEasing: "cubic-bezier(0.76, 0.91, 0.35, 1)",
                speed: 550,
                adaptiveHeight: !0,
                loop: !1,
                auto: !1,
                pause: 4e3,
                pauseOnHover: !0,
                enableDrag: !1,
                enableTouch: !0,
                pager: !0,
                controls: !0,
                responsive: [{breakpoint: 960, settings: {item: 2, slideMove: 2}}, {
                    breakpoint: 768,
                    settings: {item: 1, slideMove: 1}
                }],
                onAfterSlide: function () {
                    var i = e.slider.getCurrentSlideCount() - 1;
                    e.$block.data("slide_count", i), o.removeClass("noanimate"), setTimeout(function () {
                        e.slider.refresh()
                    }, 100)
                },
                onSliderLoad: function () {
                    e.slider.goToSlide(t), spaced_cli.components.image.init(e.$block)
                }
            }), e.controlKeys()
        }
    },
    controlKeys: function () {
        var e = this, i = e.$block.find(".slider_act");
        e.$block.find(".prev, .next").click(function (e) {
            var o = $(e.currentTarget).attr("data-action");
            "prev" != o && "next" != o || i.find("a.slider_" + o).trigger("click")
        })
    },
    on_msg: function (e, i) {
        var o = this;
        o.slider && setTimeout(function () {
            var t = 0;
            "items_add" == e ? (t = Math.floor(+i.at / o.row), o.slider.goToSlide(t)) : "items_remove" == e && (t = Math.floor((+i.at - 1) / o.row), o.slider.goToSlide(t))
        }, 150)
    }
});
"use strict";
spaced_cli.block.register(90, {require: ["/_s/css/land/socials.css"]});
"use strict";
spaced_cli.block.register(93, {
    on_init: function () {
    }
});
"use strict";
spaced_cli.block.register(94, {
    on_init: function () {
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(95, {
    on_init: function () {
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(96, {
    on_init: function () {
        var i = this.$block.attr("data-id"), t = this.$block.find(".form_field_submit").attr("data-modal-id");
        this.form = spaced_cli.form.create({id: this.id, block: this.$block, form: "div.form", form_done: i + "_" + t})
    }
});
"use strict";
spaced_cli.block.register(99, {
    on_init: function () {
        this.fix_height()
    }, on_msg: function (i, t) {
        "on_change" == i && this.fix_height()
    }, fix_height: function () {
        if (!(window.innerWidth <= 768)) {
            var i = 0;
            this.$block.find(".item").each(function (t, n) {
                $(n).css("min-height", "");
                var h = $(n).outerHeight();
                $(n).hasClass("active") && (h -= 30), i = h >= i ? h : i
            }), this.$block.find(".item").not(".active").css("min-height", i + "px"), this.$block.find(".item.active").css("min-height", i + 30 + "px")
        }
    }
});
"use strict";
spaced_cli.modal.register(1, {
    on_init: function () {
        var i = this.$modal.attr("data-id"), o = this.$modal.find(".form_field_submit").attr("data-modal-id");
        i = parseInt(i.split("_")[0]), this.form = spaced_cli.form.create({
            id: this.id,
            block: this.$modal,
            form: "div.form",
            form_done: i + "_" + o
        })
    }, on_open: function (i) {
        var o = this;
        i && i.fields && this.form.add_fields(i.fields), i && i.items && this.form.add_items(i.items), this.form_position(), $(window).off("resize.modal").on("resize.modal", function () {
            o.form_position()
        })
    }, on_close: function () {
        $(window).off("resize.modal")
    }, form_position: function () {
        var i = this.$modal.find(".modal-data"), o = i.find(".form"), t = i.outerHeight() - o.outerHeight();
        t > 10 && window.innerWidth <= 768 ? o.css({top: t / 2}) : o.css({top: 0})
    }
});
"use strict";
spaced_cli.modal.register(100, {
    types: {}, pay_id: "", hash: "", selectors: {}, on_init: function () {
        var t = this;
        this.start(), spaced_cli.events.on("pay", function (s, a) {
            a && "init" == a.action && t.start()
        })
    }, start: function () {
        this.loadSelectors();
        var t = this.getQueryParams();
        if (t) {
            switch (t) {
                case"success":
                    this.showSuccessAlert();
                    break;
                case"fail":
                    this.showFailAlert();
                    break;
                case"pay":
                    this.getBill()
            }
            setTimeout(function () {
                spaced_cli.modal.open("pay")
            }, 300)
        }
    }, loadSelectors: function () {
        this.selectors.$title = this.$modal.find(".modal-title"), this.selectors.$container = this.$modal.find(".container"), this.selectors.$bill = this.$modal.find(".action-bill"), this.selectors.$cash = this.$modal.find(".action-cash"), this.selectors.$already = this.$modal.find(".action-already"), this.selectors.$success = this.$modal.find(".action-success"), this.selectors.$fail = this.$modal.find(".action-fail")
    }, getQueryParams: function () {
        var t = !1;
        try {
            t = JSON.parse('{"' + decodeURI(location.search.substring(1)).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"') + '"}')
        } catch (s) {
        }
        if (!t.pay_id)return !1;
        if (this.pay_id = t.pay_id, this.hash = t.h, t.pay_status) {
            try {
                history.pushState(null, null, window.location.pathname)
            } catch (s) {
            }
            return t.pay_status
        }
        return "pay"
    }, getBill: function () {
        var t = this;
        this.pay_id && this.pay_id !== !1 && $.ajax({
            url: "/mod/pay/ajax",
            type: "GET",
            dataType: "json",
            data: {act: "payData", pay_id: this.pay_id, hash: this.hash}
        }).done(function (s) {
            return 0 !== s.status && (t.types = s.pay.support_types, void(2 == s.pay.pay_status ? t.showAlreadyPayed(s.pay) : t.cashonly() ? t.showCashInstruction(s.pay) : t.showBillForm(s.pay)))
        })
    }, showBillForm: function (t) {
        var s = this;
        this.selectors.$container.attr("data-type", "bill");
        var a = this.selectors.$bill.find(".pay-methods-list").empty(), e = this.selectors.$bill.find(".overview"), i = this.selectors.$bill.find(".pay-action");
        for (var n in this.types) {
            var c = this.types[n];
            if (c.name) {
                var o = '<label class="item" data-type="' + n + '" title="' + c.name + '">\n                                <div class="preview"><i></i></div>\n                                <div class="value"><input type="radio" name="form[pay_method]" value="' + n + '"></div>\n                                <span>' + c.name + "</span>\n                            </label>";
                a.append(o)
            }
        }
        this.selectors.$title.text("Оплата счета №" + t.pay_id), e.find(".price > span").text(t.pay_sum), i.find(".btn-wrap a").on("click", function (t) {
            var e = a.find("input:checked").val();
            if (!e)return alert("Выберите способ оплаты"), !1;
            if ("cash" == e)return s.showCashInstruction(), !1;
            var i = "/mod/pay/?pay_type=" + e + "&pay_id=" + s.pay_id + "&h=" + s.hash;
            $(t.currentTarget).attr("href", i), $(t.currentTarget).addClass("busy")
        })
    }, showCashInstruction: function () {
        this.selectors.$container.attr("data-type", "cash"), this.selectors.$title.text(""), this.types.cash && this.types.cash.instruction && this.selectors.$cash.find(".text").text(this.types.cash.instruction), $.ajax({
            url: "/mod/pay/ajax",
            type: "GET",
            dataType: "json",
            data: {act: "selectCash", pay_id: this.pay_id, hash: this.hash}
        })
    }, showAlreadyPayed: function (t) {
        this.selectors.$container.attr("data-type", "already");
        var s = this.selectors.$already.find(".pay-action"), a = "";
        "0" != t.pay_time_done && (a = t.pay_time_done), this.selectors.$title.text("Оплата счета №" + t.pay_id), s.find(".status .date").text(a), s.find(".pay-summ").text(t.pay_sum), s.find(".pay-method").text(t.pay_method_name)
    }, showSuccessAlert: function () {
        this.selectors.$title.text(""), this.selectors.$container.attr("data-type", "success"), spaced_cli.stat.reach_goal("pay_done")
    }, showFailAlert: function () {
        var t = this;
        this.selectors.$title.text(""), this.selectors.$container.attr("data-type", "fail"), this.selectors.$fail.find("a").off("click").on("click", function () {
            t.getBill()
        })
    }, cashonly: function () {
        return !(!this.types.cash || 1 != Object.keys(this.types).length)
    }
});
"use strict";
spaced_cli.modal.register(2, {
    on_init: function () {
        var i = this.$modal.attr("data-id"), o = this.$modal.find(".form_field_submit").attr("data-modal-id");
        i = parseInt(i.split("_")[0]), this.form = spaced_cli.form.create({
            id: this.id,
            block: this.$modal,
            form: "div.form",
            form_done: i + "_" + o
        })
    }, on_open: function (i) {
        var o = this;
        i && i.fields && this.form.add_fields(i.fields), i && i.items && this.form.add_items(i.items), this.form_position(), $(window).off("resize.modal").on("resize.modal", function () {
            o.form_position()
        })
    }, on_close: function () {
        $(window).off("resize.modal")
    }, form_position: function () {
        var i = this.$modal.find(".modal-data"), o = i.find(".form"), t = i.outerHeight() - o.outerHeight();
        t > 10 && window.innerWidth <= 768 ? o.css({top: t / 2}) : o.css({top: 0})
    }
});
"use strict";
spaced_cli.modal.register(3, {
    on_init: function () {
        var i = this.$modal.attr("data-id"), o = this.$modal.find(".form_field_submit").attr("data-modal-id");
        i = parseInt(i.split("_")[0]), this.form = spaced_cli.form.create({
            id: this.id,
            block: this.$modal,
            form: "div.form",
            form_done: i + "_" + o
        })
    }, on_open: function (i) {
        var o = this;
        i && i.fields && this.form.add_fields(i.fields), i && i.items && this.form.add_items(i.items), this.form_position(), $(window).off("resize.modal").on("resize.modal", function () {
            o.form_position()
        })
    }, on_close: function () {
        $(window).off("resize.modal")
    }, form_position: function () {
        var i = this.$modal.find(".modal-data"), o = i.find(".form"), t = i.outerHeight() - o.outerHeight();
        t > 10 && window.innerWidth <= 768 ? o.css({top: t / 2}) : o.css({top: 0})
    }
});
"use strict";
spaced_cli.widget.register(1, {
    list: [],
    $list: null,
    $sum: null,
    $button: null,
    is_open: !1,
    is_expend: !1,
    on_init: function () {
        this.$container = this.$widget.find(".widget-container"), this.$list = this.$widget.find(".order-list > ul"), this.$sum = this.$widget.find(".checkout .price"), this.$button = this.$widget.find(".cart-button"), this.events(), spaced_cli.is_admin ? this.list = [{
            id: "7832324_1",
            count: 1,
            img: "/img/1000000945_200/img.jpg",
            title: "Тестовый товар 1",
            price: 750
        }, {
            id: "7832464_2",
            count: 2,
            img: "/img/1000000948_200/img.jpg",
            title: "Тестовый товар 2",
            price: 2550
        }] : (this.loadFromStorage(), this.form_init()), this.renderList()
    },
    on_update: function () {
        this.on_init(), this.is_open && (this.$container.addClass("fade-in noanimate"), this.open(), this.expend && this.$container.addClass("state-1 state-2"))
    },
    form_init: function () {
        var t = this;
        this.form = spaced_cli.form.create({
            id: this.id,
            block: this.$widget,
            form: ".component-form",
            form_done: this.id + "_done",
            before_send: function () {
                t.form && t.form.add_items(t.list)
            },
            after_send: function () {
                spaced_cli.stat.ecommerce.purchase(t.list), t.list = [], t.renderList(), t.close()
            }
        })
    },
    events: function () {
        var t = this;
        spaced_cli.events.off("cart_command.w1").on("cart_command.w1", function (i, e) {
            if (e)switch (e.command) {
                case"toggle":
                    t.is_open ? t.close() : t.open();
                    break;
                case"open":
                    t.open();
                    break;
                case"close":
                    t.close();
                    break;
                case"add":
                    t.add(e.item);
                    break;
                case"remove":
                    t.remove(e.id)
            }
        }), this.$widget.off("click.cart-button").on("click.cart-button", ".cart-button", function () {
            var i = t.$container.hasClass("show");
            i ? t.close() : t.open()
        }), this.$list.off("click").on("click", "[data-action]", function (i) {
            var e = $(i.currentTarget).closest("li"), n = $(i.currentTarget).data("action"), s = e.data("id");
            s && ("remove" == n ? t.remove(s) : t.updateCount(s, n))
        }), this.$list.off("input").on("input", ".count", function (i) {
            var e = $(i.currentTarget).closest("li").attr("data-id"), n = +i.target.value;
            n || (n = 1, $(i.currentTarget).val(1)), t.updateCount(e, n)
        }), this.$container.find(".cart-container .button").off("click").on("click", function () {
            t.animateForm()
        }), this.$container.off("click.times-close").on("click.times-close", "a.close, > .overlay", function () {
            t.close()
        }), $(document).off("keyup.cart_esc_close").on("keyup.cart_esc_close", function (i) {
            27 == i.which && t.close()
        })
    },
    open: function () {
        var t = this;
        this.is_open = !0, spaced_cli.is_admin ? (this.$container.addClass("is-editor"), $(".container-list").addClass("editor_stop")) : this.loadFromStorage(), this.renderList(), spaced_cli.is_admin && this.$container.addClass("is-editor"), $("body").addClass("overflow"), $(".container-list").addClass("editor_stop"), this.$container.addClass("show"), setTimeout(function () {
            t.$container.addClass("fade-in"), t.$list[0].offsetHeight > spaced_cli.resize.height && t.$container.find(".container").css("height", "auto")
        }, 50), setTimeout(function () {
            t.$container.removeClass("noanimate")
        }, 300)
    },
    close: function () {
        var t = this;
        $(window).off("keyup.cart_esc_close"), this.is_open && (this.is_open = !1, this.expend = !1, this.$container.hasClass("state-2") ? this.$container.addClass("fade-out") : this.$container.removeClass("fade-in"), setTimeout(function () {
            t.$container.removeClass("show fade-in fade-out noanimate state-1 state-2"), t.$widget.find(".container, .form-container, .cart-container, .form-holder, .button").removeAttr("style"), $("body").removeClass("overflow"), $(".container-list").removeClass("editor_stop"), $(".mobile-menu .menu-burger").addClass("animate show")
        }, 300))
    },
    animateForm: function (t) {
        var i = this, e = this.$container.find(".container"), n = e.find(".form-container"), s = e.find(".cart-container");
        this.expend = !0, spaced_cli.run.is_screen_tablet_s || spaced_cli.run.is_screen_mobile ? (this.$container.addClass("state-1"), e.height(Math.max(n.outerHeight(), s.outerHeight())), setTimeout(function () {
            i.$container.addClass("state-2"), i.$container.scrollTop(0)
        }, t ? 50 : 0)) : !function () {
            e.addClass("recalculate");
            var n = e[0].offsetHeight + "px";
            e.removeClass("recalculate"), i.$container.addClass("state-1"), setTimeout(function () {
                e.css("height", n), i.$container.addClass("state-2"), i.$container.scrollTop(0)
            }, t ? 10 : 0)
        }()
    },
    add: function (t) {
        var i = this, e = !(arguments.length <= 1 || void 0 === arguments[1]) && arguments[1];
        if ((!this.is_open || e) && t) {
            t.count = parseInt(t.count, 10) || 1, t.price = parseFloat(t.price) || 0;
            var n = !1;
            this.list && this.list.length && (this.list = this.list.map(function (i) {
                return i.id == t.id && (i.count += t.count, n = !0), i
            })), n || this.list.push(t), spaced_cli.stat.ecommerce.add(t.id, t.title, t.count, t.price), spaced_cli.stat.reach_goal("add_to_cart", t), this.renderList(), 1 === this.list.length && 1 === this.list[0].count && setTimeout(function () {
                i.open()
            }, 200), this.$button.removeClass("blink"), setTimeout(function () {
                i.$button.addClass("blink")
            }, 50)
        }
    },
    remove: function () {
        var t = !(arguments.length <= 0 || void 0 === arguments[0]) && arguments[0];
        if (t !== !1) {
            var i = this.list.filter(function (i) {
                return i.id == t
            })[0];
            spaced_cli.stat.ecommerce.remove(i.id, i.title), this.list = this.list.filter(function (i) {
                return i.id != t
            }), this.renderList()
        }
    },
    updateCount: function () {
        var t = this, i = !(arguments.length <= 0 || void 0 === arguments[0]) && arguments[0], e = arguments.length <= 1 || void 0 === arguments[1] ? "+" : arguments[1];
        i !== !1 && (this.list && this.list.length && (this.list = this.list.map(function (n) {
            if (n.id == i) {
                "+" == e ? n.count += 1 : "-" == e && n.count > 1 ? n.count -= 1 : (e = parseInt(e, 10), n.count = e ? e : 1), n.count = Math.floor(n.count) || 1;
                var s = t.$list.find('[data-id="' + i + '"]');
                s.find(".price").text(t.formatPrice(n.count * n.price)), "-" !== e && "+" !== e || s.find(".count").val(n.count), spaced_cli.stat.ecommerce.add(n.id, n.title, n.count, n.price)
            }
            return n
        })), this.saveToStorage(), this.renderCount())
    },
    renderList: function () {
        var t = this, i = function (i) {
            return '<li data-id="' + i.id + '">\n            <div class="img-holder">\n                <div class="img" ' + (i.img && 'style="background-image: url(' + i.img + ')"') + '></div>\n            </div>\n            <div class="item-holder">\n                <div class="top">\n                    <div class="item-title">' + i.title + '</div>\n                    <button data-action="remove"><svg viewBox="0 0 13 16"><path d="M12 5v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h3V.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5V2h3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1zM2 5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V5H2v.5zM8 1H5v1h3V1zm3.5 2h-10a.5.5 0 0 0 0 1h10a.5.5 0 0 0 0-1z" fill-rule="evenodd"/></svg></button>\n                </div>\n                <div class="bottom">\n                    <div class="item-count">\n                        <button data-action="-"><svg viewBox="0 0 10 1"><path d="M.357 0h9.286a.357.357 0 0 1 0 .715H.357a.357.357 0 0 1 0-.715z" fill-rule="evenodd"/></svg></button>\n\t\t\t\t\t\t<input type="number" class="count" min="1" value="' + i.count + '"/>\n                        <button data-action="+"><svg viewBox="0 0 10 10"><path d="M5.357 5.357v4.286a.357.357 0 0 1-.714 0V5.357H.357a.357.357 0 0 1 0-.714h4.286V.357a.357.357 0 0 1 .714 0v4.286h4.286a.357.357 0 0 1 0 .715H5.357z" fill-rule="evenodd"/></svg></button>\n                    </div>\n\n                    <div class="item-price">\n                        <span class="price">' + t.formatPrice(i.price * i.count) + '</span>\n                        <span class="curr">' + spaced_cli.lang.currency + "</span>\n                    </div>\n                </div>\n            </div>\n        </li>"
        };
        this.saveToStorage(), this.renderCount();
        var e = "";
        this.list.length && this.list.forEach(function (t) {
            e += i(t)
        }), this.$list.html(e), this.$container.find(".cart-container").toggleClass("empty", 0 === this.list.length), this.form && this.form.add_items(this.list)
    },
    renderCount: function () {
        var t = 0, i = 0;
        this.list.length && this.list.forEach(function (e) {
            e.count && (t += parseInt(e.count, 10), e.price && (i += parseInt(e.count, 10) * parseFloat(e.price)))
        }), this.$sum.text(this.formatPrice(i)), this.$button.attr("data-count", t)
    },
    formatPrice: function (t) {
        return t = String(t).replace(",", ".").replace(/[^0-9.]/g, ""), t = t.split("."), t[0] = chunkSplit(t[0]), t[1] && (t[1] = t[1].length < 2 ? t[1] += "0" : t[1].substr(0, 2)), t.length > 2 && (t = t.splice(0, 2)), t.join(".")
    },
    loadFromStorage: function () {
        if (!spaced_cli.is_admin && localStorage)try {
            var t = JSON.parse(localStorage.getItem("f_cart"));
            t && t instanceof Array && (this.list = t)
        } catch (i) {
        }
    },
    saveToStorage: function () {
        if (!spaced_cli.is_admin && localStorage)if (this.list && this.list instanceof Array)try {
            localStorage.setItem("f_cart", JSON.stringify(this.list))
        } catch (t) {
        } else this.list = []
    }
});