$(function() {
    $.ajax({
        url: 'list.php',
        data: "",
        dataType: 'json',
        success: function (data) {

            for (var i = 0; i < data.length; i++) {

                $("#data").append("<tr><td>" + data[i].id + "</td><td>" + data[i].firstName + "</td><td>" + data[i].lastName + "</td><td>" + data[i].email + "</td><td>" + data[i].phone + "</td><td>" + data[i].role + "</td><td>" + data[i].story + "</td><td>" + data[i].learn + "</td><td>" + data[i].benefit + "</td></tr>");
            };

            
        }
    });
});