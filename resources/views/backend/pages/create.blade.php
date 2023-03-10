@extends('backend.layouts.master')
@section('title','Create User')
@section('content')
@if (Auth::check())
    @if (auth()->user()->user_type == 'admin')
<main>
    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title d-flex align-items-center justify-content-center text-center">@if(Session::has('msg'))
                            <h3 class="btn btn-success">{{ Session::get('msg') }}</h3>
                            @endif
                        </h3>
                        <h3 class="card-title d-flex align-items-center justify-content-center btn btn-success">Add User
                        </h3>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('admin.create.user') }}" method="POST" enctype="multipart/form-data" id="UserForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required"> Name</label>
                                    <input type="text" class="form-control" name="name" required onkeyup="inputValidation()">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required"> Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" name="email" required onkeyup="inputValidation()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required"> Phone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <img src="{{ asset('backend/assets/img/bd.png') }}" alt="BD" class="img img-fluid h-20px">
                                                <span class="ml-1">+88</span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="phone" required onkeyup="inputValidation()">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required"> Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock" ></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" id="password" name="password" required onkeyup="inputValidation()">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-eye" id="togglePassword"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required"> Address </label>
                                    <textarea class="form-control" name="address" rows="1" required onkeyup="inputValidation()"></textarea>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> Profile Photo</label>
                                    <input type="file" class="form-control" name="profile_photo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" id="add_user" class="btn btn-success mt-2">
                                        Add User
                                    </button>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
</main>
@endif
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });

    $(document).ready(function(){
        filterDate();
    });

    function filterDate(){
        inputValidation();
    };
    function inputValidation(){
        var required_field_value_count = 0;
        $('#exportForm').find('input,textarea,select').filter('[required]:visible').each(function(){
            if($(this).val() == '' || $(this).val() == null){
                required_field_value_count = required_field_value_count + 1;
            }
        });
        if(required_field_value_count == 0){
            $('#download_now').attr("disabled", false);
        }
        else{
            $('#download_now').attr("disabled", true);
        }
    };
</script>

@endsection