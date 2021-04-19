@extends('layouts.app')

@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: {{ url('assets11/app/media/img//bg/bg-3.jpg')}};">

        <div class="m-login__wrapper-2 m-portlet-full-height">
            <div class="m-login__contanier">
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Forgot Password</h3>
                    </div>
                    <form class="m-login__form m-form" method="POST" action="{{ route('front.forgotPasswordPost') }}">
                        @csrf
                        <div class="form-group m-form__group">
                            <input id="email" class="form-control m-input m-login__form-input--last @error('email') is-invalid @enderror" type="email" name="email" required autocomplete="current-email" placeholder="email" required>
                            {!! $errors->first('email', '<em for="email" class="state-error">:message</em>') !!}
                        </div>
                        
                        <div class="m-login__form-action mb-0">
                            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Forgot Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection