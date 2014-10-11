 $(document).ready(function() {
     $('country').change(function() {
         var country = $(this).val();
         if (country === 'India') {
             $(".states-selection").append($('.states-selection-template').html());
             $(".club-selection").append($(".club-select-template").html());

             $('club').change(function() {
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


 });
