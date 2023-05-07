$(document).ready(function() {
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#btn1-submit").on('click',function(){


        var id = $("#id1").val();
        var nationality = $("#exampleFormControlInput1111").val();
        var gender = $(".flexRadioDefault1:checked").val();
        var maritalStatus = $("#exampleFormControlInput3333").val();
        var DateOfBirth = $("#exampleFormControlInput4444").val();
        var PassportNo = $("#exampleFormControlInput5555").val();
        var nationalId = $("#exampleFormControlInput6666").val();
        var eContact = $("#exampleFormControlInput7777").val();
        var address = $("#exampleFormControlInput8888").val();
        $.ajax({
           method:'POST',
           url:"/employees/update/"+id,
           data:{
            nationality:nationality,
            gender:gender,
            marital_status:maritalStatus,
            date_of_birth:DateOfBirth,
            passport_identity:PassportNo,
            national_identity:nationalId,
            emergency_contact:eContact,
            address:address
            },
           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit1');

                    // Close the modal
                    modal.modal('hide');
                    location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });

    $("#btn2-submit").on('click',function(){


        var id = $("#id2").val();
        var bank_name = $("#exampleFormControlInput1211").val();
        var account_number = $(".exampleFormControlInput2_22").val();
        var bank_branch = $("#exampleFormControlInput3233").val();
        var ipan = $("#exampleFormControlInput4244").val();
        var swift_number = $("#exampleFormControlInput5255").val();

        $.ajax({
           method:'POST',
           url:"/employees/update/"+id,
           data:{
            bank_name:bank_name,
            account_number:account_number,
            bank_branch:bank_branch,
            ipan:ipan,
            swift_number:swift_number
            },
           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit2');

                    // Close the modal
                    modal.modal('hide');

                    location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });


    $("#btn3-submit").on('click',function(){


        var id = $("#id3").val();
        var career = $("#exampleFormControlInput1131").val();
        var work_start = $(".exampleFormControlInput2232").val();
        var duration_of_contract = $("#exampleFormControlInput33_3").val();
        var contract_expire = $("#exampleFormControlInput4434").val();
        var branch_id = $("#exampleFormControlInput5535").val();
        var shift_id = $("#exampleFormControlInput6636").val();
        var department_id = $("#exampleFormControlInput7737").val();
        var description = $("#exampleFormControlInput8838").val();
        $.ajax({
           method:'POST',
           url:"/employees/update/"+id,
           data:{
            career:career,
            work_start:work_start,
            duration_of_contract:duration_of_contract,
            contract_expire:contract_expire,
            branch_id:branch_id,
            shift_id:shift_id,
            department_id:department_id,
            description:description
            },
           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit3');

                    // Close the modal
                    modal.modal('hide');

                    location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });

    $("#btn4-sub").on('click',function(){


        var id = $("#id4").val();
        var name = $("#exampleFormControlInput1114").val();
        var last_name = $("#exampleFormControlInput2224").val();
        var phone = $("#exampleFormControlInput3334").val();
        var email = $("#exampleFormControlInput4440").val();
        var password = $("#exampleFormControlInput5554").val();
        var image = $('#exampleFormControlInput6664')[0].files[0];
        var active = $(".flexRadioDefault44:checked").val();
        var form = new FormData();
        form.append('name',name);
        form.append('last_name',last_name);
        form.append('phone',phone);
        form.append('email',email);
        form.append('password',password);
        form.append('image',image);
        form.append('active',active);
        $.ajax({
           method:'POST',
           enctype:"multipart/form-data",
           url:"/employees/update/"+id,
           data:form,
            cache: false,
            contentType: false,
            processData: false,
           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit4');

                    // Close the modal
                    modal.modal('hide');

                    location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });

    $("#attendance-submit").on('click',function(){


        var id = $("#id-attendance").val();
        var status = $("#exampleFormAtgtendanceStatus").val();
        var discount_value = $("#exampleFormControlattenddiscount").val();
        var time_departure = $("#exampleFormControldeparturetime").val();
        var note = $("#exampleFormControlattendancenote").val();
        $.ajax({
           method:'POST',
           url:"/attendance/update/"+id,
           data:{
            status:status,
            discount_value:discount_value,
            time_departure:time_departure,
            note:note,
           },

           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit-attendance');
                    // Close the modal
                    modal.modal('hide');

                        location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });

    $("#leave-submit").on('click',function(){


        var id = $("#id-leave").val();
        var status = $("#exampleFormleaveStatus").val();
        var discount_value = $("#exampleFormControlleavediscount").val();
        var note = $("#exampleFormControlleavenote").val();
        $.ajax({
           method:'POST',
           url:"/leaves/update/"+id,
           data:{
            status:status,
            discount_value:discount_value,
            note:note,
           },

           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit-attendance');
                    // Close the modal
                    modal.modal('hide');

                        location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });

});

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
