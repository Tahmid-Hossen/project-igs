@extends('layouts.admin')
<style>
    .admin-list{
        overflow: hidden;
    }
    .admin-list h3{
        text-align: center ;
        margin-bottom: 20px;
    }
    .admin-list ul {
        text-align: center;
    }
    .admin-list ul li{
        list-style: none;
    }
    .admin-list ul li a{
        list-style: none;
        color: #fff;
        font-size: 18px;
        padding: 10px 40px;
        border: 2px solid #000;
        text-decoration: none;
        background: green;
    }
    .admin-list ul li a:hover {
      background-color: red;
    }
</style>

@section('admin_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <div class="admin-list">
                        <h3>Check admin Panel List.</h3>
                        <ul>
                            <li><a href="{{ route('create.post') }}">Create Post</a></li>
                            <li style="margin-top: 40px;"><a href="{{ route('all.post') }}">All Post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
