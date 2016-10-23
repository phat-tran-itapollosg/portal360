$(function() {
    
    function monthView() {

        var calendar = $('#calendar');
        //Generate the Calendar
        calendar.fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                // right: 'listDay,listWeek,month'
                right: 'month,basicWeek,basicDay'
            },
            defaultView: 'month',

            lang: locale,
            theme: false, //Do not remove this as it ruin the design
            selectable: true,
            selectHelper: true,
            editable: false,
            navLinks: true,
            views: {
                listDay: { buttonText: 'list day' },
                listWeek: { buttonText: 'list week' }
            },

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
    }

    function listMonthView() {
        var calendar = $('#calendar');
        //Generate the Calendar
        calendar.fullCalendar({
            // header: {
            //     left: 'prev,next today',
            //     // center: 'title',
            //     // right: 'listDay,listWeek,month'
            //     // right: 'month,basicWeek,basicDay'
            // },
            defaultView: 'listMonth',

            lang: locale,
            theme: false, //Do not remove this as it ruin the design
            selectable: true,
            selectHelper: true,
            editable: false,
            navLinks: true,
            // views: {
            //     listDay: { buttonText: 'list day' },
            //     listWeek: { buttonText: 'list week' }
            // },

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
    }

    
    $(window).resize(function(){
        detectMobile();
    });

    detectMobile();
    function detectMobile() {
        var check = mobileAndTabletcheck();
        var detect = detectNavigator();
       if(check || detect || (window.innerWidth <= 800 && window.innerHeight <= 600)) {
         
         listMonthView();
         console.log('===== mobileAndTablet')
         //return true;
       } else {
        monthView();
         ///return false;
       }
    }
    function mobileAndTabletcheck() {
      var check = false;
      (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
      return check;
    };
    function detectNavigator() { 
         if( navigator.userAgent.match(/Android/i)
         || navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i)
         || navigator.userAgent.match(/iPad/i)
         || navigator.userAgent.match(/iPod/i)
         || navigator.userAgent.match(/BlackBerry/i)
         || navigator.userAgent.match(/Windows Phone/i)
         ){
            return true;
          }
         else {
            return false;
          }
    }
//  1e1413e10f011dfebcc6b900cffce8e8da2906d0
});
//  [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) |
