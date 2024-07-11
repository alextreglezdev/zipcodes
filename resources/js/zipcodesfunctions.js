$(document).ready(function() {
    var baseUrl = $('meta[name="base-url"]').attr('content');
    $('#sendData').on('click', function() {
        var value = $('#zipcode').val();
    
        if (value == '') {
            Swal.fire({
                title: "Empty field",
                text: "The field Zip Code is empty, please check your data",
                icon: "error"
            });
        } else {
            var token = $('meta[name="csrf-token"]').attr('content');
    
            $.ajax({
                type: "POST",
                url: baseUrl + '/checkzipcode',
                data: { zipcode: value, _token: token },
                success: function(response) {
                    if (response.response) {
                        Swal.fire({
                            title: "Data Saved",
                            text: "The Zip Code was saved",
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: "Data Not Saved",
                            text: "The Zip Code wasn't saved",
                            icon: "error"
                        });
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = '';
    
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessages += errors[key][0] + '\n';
                            }
                        }
    
                        Swal.fire({
                            title: "Validation Error",
                            text: errorMessages,
                            icon: "error"
                        });
                    }
                }
            });
        }
    });
    
    $('#zipcode').on('input',function() {
        let value = $(this).val();
        //se remplaza cualquier caracter diferente de numerico por vacio
        value = value.replace(/\D/g, '');

        // limitar a 5 caracteres
        if (value.length > 5) {
            value = value.slice(0, 5);
        }

        //refrescamos el campo
        $(this).val(value);
   
    });
});