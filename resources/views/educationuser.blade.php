@extends('layouts.layout')

@section('idUser', $idUser)

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Education</h1>
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
                                    <h2 class="modal-title">Education <small id="idEdu" style="display:none"></small></h2>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 text-right" for="major">Major:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control top-buffer-sm" id="input_Major" placeholder="Enter Major" name="major">
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
                                            <label class="control-label col-sm-2 text-right" for="school">School:</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="input_School" placeholder="Enter School" name="school">
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
                                                <button id="btnActionEdu" class="btn" type="button">
                                                    <i class="fa fa-check  fa-1x">&nbsp;</i><span id="spanActionEdu"></span>
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
                    <i class="fa fa-bell fa-fw"></i>Table Education                       
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table style="width: 100%; word-wrap:break-word;table-layout:fixed;" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Year</th>
                                            <th style="width: 15%">Major</th>
                                            <th style="width: 22%">School</th>
                                            <th style="width: 30%">Content</th>
                                            <th style="width: 23%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($educations as $education)
                                            <tr>
                                                <td id="year-{{ $education->id }}">{{ $education->year }}</td>
                                                <td id="major-{{ $education->id }}">{{ $education->major }}</td>
                                                <td id="school-{{ $education->id }}">{{ $education->school }}</td>
                                                <td id="content-{{ $education->id }}">{{ $education->content }}</td>
                                                <td>
                                                    <button id="edit-{{ $education->id }}" type="button" class="btn edit collapsed btn-info" data-toggle="collapse" data-target="#demo" aria-expanded="false">
                                                        <i class="fa fa-pencil-square-o  fa-1x"></i> Edit
                                                    </button>
                                                    <button id="delete-{{ $education->id }}" type="button" class="btn edit collapsed btn-danger" data-toggle="collapse" data-target="#demo" aria-expanded="false">
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

         function updateInput(){
            $("#input_Major").val("");
            $("#input_Year").val("");
            $("#input_School").val("");
            $("#input_Content").val("");
         }

        $(document).ready(function(){
            $("#form").validate({
                rules: {
                    major: "required",
                    year: "required",
                    school: "required",
                    content: "required"
                },
                messages: {
                    major: "Please specify your major",
                    year: "Please specify year",
                    school: "Please specify your school",
                    content: "Please specify content",
                },               
            });


            $("#insert").click(function(){
                updateInput();
                $("#spanActionEdu").html("Insert");
                $("#btnActionEdu").removeClass("btn-primary");
                $("#btnActionEdu").addClass("btn-success");
                $("#formInsert").modal();
            });

            $("#btnActionEdu").click(function(){
                if ($("#form").valid()) {
                    var action = $("#spanActionEdu").html();
                    var idEdu = (action == "Insert") ? "" : $("#idEdu").html();
                    var major = $("#input_Major").val();
                    var year = $("#input_Year").val();
                    var school = $("#input_School").val();
                    var content = $("#input_Content").val();
                    var url = (action == "Insert") ? "education/insert" : "education/edit";

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            idEdu:idEdu,
                            major: major,
                            year: year,
                            school: school,
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
                    $("#spanActionEdu").html("Update");
                    $("#btnActionEdu").removeClass("btn-success");
                    $("#btnActionEdu").addClass("btn-primary");
                    // Set value to Update
                    $("#idEdu").html(id);
                    var major = $("#major-"+ id).html(); $("#input_Major").val(major);
                    var year = $("#year-"+ id).html(); $("#input_Year").val(year);
                    var school = $("#school-"+ id).html(); $("#input_School").val(school);
                    var content = $("#content-"+ id).html(); $("#input_Content").val(content);
                    $("#formInsert").modal();
                    
                }
                if(action == "delete"){
                    $.ajax({
                        url: "education/delete",
                        type: "delete",
                        data: {
                            idEdu: id
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