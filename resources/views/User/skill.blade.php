@extends('User.layouts.layoutProfile')

@section('idUser', $idUser)

@section('content')
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Skills</h1>
        </div>
    </div>
    <!--End Page Header -->
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-primary">
                <button id="insert" style="margin:4px 2% 0 0" type="button" class="btn pull-right btn-success collapsed" aria-expanded="false">
                    <i class="fa fa-plus  fa-1x"></i> Insert
                </button>
        <!-- Form Insert -->
                <form id="form">
                    <div id="formInsert" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content container col-md-12">
                                <div class="modal-header">
                                    <h2 class="modal-title">Skill <small id="idSkill" style="display:none"></small></h2>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4 text-right" for="name">Name Skill:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control top-buffer-sm" id="input_Name" placeholder="Enter Name Skill" name="name">
                                            </div>                                           
                                        </div>  
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4 text-right" for="percent">Percent:</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="input_Percent" placeholder="Enter Percent" name="percent">
                                            </div>                                          
                                        </div>  
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button id="btnActionSkill" type="button" class="btn">
                                                <i class="fa fa-check  fa-1x"></i>&nbsp;<span id="spanActionSkill"></span>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                <i class="fa fa-times  fa-1x">&nbsp;</i>Cancel
                                            </button> 
                                        </div>                                
                                    </div>                         
                                </div>   
                            </div>
                        </div>
                    </div>
                </form>
         <!-- End Form Insert -->

        <!-- Table Skill -->
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i>Table Skills                       
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
                                        @foreach($skills as $skill)
                                            <tr>
                                                <td id="name-{{ $skill->id }}">{{ $skill->name }}</td>
                                                <td id="percent-{{ $skill->id }}">{{ $skill->percent }}</td>
                                                <td>
                                                    <button id="edit-{{ $skill->id }}" type="button" class="btn edit collapsed btn-info" data-toggle="collapse" data-target="#demo" aria-expanded="false">
                                                        <i class="fa fa-pencil-square-o  fa-1x"></i> Edit
                                                    </button>
                                                    <button id="delete-{{ $skill->id }}" type="button" class="btn edit collapsed btn-danger" data-toggle="collapse" data-target="#demo" aria-expanded="false">
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
            $("#input_Name").val("");
            $("#input_Percent").val("");
         }

        $(document).ready(function(){
            $("#form").validate({
                rules: {
                    name: "required",
                    percent: "required"
                },
                messages: {
                    name: "Please specify your name skill",
                    percent: "Please specify percent"
                },
            });


            $("#insert").click(function(){
                updateInput();
                $("#spanActionSkill").html("Insert");
                $("#btnActionSkill").removeClass("btn-primary");
                $("#btnActionSkill").addClass("btn-success");
                $("#formInsert").modal();
            });

            $("#btnActionSkill").click(function(){
                if ($("#form").valid()) {
                    var action = $("#spanActionSkill").html();
                    var idSkill = (action == "Insert") ? "" : $("#idSkill").html();
                    var name = $("#input_Name").val();
                    var percent = $("#input_Percent").val();
                    var url = (action == "Insert") ? "skill/insert" : "skill/edit";

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            idSkill:idSkill,
                            name: name,
                            percent: percent
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
                    $("#spanActionSkill").html("Update");
                    $("#btnActionSkill").removeClass("btn-success");
                    $("#btnActionSkill").addClass("btn-primary");
                    // Set value to Update
                    $("#idSkill").html(id);
                    var name = $("#name-"+ id).html(); $("#input_Name").val(name);
                    var percent = $("#percent-"+ id).html(); $("#input_Percent").val(percent);
                    $("#formInsert").modal();
                    
                }
                if(action == "delete"){
                    $.ajax({
                        url: "skill/delete",
                        type: "delete",
                        data: {
                            idSkill: id
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