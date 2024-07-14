$('#signin-form').submit(function(e) {

    var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var validEmail = regEx.test($('#signin-email').val());

    if($('input').val() == "" || $('#signin-password').val() == "") {
        e.preventDefault();
    }
    if(!validEmail) {
        e.preventDefault();
        $('#invalid-email').html('Please enter a valid email');
    } 
    
})

$('#signup-form').submit(function(e) {
    $('input').each(function() {
        if($(this).val() == "") {
            e.preventDefault();
        }
    })

    var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var validEmail = regEx.test($('#signup-email').val());

    if(($('#firstname').val()).length < 3 || ($('#lastname').val()).length < 3) {
        e.preventDefault();
        $('#first-and-last-name').html('Firstname and Lastname must have at least 3 characters')
    }
    if(!validEmail) {
        $('#already-exists').html('Please enter a valid email');
    } 
    if($('#signup-password').val() != $('#confirm-password').val()) {
        $('#invalid-password').html("Passwords don't match");
    } 
})