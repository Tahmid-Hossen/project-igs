@extends('layouts.admin')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><b>View post</b></div>
                <div class="card-body">
                    <div class="admin-list">
                      <h4>{{ $post->title }}</h4>
                      <p><h4>{{ $post->document }}</h4></p>
                      <a href="" class="btn btn-info">Download File</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    
</script> -->
@endsection