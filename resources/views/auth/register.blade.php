@extends('base')

@section('content')
<div class="container">
    <div class="col-mr-12" style="padding: 20px;">
        <div class="row justify-content-center" style="text-align:center;padding: 20px;">
                <div class="col-md-10" style="padding :20px;">
                    <div class="card card-3">
                        <div class="card-heading"></div>
                        <div style="text-align: center;padding: 20px;"><h2>{{ __('Register Page') }}</h2></div>
                        <br>
                            <form method="POST" action="{{ route('register') }}" style="padding: 15px;">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" placeholder="NAME" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                                    <div class="col-md-6">
                                        <select class="form-control" name="gender" id="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select>

                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-6">
                                        <input id="phone" placeholder="PHONE" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" placeholder="EMAIL" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" placeholder="PASSWORD" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" style="font-style: italic;" placeholder="RE-TYPE PASSWORD" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="captcha" class="col-md-4 col-form-label text-md-right">{{ __('Captcha') }}</label>

                                    <div class="col-md-6">
                                    comment 
                                        
                                        <div class="captcha">
                                            <span> {!! captcha_img() !!} </span>
                                            <button type="button" class="btn btn-success btn-referesh">Refresh</button>
                                        </div>


                                        <input id="captcha" type="text" class="form-control mt-2 @error('captcha') is-invalid @enderror" name="captcha" required placeholder="Enter The Captcha">

                                        @error('captcha')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>--}}
                                
                                <div class="form-group row mb-0" style="text-align: center;padding:15px;">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit"  class="site-btn">
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
@endsection
