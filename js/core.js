function modalresizer() {
    $(".modal-window.modal-window_active").removeClass("modal-window_absolute");
    $("body").removeClass("modal-window_active");
    if ($(".modal-window.modal-window_active").innerHeight() > ($(window).height() - ($(window).height() * 0.1))) {
        $(".modal-window.modal-window_active").addClass("modal-window_absolute");
        $("body").addClass("modal-window_active");
    } else {
        var getheight = $(window).height();
        var getmodalheight = $(".modal-window.modal-window_active").innerHeight();
        var gtx = getheight - getmodalheight;
        gtx = gtx / 2;
        $(".modal-window.modal-window_active").css({
            "top": gtx
        });
    }
}

function openmodal(artic) {
    if ($(".modal-window.modal-window_active").length > 0) {
        $(".modal-window.modal-window_active").animate({
            opacity: 0
        }, 500, function() {
            $(".modal-window.modal-window_active").removeClass("modal-window_active modal-window_absolute");
            $("#" + artic).addClass("modal-window_active");
            modalresizer();
            $("#" + artic).animate({
                opacity: 1
            }, 500);
        });
    } else {
        $("#" + artic).addClass("modal-window_active");
        modalresizer();
        $("#" + artic).animate({
            opacity: 1
        }, 500);
        $(".modal-shadow").addClass("modal-window_active");
        $(".modal-shadow").animate({
            opacity: 0.8
        }, 500);
    }
}

function closemodal() {
    $(".modal-window, .modal-shadow").animate({
        opacity: 0
    }, 500, function() {
        $(".modal-window, .modal-shadow, body").removeClass("modal-window_active");
    });
}

$(document).ready(function() {

    $("body").prepend("<div class='modal-shadow'></div>");

    $(".modal-window").each(function() {
        $(this).prepend("<a href='' class='modal-window__close-modal'></a>");
    });

    $("body").on("click", ".modal-window__close-modal, .modal-shadow", function(e) {
        closemodal();
        e.preventDefault();
    });

    if ($(".head-nav").length > 0) {
        $(".head-nav").clone().appendTo(".js-cloned-menu").addClass("head-nav_mobile");
    }

    $(".js-open-mobile-nav").click(function(e) {
        $(this).toggleClass("mobile-header__open-nav_active");
        $(".mobile-menu").toggleClass("mobile-menu_active");
        e.preventDefault();
    });

    if ($(".chosen-select").length > 0) {
        $(".chosen-select").chosen({
            disable_search_threshold: 10,
            width: '100%'
        });
    }

    if ($(".js-clone-part").length > 0) {
        $(".js-add-number").click(function(e) {
            $(".js-number-part .chosen-select").chosen("destroy");
            $(".js-clone-part").clone().appendTo(".js-clone-part-wrap").removeClass("js-clone-part").addClass("js-cloned-part");
            var l = $(".js-clone-part-wrap").children(".js-cloned-part").length + 1;
            var num = l - 2;
            $(".js-clone-part-wrap").children('.js-cloned-part').eq(num).find('.js-nc-number span').html(l);
            $(".js-clone-part-wrap").children('.js-cloned-part').eq(num).find('.js-nc-number').append("<a href='' class='nc-number__right js-del-number'>Удалить номер</a>");
            $(".js-clone-part-wrap").children('.js-cloned-part').eq(num).find(".js-rcform").remove();

            $(".js-number-part .chosen-select").chosen({
                disable_search_threshold: 10,
                width: '100%'
            });
            e.preventDefault();
        });

        $("body").on("click", ".js-del-number", function(e) {
            $(this).parents(".js-cloned-part").remove();
            var i = 1;
            $('.js-cloned-part').each(function() {
                i++;
                $(this).find('.js-nc-number span').html(i);
            });
            e.preventDefault();
        });



        $("body").on("change", ".js-sm-select", function() {

            $(this).parents(".js-childrens").find(".chosen-select").chosen("destroy");

            if ($(this).hasClass("js-select-active")) {
                $(this).parents(".js-clone-sl").clone().appendTo($(this).parents('.js-childrens'));
                $(this).parents(".js-clone-sl").addClass("js-rcform");
                $(this).hide().removeClass("chosen-select");
                $(this).before("<div class='dv-hidden'><div class='rlt-input'>" + $(this).val() + "</div><a href='#' class='js-rclnk'></a></div>");

                $(this).removeClass("js-select-active");
            }

            $(".js-number-part .chosen-select").chosen({
                disable_search_threshold: 10,
                width: '100%'
            });
        });

        $("body").on("click", ".js-rclnk", function(e) {
            $(this).parents(".js-clone-sl").remove();
            e.preventDefault();;
        });
    }

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $("body").toggleClass("active");
            closemodal();
        }
    });

    $(".head-nav__link_has-submenu").click(function(e) {
        e.preventDefault();
    });


    $(".num-block__minus").click(function(e) {
        var number = parseInt($(this).parents(".js-num-block").find(".num-block__field").val()) - 1;
        if (number < 1) { number = 1; }
        $(this).parents(".js-num-block").find(".num-block__field").val(number);
        e.preventDefault();
    });

    $(".num-block__plus").click(function(e) {
        var number = parseInt($(this).parents(".js-num-block").find(".num-block__field").val()) + 1;
        $(this).parents(".js-num-block").find(".num-block__field").val(number);
        e.preventDefault();
    });

    if ($(".js-comment-slider").length > 0) {
        $(".js-comment-slider").owlCarousel({
            nav: true,
            items: 1,
            loop: true
        });
    }


    if ($(".js-datapicker").length > 0) {

        $(".js-input-focus").click(function() {
            $(this).find(".js-datapicker").focus();
        });




        $(".js-datapicker").datepicker();

        $.datepicker.setDefaults({
            closeText: 'Закрыть',
            prevText: '&#x3C;Пред',
            nextText: 'След&#x3E;',
            currentText: 'Сегодня',
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
            ],
            monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
                'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'
            ],
            dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
            dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            weekHeader: 'Нед',
            dateFormat: 'dd.mm.yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        });
    }


});

var doit;
window.onresize = function() {
    clearTimeout(doit);
    doit = setTimeout(function() {
        if ($(".modal-window.modal-window_active").length > 0) {
            modalresizer();
        }
    }, 500)

}