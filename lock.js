$(document).ready(function(){
    $.ajax({
        method: "POST",
        url: "lockscreen.php",            
        data:$(this).serialize(),
        success: function(data) {  
            if(data == '' || data == null | data == 'NO'){
              $('#lockstatus').html('<div class="alert alert-primary" role="alert">Login Password Disabled! <i class="fa-solid fa-lock-open"></i> </div>')
              $('#user').removeAttr('disabled', false)
              $('#password').removeAttr('disabled', false)
            }else{
                Swal.fire({
                    title: "Enter Lock Password to Login!",
                    input: "password",
                    inputAttributes: {
                      autocapitalize: "off"
                    },
                    showCancelButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    confirmButtonText: "Unlock!",
                    showLoaderOnConfirm: true,                    
                    preConfirm: async (login) => {
                      try {
                        const githubUrl = `
                          locklogin.php?loginpass=${login}
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
                        if(result.value == 0){
                            $('#lockstatus').html('<div class="alert alert-danger" role="alert">Please enter correct credentials to enable login <i class="fa-solid fa-lock"></i></div>')
                            $('#user').attr('disabled', true)
                            $('#password').attr('disabled', true)
                        }else{
                            $('#lockstatus').html('<div class="alert alert-primary" role="alert">Login Unlocked! <i class="fa-solid fa-lock-open"></i> </div>')
                            $('#user').removeAttr('disabled', false)
                            $('#password').removeAttr('disabled', false)
                        }
                    }
                });
            }
        }
    });
})