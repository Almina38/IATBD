@extends('layouts.main')

@section('content')
    <section class="flex-center h-100">
        <form action="{{ route('admin.login.submit') }}" method="POST" class="card card--login">
            @csrf
            <article class="card__header mb-05">
                <h1>{{ __('Admin Login') }}</h1>
            </article>
            @if (session('error'))
                <article class="mb-05 status--error">
                    {{ session('error') }}
                </article>
            @endif
            <article class="mb-03 w-100">
                <label for="email" class="d-block">{{ __('E-Mail Address') }}</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="d-block @error('email') input--error @enderror" placeholder="{{ __('Email') }}" />
                @error('email')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </article>
            <article class="mb-05 w-100">
                <label for="password" class="d-block">{{ __('Password') }}</label>
                <input type="password" id="password" name="password" class="d-block @error('password') input--error @enderror" placeholder="{{ __('Password') }}" />
                @error('password')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </article>
            <article>
                <button type="submit" class="btn-primary w-100">{{ __('Login') }}</button>
                <div>
                    {{ __('Just a user?') }}
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
            </article>
        </form>
    </section>
@endsection
