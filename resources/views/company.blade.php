@extends('adminLayout')
@section('content')



    <head>
        <link href="{{ asset('css/form-register.css') }}" rel="stylesheet">
    </head>

    <div class="main-content">
        <div class="form-register">
            <form  method="post" action="/editCompany">
                {{csrf_field()}}
                <div class="form-register-with-email">
                    <input type="hidden" name="id" value="{{$company->id}}">
                    <div class="form-white-background">

                        <div class="form-title-row">
                            <h1>Company info</h1>
                        </div>

                        <div class="form-row">
                            <label>
                                <span>name</span>
                                <input type="text" name="name" value="{{$company->name}}">
                                <strong>{{ $errors->first('name') }}</strong>
                            </label>
                        </div>
                        <div class="form-row">
                            <label>
                                <span>name</span>
                                <input type="text" name="address" value="{{$company->address}}">
                                <strong>{{ $errors->first('address') }}</strong>
                            </label>
                        </div>

                        <div class="form-row">
                            <label>
                                <span>Email</span>
                                <input type="email" name="email" value="{{$company->email}}">
                                <strong>{{ $errors->first('email') }}</strong>
                            </label>
                        </div>
                        <div class="form-row">
                            <label>
                                <span>tel</span>
                                <input type="number" name="tel" value="{{$company->tel}}">
                                <strong>{{ $errors->first('tel') }}</strong>
                            </label>
                        </div>

                        <div class="form-row">
                            <button class="btn btn-default"> Edit </button>
                        </div>
                    </div>
                </div>
            </form>
            <form method="get" action="/deleteCompany">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$company->id}}">
                <button class="btn btn-danger"> Delete </button>
            </form>
        </div>
    </div>


@endsection