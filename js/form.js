'use strict';
var errorNotifier = function(element, resetOn, isParent) {
    if (isParent) {
        element.addClass('has-error');
        element.on(resetOn, function() {
            element.removeClass('has-error');
        });
    } else {
        element.parents('.form-group').addClass('has-error');
        element.on(resetOn, function() {
            element.parents('.form-group').removeClass('has-error');
        });
    }
}
var formValidator = function(event) {
    var validationFailed = false;
    if (!$('#candidate_first_name').val()) {
        validationFailed = true;
        errorNotifier($('#candidate_first_name'), 'keyup');
    }
    if (!$('#candidate_last_name').val()) {
        validationFailed = true;
        errorNotifier($('#candidate_last_name'), 'keyup');
    }
    if (!$('#candidate_dob').val()) {
        validationFailed = true;
        errorNotifier($('#candidate_dob'), 'click');
    }
    if (!$('#candidate_weight').val()) {
        validationFailed = true;
        errorNotifier($('#candidate_weight'), 'keyup');
    }
    if (!$('#country').val()) {
        validationFailed = true;
        errorNotifier($('#country'), 'change');
    }
    if (!$('#kata').is(":checked") &&
        !$('#kumite').is(":checked") &&
        !$('#weapons').is(":checked") &&
        !$('#team_kata').is(":checked")) {
        validationFailed = true;
        errorNotifier($('#kata').parents('.form-group'), 'click', true);
    }
    if (!$('#candidate_mo_num').val()) {
        validationFailed = true;
        errorNotifier($('#candidate_mo_num'), 'keyup');
    }
    if (!$('#candidate_email').val()) {
        validationFailed = true;
        errorNotifier($('#candidate_email'), 'keyup');
    }
    if (!$('#address').val()) {
        validationFailed = true;
        errorNotifier($('#address'), 'keyup');
    }
    if (validationFailed) {
        event.preventDefault();
    }
};
$(document).ready(function() {
    $('#country').change(function() {
        var country = $(this).val();
        if (country === 'India') {
            $(".states-selection").append($('.states-selection-template').html());
            $(".club-selection").append($(".club-select-template").html());

            $('#club').change(function() {
                var club = $(this).val();
                if (club === 'Others') {
                    $(".club-input").append($(".club-input-template").html());
                } else {
                    if ($('.club-input').length !== 0) {
                        $('.club-input').empty();
                    }
                }
            });
        } else {
            if ($('.club-selection').length !== 0) {
                $('.club-selection').empty();
            }
            if ($('.states-selection').length !== 0) {
                $('.states-selection').empty();
            }
        }
    });
    $('#submit_button').click(formValidator);
});


/*

    if (!$('#club').val()) {
        console.log('validation faild in club');
    }
if (true) {
    console.log('validation faild');
}*/
