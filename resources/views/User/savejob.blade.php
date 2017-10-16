@extends('User.layouts.layoutProfile')

@section('idUser', $idUser)

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Saved Jobs</h1>
        </div>
        <!--End Page Header -->
    </div>
    </div>

    @foreach($jobs as $job)
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin-bottom w3-margin-left w3-margin-right" style="padding: 15px">
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
            @if(in_array($job->id,$ungtuyens))
              <button id="btn_apply_{{ $job->id }}" type="button" class="w3-button w3-theme-d1 apply" style="text-decoration: line-through;margin-top: 5px;" disabled><i class="fa fa-thumbs-up"></i> Apply</button>
            @else
              <button id="btn_apply_{{ $job->id }}" type="button" class="w3-button w3-theme-d1 apply" style="margin-top: 5px;"><i class="fa fa-thumbs-up"></i> Apply</button>
            @endif

            @if(in_array($job->id,$saves))
            <button id="btn_save_{{ $job->id }}" type="button" class="w3-button btn-success unsave" style="margin-top: 5px;"><i class="fa fa-floppy-o" ></i>  Saved </button>
            @else
            <button id="btn_save_{{ $job->id }}" type="button" class="w3-button w3-theme-d1 save" style="margin-top: 5px;"><i class="fa fa-floppy-o"></i>  Save </button>
            @endif
          </div>            
        </div>         
    @endforeach
@endsection