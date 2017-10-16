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
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).ready(function(){
                $("#idAcount").keyup(function(event){
                    if(event.keyCode == 13){
                        $("#submit").click();
                    }
                });

                $("#password").keyup(function(event){
                    if(event.keyCode == 13){
                        $("#submit").click();
                    }
                });
                $('#submit').click(function(){
                    var id = $('#idAcount').val();
                    var pass = $('#password').val();
                    $.ajax({
                        url: "submit",
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
                                window.location = window.location.href + "home";
                            }
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>
                    <div class="account-wall">
                        <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                        alt="">
                        <form class="form-signin" name="dangnhap">

                            <input type="text" class="form-control" placeholder="ID" required autofocus id="idAcount">
                            <input type="password" class="form-control" placeholder="Password" required id="password">
                            <p style="color:red; display:none" class="error"></p>
                            <button class="btn btn-lg btn-primary btn-block" type="button" id="submit"> 
                                Sign in</button>
                            <label class="checkbox pull-left">
                                <input type="checkbox" value="remember-me">
                                Remember me
                            </label>
                            <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                        </form>
                    </div>
                    <a href="{{ route('createUser') }}" class="text-center new-account">Create an account </a>
                </div>
            </div>
        </div>
    </body>
</html>