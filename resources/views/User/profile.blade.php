@extends('User.layouts.layoutProfile')

@section('idUser', $idUser)

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Profile</h1>
        </div>
        <!--End Page Header -->
    </div>
    <div class= "w3-container">
        <div style="padding: 20px 20px 0 0;" class="col-lg-4">
            <div class="dropdown w3-right">                  
                <img src="{{ '/userPic/' . $information->picture . '.jpg' }}" class="dropdown-toggle w3-circle" style="height:106px;width:106px" alt="Avatar" data-toggle="dropdown">
                <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#editPic">Edit</a></li>     
                </ul>
                <div class="modal fade" id="editPic" role="dialog">
                    <div class="modal-dialog modal-sm">                        
                        <!-- Modal content-->
                        <form action="{{ route('profile.upload') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Picture</h4>
                                </div>
                                <div class="modal-body">
                                    <p>New Picture:</p>
                                    <input type="file" id="myFile" accept="image/*" name="myFile">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default" >OK</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div> 
                        </form>                       
                    </div>
                </div>
            </div>                  
        </div>
        <div style="padding: 0 0 20px 0;" class="col-lg-8">
            <h2>Username: Duy</h2>
            <hr>
                      
            <table class="table no-border col-md-12">
                <!-- Introduce  -->
                <tr>
                    <td colspan="2" >
                        <p id="introduce" style="font-family:generic-family;font-size:20px;font-style:italic;">
                            @if($information->introduce == "")
                                Introduce yourselft
                            @else
                                {{ $information->introduce }}
                            @endif
                        </p>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class ="editInfo" id="editIntroduce" data-toggle="collapse" data-target="#form_edit_introduce">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <form id="form_edit_introduce" class="collapse">
                            <div class="list-group text-center">
                                <div class="list-group-item">                  
                                    <textarea class="form-control" id="in_btn_introduce" rows="3"></textarea>                                   
                                </div>
                                <div class="list-group-item">
                                    <button type="button" class="btn btn-primary edit_info" id="btn_introduce">Update</button>
                                    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#form_edit_introduce">Cancel</button>
                                </div> 
                            </div>
                        </form>
                    </td>
                </tr>
                <!-- End Introduce  -->

                <!-- Fullname  -->
                <tr>
                    <td style="width:30%;"><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Fullname:</td>
                    <td><span id="lastname">{{ $information->lastname }}</span>&nbsp;<span id="firstname">{{ $information->firstname }}</span></td>
                    <td>
                        <a href="javascript:void(0);" class ="editInfo" id="editFullname" data-toggle="collapse" data-target="#form_edit_fullname">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                    <form id="form_edit_fullname" class="collapse">
                        <div class="list-group text-center">
                            <div class="list-group-item">
                                <table class="table">
                                    <tbody>
                                        <tr style="border-top: hidden;">
                                            <td style="text-align:right;">Firstname:</td>
                                            <td style="text-align:left;">
                                                <div class="input-append date" id="dp3" data-date-format="dd-mm-yyyy">
                                                    <input id="in_btn_firstname" size="16" type="text">
                                                    <span class="add-on"><i class="icon-th"></i></span>
                                                </div> 
                                            </td>
                                        </tr>
                                        <tr style="border-top: hidden;">
                                            <td style="text-align:right;">Lastname:</td>
                                            <td style="text-align:left;">
                                                <div class="input-append date" id="dp3" data-date-format="dd-mm-yyyy">
                                                    <input id="in_btn_lastname" size="16" type="text">
                                                    <span class="add-on"><i class="icon-th"></i></span>
                                                </div> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                                                                   
                            </div>
                            <div class="list-group-item">
                                <button type="button" class="btn btn-primary edit_info" id="btn_fullname">Update</button>
                                <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#form_edit_fullname">Cancel</button>
                            </div> 
                        </div>
                    </form>                         
                    </td>                  
                </tr>
                <!-- End Fullname  -->

                <!-- Birthday  -->     
                <tr>
                    <td style="width:20%;">
                        <i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>Birthday:
                    </td>
                    <td>
                        <span id="birthday">{{ $information->birthday }}</span>                                         
                    </td>
                    <td>
                        <a href="javascript:void(0);" class ="editInfo" id="editBirthday" data-toggle="collapse" data-target="#form_edit_birthday">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <form id="form_edit_birthday" class="collapse">
                            <div class="list-group text-center">
                                <div class="list-group-item">                  
                                    <div class="input-append date" id="dp3" data-date-format="dd-mm-yyyy">
                                        Birthday:
                                        <input id="in_btn_birthday" size="16" type="text">
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>                                    
                                </div>
                                <div class="list-group-item">
                                    <button type="button" class="btn btn-primary edit_info" id="btn_birthday">Update</button>
                                    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#form_edit_birthday">Cancel</button>
                                </div> 
                            </div>
                        </form>
                    </td>
                </tr>
                <!-- End Birthday  -->   

                <!-- Phone  --> 
                <tr>
                    <td style="width:20%;">
                        <i class="fa fa-mobile fa-fw w3-margin-right w3-text-theme"></i>Phone:
                    </td>
                    <td>
                        <span id="phone">{{ $information->phone }}</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class ="editInfo" id="editPhone" data-toggle="collapse" data-target="#form_edit_phone">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <form id="form_edit_phone" class="collapse">
                            <div class="list-group text-center">
                                <div class="list-group-item">
                                    Phone:
                                    <input type="number" id="in_btn_phone" />
                                </div>
                                <div class="list-group-item">
                                    <button type="button" class="btn btn-primary edit_info" id="btn_phone">Update</button>
                                    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#form_edit_phone">Cancel</button>
                                </div> 
                            </div>
                        </form>
                    </td>
                </tr>
                <!-- End Phone  --> 

                <!-- Address  --> 
                <tr>
                    <td style="width:20%;">
                        <i class="fa fa-address-book fa-fw w3-margin-right w3-text-theme"></i>Address:
                    </td>
                    <td>
                        <span id="address">{{ $information->address }}</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class ="editInfo" id="editAddress" data-toggle="collapse" data-target="#form_edit_address">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <form id="form_edit_address" class="collapse">
                            <div class="list-group text-center">
                                <div class="list-group-item">
                                    Address:
                                    <input type="text" id="in_btn_address" />
                                </div>
                                <div class="list-group-item">
                                    <button type="button" class="btn btn-primary edit_info" id="btn_address">Update</button>
                                    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#form_edit_address">Cancel</button>
                                </div> 
                            </div>
                        </form>
                    </td>
                </tr>
                <!-- End Address  --> 

                <!-- Mail  -->
                <tr>
                    <td style="width:20%;">
                        <i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i>E-Mail:
                    </td>
                    <td>
                        <span id="mail">{{ $information->mail }}</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class ="editInfo" id="editEmail" data-toggle="collapse" data-target="#form_edit_mail">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <form id="form_edit_mail" class="collapse">
                            <div class="list-group text-center">
                                <div class="list-group-item">
                                    Email:
                                    <input type="text" id="in_btn_mail" />
                                </div>
                                <div class="list-group-item">
                                    <button type="button" class="btn btn-primary edit_info" id="btn_mail">Update</button>
                                    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#form_edit_mail" >Cancel</button>
                                </div> 
                            </div>
                        </form>
                    </td>
                </tr>
                <!-- End Mail  --> 

                <!-- Skype  --> 
                <tr>
                    <td style="width:20%;">
                        <i class="fa fa-skype fa-fw w3-margin-right w3-text-theme"></i>Skype :
                    </td>
                    <td>
                        <span id="skype"> {{ $information->skype }}</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class ="editInfo" id="editSkype" data-toggle="collapse" data-target="#form_edit_skype">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <form id="form_edit_skype" class="collapse" >
                            <div class="list-group text-center">
                                <div class="list-group-item">
                                    Skype:
                                    <input type="text" id="in_btn_skype" />
                                </div>
                                <div class="list-group-item">
                                    <button type="button" class="btn btn-primary edit_info" id="btn_skype">Update</button>
                                    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#form_edit_skype">Cancel</button>
                                </div> 
                            </div>
                        </form>
                    </td>
                </tr>
                <!-- End Skype  --> 
            </table>                
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#editFullname').click(function(){
                var firstname = $('#firstname').html();
                var lastname = $('#lastname').html();
                $('#in_btn_firstname').val(firstname);
                $('#in_btn_lastname').val(lastname);
            });

            $('#editBirthday').click(function(){
                var value = $('#birthday').html();
                $('#in_btn_birthday').val(value);
            });

            $('#editPhone').click(function(){
                var value = $('#phone').html();
                $('#in_btn_phone').val(value);
            });

            $('#editAddress').click(function(){
                var value = $('#address').html();
                $('#in_btn_address').val(value);
            });

            $('#editEmail').click(function(){
                var value = $('#mail').html();
                $('#in_btn_mail').val(value);
            });

            $('#editSkype').click(function(){
                var value = $('#skype').html();
                $('#in_btn_skype').val(value);
            });


            $('#in_btn_birthday').datepicker({
                format: 'dd/mm/yyyy'
            });

            $(".editInfo").click(function(){
                var id = $(this).attr('id');
                
            });

            $(".btn.edit_info").click(function(){
                var id = $(this).attr('id');
                var value;
                if(id == "btn_fullname")
                    value = $("#in_" + "btn_firstname").val() + "_" + $("#in_" + "btn_lastname").val();
                else
                    value = $("#in_" + id).val();

                $.ajax({
                    url : "{{ route('info.edit') }}",
                    type : "POST",
                    data :{
                        action : id,
                        value : value
                    },
                    success : function(data){
                        if(data.error)
                            alert(data.message);
                        else{
                            if(id == "btn_fullname"){
                                $("#lastname").html(data.value.split("_")[1]);
                                $("#firstname").html(data.value.split("_")[0]);
                            }
                            else
                                $("#" + data.action).html(data.value);
                        }
                    }
                });
                
            });
        });
    </script>
@endsection