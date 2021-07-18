@extends('layouts.app')

@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: {{ url('assets11/app/media/img//bg/bg-3.jpg')}};">

        <div class="m-login__wrapper-2 m-portlet-full-height">
            <div class="m-login__contanier">
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Reset Password</h3>
                    </div>
                    <form class="m-login__form m-form" method="POST" action="{{ route('front.setPasswordPost', [request('id'), request('code')]) }}">
                        @csrf
                        <div class="form-group m-form__group">
                            <input id="password" class="form-control m-input m-login__form-input--last @error('password') is-invalid @enderror" type="Password" name="password" required autocomplete="current-password" placeholder="password" required>
                            {!! $errors->first('password', '<em for="password" class="state-error">:message</em>') !!}
                        </div>

                        <div class="form-group m-form__group">
                            <input id="password_confirmation" class="form-control m-input m-login__form-input--last @error('password_confirmation') is-invalid @enderror" type="Password" name="password_confirmation" autocomplete="current-password" placeholder="password confirmation" required>
                            {!! $errors->first('password_confirmation', '<em for="password_confirmation" class="state-error">:message</em>') !!}
                        </div>
                        
                        <div class="m-login__form-action mb-0">
                            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection