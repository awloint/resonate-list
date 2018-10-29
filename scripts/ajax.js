    $('form').submit(function(event) {

        event.preventDefault();

        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var role = document.getElementById("role").value;
        var story = document.getElementById("story").value;
        var learn = document.getElementById("learn").value;
        var benefit = document.getElementById("benefit").value;

        var dataString = 'firstName=' + firstName + '&lastName=' + lastName + '&email=' + email + '&phone=' + phone + '&role=' + role + '&story=' + story + '&learn=' + learn + '&benefit=' + benefit;

        //process the form
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: dataString,
            success: function(response) {
                if(response == "1") {
                    swal("Already Registered", "You have already registered for the Webinar", "warning");
                } else {
                    swal("Success", "Your registration for the Webinar was successful", "success");
                    window.location.replace("https://awlo.org");
                }
            }
        });
    });