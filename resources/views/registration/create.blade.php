@extends('dashboard')

@section('content')
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Register User</h3>
                        <div class="card-body">
                            <form action="{{ route('register') }}" method="POST" id="signupForm">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="First name" id="first_name" class="form-control" name="first_name"
                                           required autofocus>
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Last name" id="last_name" class="form-control" name="last_name"
                                           required autofocus>
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                           name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Phone" id="phone" class="form-control" name="phone"
                                           required autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-select" aria-label="Country" name="country_id">
                                        <option selected>Choose country</option>
                                        @foreach($countries as $key => $country)
                                            <option value="{{ $key }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-select" aria-label="County" name="county_id">
                                        <option selected>Choose county</option>
                                        @foreach($counties as $key => $county)
                                            <option value="{{ $key }}">{{ $county }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('county_id'))
                                        <span class="text-danger">{{ $errors->first('county_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                           name="password" required passwordCheck="passwordCheck">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Confirm password" id="confirm_password" class="form-control"
                                           name="confirm_password" required>
                                    @if ($errors->has('confirm_password'))
                                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="terms"> Accept terms & conditions</label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        $(document).ready(function() {

            $.validator.setDefaults({
                submitHandler: function() {
                    $(form).submit();
                }
            });

            // validate signup form on keyup and submit
            $("#signupForm").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirm_password: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    country_id: {
                        min: 1,
                        required: true
                    },
                    county_id: {
                        min: 1,
                        required: true
                    },
                    terms: "required"
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",
                    terms: "Please accept our policy",
                    country_id: "Please select country",
                    county_id: "Please select county",
                }
            });
            $.validator.addMethod("passwordCheck",
                function(value, element, param) {
                    if (this.optional(element)) {
                        return true;
                    } else if (!/^(?=\D*\d)(?=[^a-z]*[a-z])[a-zA-Z0-9!@#$%&*]+$/i.test(value)) {
                        return false;
                    } else if (!/[!@#$%&*]+$/i.test(value)) {
                        return false;
                    }

                    return true;
                },
                "Please enter one uppercase letter, one letter and one special character");
        })
    </script>
@endsection

