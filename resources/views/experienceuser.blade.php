@extends('layouts.layout')

@section('idUser', $idUser)

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Experiences</h1>
        </div>
        <!--End Page Header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <button id="insert" style="margin:4px 2% 0 0" type="button" class="btn pull-right btn-success collapsed" aria-expanded="false">
                    <i class="fa fa-plus  fa-1x"></i> Insert
                </button>
        <!-- Form Insert -->
                <form id="form">
                    <div id="formInsert" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-mall" role="document">
                            <div class="modal-content container col-md-12">
                                <div class="modal-header">
                                    <h2 class="modal-title">Experience <small id="idEx" style="display:none"></small></h2>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 text-right" for="position">Position:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="input_Position" placeholder="Enter Position" name="position">
                                            </div>
                                            <label class="control-label col-sm-2 text-right" for="year">Year:</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="input_Year" placeholder="Enter Year" name="year">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 text-right" for="company">Company:</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="input_Company" placeholder="Enter Subtitle" name="company">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 text-right" for="content">Content:</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" rows="5" id="input_Content" name="content"></textarea>
                                            </div>
                                            <div class="row">
                                                <button id="btnActionEx" type="button" class="btn">
                                                    <i class="fa fa-check  fa-1x">&nbsp;</i><span id="spanActionEx"></span>
                                                </button>
                                                <br>
                                                <button style="margin-top:2%" type="button" class="btn btn-danger" data-dismiss="modal">
                                                    <i class="fa fa-times  fa-1x">&nbsp;</i>Cancel
                                                </button>
                                            </div>                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
         <!-- End Form Insert -->

        <!-- Table Experiences -->
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i>Table Experiences    
                    
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table style="width: 100%; word-wrap:break-word;table-layout:fixed;" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Year</th>
                                            <th style="width: 15%">Position</th>
                                            <th style="width: 22%">Company</th>
                                            <th style="width: 30%">Content</th>
                                            <th style="width: 23%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($experiences as $experience)
                                            <tr>
                                                <td id="year-{{ $experience->id }}">{{ $experience->year }}</td>
                                                <td id="position-{{ $experience->id }}">{{ $experience->position }}</td>
                                                <td id="company-{{ $experience->id }}">{{ $experience->company }}</td>
                                                <td id="content-{{ $experience->id }}">{{ $experience->content }}</td>
                                                <td>
                                                    <button id="edit-{{ $experience->id }}" type="button" class="btn edit collapsed btn-info" data-toggle="collapse" data-target="#demo" aria-expanded="false">
                                                        <i class="fa fa-pencil-square-o  fa-1x"></i> Edit
                                                    </button>
                                                    <button id="delete-{{ $experience->id }}" type="button" class="btn edit collapsed btn-danger" data-toggle="collapse" data-target="#demo" aria-expanded="false">
                                                        <i class="fa fa-trash-o  fa-1x"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach                                                                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- End Table Experiences -->
            </div>
        </div>


    
    <script>
        $("form").validate({
            rules: {
                position : "required",
                year : "required",
                company : "required",
                content : "required"
            },
            messages: {
                position : "Please specify your position",
                year : "Please specify year",
                company : "Please specify your major",
                content : "Please specify content",
            }
        });

         function updateInput(){
            $("#input_Position").val("");
            $("#input_Year").val("");
            $("#input_Company").val("");
            $("#input_Content").val("");
         }

        $(document).ready(function(){
            $("#insert").click(function(){
                updateInput();
                $("#spanActionEx").html("Insert");
                $("#btnActionEx").removeClass("btn-primary");
                $("#btnActionEx").addClass("btn-success");
                $("#formInsert").modal();
            });

            $("#btnActionEx").click(function(){
                if($("form").valid()){
                    var action = $("#spanActionEx").html();
                    var idEx = (action == "Insert") ? "" : $("#idEx").html();
                    var position = $("#input_Position").val();
                    var year = $("#input_Year").val();
                    var company = $("#input_Company").val();
                    var content = $("#input_Content").val();
                    var url = (action == "Insert") ? "experience/insert" : "experience/edit";

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            idEx:idEx,
                            position: position,
                            year: year,
                            company: company,
                            content: content
                        },
                        success: function(data){
                            if(data == "true"){
                                if(action == "Insert")
                                    alert("Insert Successfully");
                                else
                                    alert("Update Successfully");
                                window.location = window.location.href;
                            }
                            else
                                alert("Please check Infomation");
                        }
                    });
                }              
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            
            $(".btn.edit").click(function(){
                var tmp = $(this).attr('id').split('-');
                var action = tmp[0];
                var id = tmp[1];
                if(action == "edit"){
                    updateInput();
                    $("#spanActionEx").html("Update");
                    $("#btnActionEx").removeClass("btn-success");
                    $("#btnActionEx").addClass("btn-primary");
                    // Set value to Update
                    $("#idEx").html(id);
                    var position = $("#position-"+ id).html(); $("#input_Position").val(position);
                    var year = $("#year-"+ id).html(); $("#input_Year").val(year);
                    var company = $("#company-"+ id).html(); $("#input_Company").val(company);
                    var content = $("#content-"+ id).html(); $("#input_Content").val(content);
                    $("#formInsert").modal();
                    
                }
                if(action == "delete"){
                    $.ajax({
                        url: "experience/delete",
                        type: "delete",
                        data: {
                            idEx: id
                        },
                        success: function(data){
                            if(data == "true"){
                                alert("Deleted Successfully");
                                window.location = window.location.href;
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection