@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Register</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register.process') }}" method="post">
                            @csrf

                            <!-- Name-->
                            <div class="form-group my-2">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" />
                            </div>
                            <!-- Email-->
                            <div class="form-group my-2">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" />
                            </div>
                         
                            <!-- Password -->
                            <div class="form-group my-2">

                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" />
                            </div>
                            <!-- Confirm password -->
                            <div class="form-group my-2">
                                <label for="password_confirmation">Confirm password</label>
                                <input class="form-control" type="password" name="password_confirmation"
                                    id="password_confirmation" />
                            </div>
                            
                          

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary my-2">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
