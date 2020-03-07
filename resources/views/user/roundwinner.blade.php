@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<div class="container">
    @if(Session::has('danger'))
    <div class="alert alert-success">{{ Session::get('danger') }}</div>
    @endif
    <div class="row">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>Assign Round Winner</h3></div>
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>
                                                    {{ $error }}
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form action="{{ route('user/addWinner') }}" method="POST" role="form" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="profile_image" class="col-md-4 col-form-label text-md-right">Code</label>
                                                <div class="col-md-12">
                                                    <select class="form-control js-example-basic-single" name="code" id="selectVehicleaa">
                                                        <option value="">Select Code</option>
                                                        @foreach($code as $codes)
                                                        <option data-email="{{ $codes->verify_email }}" data-name="{{ $codes->verified_by }}" data-phone="{{ $codes->verify_phone }}">{{ $codes->code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="add as winner" name="">
                                        </form>
                                    </div>
                                    <div id="name"></div>
                                    <div id="phone"></div>
                                    <div id="email"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $(document).change(function() {
            var name = $(this).find('option:selected').data("name")
            var email = $(this).find('option:selected').data("email")
            var phone = $(this).find('option:selected').data("phone")
             $('#name').text('Verified by: '+name);
             $('#email').text('Verifier email: '+email);
             $('#phone').text('Verifier phone: '+phone);
            console.log(name);
            console.log(email);
            console.log(phone);
        });
    });
</script>

@endsection
