@extends('Company.layouts.layoutProfile')

@section('idUser', $idUser)

@section('content')
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Change Password</h1>
        </div>
       
    </div>
     <!--End Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i>                       
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-11">
                            <table class="table no-border">
                                <tr>
                                    <td style="text-align:right;padding:2.5% 0 1% 0" >Password :</td>
                                    <td>
                                        <input type="text" class="form-control top-buffer-sm" id="in_OldPass" placeholder="Enter Password Current" name="name">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;padding:2.5% 0 1% 0" >New Password :</td>
                                    <td>
                                        <input type="text" class="form-control top-buffer-sm" id="in_NewPass" placeholder="Enter New Password" name="name">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;padding:2.5% 0 1% 0" >Retype Password :</td>
                                    <td>
                                        <input type="text" class="form-control top-buffer-sm" id="in_ReNewPass" placeholder="Retype Password" name="name">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <button id="btnActionChangePass" type="button" class="btn btn-success pull-right" style="margin-right:11%">
                            <i class="fa fa-check  fa-1x"></i>&nbsp;Change
                        </button>                                        
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

        $('#btnActionChangePass').click(function(){
            var oldPass = $('#in_OldPass').val();
            var newPass = $('#in_NewPass').val();
            var reNewPass = $('#in_ReNewPass').val();
            if(newPass != reNewPass){
                alert("Retype Password False");
                return;
            }

            $.ajax({
                url: "{{ route('pass.edit') }}",
                type: 'POST',
                data:{
                    oldPass: oldPass,
                    newPass: newPass,
                    reNewPass: reNewPass
                },
                success: function(data){
                    alert(data.message);
                }
            });
            
        });
    });
</script>
@endsection