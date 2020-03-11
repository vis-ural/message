$(function() {
    "use strict";

    //Make the dashboard widgets sortable Using jquery UI
    $(".connectedSortable").sortable({
        placeholder: "sort-highlight",
        connectWith: ".connectedSortable",
        handle: ".box-header, .nav-tabs",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();
    $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");
})


function ScrollMsg(){
    var objDiv = $('.direct-chat-messages');

    if (objDiv.length > 0){
        objDiv[0].scrollTop = objDiv[0].scrollHeight;
    }
}

$(document).ready(function () {


    $("form#data").submit(function(){

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '/whatsapp/loadfile',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                alert(data)
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    });

            $(document).on("click",".create-group",function() {


            group = $('.create-group').data('group-id');

            console.log(group);

            $("#messageBackend").val('');

            ScrollMsg();

            $.ajax({
            type: "get",
            url: "/backend/web/whatsapp/create",

            data: {
                id_group: group,


            },
            error: function (data) {
                console.log(data);
            },
            beforeSend: function () {
                $('body').append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="/img/ajax-loading.gif" alt="Загрузка ..."></div></div></div>');
            },
            success: function (data) {
                data = JSON.parse(data);
                $('.ajax-loading-wrapper').remove();
               // if (data.result) {

                $.pjax.reload({container: '#grid'});


                    //setTimeout(function () {
                    console.log(data);
                    //
                    //   $.pjax.reload({container: '#pjaxdialog'});
                    //   console.log('прокрутка');
                    //
                    // }, 2000);


               // }
            }
            });



            });



            $(document).on("click",".view-chat",function() {

            $.ajax({
            type: "get",
            url: "/backend/web/whatsapp/viewchat",


            error: function (data) {
                console.log(data);
            },
            beforeSend: function () {
                $('body').append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="/img/ajax-loading.gif" alt="Загрузка ..."></div></div></div>');
            },
            success: function (data) {
                data = JSON.parse(data);
                $('.ajax-loading-wrapper').remove();




                data.forEach(function(element) {
                    if (element.metadata.isGroup == true){
                        console.log(element);
                        $('.chats').append(element.name +" " +element.id+"<br>");
                    }

                });





            }
            });


            });



            $(document).on("click",".del-user",function() {



            group = $(this).data('group-id');
            phone = $(this).data('phone');

            console.log(group);

            $("#messageBackend").val('');

            ScrollMsg();

            $.ajax({
            type: "get",
            url: "/backend/web/whatsapp/delphone",
            data: {
                id_group: group,
                phone:phone
            },
            error: function (data) {
                console.log(data);
            },
            beforeSend: function () {
                $('body').append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="/img/ajax-loading.gif" alt="Загрузка ..."></div></div></div>');
            },
            success: function (data) {
                data = JSON.parse(data);
                $('.ajax-loading-wrapper').remove();
                // if (data.result) {

                $.pjax.reload({container: '#phone'});


                //setTimeout(function () {
                console.log(data);
                //
                //   $.pjax.reload({container: '#pjaxdialog'});
                //   console.log('прокрутка');
                //
                // }, 2000);


                // }
            }
            });



            });


            $(document).on("click",".admin",function() {

            group = $(this).data('group-id');
            phone = $(this).data('phone');

            console.log(group);

            $("#messageBackend").val('');

            ScrollMsg();

            $.ajax({
            type: "get",
            url: "/backend/web/whatsapp/admin",
            data: {
                id_group: group,
                phone:phone
            },
            error: function (data) {
                console.log(data);
            },
            beforeSend: function () {
                $('body').append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="/img/ajax-loading.gif" alt="Загрузка ..."></div></div></div>');
            },
            success: function (data) {
                data = JSON.parse(data);
                $('.ajax-loading-wrapper').remove();
                // if (data.result) {

                $.pjax.reload({container: '#phone'});


                //setTimeout(function () {
                console.log(data);
                //
                //   $.pjax.reload({container: '#pjaxdialog'});
                //   console.log('прокрутка');
                //
                // }, 2000);


                // }
            }
            });



            });


            $(document).on("click",".del-admin",function() {

            group = $(this).data('group-id');
            phone = $(this).data('phone');

            console.log(group);

            $("#messageBackend").val('');

            ScrollMsg();

            $.ajax({
            type: "get",
            url: "/backend/web/whatsapp/deladmin",
            data: {
                id_group: group,
                phone:phone
            },
            error: function (data) {
                console.log(data);
            },
            beforeSend: function () {
                $('body').append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="/img/ajax-loading.gif" alt="Загрузка ..."></div></div></div>');
            },
            success: function (data) {
                data = JSON.parse(data);
                $('.ajax-loading-wrapper').remove();
                // if (data.result) {

                $.pjax.reload({container: '#phone'});


                //setTimeout(function () {
                console.log(data);
                //
                //   $.pjax.reload({container: '#pjaxdialog'});
                //   console.log('прокрутка');
                //
                // }, 2000);


                // }
            }
            });



            });

            $(document).on("click",".send-group",function() {

                group = $(this).data('group-id');
                mes = $("#mes").val();

                console.log(group);

                $("#messageBackend").val('');

                ScrollMsg();

                $.ajax({
                    type: "get",
                    url: "/backend/web/whatsapp/mes",
                    data: {
                        id_group: group,
                        mes:mes
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    beforeSend: function () {
                        $('body').append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="/img/ajax-loading.gif" alt="Загрузка ..."></div></div></div>');
                    },
                    success: function (data) {
                        data = JSON.parse(data);
                        $('.ajax-loading-wrapper').remove();
                        // if (data.result) {

                        $("#mes_send").append("<div>"+data.mes+"</div>");
                        $("#mes").val("");

                        //setTimeout(function () {
                        console.log(data);
                        //
                        //   $.pjax.reload({container: '#pjaxdialog'});
                        //   console.log('прокрутка');
                        //
                        // }, 2000);


                        // }
                    }
                });



            });




  //  wsStart();

    client = $('#clientId').val();
    dialog = $('div.tab-pane.active').data('dialogid');

   // wsStart(client,dialog);

    ScrollMsg();

    $("#messageBackend").keyup(function(event){

        if(event.keyCode == 13){
            //call send data function here

            $("#btnSendBackend").click();

        } });

    $('#btnSendBackend').on("click",function() {

        client_id = $('#btnSendBackend').data('clientid');
        mess = $("#messageBackend").val();
        cookie = $('#clientCookie').val();
        dialog = $('div.tab-pane.active').data('dialogid');

        // console.log(cookie);

        $("#messageBackend").val('');

        ScrollMsg();

        $.ajax({
            type: "get",
            url: "/backend/web/chat/messages/sendmessagefrombackend",

            data: {
                mess: mess,
                client_id: client_id,
                cookie: cookie,
                dialog: dialog

            },
            error: function (data) {
                console.log(data);
            },

            success: function (data) {
                data = JSON.parse(data);

                if (data.result) {


                    //setTimeout(function () {
                    console.log('  в сокет отправлено');
                    //
                    //   $.pjax.reload({container: '#pjaxdialog'});
                    //   console.log('прокрутка');
                    //
                    // }, 2000);


                }
            }
        });



    });


    function reloadGrid(id,  url) {
        $.pjax.reload({
            container: "#" + id,
            data: $('#grid').serialize() ,
            url: url,
            push: false,
            replace: false,
            timeout: 1000000
        });
    }




    $('nav-link').on("click",function() {
        client = 'client'+ $('#clientId').val();
        dialog = $('div.tab-pane.active').data('dialogid');
        wsStart(client,dialog);
    });


});

function wsStart(client=false,dialog=false) {

    if (client && dialog) {

        ws = new WebSocket('wss://demo.infomarketstudio.ru:5089'+'?user=backend_'+client+'dialog_'+dialog);

    } else {
        ws = new WebSocket('wss://demo.infomarketstudio.ru:5089'+'?user=backend');

    }

    ws.onopen = function() {
        console.log('инициализирован клиент backend_'+client+'dialog_'+dialog);

        setTimeout(function () {
            console.log('  Система: соединение открыто ');
        }, 1);
    };
    ws.onclose = function() {

        setTimeout(function () {
            console.log('  Система: соединение закрыто, пытаюсь переподключиться ');
        }, 1);
        setTimeout(wsStart, 1);
    };
    ws.onmessage = function(evt) {


        //console.log('полуено сообщение бэкенд');

        data = JSON.parse(evt.data);
        console.log(data);

        switch (data.type) {
            case 'flash':
                SendFlash(data.message);
                break;
            case 'in':
                SendMessageIn(data.message);
                ScrollMsg();
                break;
            default:
                SendMessageOut(data.message);
                ScrollMsg();
                break;

        }


        console.log('Система: '+evt.data);

    };
}
function SendMessageIn (mess) {
    bundle = $('#bundle').val();
    $('.direct-chat-messages').append('<div class="direct-chat-msg right">' +
        '<div class="direct-chat-info clearfix">' +
        '<span class="direct-chat-name pull-right">user</span><span class="direct-chat-timestamp pull-left">дата</span>' +
        '</div> ' +
        '<img class="direct-chat-img" src="'+bundle+'/img/user3-128x128.jpg" alt="message user image">' +
        ' <div class="direct-chat-text">' + mess +
        '</div>' +
        '</div>');
    $('.direct-chat-messages').scrollTop($(document).height());
    ScrollMsg();
}
function SendMessageOut (mess)   {

    bundle = $('#bundle').val();
    $('.direct-chat-messages').append('<div class="direct-chat-msg">' +
        '<div class="direct-chat-info clearfix">' +
        ' <span class="direct-chat-name pull-left">Чат-бот (Гугл)</span>' +
        '<span class="direct-chat-timestamp pull-right">дата</span>' +
        '</div>' +
        '<img class="direct-chat-img" src="'+bundle+'/img/user1-128x128.jpg" alt="message user image">' +
        '<div class="direct-chat-text">' + mess +
        '</div>' +
        '</div>');
    $('.direct-chat-messages').scrollTop($(document).height());
    ScrollMsg();
}
function SendFlash(mess) {
    $.notify("Новое сообщение в диалоге "+ mess );
}