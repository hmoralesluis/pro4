var Codes = function () {
    return {
        init: function () {
            if ($.cookie('first_level') != null && $.cookie('first_level') != '') {
                var li = $('#' + $.cookie("first_level"));
                li.addClass('active');
                var span = $('<span class="selected"></span>');
                li.children('a').append(span);

            }

            if ($.cookie('second_level') != null && $.cookie('second_level') != '') {
                var a = $('#' + $.cookie('second_level') + '');
                a.parent('li').addClass('active');
                var ul = a.next();
                if (ul.is('.sub-menu')) {
                    ul.attr('style', 'display:block').addClass('menu-open');
                }
            }

            if (($.cookie('third_level') != null && $.cookie('third_level') != '')) {
                var a = $('#' + $.cookie('third_level') + '');
                a.parent('li').addClass('active');
            }

            var parentEls = [];
            parentEls.push($('li.active').closest('li')
                .map(function () {
                    return $(this).first('a').text();
                })
                .get());
            for (var e in parentEls) {
                var a = $('<a></a>').text(parentEls[parentEls.length - 1 - e]);
                $('.breadcrumb').append('<li></li>').append(a);
            }

            $('.content table td ul').attr('style', 'padding: 0 5px 0 5px');
            $('.content table td ul li').attr('style', 'list-style: none; float: left; width: 50%');

            var show_buttons_list = $('.record_actions li');
            for (var li = 0; li < show_buttons_list.length; li++) {
                if (li == 0) {
                    show_buttons_list[li].setAttribute('style', 'list-style: none; float: left; margin: 20px 0 20px 0');
                } else {
                    show_buttons_list[li].setAttribute('style', 'list-style: none; float: left; margin: 20px 0 20px 20px');
                }
            }
            $('.record_actions button').addClass('btn btn-default');

            $('.buttons, .record_actions').attr('style', 'padding-left: 0');

            $('.not-required').removeAttr('required');
        },

        initOptions: function () {
            $('li.treeview > a').bind('click', function () {
                var $this = $(this);
                var checkElement = $this.next();
                if (checkElement.is('.sub-menu')) {
                    $.cookie("levels", [$this.parent("li").attr('id')], {expires: 1});
                } else {
                    $.cookie("first_level", $this.parent("li").attr('id'), {expires: 1});
                    $.removeCookie('second_level');
                    $.removeCookie('third_level');
                }
            });

            $('.sub-menu li a').bind('click', function () {
                var $this = $(this);
                var checkElement = $this.next();
                if (checkElement.is('.sub-menu')) {
                    var levels = [$.cookie('levels')];
                    levels.push($this.attr('id'));
                    $.cookie('levels', levels, {expires: 1});
                } else {
                    var levels = $.cookie('levels');
                    levels = levels.split(',');
                    if (levels.length == 1) {
                        $.cookie('second_level', $this.attr('id'));
                        $.cookie('first_level', levels[0]);
                    } else {
                        $.cookie('third_level', $this.attr('id'));
                        $.cookie('second_level', levels[1]);
                        $.cookie('first_level', levels[0]);
                    }
                }
            });
        },

        initIntro: function () {
            if ($.cookie('intro_show')) {
                return;
            }

            $.cookie('intro_show', 1);

            setTimeout(function () {
                var unique_id = $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'Meet Metronic!',
                    // (string | mandatory) the text inside the notification
                    text: 'Metronic is a brand new Responsive Admin Dashboard Template you have always been looking for!',
                    // (string | optional) the image to display on the left
                    image: './assets/img/avatar1.jpg',
                    // (bool | optional) if you want it to fade out on its own or just sit there
                    sticky: true,
                    // (int | optional) the time you want it to be alive for before fading out
                    time: '',
                    // (string | optional) the class name you want to apply to that specific message
                    class_name: 'my-sticky-class'
                });

                // You can have it return a unique id, this can be used to manually remove it later using
                setTimeout(function () {
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 12000);
            }, 2000);

            setTimeout(function () {
                var unique_id = $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'Buy Metronic!',
                    // (string | mandatory) the text inside the notification
                    text: 'Metronic comes with a huge collection of reusable and easy customizable UI components and plugins. Buy Metronic today!',
                    // (string | optional) the image to display on the left
                    image: './assets/img/avatar1.jpg',
                    // (bool | optional) if you want it to fade out on its own or just sit there
                    sticky: true,
                    // (int | optional) the time you want it to be alive for before fading out
                    time: '',
                    // (string | optional) the class name you want to apply to that specific message
                    class_name: 'my-sticky-class'
                });

                // You can have it return a unique id, this can be used to manually remove it later using
                setTimeout(function () {
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 13000);
            }, 8000);

            setTimeout(function () {

                $('#styler').pulsate({
                    color: "#bb3319",
                    repeat: 10
                });

                $.extend($.gritter.options, {
                    position: 'top-left'
                });

                var unique_id = $.gritter.add({
                    position: 'top-left',
                    // (string | mandatory) the heading of the notification
                    title: 'Customize Metronic!',
                    // (string | mandatory) the text inside the notification
                    text: 'Metronic allows you to easily customize the theme colors and layout settings.',
                    // (string | optional) the image to display on the left
                    image1: './assets/img/avatar1.png',
                    // (bool | optional) if you want it to fade out on its own or just sit there
                    sticky: true,
                    // (int | optional) the time you want it to be alive for before fading out
                    time: '',
                    // (string | optional) the class name you want to apply to that specific message
                    class_name: 'my-sticky-class'
                });

                $.extend($.gritter.options, {
                    position: 'top-right'
                });

                // You can have it return a unique id, this can be used to manually remove it later using
                setTimeout(function () {
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 15000);

            }, 23000);

            setTimeout(function () {

                $.extend($.gritter.options, {
                    position: 'top-left'
                });

                var unique_id = $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'Notification',
                    // (string | mandatory) the text inside the notification
                    text: 'You have 3 new notifications.',
                    // (string | optional) the image to display on the left
                    image1: './assets/img/image1.jpg',
                    // (bool | optional) if you want it to fade out on its own or just sit there
                    sticky: true,
                    // (int | optional) the time you want it to be alive for before fading out
                    time: '',
                    // (string | optional) the class name you want to apply to that specific message
                    class_name: 'my-sticky-class'
                });

                setTimeout(function () {
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 4000);

                $.extend($.gritter.options, {
                    position: 'top-right'
                });

                var number = $('#header_notification_bar .badge').text();
                number = parseInt(number);
                number = number + 3;
                $('#header_notification_bar .badge').text(number);
                $('#header_notification_bar').pulsate({
                    color: "#66bce6",
                    repeat: 5
                });

            }, 40000);

            setTimeout(function () {

                $.extend($.gritter.options, {
                    position: 'top-left'
                });

                var unique_id = $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'Inbox',
                    // (string | mandatory) the text inside the notification
                    text: 'You have 2 new messages in your inbox.',
                    // (string | optional) the image to display on the left
                    image1: './assets/img/avatar1.jpg',
                    // (bool | optional) if you want it to fade out on its own or just sit there
                    sticky: true,
                    // (int | optional) the time you want it to be alive for before fading out
                    time: '',
                    // (string | optional) the class name you want to apply to that specific message
                    class_name: 'my-sticky-class'
                });

                $.extend($.gritter.options, {
                    position: 'top-right'
                });

                setTimeout(function () {
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 4000);

                var number = $('#header_inbox_bar .badge').text();
                number = parseInt(number);
                number = number + 2;
                $('#header_inbox_bar .badge').text(number);
                $('#header_inbox_bar').pulsate({
                    color: "#dd5131",
                    repeat: 5
                });

            }, 60000);
        }
    }
}();

