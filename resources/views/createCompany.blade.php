

@extends('adminLayout')
@section('content')
    <head>
        <link href="{{ asset('css/form-register.css') }}" rel="stylesheet">
    </head>


    <div class="main-content">



        <form class="form-register" method="post" action="/addCompany">
            {{csrf_field()}}
            <div class="form-register-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Create a company</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Name</span>
                            <input type="text" name="name">
                            <strong>{{ $errors->first('name') }}</strong>
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email">
                            <strong>{{ $errors->first('email') }}</strong>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span>Tel</span>
                            <input type="number" name="tel">
                            <strong>{{ $errors->first('tel') }}</strong>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span>Address</span>
                            <input type="text" name="address">
                            <strong>{{ $errors->first('address') }}</strong>
                        </label>
                    </div>

                    <div class="form-row">
                        <button type="submit">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

