$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    
    $.ajax({
        method: "POST",
        url: "accounts/fetch_data.php",            
        data:{id:cookie_id},
        dataType: "json",
        success: function(response) {             
            var DataKey = CryptoJS.enc.Utf8.parse("01234567890123456789012345678901");
            var DataVector = CryptoJS.enc.Utf8.parse("1234567890123412");
            var decrypted = CryptoJS.AES.decrypt(response.password, DataKey, { iv: DataVector });        
            var decrypted = CryptoJS.enc.Utf8.stringify(decrypted);
            $('#clerkid').val(response.clerkid)
            $('#username').val(response.user)
            $('#password').val(decrypted)
            //$('#select_designation').text(response.designation_name).trigger('change')
            var option = new Option(response.designation_name, response.designation, true, true);
            $('#select_designation').append(option).trigger('change');

            $('#select_designation').select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: "Select Property From Taxdec",                
                //dropdownParent: $('#faas_modal'),
                allowClear: true,
                selectionCssClass: 'select2--large',
                dropdownCssClass: 'select2--large',
                ajax: {
                    url: "accounts/property_selection.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                        data: function (params) {
                        return {
                                searchTerm: params.term, // search term                                
                            };
                        },
                        processResults: function (response) {
                            return {
                                results: response
                            };
                        },                        
                } 
            } ).on('select2:select', function(event) {
                var additional = event.params.data;
                
            }).on('select2:clear', function(event) {
               
            });

            $('#btn_unlock').on('click', function(){
              var html1 = '<div class="alert alert-primary" role="alert"><div>Field Unlocked <i class="fa fa-lock-open" aria-hidden="true"></i></div></div>'
              $('#alert_data').html(html1)
              $('#username').prop('readonly', false);
              $('#password').prop('readonly', false);
              $('#select_designation').prop('disabled', false);
              $('#btn_update').prop('disabled', false);
            })

            $('#form_update').on('submit', function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Update it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Enter Password",
                            input: "password",
                            inputAttributes: {
                              autocapitalize: "off",
                            },
                            showCancelButton: true,
                            confirmButtonText: "Continue",
                            showLoaderOnConfirm: true,
                            preConfirm: async (login) => {
                              try {
                                const githubUrl = `
                                  accounts/confirm_login.php?login=${login}&clerkid=${cookie_id}
                                `;
                                const response = await fetch(githubUrl);
                                if (!response.ok) {
                                  return Swal.showValidationMessage(`
                                    ${JSON.stringify(await response.json())}
                                  `);
                                }
                                return response.json();
                              } catch (error) {
                                Swal.showValidationMessage(`
                                  Request failed: ${error}
                                `);
                              }
                            },
                            allowOutsideClick: () => !Swal.isLoading()
                          }).then((result) => {
                            if (result.isConfirmed) {
                              if(result.value.login == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Invalid Pasword!',                          
                                    timer: 3000,
                                    allowEscapeKey: false,
                                    showConfirmButton: false,
                                }).then(function(){
                                  window.location.reload(true);
                                })                                
                              }else{
                                Swal.fire({
                                  icon: 'success',
                                  title: 'Success!',
                                  text: 'Please wait a momement!',                          
                                  timer: 3000,
                                  allowEscapeKey: false,
                                  showConfirmButton: false,
                                }).then(function(){
                                  $.ajax({
                                    method: "POST",
                                    url: "accounts/update_form.php",            
                                    data:$('#form_update').serialize(),
                                    success: function(response) {             
                                      window.location.reload(true)
                                    }
                                  });
                                }) 
                              }
                              
                            }
                        });
                          
                    }
                });
                
            })
        }
    });
})
