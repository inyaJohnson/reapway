// Dashboard JS
$(document).ready(function () {
    $('.investment-history').dataTable();

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function sweetAlert(response, redirectTo, failed) {
        if (response.success) {
            Swal.fire(
                'Successful!',
                response.success,
                'success'
            ).then(function (result) {
                if (result.value) {
                    redirectTo()
                }
            })
        } else {
            Swal.fire(
                'Failed!',
                response.error,
                'error'
            ).then(function (result) {
                if (result.value) {
                    failed()
                }
            })
        }
    }

    function sweetConfirmation(warningMessage, successMessage, callback) {
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
                ).then(() => {
                    callback()
                })
            }
        })
    }


    // Deposit blade
    $('.view-recipient').on('click', function () {
        var recipientId = $(this).attr('data-id');
        var transactionId = $(this).attr('data');
        var amount = parseInt($('#amount' + transactionId).val());
        $.ajax({
            type: 'GET',
            url: "show-recipient",
            data: {recipientId: recipientId},
            success: function (response) {
                $('.user-account .user-account-bank').text(response.bank)
                $('.user-account .user-account-name').text(response.name)
                $('.user-account .user-account-number').text(response.number)
                $('.user-account .user-account-phone').text(response.phone)
                $('.user-account .user-account-amount').text(formatNumber(amount))
                $('#recipient-modal a').attr('href', '/report/'+response.userId);

            }
        })
        $('#recipient-modal').modal();
    })


    //Withdrawal Blade

    $('.view-depositor').on('click', function () {
        var depositorId = $(this).attr('data-id');
        var transactionId = $(this).attr('data');
        var amount = parseInt($('#amount' + transactionId).val());
        $.ajax({
            type: 'GET',
            url: "show-depositor",
            data: {depositorId: depositorId},
            success: function (response) {
                $('.user-account .user-account-bank').text(response.bank)
                $('.user-account .user-account-name').text(response.name)
                $('.user-account .user-account-number').text(response.number)
                $('.user-account .user-account-phone').text(response.phone)
                $('.user-account .user-account-amount').text(formatNumber(amount))
                $('#depositor-modal a').attr('href', '/report/'+response.userId);
            }
        })
        $('#depositor-modal').modal();
    })

    $('.confirm-withrawal').on('click', function () {
        var warningMessage = 'You want to confirm this payment'
        var successMessage = 'Payment Confirmed'
        var id = $(this).attr('data-id');
        var callback = function () {
            $.ajax({
                type: 'GET',
                url: '/transactions/confirm-withdrawal',
                data: {id: id},
                success: function (response) {
                    if (response.success) {
                        $('.alert-success').text(response.success).show()
                    }else {
                        $('.alert-danger').text(response.error).show()
                    }
                    location.reload();
                }
            })
        }
        sweetConfirmation(warningMessage, successMessage, callback)
    })


//    Referral form toggle

    $('.referrer-form-toggle').on('click', function () {
        $('#referrer-modal').modal();
    })

    $('#referrer-form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/referral/store',
            data: $(this).serialize(),
            success: function (response) {
                var redirectTo = failed = function () {
                    $('#referrer-modal').modal('toggle');
                    location.reload()
                }
                sweetAlert(response, redirectTo, failed)
            }
        })
    })


// Referral payment
    $('.view-referrer').on('click', function () {
        var referrerId = $(this).attr('data-id');
        var referralId = $('#referral_id').val();
        var amount = $('#amount'+referralId).text();
        $.ajax({
            type: 'GET',
            url: "show-referrer",
            data: {referrerId: referrerId},
            success: function (response) {
                $('.user-account .user-account-bank').text(response.bank)
                $('.user-account .user-account-name').text(response.name)
                $('.user-account .user-account-number').text(response.number)
                $('.user-account .user-account-phone').text(response.phone)
                $('.user-account .user-account-amount').text(formatNumber(amount))
            }
        })
        $('#depositor-modal').modal();
    })

    $('.confirm-referral-withrawal').on('click', function () {
        var warningMessage = 'You want to confirm this payment'
        var successMessage = 'Payment Confirmed';
        var id = $(this).attr('data-id');
        var callback = function () {
            $.ajax({
                type: 'GET',
                url: 'confirm-withdrawal',
                data: {id: id},
                success: function (response) {
                    if (response.success) {
                        $('.alert-success').text(response.success).show()
                    }else {
                        $('.alert-danger').text(response.error).show()
                    }
                    location.reload();
                }
            })
        }
        sweetConfirmation(warningMessage, successMessage, callback)
    })

//    COUNTDOWN
    var deadline = new Date($('#deposit-deadline').val())
    $('.defaultCountdown').countdown({until: deadline, format: 'HMS'});


//    CONFIRM UNBLOCK

    $('.confirm-unblock').on('click', function () {
        var warningMessage = 'Are you sure, you want to unblock this user'
        var successMessage = 'Suspension lifted';
        var id = $(this).attr('data-id');
        var callback = function () {
            $.ajax({
                type: 'GET',
                url: 'confirm-user-unblock',
                data: {id: id},
                success: function (response) {
                    if (response.success) {
                        $('.alert-success').text(response.success).show()
                    }else {
                        $('.alert-danger').text(response.error).show()
                    }
                    location.reload();
                }
            })
        }
        sweetConfirmation(warningMessage, successMessage, callback)
    })

// CONFIRM DEPOSIT WITH FILE UPLOAD
    $('.confirm-deposit-btn').on('click', function () {
        $('#confirm-deposit-modal').modal();
        $("#confirm-deposit-modal #transaction_id").val($(this).attr('data-id'))
        $('#confirm-deposit-form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/transactions/confirm-deposit',
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#success').empty()
                },
                onUploadProgress: function(event, position, total, percentageComplete){
                    $('.progress-bar').text(percentageComplete + '%');
                    $('.progress-bar').css('width', percentageComplete + '%');
                },
                success: function (response) {
                    if(response.error){
                        $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');
                        $('#success').html("<span class='text-danger'><b>"+ response.error+"</b></span>");
                    }

                    if (response.success){
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');
                        $('#success').html("<span class='text-success'><b>"+ response.success+"</b></span><br /><br />");
                        $('#success').append(response.image)
                        $("#confirm-deposit-modal button[type='submit']").hide();
                    }
                },
                error: function (error) {
                    if (error.responseJSON.errors.hasOwnProperty('attachment')) {
                        $('#confirm-deposit-form span').addClass('error').text('The File is required and the size must not be more than 2Mb');
                    }
                }
            })
        })
    })
    $("#confirm-deposit-modal button[type='button']").on('click', function () {
        window.location = '/transactions/history'
    });

//    Report / Block

    //    CONFIRM UNBLOCK
    $('.confirm-block').on('click', function () {
        $('#report-ids').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/report/block-user',
                data: $('#report-ids').serialize(),
                success: function (response) {
                    var redirectTo = failed = function () {
                        location.reload()
                    }
                    sweetAlert(response, redirectTo, failed)
                }
            })
        })
    })


//    INVEST NOW

    $('.invest_submit').on('click', function () {
        // window.alert("hello")
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to invest #" + formatNumber($(this).parents('form').children('.package_price').val()) + "!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Invest Now!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Congrats',
                    'Your investment was successful',
                    'success'
                ).then(()=>{
                    var form = $(this).parents('form:first');
                    form.submit();
                })
            }
        })
    })


})
