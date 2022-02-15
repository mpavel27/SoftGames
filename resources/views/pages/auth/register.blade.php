@extends('layouts.page')
@section('main-container')
<div class="d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="text-center">
            <h3 class="mb-3" style="font-size: 38px;">SOFT<b style="color: var(--main-color);">GAMES</b></h3>
        </div>
        <form action="/register/validate" method="POST" class="col-md-5 login-form m-auto p-5">
            @csrf
            <h4 class="mb-4">Înregistrare</h4>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="custom-input mb-3" name="first_name" placeholder="Nume">
                </div>
                <div class="col-md-6">
                    <input type="text" class="custom-input mb-3" name="last_name" placeholder="Prenume">
                </div>
            </div>
            <input type="text" class="custom-input mb-3" name="email" placeholder="Introduceți adresa de e-mail">
            <input type="password" class="custom-input mb-3" name="password" placeholder="Parola">
            <input type="password" class="custom-input mb-4" name="repassword" placeholder="Repeta Parola">
            <button type="submit" class="btn btn-primary w-100 text-white">Înregistrează-te</button>
            <div class="text-center mt-4">
                <a class="text-second" href="/login">Am deja cont</a>
            </div>
        </form>
    </div>
</div>
@endsection
