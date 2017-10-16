<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!-- include summernote css/js-->
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>
<style>
    .morecontent span {display: none;}
</style>

</head>
<body class="w3-light-grey">
    <!--  wrapper -->
    <div id="wrapper">
        <!-- Top -->
        @include('layouts.layoutTop')
        <!-- End Top -->
        <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
            <div class="w3-row">  
                <div class="container col-xs-12">
                    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
                        <img src="{{ $job->company_logo }}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                        <span class="w3-right w3-opacity">32 min</span>
                        <h4> {{ $job->title }}</h4><br>
                        <hr class="w3-clear">
                        <div class="description col-sm-12" id="description_{{ $job->id }}">{!! $job->description !!}</div>
                        @if($json->role == "user")
                        <button type="button" class="apply w3-button w3-theme-d1 w3-margin-bottom w3-margin-top" id="btn_apply_{{ $job->id }}"><i class="fa fa-thumbs-up"></i> Apply</button>
                        <button type="button" class="save w3-button w3-theme-d1 w3-margin-bottom w3-margin-top" id="btn_save_{{ $job->id }}"><i class="fa fa-floppy-o"></i>  Save</button>
                        @elseif ($json->idUser == $job->id_user)
                        <button type="button" class="delete w3-button btn-danger w3-margin-bottom w3-margin-top" id="btn_delete_{{ $job->id }}"><i class="fa fa-trash-o"></i> Delete</button>
                        @else

                        @endif
                    </div>
                </div>
            </div>
        </div>       
    </div>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.apply').click(function(){
                var id_btn = $(this).attr('id');
                var id_job = id_btn.split('_')[2];
                $.ajax({
                    url: "{{ route('jobs.apply') }}",
                    type: 'POST',
                    data: {
                        id_job:id_job
                    },
                    success: function(data){
                        alert(data.message);
                        $('#' + id_btn).css("text-decoration", "line-through");
                        $('#' + id_btn).attr("disabled", true);
                    }
                })
            });

            $('.save').click(function(){
                var id_btn = $(this).attr('id');
                var id_job = id_btn.split('_')[2];
                $.ajax({
                    url: "{{ route('jobs.save') }}",
                    type: 'POST',
                    data: {
                        id_job:id_job
                    },
                    success: function(data){
                        alert(data.message);
                        $('#' + id_btn).css("text-decoration", "line-through");
                        $('#' + id_btn).attr("disabled", true);
                    }
                })
            });
        });
    </script>
</doby>
