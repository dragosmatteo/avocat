$(document).ready(function(){

    $('.servicii_block__grid_item').click(function(){
        var formType = $(this).data('form-type');
        $('#modalContactForm__formType').val(formType);
    });

    $('.footer_btn').click(function(){
        var formType = $(this).data('form-type');
        $('#modalContactForm__formType').val(formType);
    });

    $('#modalContactForm__button').click(function(){
        var formType = $('#modalContactForm__formType').val();
        var name = $('#modalContactForm__name').val();
        var phone = $('#modalContactForm__phone').val();

        if (name == '') {
            alert('Introdu numele tau');
            return false;
        } else if (phone == '') {
            alert('Introdu numarul tau de telefon');
            return false;
        }

        $.ajax ({
            url: 'ajax/mail.php',
            type: 'POST',
            cache: false,
            data: {
                'name': name, 'phone': phone, 'formType': formType
            },
            dataType: 'html',
            beforeSend: function () {
                $("#modalContactForm__button").prop("disabled", true);
            },
            success: function (data){
                if(!data)
                    alert("Были ошибки, сообщение не отправлено");
                else
                    $("#modalContactForm").trigger("reset");
                    alert("Am primit comanda!");
                    $("#modalContactForm__button").prop("disabled", false);
                    $("#modalForm").modal('hide');
            },
        });

    });

    $('#contactForm__button').click(function(){
        var name = $('#contactForm__name').val();
        var phone = $('#contactForm__phone').val();

        if (name == '') {
            alert('Introdu numele tau');
            return false;
        } else if (phone == '') {
            alert('Introdu numarul tau de telefon');
            return false;
        }

        $.ajax ({
            url: 'ajax/contact-mail.php',
            type: 'POST',
            cache: false,
            data: {
                'name': name, 'phone': phone
            },
            dataType: 'html',
            beforeSend: function () {
                $("#contactForm__button").prop("disabled", true);
            },
            success: function (data){
                if(!data)
                    alert("Были ошибки, сообщение не отправлено");
                else
                    $("#contactForm").trigger("reset");
                    alert("Am primit comanda!");
                    $("#contactForm__button").prop("disabled", false);
            },
        });

    });

});