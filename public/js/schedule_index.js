$(function() {
    var calendar = $('#calendar');

    //Generate the Calendar
    calendar.fullCalendar({
        header: {
//  1e1413e10f011dfebcc6b900cffce8e8da2906d0
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },

        lang: locale,
        theme: false, //Do not remove this as it ruin the design
//  [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) |
        selectable: true,
        selectHelper: true,
        editable: false,

        //Add Events
        events: scheduleEvents,
        timeFormat: "H:mm",
        //On Day Select
        select: function(start, end, allDay) {
            // Do nothing
        },  

        eventClick: function(calEvent, jsEvent, view) {
            $(".session_detail .class_name").text(calEvent.class_name);
            $(".session_detail .duration").text(calEvent.duration);
            $(".session_detail .starttime").text(calEvent.starttime);
            $(".session_detail .endtime").text(calEvent.endtime);
            $(".session_detail .teacher_name").text(calEvent.teacher_name);
           // $(".session_detail .room_name").text(calEvent.room_name);
            
            $('#session_detail').modal("show");                 
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
//  1e1413e10f011dfebcc6b900cffce8e8da2906d0
});
//  [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) |
