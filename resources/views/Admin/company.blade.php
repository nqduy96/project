@extends('Admin.layouts.layout')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Home</li>
    <li class="breadcrumb-item active">Company</li>
    <li class="breadcrumb-item">
        <a href="#insertCompany" data-toggle="modal" data-target="#insertCompany">Insert</a>
    </li>
    <!-- Modal -->
    
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal fade" id="insertCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Insert Company</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form>
                                <div class="form-group row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputUsername" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Name Company">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputURL" class="col-sm-2 col-form-label">URL</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="inputURL" placeholder="Website company"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputLogo" class="col-sm-2 col-form-label">Logo</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="inputLogo" placeholder="Logo URL"></textarea>
                                    </div>
                                </div>
                            </from>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn_createAcount">Create Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</ol>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Table Company</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->iduser }}</td>
                    </tr>
                    @endforeach
                </tbody>           
            </table>
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

        $('#btn_createAcount').click(function(){
            var userName = $('#inputUsername').val();
            var name = $('#inputName').val();
            var url = $('#inputURL').val();
            var logo = $('#inputLogo').val();
            
            $.ajax({
                url: "{{ route('company.create') }}",
                type: 'POST',
                data: {
                    userName:userName,
                    name:name,
                    url:url,
                    logo:logo
                },
                success: function(data){
                        data.success ? alert("Successfully") : alert(data.exception);
                    }
            })
        })
    });
</script>
@endsection