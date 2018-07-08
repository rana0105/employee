@extends('backend.layouts.dashboard')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="active">Admins</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('add_users')
                        <a class="card-title btn btn-primary" href="{{ route('users.create') }}"><i class="fa fa-plus"></i>Add User</a>
                        @endcan
                    </div>
                    <div class="card-body">
                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            @can('edit_users', 'delete_users')
                            <th class="text-center">Actions</th>
                           @endcan
                          </tr>
                        </thead>
                        <tbody>
                        <?php $sr = 1; ?>
                        @foreach($result as $item)
                            <tr>
                                <td>{{ $sr++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at->toFormattedDateString() }}</td>
                                <td class="text-center">
                                    @include('shared._actions', [
                                        'entity' => 'users',
                                        'id' => $item->id
                                    ])
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                        <div id="t-cent">
                            {{ $result->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection