<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />

  <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

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

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>
<style>
    .morecontent span {display: none;}
    .table.no-border tr td, .table.no-border tr th {border-width: 0;}
</style>
<body class="w3-theme-l5 w3-light-grey">
    <!-- Top -->
    <div class="w3-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="{{ route('home') }}" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
            <a href="{{ route('home.profile') }}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
                <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                <a href="#" class="w3-bar-item w3-button">One new friend request</a>
                <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
                <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
            </div>
        </div>
            <a href="{{ route('home.logout') }}" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
    </div>
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
        <div class="w3-row">
            <div class="w3-col m3">
                <div class="w3-card-2 w3-round w3-white">
                    <div class="w3-container">
                        <h4 class="w3-center">My Profile</h4>
                        <p class="w3-center">
                            <img src="{{ $company->company_logo }}" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
                        </p>
                        <hr>
                        <div class="list-group" style="padding:0;">
                            <a href="{{ route('home.profile') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                <i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Home
                            </a>
                            <a href="{{ route('profile.password') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                <i class="fa fa-expeditedssl fa-fw w3-margin-right w3-text-theme"></i>Change Password
                            </a>    
                            <a href="{{ route('profile.postjob') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                <i class="fa fa-briefcase fa-fw w3-margin-right w3-text-theme"></i> Job posting
                            </a>          
                            <a href="{{ route('home.application') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                <i class="fa fa-envelope-o fa-fw w3-margin-right w3-text-theme"></i> Applications
                            </a> 
                            <a href="{{ route('home.selectedApplication') }}" class="list-group-item w3-button w3-block w3-left-align w3-padding-large">
                                <i class="fa fa-briefcase fa-fw w3-margin-right w3-text-theme"></i> Selected Applications
                            </a>                    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main -->
            <div class="w3-col m9">
                    <div class=" w3-round w3-margin">
                         @yield('content')
                    </div>
            </div>    
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var showChar = 250;
            var ellipsestext = "...";
            var moretext = "more";

            $('.cv_description').each(function() {
                var content = $(this).html();
                    
                if(content.length > showChar) {
                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar-1, content.length - showChar);
                    var html = c + '<span class="moreelipses">'+ ellipsestext +'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';
                    $(this).html(html);
                }
            });

            $(".morelink").click(function(){
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                //$(this).remove();
                return false;
            });
        });


    </script>
    
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-datatables.min.js') }}"></script>
</body>