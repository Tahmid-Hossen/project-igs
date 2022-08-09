@extends('layouts.admin')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <div class="admin-list">
                        Check admin Panel List
                        <ul>
                            <li><a href="{{ route('create.post') }}">Create Post</a></li>
                            <li><a href="">All Post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
