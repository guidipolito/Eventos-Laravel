@extends('layouts.main')

@section('title', 'Login')

@section('main_title', 'Entrar')

@section('page', 'auth')

@section('content')

        <x-jet-validation-errors />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
                <x-jet-input id="password" class="" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Entrar') }}
                </x-jet-button>
                @if (Route::has('password.request'))
                    <a class="forgoten_pass" href="{{ route('password.request') }}">
                        {{ __('Esqueci a senha') }}
                    </a>
                @endif

            </div>
        </form>
@endsection
