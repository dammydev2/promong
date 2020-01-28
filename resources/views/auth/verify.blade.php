@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="container">
              <!-- Trigger the modal with a button -->
              <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog" data-keyboard="false" data-backdrop="static">>
                <div class="modal-dialog">
                    
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                      <h4 class="modal-title">{{ __('Verify Your Email Address') }}</h4>
                  </div>
                  <div class="modal-body">

                    <div class="card">
                        <div class="card-header"></div>

                        <div class="card-body">
                            @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              </div>
          </div>
          
      </div>
  </div>
  
</div>

<script type="text/javascript">
    $(window).load(function()
    {
        $('#myModal').modal('show');
    });
</script>




</div>
</div>
</div>
@endsection
