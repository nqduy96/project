<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My CV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS W3schools -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!-- End CSS W3schools -->
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <!-- End Bootstrap -->

    <!-- jQuery Validation -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> 
    <!-- End jQuery Validation -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}" charset="UTF-8"></script>
    

    <style>
        #appear_form{width:60%;height:auto;background:#e6e6e6;border-radius:8px;box-shadow:0 0 40px -10px #000;margin:calc(50vh - 220px) auto;padding:20px 30px;max-width:calc(100vw - 40px);box-sizing:border-box;font-family:'Montserrat',sans-serif;display:block;margin:auto;position:absolute;z-index:11;}
        .error{color:red}
        .table.no-border tr td, .table.no-border tr th {border-width: 0;}
        #introduce::before{
            content: "“ ";
        }
        #introduce::after{
            content: " ”";
        }
    </style>
    
   </head>
<body class="w3-light-grey">
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        @include('layouts.layoutTop')
        <div class="w3-container w3-content " style="max-width:1400px;margin-top:80px">    
            <div class="w3-row">
                <!-- Left -->
                <div class="w3-col m3">
                    <div class="w3-card-2 w3-round w3-white">
                        <div class="w3-container">
                            <h4 class="w3-center">My Profile</h4>
                            <p class="w3-center">
                                <img src="{{ '/userPic/' . $information->picture . '.jpg' }}" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
                            </p>
                            <hr>
                            <div class="list-group" style="padding:0;">            
                                <a href="{{ route('home.profile') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                    <i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Home
                                </a>        
                                <a href="{{ route('home.cv', $idUser) }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                    <i class="fa fa-address-card-o fa-fw w3-margin-right w3-text-theme"></i>My CV
                                </a>        
                                <a href="{{ route('profile.template') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                    <i class="fa fa-file-image-o fa-fw w3-margin-right w3-text-theme"></i>Template CV
                                </a>
                                <a href="{{ route('profile.password') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                    <i class="fa fa-expeditedssl fa-fw w3-margin-right w3-text-theme"></i>Change Password
                                </a>
                                <a href="{{ route('profile.job') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                    <i class="fa fa-floppy-o fa-fw w3-margin-right w3-text-theme"></i>Saved Jobs
                                </a>
                                <a class="list-group-item w3-button w3-block w3-left-align w3-padding-large" data-toggle="collapse" data-target="#demo">
                                    <i class="fa fa-arrow-circle-down fa-fw w3-margin-right w3-text-theme"></i>CV Information
                                </a>
                                <div id="demo" class="collapse">
                                    <a href="{{ route('profile.skill') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                        <i class="fa fa-book fa-fw w3-margin-right w3-text-theme"></i>Skills
                                    </a>                                  
                                    <a href="{{ route('profile.education') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                        <i class="fa fa-graduation-cap fa-fw w3-margin-right w3-text-theme"></i>Education
                                    </a>
                                    <a href="{{ route('profile.experience') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                        <i class="fa fa-university fa-fw w3-margin-right w3-text-theme"></i>Experiences
                                    </a>  
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main -->
                <div class="w3-col m9">
                    <div class="w3-container w3-card-2 w3-white w3-round w3-margin-left w3-margin-right w3-margin-bottom">
                         @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
