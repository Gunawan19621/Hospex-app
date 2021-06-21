@extends('layouts.app')

@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: {{ url('assets11/app/media/img//bg/bg-3.jpg')}};">

        <h3 class="m-login__title">Reset Password</h3><br>
        <p style="text-align: center;">{{$message}}</p>

        <h4>Download Aplikasi Hospex di:</h4>
    	<a style="text-align:center;" href='https://play.google.com/store/apps/details?id=id.indigital.hospex&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Get it on Google Play' src='https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png'/></a>
    </div>
</div>
@endsection