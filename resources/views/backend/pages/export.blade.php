@extends('backend.layouts.master')
@section('title','Create User')
@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title d-flex align-items-center justify-content-center btn btn-success">Export
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.export.post') }}" method="POST" enctype="multipart/form-data" id="exportForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ">From</span>
                                        </div>
                                        <input type="date" class="form-control" name="from" value="<?php echo date('Y-m-d'); ?>"required onchange="filterDate()">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ">To</span>
                                        </div>
                                        <input type="date" class="form-control" name="to" value="<?php echo date('Y-m-d'); ?>" required onchange="filterDate()">
                                    </div>
                                </div>
                            </div>
        
                            <div class="row my-3">
                                <div class="col-md-6 mx-auto text-center">
                                    <div class="form-group">
                                        <button id="download_now" type="submit" class="btn btn-success btn-block" readonly>
                                            Download <span><i class="fa fa-cloud-download" aria-hidden="true"></i></span>
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