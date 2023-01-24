@extends('dashboard')

@section('content')
    <main class="update-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Update User</h3>
                        <div class="card-body">
                            <form action="{{ route('update.user') }}" method="POST" id="updateForm">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="First name" id="first_name" class="form-control" name="first_name"
                                           required autofocu value="{{ Auth::user()->first_name }}"s>
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Last name" id="last_name" class="form-control" name="last_name"
                                           required autofocus value="{{ Auth::user()->last_name }}">
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                           name="email" autofocus readonly value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Phone" id="phone" class="form-control" name="phone"
                                           required autofocus value="{{ Auth::user()->phone }}">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-select" aria-label="Country" name="country_id">
                                        <option>Choose country</option>
                                        @foreach($countries as $key => $country)
                                            <?php $selectedCountry = null; if($key == Auth::user()->country_id) { $selectedCountry = 'selected'; } ?>
                                            <option value="{{ $key }}" <?php echo $selectedCountry; ?>>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-select" aria-label="County" name="county_id">
                                        <option>Choose county</option>
                                        @foreach($counties as $key => $county)
                                            <?php $selectedCounty = null; if($key == Auth::user()->county_id) { $selectedCounty = 'selected'; } ?>
                                            <option value="{{ $key }}" <?php echo $selectedCounty; ?>>{{ $county }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('county_id'))
                                        <span class="text-danger">{{ $errors->first('county_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Address" id="address" class="form-control" name="address"
                                           autofocus value="{{ Auth::user()->address }}">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Birthdate" id="birthdate" class="form-control" name="birthdate"
                                           autofocus value="{{ Auth::user()->birthdate }}">
                                    @if ($errors->has('birthdate'))
                                        <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Save</button>
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
            $('#birthdate').datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1930:2023',
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
@endsection

