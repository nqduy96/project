@extends('Company.layouts.layoutProfile')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin">
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Applications</h1>
            </div>
        </div>
        <!--End Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i>List Application
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                <table style="word-wrap:break-word;table-layout:fixed;" class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%">Picture</th>
                                                <th style="width: 15%">Username</th>
                                                <th style="width: 30%">Title Job</th>
                                                <th style="width: 25%">Action</th>                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($applications as $application )
                                                <tr>
                                                    <td>
                                                        <img src="{{ '/userPic/' . $application->picture . '.jpg' }}" style="height:75px;width:75px" alt="{{ $application->iduser }}">
                                                    </td>
                                                    <td>
                                                        @if($application->trangthai == "0")
                                                            <b>{{ $application->iduser }}</b>
                                                        @else
                                                            {{ $application->iduser }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($application->trangthai == "0")
                                                            <b>{{ $application->title }}</b>
                                                        @else
                                                            {{ $application->title}}    
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Options
                                                            <span class="caret"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a target="_blank" id="seen_{{ $application->iduser }}_{{ $application->id }}" href="{{ route('home.cv',$application->iduser) }}" class="options"><i class="fa fa-pencil-square-o  fa-1x"></i> View CV</a></li>
                                                                <li><a id="save_{{ $application->iduser }}_{{ $application->id }}" href="javascript:void(0);" class="options"><i class="fa fa-floppy-o fa-1x"></i> Save</a></li>
                                                                <li><a id="select_{{ $application->iduser }}_{{ $application->id }}" href="javascript:void(0);" class="options"><i class="fa fa-check  fa-1x"></i> Select</a></li>
                                                                <li><a id="delete_{{ $application->iduser }}_{{ $application->id }}" href="javascript:void(0);" class="options"><i class="fa fa-trash-o  fa-1x"></i> Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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

            $('.options').on("click",function(){
                var id = $(this).attr('id');
                var action = id.split("_")[0];
                var user = id.split("_")[1];
                var idJob = id.split("_")[2];

                $.ajax({
                    url: "{{ route('application.execute') }}",
                    type: 'POST',
                    data: {
                        action:action,
                        user:user,
                        idJob:idJob,
                    },
                    success: function(data){
                        alert(data.message);
                    }
                });
            })
        });
    </script>
@endsection