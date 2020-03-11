/* Theme Name: The Project - Responsive Website Template
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Author e-mail:htmlcoder.me@gmail.com
 * Version:1.4.0
 * Created:March 2015
 * License URI:http://support.wrapbootstrap.com/
 * File Description: Place here your custom scripts
 */

(function($) {
    $(document).ready(function () {

        $('html').keydown(function (eventObject) { //отлавливаем нажатие клавиш

            if (event.keyCode == 13) { //если нажали Enter, то true


                $.ajax({
                    type: "POST",
                    url: "/search",
                    data: {
                        "text": $("#searchForm #search").val(),

                    },
                    dataType: "json",
                    success: function (data) {

                    }
                });


                return true;


            }
        });


        // Notify Plugin - The below code (until line 42) is used for demonstration purposes only
        //-----------------------------------------------
        if (($(".main-navigation.onclick").length > 0) && !Modernizr.touch) {
            $.notify({
                // options
                message: 'The Dropdowns of the Main Menu, are now open with click on Parent Items. Click "Home" to checkout this behavior.'
            }, {
                // settings
                type: 'info',
                delay: 10000,
                offset: {
                    y: 150,
                    x: 20
                }
            });
        }

        if (!($(".main-navigation.animated").length > 0) && !Modernizr.touch && $(".main-navigation").length > 0) {
            $.notify({
                // options
                message: 'The animations of main menu are disabled.'
            }, {
                // settings
                type: 'info',
                delay: 10000,
                offset: {
                    y: 150,
                    x: 20
                }
            }); // End Notify Plugin - The above code (from line 14) is used for demonstration purposes only

        }

    }); // End document ready

})
	// $(document).on('click', '#tlgrm-init-btn', function (e) {
	// 	var that = $(this);
    //
	// 	$("#tlgrm-chat-head").text("sssssss");
	// 	console.log("ssddd");
	// });


    $(document).on('click', '#clbtn', function (e) {

        var search ={};
        search["stream"] = "streamstart";
        search["widget_id"] = 105016;
        search["xid"] = window.location.href ;
        search["limit"] = 1;
        search["filter"] = "all";

        $.ajax({
            type: "POST",
            url: "http://c1api.hypercomments.com/api/comments",
            data: search,
            crossDomain: true,
            dataType: 'jsonp',
            headers: {
                'Access-Control-Allow-Credentials' : false,
                'Access-Control-Allow-Origin':'*',
                'Access-Control-Allow-Methods':'POST',
                'Access-Control-Allow-Headers':'application/json',
            },
            success: function() {
                alert("Success");
                console.log(data);
                $('#commcnt').text('3 комм.');
                },
            error: function() { alert('Failed!'); },
            beforeSend: setHeader

        });

    } );

    function setHeader(xhr) {

        xhr.setRequestHeader('Authorization');
    }