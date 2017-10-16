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
    
    <!-- Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/vi.js"></script>
    <!-- End Moment.js -->


<style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
    .morecontent span {display: none;}
    .table.no-border tr td, .table.no-border tr th {border-width: 0;}

    .less-div {
      max-height: 10em;
      line-height: 1.2em;
      overflow: hidden;
      text-overflow: ellipsis;
    }
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
			<p class="w3-center"><img src="{{ $company->company_logo }}" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
			<hr>
			<p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
         
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
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" style="padding: 15px">
          <div class="col-md-2 hidden-xs  ">
            <img src="{{ $job->company_logo }}" alt="Avatar" class="w3-left w3-circle" style="width:100px">
          </div>
          <div class="col-md-8">        
            <h4 style="padding: 5px; margin: 0"><a href="{{ route('home.job',$job->id) }}" style="text-decoration:none"> {{ $job->title }} </a></h4>
            <div style="padding: 5px;">
              <span>{{ $job->company_name }}</span>
              <span class="hidden-xs"> | </span>
              <span>{{ $job->location }}</span>
            </div>
            <div style="padding: 5px;">
              <span>{{ $job->type }}</span>
              <span class="hidden-xs"> | </span>
              <span>$3000</span>
              <span class="hidden-xs"> | </span>
              <span>Yesterday</span>
            </div>
          </div>
          <div class="col-md-2">
           
          </div>          
          <!-- <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>  -->
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
      
      $('.anus-description').each(function() {
        $(this).css("margin-bottom", "25px");
        var content = $(this).text();
        if(content.length > showChar) {
          var c = content.substr(0, showChar);
          var h = content.substr(showChar-1, content.length - showChar);
          //var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';
          $(this).text(content);
        }
      });
      
      
      $(".morelink").click(function(){
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        $(this).remove();
        return false;
      });
      
      $(".morelink").click(function() {
        $(this).parent().css("", "");
      });
    });

</script>

</body>
</html> 
