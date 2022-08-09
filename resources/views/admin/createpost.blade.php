@extends('layouts.admin')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Create New Post</b></div>
                <div class="card-body">
                    <div class="admin-list">
                        <form action="{{ route('store.post') }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                <label for="title"><b>Enter Title</b></label>
                                <input type="text" class="form-control" name="title" id="title" aria-describedby="title">
                            </div>
                            <div class="form-group">
                                <label for="description"><b>Enter Description</b></label>
                                <textarea class="form-control" name ="description" id="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="file_image"><b>Upload image</b></label>
                                <input type="file" name="image" class="file_image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="file_file"><b>Upload Documents</b></label>
                                <input type="file" name="document" class="file_file" id="document">
                            </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection