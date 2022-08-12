@extends('layouts.app')
<style>
   .user-panel{
     
   }
   .user-panel h3{
      text-align: center;
   }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="user-panel">
                        <h3>Please check all the files here</h3>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Document File path</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>File one</td>
                                    <td>This is our file. Please download.</td>
                                    <td>
                                        <a href="" type="button" class="btn btn-info">Download</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
