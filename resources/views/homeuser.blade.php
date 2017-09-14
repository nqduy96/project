<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
    .morecontent span {display: none;}
    .table.no-border tr td, .table.no-border tr th {border-width: 0;}
</style>
<body class="w3-theme-l5 w3-light-grey">

<!-- Navbar -->
  @include('layouts.layoutTop')
  
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="{{ '/userPic/' . $information->picture . '.jpg' }}" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
         @if( $information->address != "" )
            <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> {{ $information->address }}</p>
         @endif
         
         @if( $information->birthday != "" )
          <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> {{ $information->birthday }}</p>
         @endif

         @if( $information->mail != "" )
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i> {{ $information->mail }}</p>
         @endif
        </div>
      </div>
      <br>
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Social Media template by w3.css</h6>
              <p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button> 
            </div>
          </div>
        </div>
      </div> 
      <!-- Jobs -->
      @foreach($jobs as $job)
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
          <img src="{{ $job->company_logo }}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
          <span class="w3-right w3-opacity">32 min</span>
          <h4><a href="{{ route('home.job',$job->id) }}" style="text-decoration:none"> {{ $job->title }} </a></h4><br>
          <hr class="w3-clear">
          <p class="description" id="description_{{ $job->id }}">{!! $job->description !!}</p>
          <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
          <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
        </div>         
      @endforeach
      <!-- End Jobs -->
      
    <!-- End Middle Column -->
    </div>  
    <!-- Right Column -->
    <div class="w3-col m2">
      
    
    </div>
    <!-- End Right Column -->

  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
    $(document).ready(function() {
      var showChar = 250;
      var ellipsestext = "...";
      var moretext = "more";
      var lesstext = "less";
      $('.description').each(function() {
        var content = $(this).html();
        if(content.length > showChar) {
          var c = content.substr(0, showChar);
          var h = content.substr(showChar-1, content.length - showChar);
          var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';
          $(this).html(html);
        }
      });

      $(".morelink").click(function(){
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        $(this).remove();
        return false;
      });
    });

</script>

</body>
</html> 
