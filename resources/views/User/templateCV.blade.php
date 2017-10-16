@extends('User.layouts.layoutProfile')

@section('idUser', $idUser)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Template CV</h1>
        </div>
    </div>
    </div>

    @foreach($templates as $template)
        <div class="w3-container w3-margin col-lg-3">
            <div class="w3-card-2 w3-round w3-white ">
                <div class="w3-container">
                    <h4 class="w3-center">{{ $template->name_cv }}</h4>
                    <p class="w3-center">
                        <img src="{{ '/templatePic/' . $template->name_cv . '.jpg' }}" style="height:106px;width:106px" alt="Avatar">
                    </p>
                    <hr>
                    <div class="list-group">
                        <a class="list-group-item w3-button w3-block w3-left-align">
                            <i class="fa fa-check-circle fa-fw w3-margin-right w3-text-theme"></i>Select                            
                        </a>
                        <a target="_blank" href="{{ route('template.demo',[$idUser,$template->name_cv]) }}" class="list-group-item w3-button w3-block w3-left-align">
                            <i class="fa fa-wrench fa-fw w3-margin-right w3-text-theme"></i>Demo                            
                        </a>
                    </div>
                </div>
            </div> 
        </div>
    @endforeach

    <script>
        $(document).ready(function(){
    
        });
    </script>

@endsection