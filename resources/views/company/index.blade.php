@extends('layouts.front-layout')

@section('content')
<!-- the image slider here  -->

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/company.css') }}">

  <body>
    <header>

      <div id="carousel" class="carousel slide" data-ride="carousel">


        <div class="carousel-inner2" role="listbox">

                  
          <div class="carousel-item2" style="background-image: url('../../uploads/{{ $company_data->banner }}'); background-size: cover;">
            <div class="caption2">
              
              <h2 style="background-color: rgba(0, 0, 0, 0.7); color: #fff;"><center>{{ $company_data->text }}</center></h2>
            </div>
          </div>

        </div>
   
      </div>
    </header>
  </body>
  <!-- the image slider here ended -->
  <!-- style for modal popup -->
  <div class="hero" >
    <div class="hero-bkg-animated">
      <span>
        @if(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!--Trigger-->
        <a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Click to Enter Code</a>

        <div id="login" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-body">
                <button data-dismiss="modal" class="close">&times;</button>
                <h4>Enter Your Code</h4>
                <form method="post"  action="{{ route('user/registercode') }}" >
                  @csrf
                  <input type="text" name="name" required="" class="username form-control" placeholder="Enter Full Name"/>
                  <input type="text" name="code" required="" class="username form-control" placeholder="Enter Code"/>
                  <input type="text" name="phone" required="" class="username form-control" placeholder="Enter Phone Number"/>
                  <input type="email" name="email" required="" class="username form-control" placeholder="Enter Email address"/>
                  
                  <select class="password form-control" name="type" placeholder="password">
                    <option> Register Code</option>
                    <option> Confirm Code</option>
                  </select>
                  <input class="btn login" type="submit" value="Continue" />
                </form>
              </div>
            </div>
          </div>  
        </div>

      </span>
    </div>
  </div>
  @endsection