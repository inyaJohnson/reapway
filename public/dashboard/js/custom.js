// Dashboard JS
$(document).ready(function () {
    $('.data-table').dataTable();

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
                callback()
            }
        })
    }

    //    CONFIRM UNBLOCK

    $('.confirm-generic-block').on('click', function () {
        var warningMessage = 'Are you sure, you want to block this user'
        var successMessage = 'User Suspended';
        var id = $(this).attr('data-id');
        var callback = function () {
            $.ajax({
                type: 'GET',
                url: '/users/block/' + id,
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        $('.alert-danger').text(response.error).show()


                    }

                }
            })
        }
        sweetConfirmation(warningMessage, successMessage, callback)
    })


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
                    } else {
                        $('.alert-danger').text(response.error).show()
                    }
                    location.reload();
                }
            })
        }
        sweetConfirmation(warningMessage, successMessage, callback)
    })


    // CONFIRM DEPOSIT
    $('.confirm-deposit-btn').on('click', function () {
        var warningMessage = 'You want to confirm this payment'
        var successMessage = 'Payment Confirmed'
        var id = $(this).attr('data-id');
        var callback = function () {
            $.ajax({
                type: 'GET',
                url: '/deposit/confirm-deposit',
                data: {id: id},
                success: function (response) {
                    var redirectTo = failed = function () {
                        location.reload()
                    }
                    sweetAlert(response, redirectTo, failed)
                }
            })
        }
        sweetConfirmation(warningMessage, successMessage, callback)
    })

    // CONFIRM DEPOSIT WITH FILE UPLOAD
    $('.upload-payment-btn').on('click', function () {
        $('#upload-payment-modal').modal();
        $("#upload-payment-modal #deposit_id").val($(this).attr('data-id'))
        $('#upload-payment-form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/deposit/upload-payment',
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#success').empty()
                },
                onUploadProgress: function (event, position, total, percentageComplete) {
                    $('.progress-bar').text(percentageComplete + '%');
                    $('.progress-bar').css('width', percentageComplete + '%');
                },
                success: function (response) {
                    if (response.error) {
                        $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');
                        $('#success').html("<span class='text-danger'><b>" + response.error + "</b></span>");
                    }

                    if (response.success) {
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');
                        $('#success').html("<span class='text-success'><b>" + response.success + "</b></span><br /><br />");
                        $('#success').append(response.image)
                        $("#upload-payment-modal button[type='submit']").hide();
                    }

                    $("#upload-payment-modal button[type='button']").on('click', function () {
                        $('#upload-payment-modal').modal()
                        location.reload();
                    });
                },
                error: function (error) {
                    if (error.responseJSON.errors.hasOwnProperty('attachment')) {
                        $('#upload-payment-form span').addClass('error').text('The File is required and the size must not be more than 2Mb');
                    }
                }
            })
        })
    })


    // CONFIRM WITHDRAWAL
    $('.confirm-withdrawal-btn').on('click', function () {
        var warningMessage = 'You want to confirm this payment'
        var successMessage = 'Payment Confirmed'
        var id = $(this).attr('data-id');
        var callback = function () {
            $.ajax({
                type: 'GET',
                url: '/withdrawal/confirm-deposit',
                data: {id: id},
                success: function (response) {
                    var redirectTo = failed = function () {
                        location.reload()
                    }
                    sweetAlert(response, redirectTo, failed)
                }
            })
        }
        sweetConfirmation(warningMessage, successMessage, callback)
    })

    // CONFIRM WITHDRAWAL WITH FILE UPLOAD
    $('.upload-withdrawal-payment-btn').on('click', function () {
        $('#upload-withdrawal-payment-modal').modal();
        $("#upload-withdrawal-payment-modal #deposit_id").val($(this).attr('data-id'))
        $('#upload-withdrawal-payment-form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/withdrawal/upload-payment',
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#success').empty()
                },
                onUploadProgress: function (event, position, total, percentageComplete) {
                    $('.progress-bar').text(percentageComplete + '%');
                    $('.progress-bar').css('width', percentageComplete + '%');
                },
                success: function (response) {
                    if (response.error) {
                        $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');
                        $('#success').html("<span class='text-danger'><b>" + response.error + "</b></span>");
                    }

                    if (response.success) {
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');
                        $('#success').html("<span class='text-success'><b>" + response.success + "</b></span><br /><br />");
                        $('#success').append(response.image)
                        $("#upload-withdrawal-payment-modal button[type='submit']").hide();
                    }

                    $("#upload-withdrawal-payment-modal button[type='button']").on('click', function () {
                        $('#upload-withdrawal-payment-modal').modal()
                        location.reload();
                    });
                },
                error: function (error) {
                    if (error.responseJSON.errors.hasOwnProperty('attachment')) {
                        $('#upload-withdrawal-payment-form span').addClass('error').text('The File is required and the size must not be more than 2Mb');
                    }
                }
            })
        })
    })




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
            text: "You want to invest #" + formatNumber($(this).parents('form').children("input[name='amount']").val()) + "!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Invest Now!'
        }).then((result) => {
            if (result.value) {
                var form = $(this).parents('form:first');
                form.submit();
            }
        })
    })


//    HELP

    $('#help-form').on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/help',
            data: formData,
            contentType : false,
            processData : false,
            cache: false,
            beforeSend: function () {
                swal.showLoading()
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire(
                        'Successful!',
                        response.success,
                        'success'
                    ).then(function (result) {
                        if (result.value) {
                            window.location = '/home'
                        }
                    })
                } else {
                    Swal.fire(
                        'Failed!',
                        response.error,
                        'error'
                    ).then(function (result) {
                        if (result.value) {
                            window.location = '/home'
                        }
                    })
                }
            },
            error: function (error) {
                if (error.responseJSON.errors.hasOwnProperty('attachment')) {
                    $('p.warning').addClass('error').text('The File is required and the size must not be more than 2Mb');
                }
            }
        })
    })


    //Help request

    $('.request-message-btn').on('click', function () {
        var id = $(this).attr('data-id')
        $.ajax({
            type: 'GET',
            url: '/help/' + id,
            success: function (response) {
                $('.modal-title span').text(response.name)
                $('.modal-body h5').text(response.subject)
                $('.modal-body p').text(response.message)
                $('.modal-footer a').attr('href', '/response/create/' + response.id)
            }
        })
        $('#request-message-modal').modal();
    })

    //    Actual Withdrawal
    $('.actual-withdrawal-btn').on('click', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to withdraw #" + formatNumber($(this).parents('form').children("input[name='amount']").val()) + "!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Withdraw Now!'
        }).then((result) => {
            if (result.value) {
                var form = $(this).parents('form:first');
                form.submit();
            }
        })
    })

})
