@extends('backend.layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title d-flex align-items-center justify-content-center btn btn-success">Add User
                        </h3>
                    </div>
                    <div class="card-body">
                      <form action="" method="POST" enctype="multipart/form-data" id="UserForm">
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
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required"> Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" name="password" required onkeyup="inputValidation()">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required"> Address </label>
                                        <textarea class="form-control" name="address" rows="1" required onkeyup="inputValidation()"></textarea>
                                    </div>
                                </div>
                            @if(Auth::check())
                                @if(auth()->user()->user_type == 'A')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required"> User Type</label>
                                        <select name="user_type" class="form-control select2" required onchange="filterUserType()">
                                            <option value="A"> Admin</option>
                                            <option value="O"> Buyer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 d-none" id="shop">
                                    <div class="form-group">
                                        <label class="form-label"> Shop</label>
                                        <select name="shop_id" class="form-control select2">
                                            @foreach ($shops as $key=>$shop)
                                                <option value="{{$shop->id}}"> {{$shop->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                            @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function(){
        filterDate();
    });

    function filterDate(){
        requiredValidation();
    };
    function requiredValidation(){
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