@extends('adminLayout')

@section('content')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <br>
    <br>
    <br>
    <div class="jumbotron  info-border" style="background-color: rgb(241, 239, 239)">

        <form class="row"  method="get" action="/searchCompany/{search_field}">
            <div class="col-lg-7">
                <h1>All Companies </h1>
            </div>
            <div class=" pull-right input-group col-lg-5">
                <input type="text" class="form-control" placeholder="search field" name = "search_field">
                <div class="input-group-append">
                    <button  class="btn btn-info" >search</button>
                </div>
            </div>

        </form>
        <br>
        <br>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">tel</th>
                <th scope="col">email</th>
                <th scope="col">Address</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <form method="get" action="/getCompany">
                    <input type="hidden" name="id" value="{{$company->id}}">
                    <tr>
                        <td>{{$company->name}}</td>
                        <td>{{$company->tel}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->address}}</td>
                        <td> <button class="btn btn-success" > show details  </button> </td>
                    </tr>
                </form>

            @endforeach

            </tbody>
            <form class="row"  method="get" action="/addCompany">
                <div class="col-lg-7">
                    <button class="btn bg-primary"> Add Company <i class="fas fa-plus"></i></button>
                </div>
            </form>
            <br>
        </table>
    </div>
@endsection
