!function (t) {
    function e(n) {
        if (i[n])return i[n].exports;
        var o = i[n] = {i: n, l: !1, exports: {}};
        return t[n].call(o.exports, o, o.exports, e), o.l = !0, o.exports
    }

    var i = {};
    return e.m = t, e.c = i, e.i = function (t) {
        return t
    }, e.d = function (t, e, i) {
        Object.defineProperty(t, e, {configurable: !1, enumerable: !0, get: i})
    }, e.n = function (t) {
        var i = t && t.__esModule ? function () {
            return t["default"]
        } : function () {
            return t
        };
        return e.d(i, "a", i), i
    }, e.o = function (t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, e.p = "", e(e.s = 0)
}([function (t, e) {
    function i(t) {
        var e = {
            Android: function () {
                return navigator.userAgent.match(/Android/i)
            }, BlackBerry: function () {
                return navigator.userAgent.match(/BlackBerry/i)
            }, iOS: function () {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i)
            }, Opera: function () {
                return navigator.userAgent.match(/Opera Mini/i)
            }, Windows: function () {
                return navigator.userAgent.match(/IEMobile/i)
            }, any: function () {
                return e.Android() || e.BlackBerry() || e.iOS() || e.Opera() || e.Windows()
            }
        }, i = {
            extendObject: function (t, e) {
                for (prop in e)t[prop] = e[prop];
                return t
            }, proto: "https://"
        }, o = i.extendObject({widget_id: 0, survey_id: 0, domain: "borisbot.com", bg_color: "transparent"}, t);
        o.widget_url = [i.proto, o.domain, "/survey/", o.survey_id, "/chat?", "widget_id=", o.widget_id].join(""), o.widget_url += "#" + encodeURIComponent(document.location.href);
        var r = {
            created: !1,
            widgetElement: null,
            buttonElement: null,
            widgetOpen: !1,
            widgetHeight: 0,
            widgetWidth: 0,
            widgetRight: 16,
            widgetBottom: 110,
            hasTriggers: !1,
            triggers: [],
            eventsIntervals: [],
            butImg: null,
            setWidgetHeight: function (t) {
                "undefined" == typeof t && (t = e.any() || window.innerHeight <= 562 ? window.innerHeight : 562), r.widgetHeight = t
            },
            setWidgetWidth: function (t) {
                "undefined" == typeof t && (t = e.any() || window.innerWidth <= 370 ? window.innerWidth : 370), r.widgetWidth = t
            },
            setWidgetRight: function () {
                r.widgetRight = e.any() || window.innerWidth < 450 ? 0 : 16
            },
            setWidgetBottom: function (t) {
                return "undefined" != typeof t ? r.widgetBottom = t : void(r.widgetBottom = e.any() || window.innerHeight < 650 ? 0 : 110)
            },
            setElWidgetHeight: function () {
                document.getElementById("surveybot_widget_iframe").height = r.widgetHeight, document.getElementById("surveybot_widget_container").style.height = r.widgetHeight + "px", this.sendMessage({styles: {widgetHeight: r.widgetHeight}})
            },
            setElWidgetWidth: function () {
                document.getElementById("surveybot_widget_container").style.width = r.widgetWidth + "px", this.sendMessage({styles: {widgetWidth: r.widgetWidth}})
            },
            setElWidgetRight: function () {
                document.getElementById("surveybot_widget_container").style.right = r.widgetRight + "px", this.sendMessage({styles: {widgetRight: r.widgetRight}}), 0 === r.widgetRight && r.widgetOpen ? document.getElementById("surveybot_widget_container").style.left = "0" : document.getElementById("surveybot_widget_container").style.left = "auto"
            },
            setElWidgetBottom: function () {
                document.getElementById("surveybot_widget_container").style.bottom = r.widgetBottom + "px", this.sendMessage({styles: {widgetBottom: r.widgetBottom}}), 0 === r.widgetBottom && r.widgetOpen ? document.getElementById("surveybot_widget_container").style.top = "0" : document.getElementById("surveybot_widget_container").style.top = "auto"
            },
            setWidgetSized: function (t, e, i) {
                this.setWidgetWidth(t), this.setWidgetHeight(e), this.setWidgetRight(), this.setWidgetBottom(i), this.setElWidgetWidth(), this.setElWidgetHeight(), this.setElWidgetRight(), this.setElWidgetBottom()
            },
            getIframeWindow: function () {
                var t = document.getElementById("surveybot_widget_iframe"), e = t.contentWindow || t;
                return e
            },
            show: function () {
                this.created || (this.styleSheet = document.createElement("style"), this.styleSheet.type = "text/css", this.styleSheet.innerHTML = ".fixedBody {position:fixed;width:100%;height:100%;overflow:hidden;}.surveybot_widget_container {position:fixed;width:0;z-index:4999;background-color:transparent;overflow:hidden;border-radius:7px;border:none;outline:none;}.surveybot_widget_button {position:fixed;right:20px;bottom:20px;width:80px;z-index:5000;cursor:pointer;}@media screen and (max-width: 460px) {.surveybot_widget_container {border-radius:0;box-shadow:none;}}", document.getElementsByTagName("head")[0].appendChild(this.styleSheet), this.widgetElement = document.createElement("div"), this.widgetElement.setAttribute("id", "surveybot_widget_container"), this.widgetElement.setAttribute("class", "surveybot_widget_container"), this.widgetElement.setAttribute("frameborder", 0), this.widgetElement.style.right = r.widgetRight, this.widgetElement.style.bottom = r.widgetBottom, this.widgetElement.style.border = "none", this.widgetElement.style.outline = "none", this.widgetElement.innerHTML = '                 <iframe id="surveybot_widget_iframe" src="' + o.widget_url + '" width="100%" height="100%" frameborder="0" scrolling="no" allow="geolocation" allowfullscreen></iframe>', this.buttonElement = document.createElement("div"), this.buttonElement.setAttribute("id", "surveybot_widget_button"), this.buttonElement.setAttribute("class", "surveybot_widget_button"), this.buttonElement.innerHTML = '                 <div style="position: absolute; bottom: 6px; right: 6px; border-radius: 50%; background-color: ' + o.bg_color + '; width: 67px; height:67px;"></div><img id="widget_button_img" src="https://borisbot.com/img/all_transparent_logo.png" style="position: absolute; bottom: 0; width: 100%;">', window.addEventListener ? (this.buttonElement.addEventListener("click", r.toggleWidget), window.addEventListener("resize", r.resizeWidget)) : (this.buttonElement.attachEvent("onclick", r.toggleWidget), window.attachEvent("onresize", r.resizeWidget)), document.body.insertBefore(this.widgetElement, document.body.nextSibling), document.body.insertBefore(this.buttonElement, document.body.nextSibling), r.setWidgetSized(0, 0, 110), this.created = !0, this.buttonImgDiv = document.querySelector("#surveybot_widget_button #widget_button_img"))
            },
            toggleWidget: function () {
                if (document.getElementById("surveybot_widget_iframe")) {
                    var t = document.createElement("meta");
                    t.name = "viewport", t.content = "width=device-width, initial-scale=1.0", t.id = "botView", r.setWidgetHeight(r.triggersMaxHeight), r.setWidgetWidth(r.triggersMaxWidth), r.widgetOpen = !r.widgetOpen, r.sendMessage({widgetOpen: r.widgetOpen}), r.bodyFixedToggle(), r.widgetOpen ? (document.getElementsByTagName("head")[0].appendChild(t), document.getElementById("surveybot_widget_container").style["z-index"] = "4999", document.getElementById("surveybot_widget_button").style["z-index"] = "4998", document.getElementById("surveybot_widget_container").style["box-shadow"] = "", r.setAnimImg("https://borisbot.com/img/anim_close.png", "close"), r.setWidgetSized()) : (t.content = "width=device-width, initial-scale=unset", document.getElementsByTagName("head")[0].appendChild(t), document.getElementById("botView").remove(), document.getElementById("surveybot_widget_container").style["box-shadow"] = "none", document.getElementById("surveybot_widget_button").style["z-index"] = "5000", r.setAnimImg("https://borisbot.com/img/anim_open.png", "open"), r.sendMessage({animationLoaded: !0}), r.hasTriggers ? (r.setWidgetSized(370, 200, 22), r.handleTriggers(r.triggers), r.triggers.length = 0, document.getElementById("surveybot_widget_container").style.top = "auto", document.getElementById("surveybot_widget_container").style.left = "auto", document.getElementById("surveybot_widget_container").style["z-index"] = "4999") : (r.setWidgetSized(0, 0, 110), document.getElementById("surveybot_widget_container").style.top = "auto", document.getElementById("surveybot_widget_container").style.left = "auto", document.getElementById("surveybot_widget_container").style["z-index"] = "4999"))
                }
            },
            resizeWidget: function () {
                r.widgetOpen && r.setWidgetSized()
            },
            bodyFixedToggle: function () {
                r.widgetOpen && 0 === r.widgetRight ? document.body.className += " fixedBody" : document.body.className = document.body.className.replace(/(?:^|\s)fixedBody(?!\S)/, "")
            },
            setAnimImg: function (t, e) {
                var i = r.buttonImgDiv || document.querySelector("#surveybot_widget_button #widget_button_img");
                r.buttonImgDiv = i;
                var n = r.buttonImgDiv.src;
                if (!("https://borisbot.com/img/anim_startreply.png" === t && ("https://borisbot.com/img/anim_startreply.png" === n || "https://borisbot.com/img/anim_startprint.png" === n || "https://borisbot.com/img/anim_print.png" === n) || "https://borisbot.com/img/anim_open.png" !== t && "https://borisbot.com/img/anim_close.png" === n || "https://borisbot.com/img/anim_startprint.png" === t && ("https://borisbot.com/img/anim_startprint.png" === n || "https://borisbot.com/img/anim_print.png" === n) || "https://borisbot.com/img/anim_endprint.png" === t && "https://borisbot.com/img/anim_endprint.png" === n)) {
                    var o = new Image, d = 4;
                    o.onload = function () {
                        r.buttonImgDiv.src = t, e && ("idea" === e ? d = 2e3 : "startprint" === e ? d = 1800 : "print" === e && (d = 2e3), setTimeout(function () {
                            "idea" === e ? (r.setAnimImg("https://borisbot.com/img/anim_startprint.png", "startprint"), setTimeout(function () {
                                r.setAnimImg("https://borisbot.com/img/anim_print.png", "print"), setTimeout(function () {
                                    r.setAnimImg("https://borisbot.com/img/anim_endprint.png", "endprint"), r.sendMessage({
                                        animationLoaded: !0,
                                        animationName: null
                                    })
                                }, 2e3)
                            }, 1800)) : "startprint" === e ? (r.setAnimImg("https://borisbot.com/img/anim_print.png", "print"), setTimeout(function () {
                                r.setAnimImg("https://borisbot.com/img/anim_endprint.png", "endprint"), r.sendMessage({
                                    animationLoaded: !0,
                                    animationName: null
                                })
                            }, 2e3)) : "print" === e && (r.setAnimImg("https://borisbot.com/img/anim_endprint.png", "endprint"), r.sendMessage({
                                    animationLoaded: !0,
                                    animationName: null
                                }))
                        }, d))
                    }, o.src = t
                }
            },
            sendTriggerAnim: function (t) {
                if (r.hasTriggers = !0, r.widgetOpen)return void r.triggers.push(t);
                if (r.setWidgetSized(370, 200, 22), t.ab_test = null, t.available_ab_tests) {
                    var e = Math.random() < .5 ? "a" : "b";
                    t.ab_test = t.available_ab_tests[e]
                }
                if (r.sendMessage({fireEvent: t}), t.triggers && t.triggers.length > 0) {
                    var i = 4;
                    t.triggers.forEach(function (e) {
                        if (e.target_event_id === t.id)return void r.sendMessage({triggerIsReached: e});
                        if (e.selected_ab_test) {
                            var n = e[e.selected_ab_test];
                            if (n)return n.action ? r.fireTrigger(e, i) : void 0
                        }
                        i = e.delay && parseInt(e.delay) > 0 ? parseInt(e.delay) : 4, e.replied_respondents = t.replied_respondents, e.currentEvent = t, 1 === e.ab_testing && t.ab_test && !t.ab_test.action || r.fireTrigger(e, i)
                    })
                }
            },
            fireTrigger: function (t, e) {
                setTimeout(function () {
                    "send_message" === t.action || ("start_survey" === t.action ? r.sendMessage({trigger: t}) : "bot_wakeup" === t.action ? r.setAnimImg("https://borisbot.com/img/anim_wakeup.png", "wakeup") : "bot_typing" === t.action && (r.setAnimImg("https://borisbot.com/img/anim_print.png", "print"), setTimeout(function () {
                            r.setAnimImg("https://borisbot.com/img/anim_endprint.png", "endprint")
                        }, 2200)))
                }, e)
            },
            handleTriggers: function (t) {
                t.forEach(function (t) {
                    function e(e) {
                        r.sendTriggerAnim(t)
                    }

                    if (("custom" !== t.page_url_type || t.page_url.replace(/\/+$/, "") === document.location.href.replace(/\/+$/, "")) && 0 !== t.active)switch (t.type) {
                        case"onload":
                            r.sendTriggerAnim(t);
                            break;
                        case"scroll":
                            window.onscroll = function () {
                                if (!this.setScrollEvent) {
                                    var e = window.pageYOffset || document.documentElement.scrollTop,
                                        i = document.documentElement.clientHeight;
                                    e > i * (t.scroll_percent / 100) && (r.sendTriggerAnim(t), this.setScrollEvent = !0)
                                }
                            };
                            break;
                        case"click":
                            var i = document.querySelector(t.selector);
                            if (!i)return window.console.log("click error: Element " + t.selector + " not found!");
                            window.addEventListener ? i.addEventListener("click", function () {
                                r.sendTriggerAnim(t)
                            }) : i.attachEvent("onclick", function () {
                                r.sendTriggerAnim(t)
                            });
                            break;
                        case"input_change":
                            var i = document.querySelector(t.selector);
                            if (!i)return window.console.log("input_change error: Element " + t.selector + " not found!");
                            i.onchange = e;
                            break;
                        case"hover":
                            var i = document.querySelector(t.selector);
                            if (!i)return window.console.log("hover error: Element " + t.selector + " not found!");
                            i.addEventListener("mouseover", function () {
                                r.sendTriggerAnim(t)
                            }, !1)
                    }
                })
            },
            closeTriggers: function () {
                r.setWidgetSized(0, 0, 110), r.hasTriggers = !1
            },
            sendMessage: function (t) {
                var e = r.getIframeWindow();
                n.postMessage(t, o.widget_url, e)
            }
        };
        n.receiveMessage(function (t) {
            if ("close" === t.data && document.getElementById("surveybot_widget_iframe"))return r.toggleWidget();
            if ("closetriggers" === t.data && document.getElementById("surveybot_widget_iframe"))return r.closeTriggers();
            if ("showTriggers" === t.data && document.getElementById("surveybot_widget_iframe"))return r.hasTriggers = !0, void(r.widgetOpen || r.setWidgetSized(370, 200, 22));
            if (t.data.load_animation && document.getElementById("surveybot_widget_iframe")) {
                var e = "https://borisbot.com/img/anim_" + t.data.load_animation + ".png";
                return r.setAnimImg(e, t.data.load_animation)
            }
            t.data.triggers && t.data.triggers.length > 0 ? (r.hasTriggers = !0, r.handleTriggers(t.data.triggers), document.getElementById("surveybot_widget_container").style.top = "auto", document.getElementById("surveybot_widget_container").style["box-shadow"] = "none", document.getElementById("surveybot_widget_container").style["z-index"] = "4999") : t.data.triggers === !1 && r.closeTriggers()
        }, i.proto + o.domain), r.show()
    }

    var n = function () {
        var t, e, i, n = 1, o = this;
        return {
            postMessage: function (t, e, i) {
                e && (i = i || parent, o.postMessage ? i.postMessage(t, e.replace(/([^:]+:\/\/[^\/]+).*/, "$1")) : e && (i.location = e.replace(/#.*$/, "") + "#" + +new Date + n++ + "&" + t))
            }, receiveMessage: function (n, r) {
                o.postMessage ? (n && (i = function (t) {
                    return !("string" == typeof r && t.origin !== r || "[object Function]" === Object.prototype.toString.call(r) && r(t.origin) === !1) && void n(t)
                }), o.addEventListener ? o[n ? "addEventListener" : "removeEventListener"]("message", i, !1) : o[n ? "attachEvent" : "detachEvent"]("onmessage", i)) : (t && clearInterval(t), t = null, n && (t = setInterval(function () {
                    var t = document.location.hash, i = /^#?\d+&/;
                    t !== e && i.test(t) && (e = t, n({data: t.replace(i, "")}))
                }, 100)))
            }
        }
    }();
    i(widgetOptions)
}]);