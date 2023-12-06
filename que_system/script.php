<script>
    $(document).ready(function(){            
        var office = $('input[name=office1]').val();
        if(office === 'NONE'){
            
        }
        else if(office === 'encoding'){
            $.ajax({
                method: "POST",
                url: "process.php",
                data: { transaction:office },  
                success: function(data){
                    window.open("print.php?id="+data+"&office=IT");
                    let timerInterval
                        Swal.fire({
                            title: '<h1>IT OFFICE (ENCODING)</h1>',
                            html: '<div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div><div class="divider-custom-line"></div></div><h2>Que Number:</h2> <h1 style="color:blue;">'+data+'</h1>',
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                            })                                                
                },   
                           
            })            
        }
        else if(office === 'assessment'){
            $.ajax({
                method: "POST",
                url: "process.php",
                data: { transaction:office },  
                success: function(data){
                    window.open("print.php?id="+data+"&office=IT");
                    let timerInterval
                        Swal.fire({
                        title: '<h1>IT OFFICE (ASSESSMENT)</h1>',
                        html: '<div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div><div class="divider-custom-line"></div></div><h2>Que Number:</h2> <h1 style="color:blue;">'+data+'</h1>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        })                        
                },              
            })            
        }
        else if(office === 'release'){
            $.ajax({
                method: "POST",
                url: "process.php",
                data: { transaction:office },  
                success: function(data){
                    window.open("print.php?id="+data+"&office=IT");
                    let timerInterval
                        Swal.fire({
                        title: '<h1>IT OFFICE (RELEASE)</h1>',
                        html: '<div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div><div class="divider-custom-line"></div></div><h2>Que Number:</h2> <h1 style="color:blue;">'+data+'</h1>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        })                        
                },              
            })            
        }
        /*
        else if(office === 'payment'){
            $.ajax({
                method: "POST",
                url: "process.php",
                data: { transaction:office },  
                success: function(data){
                    window.open("print.php?id="+data+"&office=TREASURER");
                    let timerInterval
                        Swal.fire({
                        title: '<h1>TREASURERS OFFICE (PAYMENT)</h1>',
                        html: '<div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div><div class="divider-custom-line"></div></div><h2>Que Number:</h2> <h1 style="color:blue;">'+data+'</h1>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        })                        
                },              
            })            
        }
        */
        else if(office === 'obo'){
            $.ajax({
                method: "POST",
                url: "process.php",
                data: { transaction:office },  
                success: function(data){
                    window.open("print.php?id="+data+"&office=ENGINEERING");
                    let timerInterval
                        Swal.fire({
                        title: '<h1>ENGINEERING (OBO)</h1>',
                        html: '<div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div><div class="divider-custom-line"></div></div><h2>Que Number:</h2> <h1 style="color:blue;">'+data+'</h1>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    })                        
                },              
            })            
        }
        else if(office === 'mcr'){
            $.ajax({
                method: "POST",
                url: "process.php",
                data: { transaction:office },  
                success: function(data){
                    window.open("print.php?id="+data+"&office=MCR");
                    let timerInterval
                        Swal.fire({
                        title: '<h1>MCR</h1>',
                        html: '<div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div><div class="divider-custom-line"></div></div><h2>Que Number:</h2> <h1 style="color:blue;">'+data+'</h1>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    })                        
                },              
            })            
        }
        else if(office === 'mpdc'){
            $.ajax({
                method: "POST",
                url: "process.php",
                data: { transaction:office },  
                success: function(data){
                    window.open("print.php?id="+data+"&office=MPDC");
                    let timerInterval
                        Swal.fire({
                        title: '<h1>MPDC</h1>',
                        html: '<div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div><div class="divider-custom-line"></div></div><h2>Que Number:</h2> <h1 style="color:blue;">'+data+'</h1>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    })                        
                },              
            })            
        }
        

        $('#assessor_submit').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "process.php",
                data:$(this).serialize(), 
                dataType: "json", 
                success: function(data){
                    window.open('print.php?id='+data.que_print+'&office=ASSESSOR', '_blank', 'menubar=no' ,width=800, height=600)
                    //window.open("print.php?id="+data+"&office=ASSESSOR");
                    let timerInterval;
                        Swal.fire({
                            title: "<h1>ASSESSORS OFFICE</h1>",
                            html: '<div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div><div class="divider-custom-line"></div></div><h2>Que Number:</h2> <h1 style="color:blue;">'+data+'</h1>',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                    timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        }).then(function(){
                            window.location.reload();
                        })
                },              
            })
        })

        $('#treasurer_submit').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "process.php",
                data:$(this).serialize(), 
                dataType: "json", 
                success: function(data){
                    window.open('print.php?id='+data.que_print+'&office=TREASURER', '_blank', 'menubar=no' ,width=800, height=600)
                    //window.open("print.php?id="+data+"&office=ASSESSOR");
                    let timerInterval;
                        Swal.fire({
                            title: "<h1>TREASURER'S OFFICE</h1>",
                            html: '<div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div><div class="divider-custom-line"></div></div><h2>Que Number:</h2> <h1 style="color:blue;">'+data+'</h1>',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                    timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        }).then(function(){
                            window.location.reload();
                        })
                },              
            })
        })
    });
</script>     