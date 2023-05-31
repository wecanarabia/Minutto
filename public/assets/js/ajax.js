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
            address:address,

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
        var account_number = $("#exampleInputAccount").val();
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
        var work_start = $("#exampleFormWorkStart").val();
        var duration_of_contract = $("#exampleFormControlInput33_3").val();
        var contract_expire = $("#exampleFormControlInput4434").val();
        var branch_id = $("#exampleFormControlInput5535").val();
        var shift_id = $("#exampleFormControlInput6636").val();
        var department_id = $("#exampleFormControlInput7737").val();
        var description = $("#exampleFormControlInput8838").val();
        console.log(work_start);
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







    $("#btn5-sub").on('click',function(){


        var id = $("#id5").val();
        var monthly_salary = $("#exampleFormControlInput1115").val();
        var daily_salary = $("#exampleFormControlInput2225").val();
        var hourly_salary = $("#exampleFormControlInput3335").val();

        $.ajax({
           method:'POST',
           url:"/employees/update/"+id,
           data:{
            monthly_salary:monthly_salary,
            daily_salary:daily_salary,
            hourly_salary:hourly_salary,
           },

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
        var replay = $("#exampleFormControlattendancereplay").val();
        $.ajax({
           method:'POST',
           url:"/attendance/update/"+id,
           data:{
            status:status,
            discount_value:discount_value,
            time_departure:time_departure,
            note:note,
            replay:replay,
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
        var replay = $("#exampleFormControlleavereplay").val();
        $.ajax({
           method:'POST',
           url:"/leaves/update/"+id,
           data:{
            status:status,
            discount_value:discount_value,
            note:note,
            replay:replay,
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

    $("#vacation-submit").on('click',function(){


        var id = $("#id-vacation").val();
        var status = $("#exampleFormVacationStatus").val();
        var from = $("#exampleFormControlvacationfrom").val();
        var to = $("#exampleFormControlvacationto").val();
        var note = $("#exampleFormControlVacationnote").val();
        var replay = $("#exampleFormControlVacationreplay").val();
        $.ajax({
           method:'POST',
           url:"/vacation-requests/update/"+id,
           data:{
            status:status,
            from:from,
            to:to,
            note:note,
            replay:replay,
           },

           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit-vacation');
                    // Close the modal
                    modal.modal('hide');

                        location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });

    $("#advance-submit").on('click',function(){






        var id = $("#id-advance").val();
        var status = $("#exampleFormAdvanceStatus").val();
        var value = $("#exampleFormControladvancevalue").val();
        var req_date = $("#exampleFormControlreqdate").val();
        var note = $("#exampleFormControladvancenote").val();
        var replay = $("#exampleFormControladvancereplay").val();
        $.ajax({
           method:'POST',
           url:"/advances/update/"+id,
           data:{
            status:status,
            value:value,
            req_date:req_date,
            note:note,
            replay:replay,
           },

           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit-advance');
                    // Close the modal
                    modal.modal('hide');

                        location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });

    $("#extra-submit").on('click',function(){










        var id = $("#id-extra").val();
        var status = $("#exampleFormextraStatus").val();
        var from = $("#exampleFormControlextrafrom").val();
        var to = $("#exampleFormControlextrato").val();
        var note = $("#exampleFormControlextranote").val();
        var replay = $("#exampleFormControlextrareplay").val();
        $.ajax({
           method:'POST',
           url:"/extras/update/"+id,
           data:{
            status:status,
            from:from,
            to:to,
            note:note,
            replay:replay,
           },

           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit-extra');
                    // Close the modal
                    modal.modal('hide');

                        location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });

    $("#evacation-submit").on('click',function(){










        var id = $("#id-evacation").val();
        var vacation_balance = $("#exampleFormControlevacationbalance").val();

        $.ajax({
           method:'POST',
           url:"/employee-vacations/update/"+id,
           data:{
            vacation_balance:vacation_balance,

           },

           success:function(data){
                if($.isEmptyObject(data.error)){
                    var modal = $('#edit-evacation');
                    // Close the modal
                    modal.modal('hide');

                        location.reload();

                }else{
                    printErrorMsg(data.error);
                }
           }
        });

    });

    let table;

     table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/salaries/filter",
          data: function (d) {
                d.month = $('#month-filter').val(),
                d.year = $('#year-filter').val()
             },
            dataSrc: function (json) {
                // Get the additional data from the response
                var additionalData = json.additionalData;

                $('#actual').html(additionalData.actual);
                $('#discount').html(additionalData.discounts);
                $('#advance').html(additionalData.advances);
                $('#reward').html(additionalData.rewards);
                $('#extra').html(additionalData.extras);
                $('#net').html(additionalData.net);
                return json.aaData;
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'employee', name: 'employee'},
            {data: 'month', name: 'month'},
            {data: 'year', name: 'year'},
            {data: 'actual_salary', name: 'actual_salary'},
            {data: 'net_salary', name: 'net_salary'},
            {data: 'show', name: 'show'},
        ]
    });


    $('#month-filter').change(function(){
        table.draw();
    });

    $('#year-filter').change(function(){
        table.draw();
    });



});

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
