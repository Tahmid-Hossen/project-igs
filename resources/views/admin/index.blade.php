@extends('layouts.admin')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><b>All post</b></div>
                <div class="card-body">
                    <div class="admin-list">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Document File path</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->document }}</td>
                                <td>
                                    <a href="{{ route('view.post', $post->id) }}" type="button" class="btn btn-success">View Post</a>
                                    <a href="{{ route('delete.post', $post->id) }}" type="button" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    
</script> -->
@endsection