<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    
    <title>CRM</title>
    <style>
    	body{
    		font-family: Poppins;
		}
		.px-15px{
		    padding-left: 15px;
		    padding-right: 15px;
		}
		.form-label{
		    flex: 0 0 30%;
		}
        .form-check{
            padding: .375rem .75rem;
            margin: 0 .5em;
        }
        .required::before {
            content: "*";
            position: relative;
            font-size: inherit;
            color: #ff0000;
            padding-right: 0.25rem;
            font-weight: 700;
        }
    </style>
  </head>
  <body>
    <div class="container border border-secondary">
        <div class="main">
            <div class="row">
                <div class="col-md-6">
                    <h5>Agent Name: {{ $agent_name }}  </h5>

                </div>
                <div class="col-md-6">
                    <h5>Phone Number:{{ $phone_number }}</h5>
                </div>
            </div>
            <div class="row">   
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <div class="text-white text-uppercase px-15px">
                                @if(Session::has('msg'))
                                <h3 class="alert alert-success">{{ Session::get('msg') }}</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                    @include('alert.message')
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <div class="title bg-secondary text-white text-uppercase px-15px">
                                <span class="font-weight-bold text-center">Call Center Customer Services</span>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('crms.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="agent_name" value="{{ $agent_name }}">
                        <input type="hidden" name="phone_name" value="{{ $phone_number }}">
                        <div class="row my-3 g-5">                       
                            <div class="col-md-6">
                                <div class="form-group d-inline-flex align-items-center justify-content-between w-100">
                                    <label class="form-label mr-2 mb-0">Customer Name :</label>
                                    <input type="text" class="form-control shadow-sm rounded" value="@if($last_crm) {{$last_crm->name}} @endif" name="customer_name">
                                </div>
                                <div class="form-group d-inline-flex align-items-center justify-content-between w-100">
                                    <label class="form-label mr-2 mb-0">Phone Number:</label>
                                    <input type="text" class="form-control shadow-sm rounded" value="{{ $phone_number }}" name="phone_number">
                                </div>
                                <div class="form-group d-inline-flex align-items-center justify-content-between w-100">
                                    <label class="form-label mr-2 mb-0">Gender:</label>
                                    <select class="form-control" name="gender">
                                        <option value="male" @if($last_crm && $last_crm->gender == 'male') selected @endif    >Male</option>
                                        <option value="female" @if($last_crm && $last_crm->gender == 'female') selected @endif>Female</option>
                                        <option value="other" @if($last_crm && $last_crm->gender == 'other') selected @endif>Other</option>
                                    </select>
                                </div>
                                <div class="form-group d-inline-flex align-items-center justify-content-between w-100">
                                    <label class="form-label mr-2 mb-0">Alt Phone Number:</label>
                                    <input type="text" class="form-control shadow-sm rounded" name="alt_phone_number" value="@if($last_crm && $last_crm->alt_phone_number){{$last_crm->alt_phone_number}} @endif">
                                </div>  
                                <div class="form-group d-inline-flex align-items-center justify-content-between w-100">
                                    <label class="form-label mr-2 mb-0">Address:</label>
                                    <textarea class="form-control shadow-sm rounded" name="address" rows="3">@if($last_crm) {{$last_crm->address}} @endif</textarea>
                                </div>                                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-inline-flex align-items-center justify-content-between w-100">
                                    <label class="form-label mr-2 mb-0">Call Type:</label>
                                    <input type="text" class="form-control shadow-sm rounded" name="call_type">
                                </div>
                                <div class="form-group d-inline-flex align-items-center justify-content-between w-100">
                                    <label class="form-label mr-2 mb-0">Query Type:</label>
                                    <select class="form-control" name="query_type">
                                        <option value="Query One">Query One</option>
                                        <option value="Query Two">Query Two</option>
                                        <option value="Query Three">Query Three</option>
                                    </select>
                                </div>   
                                <div class="form-group d-inline-flex align-items-center justify-content-between w-100">
                                    <label class="form-label mr-2 mb-0">Call Remarks:</label>
                                    <select class="form-control" name="call_remarks">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="form-group d-inline-flex align-items-center justify-content-between w-100">
                                    <label class="form-label mr-2 mb-0">Verbatim:</label>
                                    <textarea class="form-control shadow-sm rounded" name="verbatim" rows="5"></textarea>
                                </div> 
                              
                            </div>
                        </div> 
                        <div class="form-group my-3">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <button type="submit" class="btn btn-success btn-block">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>                
                </div>
            </div>
            <div class="row mt-4 border-top">
                <table class="table table-striped table-bordered mt-4">
                    <thead>
                      <tr>
                        <th scope="col">Sl No.</th>
                        <th scope="col">Date</th>
                        <th scope="col">Agent Name</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Query</th>
                        <th scope="col">Verbatim</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($crms as $key=>$crm)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $crm->created_at }}</td>
                            <td>{{ $agent_name }}</td>
                            <td>{{ $crm->phone_number }}</td>
                            <td>{{ $crm->name }}</td>
                            <td>{{ $crm->query_type }}</td>
                            <td>{{ $crm->verbatim }}</td>
                            <td>
                                <a href="" class="btn btn-success" >Edit</a>
                                <a href="#deleteModal{{ $crm->id }}" data-toggle="modal" class="btn btn-danger" >Delete</a>
                                
                                <div class="modal fade" id="deleteModal{{ $crm->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to Delete?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                        
                                                <form action="{{ route('crms.delete',$crm->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger">Permanent Delete</button>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        No Data Found
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>

        $( document ).ready(function() {
            $('#summernote').summernote();
            typeofEvent();
            wasTreated();
            outcomesAttributed();
            relevantHistory();

            $("#others").click(function(){
                alert("The other was clicked.");
            });
            $("#alcohol").click(function(){
                alert("The Alcohol was clicked.");
            });

       
        });

        function typeofEvent(){
            if($("[name='b_type_of_event']").val() == 'others')
            {
                if($('#b_type_of_event_specify').hasClass('d-none')){
                    $('#b_type_of_event_specify').removeClass('d-none')
                }
            }
            else
            {
                if(!$('#b_type_of_event_specify').hasClass('d-none')){
                    $('#b_type_of_event_specify').addClass('d-none')
                }
            }
        };
        function wasTreated(){
            if($("[name='b_was_that_treated']").val() == 'yes')
            {
                if($('#was_that_treated').hasClass('d-none')){
                    $('#was_that_treated').removeClass('d-none')
                }
            }
            else
            {
                if(!$('#was_that_treated').hasClass('d-none')){
                    $('#was_that_treated').addClass('d-none')
                }
            }
        };
        function outcomesAttributed(){
            if($("[name='b_outcomes_attributed_to_the_adverse_event']").val() == 'fatal')
            {
                if($('#date_of_death').hasClass('d-none')){
                    $('#date_of_death').removeClass('d-none')
                }
            }
            else
            {
                if(!$('#date_of_death').hasClass('d-none')){
                    $('#date_of_death').addClass('d-none')
                }
            }
        };
        function relevantHistory(){
            if($("[name='b_other_relevant_history']").val() == 'others')
            {
                if($('#specify_history').hasClass('d-none')){
                    $('#specify_history').removeClass('d-none')
                }
            }
            else
            {
                if(!$('#specify_history').hasClass('d-none')){
                    $('#specify_history').addClass('d-none')
                }
            }
        };

        $("#AddNewConcomitantMedicine").click(function(){ 
            var row = $(".clone").html();
            $(".increment").after(row);
        });
        $("body").on("click",".btn-danger",function(){ 
            $(this).parent().parent().remove();
        });
    </script>
  </body>
</html>