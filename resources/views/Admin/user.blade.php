@extends('Admin.layouts.layout')

@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item active">Home</li>
        <li class="breadcrumb-item active">User</li>
        <li class="breadcrumb-item">
          <a href="#">Insert</a>
        </li>
</ol>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Table Example
    </div> 
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
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->iduser }}</td>
                    </tr>
                    @endforeach
                </tbody>           
            </table>
        </div>
    </div>
</div>
@endsection