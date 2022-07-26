@extends('auth.app')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telepon" class="col-md-4 col-form-label text-md-end">{{ __('Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="telepon" type="string" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon">

                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-7">
        <h3 class="mb-3">Register New Account</h3>            
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group first">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" placeholder="Name..." id="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group first">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" placeholder="your-email@gmail.com" id="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

          <div class="form-group first">
            <label for="phone">Phone Number</label>
            <input name="phone_number" type="tel" class="form-control" placeholder="081112233" id="phone_number">
            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="form-group last mb-3">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Your Password" id="password" required autocomplete="new-password"> 
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group last mb-3">
            <label for="password-confirm">Password Confirm</label>
            <input name="password_confirmation" type="password" class="form-control" placeholder="Re-type Password" id="password-confirm" required autocomplete="new-password">
        
          </div>
          
          @if (session('danger'))
          <div class="text-danger mb-1">
             {!! session('danger') !!}
          </div>
          @endif

          <input type="submit" value="Register" class="btn btn-block btn-primary">

        </form>
      </div>
    </div>
  </div>
@endsection
