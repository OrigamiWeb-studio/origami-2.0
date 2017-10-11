require('../../../../public/libs/jquery-ui/datepicker/jquery-ui');

$(document).ready(function(){

  $(".origami-form__input_datepicker").datepicker({
    dateFormat: "dd.mm.yy",
    firstDay: 1
  });

});