$('.user-update').on('submit',function() {
    if ($('#password').val() != $('#password_confirmation').val()) {
        alert('Password does not match');
        return false;
    }
    return true;
});