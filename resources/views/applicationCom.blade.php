@extends('layouts.layoutProfileCom')

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
            <div class="col-lg-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i>List Application
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table style="width: 100%; word-wrap:break-word;table-layout:fixed;" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 50%">Name skill</th>
                                                <th style="width: 20%">Percent</th>
                                                <th style="width: 30%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <tr>
                                                    <td id=""></td>
                                                    <td id=""></td>
                                                    <td>
                                                        <button id="" type="button" class="btn edit collapsed btn-info">
                                                            <i class="fa fa-pencil-square-o  fa-1x"></i> Edit
                                                        </button>
                                                        <button id="" type="button" class="btn edit collapsed btn-danger">
                                                            <i class="fa fa-trash-o  fa-1x"></i> Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                                                                                     
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
@endsection