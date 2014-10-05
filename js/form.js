$(document).ready(function() {
    new Picker.Date($$('.date'), {
        timePicker: false,
        positionOffset: {
            x: 5,
            y: 0
        },
        pickerClass: 'datepicker_dashboard',
        useFadeInOut: !Browser.ie
    });
});
