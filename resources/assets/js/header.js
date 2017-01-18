$(document).ready(function () {
    $('#logout-link').click(function(event){
        event.preventDefault();
        $('#logout-form').submit();
    });
});
