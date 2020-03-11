/*
 Дополнительный скрипт для управления элементами виджета
 на странице клента

 */

jQuery(document).ready(function () {

    window.snowchat = false;
    window.snowtriggers = false;

    localStorage.setItem('snowchat', false);


    /**
     * Кнопка закрытия виджета
     */

    jQuery(document).on('click', '#widget_button_img', function (event) {
        //  console.log('event in'+event);

        if (window.snowchat == true) {
            window.snowchat = false
        }
        if (window.snowchat == false) {
            window.snowchat = true
        }
        if (window.snowtriggers == true) {
            window.snowtriggers = false
            jQuery('.triggers-wrapper').hide();
        }
        // console.log('close out'+window.snowchat);
    });


    jQuery(document).on('click', '#go_next', function (event) {
        // console.log(jQuery(document).height())

        jQuery('html, body').scrollTop(jQuery(document).height())

    })


    jQuery(document).on('click', '.closeMsg', function (event) {

        jQuery('.triggers-wrapper').hide()

    })


    jQuery(document).on('click', '.close-chat', function (event) {
        //window.parent.document.getElementById('widget_button_img').click();

        jQuery('.triggers-wrapper').hide();
    });


    jQuery(document).on('click', '.close-chat-exit', function (event) {

        console.log('closeeffff');
        jQuery('#widget_button_img').click();

    });


    jQuery(document).on('click', '.open-chat', function (event) {

        jQuery('.triggers-wrapper').hide();
        jQuery('#widget_button_img').click();
    })


    jQuery(document).on('click', 'a[href^="#"]', function (e) {


        var anchor = jQuery(this)
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(anchor.attr('href')).offset().top
        }, 777)
        e.preventDefault()
        return false
    })


    var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

    eventer(messageEvent, function (e) {




        if (e.data.ev == 'closewidget') {
            //  set_cookie('widget_id', jQuery('#infomarket_widget_iframe').data('widget'), year, month, day, "/", 'demo.loc');
            console.log('закрыть окно');
            jQuery('#widget_button_img').click();

        }

        if (e.data.ev == 'getwidget') {
            //  set_cookie('widget_id', jQuery('#infomarket_widget_iframe').data('widget'), year, month, day, "/", 'demo.loc');

            console.log('виджет ' + jQuery('#infomarket_widget_iframe').data('widget'));

            window.frames["infomarket_widget_iframe"].contentWindow.postMessage({
                ev: 'sendmessage',
                widget_id: jQuery('#infomarket_widget_iframe').data('widget'),
                text: e.data.text
            }, "*");

        }

        if (e.data.ev == 'timeout') {
            // console.log('получили собщение timeout '+ e.data.ev);

            // jQuery('#widget_button_img').click();

            // console.log('snowchat1 '+window.snowchat);
            //  console.log('snowtriggers1 '+window.snowtriggers);

            if (window.snowchat != true && window.snowtriggers != true) {


                document.getElementById('widget_button_img').click();


            }


        }


        if (e.data.ev == 'triggers') {

            //   console.log('snowchat2 '+window.snowchat);
            //   console.log('snowtriggers2 '+window.snowtriggers);
            if (window.snowchat != true) {

                if (window.snowtriggers == true) {
                    window.snowtriggers = false
                    jQuery('.triggers-wrapper').hide();
                }
                if (window.snowtriggers == false) {
                    window.snowtriggers = true
                    jQuery('.triggers-wrapper').show();
                }
            }


        }


    }, false);

});
