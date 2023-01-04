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
    <div class="container bg-primary">
        <div class="main">
          <div class="row">
            <div class="col-md-12 text-center">Welcome to CRM panel</div>
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