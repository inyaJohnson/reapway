// Dashboard JS
$(document).ready(function () {
    $('.investment-history').dataTable();

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function sweetAlert(response, redirectTo, failed){
        if (response.success) {
            Swal.fire(
                'Successful!',
                response.success,
                'success'
            ).then(function (result) {
                if(result.value){
                    redirectTo()
                }
            })
        } else {
            Swal.fire(
                'Failed!',
                response.error,
                'error'
            ).then(function(result){
                if (result.value){
                    failed()
                }
            })
        }
    }

    function sweetConfirmation(warningMessage, successMessage, callback){
        Swal.fire({
            title: 'Are you sure?',
            text: warningMessage + "!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm Now!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Congrats',
                    successMessage,
                    'success'
                ).then(()=>{
                    callback()
                })
            }
        })
    }


    // Deposit blade
    $('.view-recipient').on('click', function(){
        var recepientId = $(this).attr('data-id');
        var transactionId = $(this).attr('data');
        var amount = parseInt($('#amount'+transactionId).val());
        $.ajax({
            type: 'GET',
            url: "show-recipient",
            data: {recepientId:recepientId},
            success : function (response) {
                $('.user-account .user-account-bank').text(response.bank)
                $('.user-account .user-account-name').text(response.name)
                $('.user-account .user-account-number').text(response.number)
                $('.user-account .user-account-phone').text(response.phone)
                $('.user-account .user-account-amount').text(formatNumber(amount))
            }
        })
        $('#recipient-modal').modal();
    })



    //Withdrawal Blade

    $('.view-depositor').on('click', function(){
        var recepientId = $(this).attr('data-id');
        var transactionId = $(this).attr('data');
        var amount = parseInt($('#amount'+transactionId).val());
        $.ajax({
            type: 'GET',
            url: "show-depositor",
            data: {recepientId:recepientId},
            success : function (response) {
                $('.user-account .user-account-bank').text(response.bank)
                $('.user-account .user-account-name').text(response.name)
                $('.user-account .user-account-number').text(response.number)
                $('.user-account .user-account-phone').text(response.phone)
                $('.user-account .user-account-amount').text(formatNumber(amount))
            }
        })
        $('#depositor-modal').modal();
    })

    $('.confirm-withrawal').on('click', function () {
        var warningMessage = 'You want to confirm this payment'
        var successMessage = 'Payment Confirmed'
        var callback  =  function () {
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'GET',
                url:'/transactions/confirm-withdrawal',
                data:{id:id},
                success: function (response) {
                    location.reload();
                    if(!response.success){
                        $('.alert-danger').text(response.error).show()
                    }
                    $('.alert-success').text(response.success).show()
                }
            })
        }
        sweetConfirmation(warningMessage, successMessage, callback)
    })

//    CONFIRM DESPOSIT

        $('.confirm-deposit-btn').on('click', function () {
            $('#confirm-deposit-modal').modal();
            $("#confirm-deposit-modal #transaction_id").val($(this).attr('data-id'))
            $('#confirm-deposit-form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    type:'POST',
                    url:'/transactions/confirm-deposit',
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        var redirectTo  = failed = function(){
                            $('#confirm-deposit-modal').modal('toggle');
                            location.reload()
                        }

                        sweetAlert(response, redirectTo, failed)
                    }
                })
            })
        })


})
