$('.js--phone').mask("+7 (999) 999-99-99");

$('.js--send-code-btn').unbind('click').on('click', function () {
    var $this = $(this);
    $this.parent().hide();
    $('.js--validate-loader').show();
    $.ajax({
        url: '/sendcode',
        type: 'post',
        data: $('.js--auth-form').serialize(),
        success: function (data) {
            if (data !== 'success') {
                showErrors(JSON.parse(data));
                $this.parent().show();
                $('.js--validate-loader').hide();
            }
            else {
                hideErrors();
                $('.js--validate-loader').hide();
                acceptLogin();
            }
        },
        error: function (jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
});

$('.js--repeat-code-btn').unbind('click').on('click', function () {
    var $this = $(this);
    $('.js--code-raws').hide();
    $('.js--validate-loader').show();
    $.ajax({
        url: '/sendcode',
        type: 'post',
        data: $('.js--auth-form').serialize(),
        success: function (data) {
            if (data !== 'success') {
                showErrors(JSON.parse(data));
                $('.js--send-code-btn').show();
                $('.js--validate-loader').hide();
            }
            else {
                hideErrors();
                $('.js--validate-loader').hide();
                acceptLogin();
            }
        },
        error: function (jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
});

$('.js--login-btn').unbind('click').on('click', function () {
    var $this = $(this);
    $this.parent().hide();
    $('.js--login-loader').show();
    $.ajax({
        url: '/entercode',
        type: 'post',
        data: $('.js--auth-form').serialize(),
        success: function (data) {
            if (data !== 'success') {
                showErrors(JSON.parse(data));
                $this.parent().show();
                $('.js--login-loader').hide();
            }
            else {
                hideErrors();
                $('.js--login-loader').hide();
                document.location.href = '/welcome';
            }
        },
        error: function (jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
});

function showErrors(data) {
    ['name', 'phone', 'code'].forEach(function (value) {
        if (data[value] !== undefined && data[value] !== null)
            $('.js--error-' + value).html(data[value]);
        else
            $('.js--error-' + value).html('');
    });
}

function hideErrors() {
    ['name', 'phone', 'code'].forEach(function (value) {
        $('.js--error-' + value).html('');
    });
}

function acceptLogin() {
    $('.js--code-raws').show();
    $('.js--login-btn').prop('disabled', false);
}