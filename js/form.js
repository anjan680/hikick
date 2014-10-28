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
var validateEmail = function(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validateWeight(email) {
    var re = /\d\d\.\d\d/;
    return re.test(email);
}
var formValidator = function(event) {
    var validationFailed = false;
    if (!$('#candidate_name').val()) {
        validationFailed = true;
        errorNotifier($('#candidate_name'), 'keyup');
    }
    if (!$('#candidate_dob').val()) {
        validationFailed = true;
        errorNotifier($('#candidate_dob'), 'click');
    }
    if (!$('#candidate_weight').val() ||
        !validateWeight($('#candidate_weight').val())) {
        validationFailed = true;
        errorNotifier($('#candidate_weight'), 'keyup');
    }
    if (!$('#country').val()) {
        validationFailed = true;
        errorNotifier($('#country'), 'change');
    }
    if ($('#country').val() === 'India') {
        if (!$('#state').val()) {
            validationFailed = true;
            errorNotifier($('#state'), 'change');
        }
        if (!$('#club').val()) {
            validationFailed = true;
            errorNotifier($('#club'), 'change');
        }
        if ($('#club').val() === 'Others') {
            if (!$('#club_name_other').val() ||
                $('#club_name_other').val() === 'Others') {
                validationFailed = true;
                errorNotifier($('#club_name_other'), 'keyup');
            }
        }
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
    if (!$('#candidate_email').val() ||
        !validateEmail($('#candidate_email').val())) {
        validationFailed = true;
        errorNotifier($('#candidate_email'), 'keyup');
    }
    if (!$('#address').val()) {
        validationFailed = true;
        errorNotifier($('#address'), 'keyup');
    }
    console.log();
    if (!$('#file').val() ||
        $('.picture').attr('src') === 'images/default-profile.png' ||
        $('.picture').attr('src').substring(5, 10) !== 'image' ||
        $('#file')[0].files[0].size > 1024 * 1024 * 2) {
        validationFailed = true;
        $('.picture').addClass('error-in-img');
        $('.error-in-img').click(function() {
            $('.error-in-img').removeClass('error-in-img');
        })
    }
    if (validationFailed) {
        event.preventDefault();
    }
};
$(document).ready(function() {

    $("#file").change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.picture').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    $('.picture').click(function() {
        $('#file')[0].click();
    });

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
