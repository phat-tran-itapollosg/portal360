var loading = new Spinner();
var detail;
var LMSDetail;
$(document).ready(function(){

    $("#class_id").select2({
        'language' : locale,    
    });

    $("#gradebook-filter").on("change",'#class_id',function(){
        getGradebookContent();
        
        if($('#class_id').val() == "")
        {
            $('.panel-body').hide();
        }
        else
        {
            $('.panel-body').show();
        }
    });
    function getGradebookContent() {

        loading.show("Processing...");
        var _this = $("#class_id");
        if(_this.val() == '') {
            $('.gradebook_content').html("");
            $('.gradebook_result').html("");
            loading.hide();
            return;
        }
        var base = $("base").attr('href');
        //console.log('========> ')
        jQuery.ajax({ 
            url: base+"/gradebook/getGradebookDetail", 
            type: "POST", 
            async: true,
            data:{   
                class_id: _this.val(),                                                     
            }, 
            success: function(data){       
                //console.log(data) ;  
                data = $.parseJSON(data);
                $('.gradebook_content').html(data.html);
                $('.gradebook_result').html(data.total_result);
                detail =  data.detail;
                LMSDetail =  data.getLMSDetail;
                loading.hide();
            },
            error: function(){                    
                $('.gradebook_content').html("");
                $('.gradebook_result').html("");
                loading.hide();
            },
        }); 
    }
    getGradebookContent();

    $(".panel-body").on("click",".btn_detail", function(){
        var _this = $(this);
        var data = _this.attr('data');
        $("#gradebook_detail .modal-body").html(detail[data]);
        $('#gradebook_detail').modal("show");        
    });

    $(".panel-body").on("click",".grade_type", function(){
        var _this = $(this);
        var data = _this.attr('data');
        $("#type_detail .modal-body").html(detail[data]);
        $('#type_detail').modal("show");        
    });
    $(".panel-body").on("click",".btn_lms_detail", function(){
        var _this = $(this);
        var data = _this.attr('data');
        $("#get-lms-detail .modal-body").html(LMSDetail[data].body);
        $("#get-lms-detail .modal-header .modal-title").html(LMSDetail[data].title);
        $('#get-lms-detail').modal("show");        
    });
});