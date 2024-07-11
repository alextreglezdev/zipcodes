$(document).ready(function() {
    var baseUrl = $('meta[name="base-url"]').attr('content');
    
        // $('#zipcodeform').on('submit', function(event) {
        //     event.preventDefault(); 
        //     var zipcodeValue = $('#zipcode').val();
        //     // alert(zipcodeValue);
        //     var errorMessages = [];
    
        //     // Validación del código postal
        //     if (zipcodeValue === '') {
        //         errorMessages.push('The Zip Code field is required.');
        //     } else if (zipcodeValue.length < 5) {
        //         errorMessages.push('The Zip Code must be exactly 5 digits.');
        //     }
    
        //     // Mostrar mensajes de error si los hay
        //     if (errorMessages.length > 0) {
        //         Swal.fire({
        //             title: "Error",
        //             text: errorMessages.join('\n'),
        //             icon: "error"
        //           });
        //         return;
        //     } else {
        //         $(this).off('submit').submit();
        //     }
        // });
        $('#sendData').on('click', function() {
            
            var zipcodeValue = $('#zipcode').val();
            if(zipcodeValue ==''){
                Swal.fire({
                    title: "Error",
                    text: 'The Zip Code field is empty',
                    icon: "error"
                  });
            }
            var token = $('meta[name="csrf-token"]').attr('content');
        
            $.ajax({
                type: "POST",
                url: '/checkzipcode',
                data: {
                    zipcode: zipcodeValue,
                    _token: token
                },
                success: function(response) {
                    
                    if (response.success) {
                        Swal.fire({
                            title: "Data saved",
                            text: response.message+': '+zipcodeValue,
                            icon: "success"
                          });
                          $('#zipcode').val('');
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message,
                            icon: "error"
                          });
                        return;
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Error",
                        text: 'Zip Code already exist',
                        icon: "error"
                      });
                    return;
                }
            });
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