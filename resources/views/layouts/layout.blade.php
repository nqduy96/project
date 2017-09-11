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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    
    <!-- End Bootstrap -->

    <!-- jQuery Validation -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!-- End jQuery Validation -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}" charset="UTF-8"></script>
    
    <style>
        #appear_form{width:60%;height:auto;background:#e6e6e6;border-radius:8px;box-shadow:0 0 40px -10px #000;margin:calc(50vh - 220px) auto;padding:20px 30px;max-width:calc(100vw - 40px);box-sizing:border-box;font-family:'Montserrat',sans-serif;display:block;margin:auto;position:absolute;z-index:11;}
        .error{color:red}
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
                            <ul class="list-group">
                                <li class="list-group-item w3-button w3-block w3-left-align">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Go!</button>
                                        </span>
                                    </div>
                                </li>
                                <li class="list-group-item w3-button w3-block w3-left-align">
                                    <a href="{{ route('home.profile') }}" class="w3-button w3-left-align">
                                        <i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Home
                                    </a>
                                </li>
                                <li class="list-group-item w3-button w3-block w3-left-align">
                                    <a href="{{ route('home.cv', $idUser) }}" class="w3-button w3-left-align">
                                        <i class="fa fa-address-card-o fa-fw w3-margin-right w3-text-theme"></i>My CV
                                    </a>                                  
                                </li>
                                <li class="list-group-item w3-button w3-block w3-left-align">
                                    <a href="{{ route('profile.skill') }}" class="w3-button w3-left-align">
                                        <i class="fa fa-book fa-fw w3-margin-right w3-text-theme"></i>Skills
                                    </a>                                  
                                </li>

                                <li class="list-group-item w3-button w3-block w3-left-align">
                                    <a href="{{ route('profile.education') }}" class="w3-button w3-left-align">
                                        <i class="fa fa-graduation-cap fa-fw w3-margin-right w3-text-theme"></i>Education
                                    </a>                                  
                                </li>

                                <li class="list-group-item w3-button w3-block w3-left-align">
                                    <a href="{{ route('profile.experience') }}" class="w3-button w3-left-align">
                                        <i class="fa fa-university fa-fw w3-margin-right w3-text-theme"></i>Experiences
                                    </a>                                  
                                </li>                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Main -->
                <div class="w3-col m9">
                    <div class="w3-container w3-card-2 w3-white w3-round w3-margin">
                         @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
