$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        
        $.ajax({
            type: 'POST',
            url: 'checkLogin.php',
            data: { username: username, password: password },
            success: function(response) {
                if (response == 'valid') {
                    $('#message').html('<p>Login successful!</p>').css('color', 'green');
                } else {
                    $('#message').html('<p>Invalid username or password!</p>').css('color', 'red');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
