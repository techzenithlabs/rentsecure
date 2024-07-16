$(document).ready(function(){
    $('.accordion .btn-link').on('click', function() {
        var icon = $(this).find('.icon');
        var isExpanded = $(this).attr('aria-expanded') === 'true';

        if (isExpanded) {
            icon.text('+');
        } else {
            icon.text('-');
        }
    });

    $('.accordion .collapse').on('show.bs.collapse', function() {
        $(this).siblings('.card-header').find('.icon').text('-');
    });

    $('.accordion .collapse').on('hide.bs.collapse', function() {
        $(this).siblings('.card-header').find('.icon').text('+');
    });

})
