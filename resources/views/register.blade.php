


    <head>
        <link href="{{ asset('css/form-register.css') }}" rel="stylesheet">
    </head>


    <div class="main-content">



        <form class="form-register" method="post" action="/editUser/{id}">
            {{csrf_field()}}
            <div class="form-register-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Create an account</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>user name</span>
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
                            <span>phone</span>
                            <input type="number" name="phone">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </label>
                    </div>
                    <div class="form-row">
                        <span>company</span>
                        <label>
                        <select  name="company_id">
                            @foreach($companies as  $company )
                                <option value="{{$company->id}}">{{$company->name}}</option>

                            @endforeach
                        </select>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password">
                            <strong>{{ $errors->first('password') }}</strong>
                        </label>
                    </div>
                    <div class="form-row">
                        <button type="submit">Register</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

