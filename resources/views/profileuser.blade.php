@extends('layouts.layout')

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
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#editPic">Edit</a></li>     
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
                <h3>
                    <small class="text-muted">With faded secondary text</small>
                </h3>
                <br>
                <p>
                    <i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>
                     Birthday:<span id="birthday">{{ $information->birthday }}</span>                                         
                    <a href="javascript:void(0);" class ="editInfo" id="editBirthday" data-toggle="collapse" data-target="#form_edit_birthday">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <form id="form_edit_birthday" class="collapse">
                        <div class="list-group text-center">
                            <div class="list-group-item">
                                Birthday:
                                <div class="input-append date" id="dp3" data-date-format="dd-mm-yyyy">
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
                </p>                
                <p>
                    <i class="fa fa-mobile fa-fw w3-margin-right w3-text-theme"></i>
                     Phone:<span id="phone">{{ $information->phone }}</span>
                    <a href="javascript:void(0);" class ="editInfo" id="editPhone" data-toggle="collapse" data-target="#form_edit_phone">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
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
                </p>
                <p>
                    <i class="fa fa-address-book fa-fw w3-margin-right w3-text-theme"></i> 
                    Address:<span id="address">{{ $information->address }}</span>
                    <a href="javascript:void(0);" class ="editInfo" id="editAddress" data-toggle="collapse" data-target="#form_edit_address">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
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
                </p>
                <p>
                    <i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i> 
                    E-Mail:<span id="mail">{{ $information->mail }}</span>
                    <a href="javascript:void(0);" class ="editInfo" id="editEmail" data-toggle="collapse" data-target="#form_edit_mail">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
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
                </p>
                <p>
                    <i class="fa fa-skype fa-fw w3-margin-right w3-text-theme"></i>
                     Skype:<span id="skype"> {{ $information->skype }}</span>
                     <a href="javascript:void(0);" class ="editInfo" id="editSkype" data-toggle="collapse" data-target="#form_edit_skype">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
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
                </p>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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
                var value = $("#in_" + id).val();

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

                            $("#" + data.action).html(data.value);
                        }
                    }
                });
                
            });
        });
    </script>
@endsection