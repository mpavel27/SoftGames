@extends('layouts.page')
@section('main-container')
<div class="d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="text-center">
            <h3 class="mb-3" style="font-size: 38px;">SOFT<b style="color: var(--main-color);">GAMES</b></h3>
        </div>
        <form action="/login/validate" method="POST" class="col-md-5 login-form m-auto p-5">
            @csrf
            <h4 class="mb-4">{{__('login_title')}}</h4>
            <input type="text" class="custom-input mb-3" name="email" placeholder="{{__("enter_email")}}">
            <input type="password" class="custom-input mb-4" name="password" placeholder="{{__("password")}}">
            <button type="submit" class="btn btn-primary w-100 text-white mb-3">{{__('login')}}</button>
            <div class="row">
                <div class="col-md-6 d-flex justify-content-start align-items-center">
                    <a class="text-second" href="#">{{__('forgot_password')}}</a>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="text-second" href="/register">{{__('dont_have_an_account')}}</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
