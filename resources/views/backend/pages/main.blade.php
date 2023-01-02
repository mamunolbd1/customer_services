{{-- @extends('backend.layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <form action="{{ route('admin.main.update', $main->id) }}" method="POST" enctype="multipart/form-data">
            @csrf{{ method_field('put') }}
            <div class="row">
                    <div class="col-md-3 form-group mt-3">
                        <h4>Background Image</h4>
                        <img style="height:30vh" src="{{ url($main->bg_image) }}" class="img-thumbnail" id="bg_image_preview">
                        <input class="form-control mt-2" type="file" name="bg_image" id="bg_image" onchange="document.getElementById('bg_image_preview').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="col-md-3 form-group mt-3">
                        <h4>Navbar Logo</h4>
                        <img style="height:30vh" src="{{ url($main->nav_image) }}" class="img-thumbnail" id="nav_image_preview">
                        <input class="form-control mt-2" type="file" name="nav_image" id="nav_image" onchange="document.getElementById('nav_image_preview').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="col-md-4 mt-3 form-group">
                        <div class="div">
                            <label for=""><h4>Title</h4></label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter your title" value="{{ $main->title }}">
                        </div>
                        <div class="div">
                            <label for=""><h4>Sub Title</h4></label>
                            <input class="form-control" type="text" name="sub_title" id="sub_title" placeholder="Enter your Sub title" value="{{ $main->sub_title }}">
                        </div>
                        <div class="div">
                            <h4>Upload Resume</h4>
                            @if ($main->resume)                                
                            <a href="{{url($main->resume)}}" class="btn btn-sm btn-primary mb-2">Download <i class="fa fa-download" aria-hidden="true"></i></a>
                            @endif
                            <input class="form-control" type="file" name="resume" id="resume">
                        </div>
                    </div>
            </div>
            <input type="submit"name="submit"class="btn btn-primary mt-5">
       </form>
    </div>
</main>
@endsection --}}