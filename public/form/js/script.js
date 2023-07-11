$(function () {
    'use strict';
    $.fn.showForm = function () {
        $('.overlay').fadeIn(500);
        $(this).fadeIn(500);
        $('body').css('overflow', 'hidden');
    }
    $.fn.closeForm = function () {
        $(this).fadeOut(500);
        $('.overlay').fadeOut(500);
        $('body').css('overflow', 'auto');
    }
    $('.btn-log').click(function () {
        $('.form-log').showForm();
    });

    $('.btn-sign').click(function () {
        $('.form-sign').showForm();
    });
    $('.exit').click(function () {
        $(this).parent().closeForm();
    });
});
