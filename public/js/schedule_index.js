$(function() {
    var calendar = $('#calendar');

    //Generate the Calendar
    calendar.fullCalendar({
        header: {
            right: '',
            center: 'prev, title, next',
            left: ''
        },

        lang: locale,
        theme: true, //Do not remove this as it ruin the design
        selectable: true,
        selectHelper: true,
        editable: true,

        //Add Events
        events: scheduleEvents,

        //On Day Select
        select: function(start, end, allDay) {
            // Do nothing
        }
    });

    // Add Action button with dropdown in Calendar header.
    var actionMenu =  $('#action-menu');
    calendar.find('.fc-toolbar').append(actionMenu);

    //Calendar views
    $('body').on('click', '#fc-actions [data-view]', function(e){
        e.preventDefault();
        var dataView = $(this).attr('data-view');

        $('#fc-actions li').removeClass('active');
        $(this).parent().addClass('active');
        calendar.fullCalendar('changeView', dataView);
    });
});
