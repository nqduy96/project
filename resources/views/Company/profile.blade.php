@extends('Company.layouts.layoutProfile')

@section('content')
    @foreach($jobs as $job)
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin" style="padding: 15px">
        <div class="col-md-2 hidden-xs  ">
            <img src="{{ $company->company_logo }}" alt="Avatar" class="w3-left w3-circle" style="width:60px">
        </div>
        <div class="col-md-8">        
            <h4 style="padding: 5px; margin: 0"><a href="{{ route('home.job',$job->id) }}" style="text-decoration:none"> {{ $job->title }} </a></h4>
            <div style="padding: 5px;">
                <span>{{ $company->name }}</span>
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
@endsection