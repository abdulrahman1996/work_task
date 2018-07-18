@extends('adminLayout')
@section('content')



    <head>
        <link href="{{ asset('css/form-register.css') }}" rel="stylesheet">
    </head>


    <div class="main-content">
        <div class="form-register">
        <form  method="post" action="/edit">
            {{csrf_field()}}
            <div class="form-register-with-email">
        <input type="hidden" name="id" value="{{$employer->id}}">
                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>User info</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>name</span>
                            <input type="text" name="name" value="{{$employer->name}}">
                            <strong>{{ $errors->first('name') }}</strong>
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email" value="{{$employer->email}}">
                            <strong>{{ $errors->first('email') }}</strong>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span>phone</span>
                            <input type="number" name="phone" value="{{$employer->phone}}">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span>company : </span>
                         <span>{{$employer->company->name}}   </span>
                            <select   name="company_id">
                                {{--<option value="{{$employer->company->id}}"></option>--}}
                                @foreach($companies as  $company )
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-row">
                        <button class="btn btn-default"> Edit </button>
                    </div>
                </div>
            </div>
        </form>
                <form method="get" action="/deleteUser">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$employer->id}}">
                    <button class="btn btn-danger"> Delete </button>
                </form>

        </div>


    </div>


@endsection