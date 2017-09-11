@extends('layouts.layoutProfileCom')

@section('content')
    @foreach($jobs as $job)
         <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
            <img src="{{ $company->company_logo }}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
            <span class="w3-right w3-opacity">32 min</span>
            <h4> {{ $job->title }}</h4><br>
            <hr class="w3-clear">
            <p class="description" id="description_{{ $job->id }}">{!! $job->description !!}</p>
            <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
            <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
        </div>       
    @endforeach
@endsection