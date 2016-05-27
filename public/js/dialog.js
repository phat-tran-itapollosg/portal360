/*
*   Dialog
*   Author: Hieu Nguyen
*   Date: 2016-03-16
*   Purpose: To handle dialogs
*   Dependencies: sweet-alert.js
*/ 

var Dialog = {
    // Show alert message with message type: '', info, success, error, warning
    alert: function(messsage, type) {
        var title = (type == 'warning') ? 'Warning' : 'Info';
        swal(title, messsage, type);
    },
    
    // Show confirm message
    confirm: function(messsage, callback) {
        swal({   
            title: 'Confirm',   
            text: messsage,   
            type: 'warning',   
            showCancelButton: true,   
            confirmButtonColor: '#f44336',   
            confirmButtonText: 'OK',   
            closeOnConfirm: true 
        }, function(){   
            callback(); 
        });
    }
};