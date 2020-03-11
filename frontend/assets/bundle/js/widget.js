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

}
(

  [function (t, e) {

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
      }, o = i.extendObject({widget_id: 0, timer:0, bot_image:'',bot_close:'',domain: "dev.infomarketstudio.ru", bg_color: "transparent"}, t);
      o.widget_url = [i.proto, o.domain, "/chat/default/chat"].join("") ;

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
          "undefined" == typeof t && (t = e.any() || window.innerHeight <= 517 ? window.innerHeight : 517), r.widgetHeight = t
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
          var cheight = 17
          if (r.widgetHeight > 640) {
              cheight = 90
          } else {
            cheight = 17
          }
          document.getElementById("infomarket_widget_iframe").height = r.widgetHeight-cheight,
            document.getElementById("infomarket_widget_container").style.height = r.widgetHeight-cheight + "px",
            this.sendMessage({styles: {widgetHeight: r.widgetHeight}})
        },
        setElWidgetWidth: function () {
          document.getElementById("infomarket_widget_container").style.width = r.widgetWidth + "px", this.sendMessage({styles: {widgetWidth: r.widgetWidth}})
        },
        setElWidgetRight: function () {
          document.getElementById("infomarket_widget_container").style.right = r.widgetRight + "px", this.sendMessage({styles: {widgetRight: r.widgetRight}}),
            0 === r.widgetRight && r.widgetOpen ? document.getElementById("infomarket_widget_container").style.left = "0" : document.getElementById("infomarket_widget_container").style.left = "auto"
        },
        setElWidgetBottom: function () {
          document.getElementById("infomarket_widget_container").style.bottom = r.widgetBottom + "px", this.sendMessage({styles: {widgetBottom: r.widgetBottom}}),
            0 === r.widgetBottom && r.widgetOpen ? document.getElementById("infomarket_widget_container").style.top = "0" : document.getElementById("infomarket_widget_container").style.top = "auto"
        },
        setWidgetSized: function (t, e, i) {
          this.setWidgetWidth(t), this.setWidgetHeight(e), this.setWidgetRight(), this.setWidgetBottom(i), this.setElWidgetWidth(), this.setElWidgetHeight(), this.setElWidgetRight(), this.setElWidgetBottom()
        },
        show: function () {
          this.created || (
            this.styleSheet = document.createElement("style"),
              this.styleSheet.type = "text/css",
              this.styleSheet.innerHTML = ".fixedBody {position:fixed;width:100%;height:100%;overflow:hidden;}" +
                  ".infomarket_widget_container {position:fixed;width:0;z-index:4999;background-color:transparent;overflow:hidden;border-radius:7px;border:none;outline:none;}.infomarket_widget_button {position:fixed;right:20px;bottom:20px;width:80px;z-index:5000;cursor:pointer;}@media screen and (max-width: 460px) {.infomarket_widget_container {border-radius:0;box-shadow:none;}}",
              document.getElementsByTagName("head")[0].appendChild(this.styleSheet),
              this.widgetElement = document.createElement("div"),
              this.widgetElement.setAttribute("id", "infomarket_widget_container"),
              this.widgetElement.setAttribute("class", "infomarket_widget_container"),
              this.widgetElement.setAttribute("frameborder", 0),
              this.widgetElement.style.right = r.widgetRight,
              this.widgetElement.style.bottom = r.widgetBottom,
              this.widgetElement.style.border = "none",
              this.widgetElement.style.outline = "none",

              this.widgetElement.innerHTML = '                 <iframe id="infomarket_widget_iframe" src="'
                + o.widget_url + '" width="100%" height="500" frameborder="0" scrolling="no" allow="geolocation" ' +
                'allowfullscreen></iframe>',

              this.buttonElement = document.createElement("div"),
              this.buttonElement.setAttribute("id", "infomarket_widget_button"),
              this.buttonElement.setAttribute("class", "infomarket_widget_button"),
              this.buttonElement.innerHTML = '                 <div style="position: absolute; ' +
                'bottom: 6px; right: 6px; border-radius: 50%;   ' +
                'width: 67px; height:67px;"></div><img id="widget_button_img" ' +
                'src= ' +o.bot_image+
                ' style="position: absolute; bottom: 30px; right:30px; width: 100%; ">',
              window.addEventListener ? (this.buttonElement.addEventListener("click", r.toggleWidget),
                window.addEventListener("resize", r.resizeWidget)) : (this.buttonElement.attachEvent("onclick", r.toggleWidget),
                window.attachEvent("onresize", r.resizeWidget)),
              document.body.insertBefore(this.widgetElement,
                document.body.nextSibling),
              document.body.insertBefore(this.buttonElement, document.body.nextSibling), r.setWidgetSized(0, 0, 110),
              this.created = !0,
              this.buttonImgDiv = document.querySelector("#infomarket_widget_button #widget_button_img")),

            this.triggerElement = document.createElement("div"),

            this.triggerElement.setAttribute("class", "triggers-wrapper"),
            this.triggerElement.setAttribute("style", "display:none;height: 160px; width: 382px;     right: 25px;bottom: 18px;"),
            this.triggerElement.innerHTML = '<div class="triggers-close clearfix">' +
              '<div class="media-body closeMsg">' +
              '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">' +
              '<path d="M1656,144.043L1654.96,143l-7.96,7.957L1639.04,143l-1.04,1.043,7.96,7.957-7.96,7.957,1.04,1.043,7.96-7.956,7.96,7.956,1.04-1.043L1648.04,152Z" transform="translate(-1638 -143)"></path>' +
              '</svg></div></div>' +
              '<ul class="triggers-list"><li class="trigger clearfix">' +
              '<div class="media-body trigger-bot">' +
              '<div class="trigger-text" style="background: rgb(255, 255, 255);"><p><span>' +
              'Хочешь использовать бота, но не знаешь как... Тебе помочь?' +
              '</span></p></div><div class="message-tail">' +
              '<svg xmlns="http://www.w3.org/2000/svg" width="13.94" height="18" viewBox="0 0 13.94 18">' +
              '<path d="M1586,712a42.655,42.655,0,0,0,6,10c4.24,4.816,5,5,5,5s3.26,0.621-2,1c-3.56.257-9,1-9,1" transform="translate(-1584.56 -711.5)" style="fill: rgb(255, 255, 255);"></path>' +
              '</svg></div></div>' +
              '<div class="media-body trigger-buttons-wrapper">' +
              '<div class="trigger-buttons-bot">' +
              '<ul class="buttons-list">' +
              '<li class="btn-width btn-width-2">' +
              '<button class="btn btn-default btn-sm close-chat" style="color: #0156d6; border-color: #0156d6;">' +
              'Нет' +
              '</button></li>' +
              '<li class="btn-width btn-width-2">' +
              '<button class="btn btn-default btn-sm open-chat" style="color: #0156d6; border-color: #0156d6;">' +
              'Да' +
              '</button></li></ul></div></div></li></ul>',
            document.body.insertBefore(this.triggerElement, document.body.nextSibling);
            //r.openTimeout();
        },
        getIframeWindow: function () {
          var t = document.getElementById("infomarket_widget_iframe"), e = t.contentWindow || t;
          return e
        },
        toggleWidget: function () {
          if (document.getElementById("infomarket_widget_iframe")) {
            var t = document.createElement("meta");
            t.name = "viewport",
              t.content = "width=device-width, initial-scale=1.0",
              t.id = "botView",
              r.setWidgetHeight(r.triggersMaxHeight),
              r.setWidgetWidth(r.triggersMaxWidth),
              r.widgetOpen = !r.widgetOpen,
              r.sendMessage({widgetOpen: r.widgetOpen}),
              r.bodyFixedToggle(),
              r.widgetOpen ? (document.getElementsByTagName("head")[0].appendChild(t),
                document.getElementById("infomarket_widget_container").style["z-index"] = "4999",
                document.getElementById("infomarket_widget_button").style["z-index"] = "4998",
                document.getElementById("infomarket_widget_container").style["box-shadow"] = "",
               //r.setAnimImg("/common/modules/chat/assets/assets/img/widget/anim_print.png", "idea"),
                r.setAnimImg(o.bot_close, "close"),
                r.setWidgetSized()) : (t.content = "width=device-width, initial-scale=unset",
                document.getElementsByTagName("head")[0].appendChild(t),
                document.getElementById("botView").remove(),
                document.getElementById("infomarket_widget_container").style["box-shadow"] = "none",
                document.getElementById("infomarket_widget_button").style["z-index"] = "5000",

                r.setAnimImg(o.bot_image, "open"),
                r.sendMessage({animationLoaded: !0}), r.hasTriggers ? (r.setWidgetSized(370, 200, 22),
                r.handleTriggers(r.triggers),
                r.triggers.length = 0,
                document.getElementById("infomarket_widget_container").style.top = "auto",
                document.getElementById("infomarket_widget_container").style.left = "auto",
                document.getElementById("infomarket_widget_container").style["z-index"] = "4999") : (r.setWidgetSized(0, 0, 110),
                document.getElementById("infomarket_widget_container").style.top = "auto",
                document.getElementById("infomarket_widget_container").style.left = "auto",
                document.getElementById("infomarket_widget_container").style["z-index"] = "4999"))
          }
        },
        resizeWidget: function () {
          r.widgetOpen && r.setWidgetSized()
        },
        bodyFixedToggle: function () {
          r.widgetOpen && 0 === r.widgetRight ? document.body.className += " fixedBody" :
              document.body.className = document.body.className.replace(/(?:^|\s)fixedBody(?!\S)/, "")
        },
        setAnimImg: function (t, e) {
          var i = r.buttonImgDiv || document.querySelector("#infomarket_widget_button #widget_button_img");
          r.buttonImgDiv = i;
          var n = r.buttonImgDiv.src;
          if (!("/common/modules/chat/assets/assets/img/widget/anim_startreply.png" === t &&
            ("/common/modules/chat/assets/assets/img/widget/anim_startreply.png" === n ||
            "/common/modules/chat/assets/assets/img/widget/anim_startprint.png" === n ||
            "/common/modules/chat/assets/assets/img/widget/anim_print.png" === n) ||
            o.bot_image !== t &&
            o.bot_close === n ||
            "/common/modules/chat/assets/assets/img/widget/anim_startprint.png" === t &&
            ("/common/modules/chat/assets/assets/img/widget/anim_startprint.png" === n ||
            "/common/modules/chat/assets/assets/img/widget/anim_print.png" === n) ||
            "/common/modules/chat/assets/assets/img/widget/anim_endprint.png" === t &&
            "/common/modules/chat/assets/assets/img/widget/anim_endprint.png" === n)) {
            var oi = new Image, d = 4;
            oi.onload = function () {
              r.buttonImgDiv.src = t, e && ("idea" === e ? d = 2e3 : "startprint" === e ? d = 1800 : "print" === e && (d = 2e3),

                setTimeout(function () {
                "idea" === e ? (r.setAnimImg("/common/modules/chat/assets/assets/img/widget/anim_startprint.png", "startprint"),
                  setTimeout(function () {
                    r.setAnimImg("/common/modules/chat/assets/assets/img/widget/anim_print.png", "print"),

                      setTimeout(function () {
                      r.setAnimImg("/common/modules/chat/assets/assets/img/widget/anim_endprint.png", "endprint"),
                        r.sendMessage({
                          animationLoaded: !0,
                          animationName: null
                        })
                    }, 2e3)
                  }, 1800)) : "startprint" === e ? (r.setAnimImg("/common/modules/chat/assets/assets/img/widget/anim_print.png", "print"),

                  setTimeout(function () {
                  r.setAnimImg("/common/modules/chat/assets/assets/img/widget/anim_endprint.png", "endprint"),
                    r.sendMessage({
                      animationLoaded: !0,
                      animationName: null
                    })
                }, 2e3)) : "print" === e && (r.setAnimImg("/common/modules/chat/assets/assets/img/widget/anim_endprint.png", "endprint"),

                    r.sendMessage({
                      animationLoaded: !0,
                      animationName: null
                    }))
              }, d))
            }, oi.src = t
          }
        },
        sendMessage: function (t) {
          var e = r.getIframeWindow();
        },
        openTimeout: function () {
          setTimeout(function () {
              r.toggleWidget();
          }, o.timer)
        }

      };
      r.show();
    }
    i(widgetOptions)
  }]
);