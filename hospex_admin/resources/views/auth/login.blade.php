@extends('layouts.app')

@section('content')
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: {{ url('assets11/app/media/img//bg/bg-3.jpg')}};">
            <div class="m-login__wrapper-1 m-portlet-full-height">
                <div class="m-login__wrapper-1-1">
                    <div class="m-login__contanier">
                        <div class="m-login__content">
                            <div class="m-login__logo">
                                <a href="#">
                                    <img src="{{ asset('assets11/hospexlogo.png')}}" style="height:200px;width200px;">
                                    {{-- <img src="{{ asset('assets11/hospexmetro.png')}}"> --}}
                                </a>
                            </div>
                            <div class="m-login__title">
                                <h3>HOSPITAL EXPO 2020</h3>
                            </div>
                            <div class="m-login__desc">
                                The 33rd Indonesia International Hospital, Medical, pharmaceutical, clinical laboratories, equipment and medicine exhibition
                            </div>
                            <div class="m-login__form-action">
                                {{-- <button type="button" id="m_login_signup" class="btn btn-outline-focus m-btn--pill">Get An Account</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="m-login__border">
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="m-login__wrapper-2 m-portlet-full-height">
                <div class="m-login__contanier">
                    <div class="m-login__signin">
                        <div class="m-login__head">
                            <h3 class="m-login__title">{{ __('Login') }}</h3>
                        </div>
                        <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group m-form__group">
                                <input id="email" class="form-control m-input @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group m-form__group">
                                <input id="password" class="form-control m-input m-login__form-input--last @error('password') is-invalid @enderror" type="Password" name="password" required autocomplete="current-password" placeholder="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            
                            <div class="row m-login__form-sub">
                                <div class="col m--align-left">
                                    <label class="m-checkbox m-checkbox--focus">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col m--align-right">
                                    <!-- <a href="{{route('front.forgotPassword')}}" class="m-link">Forget Password ?</a> -->
                                </div>
                            </div>
                            <div class="m-login__form-action mb-0">
                                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">{{ __('Login') }}</button>
                                    <!-- <a class="btn btn-link m-link" id="m_login_forget_password" href="{{route('front.forgotPassword')}}">
                                        {{ __('Forgot Password?') }}
                                    </a> -->
                            </div>
                        </form>
                    </div>
                    <div class="m-login__forget-password">
                        <div class="m-login__head">
                            <h3 class="m-login__title">Forgotten Password ?</h3>
                            <div class="m-login__desc">Enter your email to reset your password:</div>
                        </div>
                        <form class="m-login__form m-form" method="POST" action="{{ route('front.forgotPasswordPost') }}">
                            @csrf
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="off" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="m-login__form-action">
                                <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Request</button>
                                <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom ">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    
@endsection

