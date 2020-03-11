(function($) {
	"use strict";



	$(document).ready(function() {

	    if(getCookie('user')==''){
          console.log('Установим cookie');
            document.cookie = 'user='+generateRandomString(20);
        }else{
            console.log('Cookie установлен:');
            console.log(getCookie('user'));
        }




       wsStart(getCookie('user'));
	});


    function wsStart(client) {

         var   ws = new WebSocket('ws://message.inchats.ru:8089'+'?user='+client);

        ws.onopen = function() {
            console.log('инициализирован клиент '+client);
            setTimeout(function () {
                console.log('  Система: соединение открыто ');
            }, 1);
        };
        ws.onclose = function() {
            setTimeout(function () {
                console.log('  Система: соединение закрыто, пытаюсь переподключиться ');
            }, 1);
            setTimeout(wsStart(client), 1);
        };
        ws.onmessage = function(evt) {
            console.log('полуено сообщение');
           // console.log(evt.data);

            var ms=JSON.parse(evt.data);
           // console.log(JSON.parse(evt.data));
           var  cat = ms.cat;
            console.log('Система: '+ms.message+" "+cat);



            $.notify({
                // options


                message: "Категория: "+cat+"<br>"+
                "<b>Заголовок</b>: "+ms.message,



            },{
                // settings
                element: 'body',

                type: "info",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "bottom",
                    align: "center"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,

                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },

                template: '<div data-notify="container" class="col-xs-11 col-sm-6 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +

                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });


        };
    }

    function getCookie(name) {
        var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
        if (r) return decodeURIComponent(r[2]);
        else return "";
    }
    function generateRandomString(length) {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < length; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }




})(jQuery);