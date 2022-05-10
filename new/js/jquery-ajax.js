
$(document).ready(function() {
    let testForm = $('#testForm');
    testForm.submit(function() {
        if ($('#name').val().length < 5) {
            alert("В имени введите не менее 5 символов!");
            $('#name').focus();
            return false;
        }
        if ($('#email').val().length < 5) {
            alert("Введите не менее 5 символов!");
            $('#email').focus();
            return false;
        }

        if ($('input[name="skills[]"]:checked').length == 0) {
            alert("Выберите хотя бы один пункт из предложенных знаний!");
            return false;
        }
        $.ajax({
            url: testForm.attr('action'),
            type: 'POST',
            data: testForm.serialize(),
            dataType: 'html',
            beforeSend: function() {
                $('.loader').show();
            }
        }).done(function(result) {
            $(".small-width tbody").html(result);
        }).always(function() {
            $('.loader').hide();
        });
        return false;
    });
})


/*
var somerequest = $.ajax({ ... });
somerequest.done(function(data) { / Код 1 / });
somerequest.done(function(data) { / Код 2 / });
*/