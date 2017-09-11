<html>
<!--Pulling Awesome Font -->
    <head>
        <title> MyCV </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .error{color:red}
        </style>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).ready(function(){
                $("#form").validate({
                    rules:{
                        id:'required',
                        pass:'required',
                        repass:'required',
                    },
                    messages:{
                        id: "Please specify your ID",
                        pass: "Please specify Pass",
                        repass: "Please specify your Retype Pass"
                    },
                });

                $('#submit').click(function(){
                    if($('#form').valid()){
                        var id = $('#idAcount').val();
                        var pass = $('#password').val();
                        var repass = $('#repassword').val();

                        if(pass != repass){
                            $('.error').show().text("Retype Password False");
                            return;
                        }
                        
                        $.ajax({
                            url: "/createUser/submit",
                            type: "POST",
                            data: {
                                idUser: id,
                                password: pass
                            },
                            success: function(data){
                                if(data.error){  
                                    $('.error').show().text(data.message);
                                }
                                else{
                                    alert("Dang ky thanh cong");
                                    window.location =  " {{route('/')}} " ;
                                }
                            }
                        });
                    }                    
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Create Account</h1>
                    <div class="account-wall">
                        <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                        alt="">
                        <form id="form" class="form-signin" name="dangnhap">
                            <input type="text" class="form-control" placeholder="ID" required autofocus id="idAcount" name="id">
                            <input type="password" class="form-control" placeholder="Password" required id="password" name="pass">
                            <input type="password" class="form-control" placeholder="Retype Password" required id="repassword" name="repass">
                            <p style="color:red; display:none" class="error"></p>
                            <button class="btn btn-lg btn-primary btn-block" type="button" id="submit"> 
                                Register
                            </button>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>