$(document).ready(function() {
    var field = $('#input-mask');
    var nicregex = /^\d{7}/;

    window.Parsley.addValidator('custommask', {
        validateString: function(value) {
            return nicregex.test(value);
        },
        messages: {
            en: 'The input does not match the required format.'
        }
    });

    field.on('keyup' , function(){
        var form_id = $('#form_id').val();
        if(nicregex.test(field.val())){
            console.log('okkk');
            checknic(field.val(), form_id ,function(results) {
                field.parsley().removeError('customError');
                console.log(results);
                console.log((results !== null ));
                if(results !== 'false'){
                    field.parsley().addError('customError', { message: results });
                }
            });
        }
    })
    
    function checknic(nic ,form_id, callback){
        $.ajax({
            type: "POST",
            url: "../../action.php",
            data: {'NIC': nic , 'form_id':form_id},
            success: function (response) {
                callback(response);
            },
            error : function(e){
                console.log('Ajax Error'+e)
            }
        });
    }

    
    
    $('#form-submit').submit(function(e){
        e.preventDefault(); 
        // const hidenumber = $('#phone');
        // if(!$(this).parsley().validate()){
        //     return false;
        // }else if($('#hidephone').val() == 1 && $('#ehidephone').val() == 1){
        //     hidenumber.focus();
        //     return false;
        // }
        var data = $(this).serializeArray();
        data.push({name: 'action',value: 'insert'});
        // var formData = new FormData(this);
        // formData.append('insert' ,'');
        var returns = 1;

        if($('#form_action').val() != 'view'){
            // returns = 2;
            Swal.fire(
                {
                    title:"Are you sure you want to proceed?",
                    text:"Please review all details carefully before submitting, as you won't be able to resubmit with the same national ID.",
                    icon:"warning",
                    showCancelButton:!0,
                    confirmButtonText:"Yes, Plese Submit Exam!",
                    cancelButtonText:"No, cancel submission!",
                    confirmButtonClass:"btn btn-success mt-2",
                    cancelButtonClass:"btn btn-danger ms-2 mt-2",
                    buttonsStyling:!1
                }
            ).then(
                function(t){
                    if(t.isConfirmed == false){
                        return false 
                    }else{
                        submit(data)
                    }
                }
            )
        }else{
            submit(data)
        }

       
    })

    function submit(formData){
        // console.log('submit')
        // console.log(formData);
        var buttons = $('#form-submit').find('button')
        buttons.closest('div').append('<div class="spinner-border text-primary m-1" style="width: 30px;height: 30px;position: relative;top: 10px;" role="status"><span class="sr-only">Loading...</span></div>');
        buttons.attr('disabled','disabled');

        $.ajax({
            type: "POST",
            url: "action.php",
            data: formData,
            success: function (response) {
                buttons.attr('disabled',false);
                buttons.siblings('.spinner-border').remove();
                console.log(response);
                
                var ret = JSON.parse(response);
                if(ret.status == 1){
                 
                    $('#form-submit').trigger('reset')
                    Swal.fire({
                        title: 'Exam Form Successfully Inserted!',
                        html : ret.msg,
                        icon: 'success',
                        draggable: true,
                        allowOutsideClick:false
                      });
                }else if(ret.status == 3){
                    Swal.fire({
                        title: ret.title,
                        icon: 'error',
                        text:  ret.msg,
                        allowOutsideClick:false,
                        draggable: true
                      });
                    field.focus();
                }else if(ret.status == 2){
                    const pdfBlob = base64ToBlob(ret.msg, 'application/pdf');
                    const pdfUrl = URL.createObjectURL(pdfBlob);
                    console.log(pdfUrl);
                    $('#form_action').val('')
                    window.open(pdfUrl, '_blank');
                }else if(ret.status == 4){
                   
                    Swal.fire({
                        title: ret.title,
                        icon: ret.st,
                        text:  ret.msg,
                        allowOutsideClick:false,
                        draggable: true
                      });
                }else{
                    alert(ret.msg);
                }
            },
            error : function(e){
                console.log('Ajax Error'+e)
            }
        });
    }
    
   

  // Helper function to convert base64 to Blob
    function base64ToBlob(base64, mimeType) {
        const byteChars = atob(base64);
        const byteArrays = [];

        for (let offset = 0; offset < byteChars.length; offset += 512) {
            const slice = byteChars.slice(offset, offset + 512);
            const byteNumbers = new Array(slice.length);
            for (let i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }
            const byteArray = new Uint8Array(byteNumbers);
            byteArrays.push(byteArray);
        }

        return new Blob(byteArrays, { type: mimeType });
    }
    
});

 // get customer id from dropdown

 function get_customer_id(value){
    // console.log($(value));
    // $('#customer_id').val('');
    var id = $(value).val();
    $('#customer_id').val(id);
    
}


function batchedit(id){
    jQuery('tr.bg-edit').removeClass('bg-edit');
    jQuery('#'+id).addClass('bg-edit')
    jQuery('#'+id).children('td').map(function() {
        let data = $(this)
        if(data.attr('data')){
            if(data.attr('data').includes('|')){
                $.each(data.attr('data').split('|') , function(k , id) {
                    var value = data.text().split('|')[k]
                    value = (value) ? $.trim(value): '';
                    jQuery('#' + id).val(value);
                });
            }else{
                jQuery('#'+data.attr('data')).val(data.text())
            }
        } 
    });

    if(jQuery('#addbatch-submit > input').length === 0){
        jQuery('#addbatch-submit').append('<input class="update" hidden name="update" value="'+id+'"/>');
    }else{
        $('.update').val(id);
    }
    jQuery('#addbatch-submit #addbtn').html('Update')
}