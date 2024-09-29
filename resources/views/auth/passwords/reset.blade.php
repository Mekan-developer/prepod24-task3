@extends('layouts.auth')

@section('content')
<div class="container px-4 mx-auto">
    <div class="flex justify-center">
        <div class="w-full max-w-lg p-6 rounded-sm bg-gray-50">
            <div class="bg-[var(--bg-color)] rounded-sm shadow-md overflow-hidden">
                <div class="px-4 py-2 bg-gray-100 border-b">
                    <h2 class="text-lg font-semibold">{{ __('Reset Password') }}</h2>
                </div>

                <div class="p-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-4">
                            <label for="email" class="block mb-1 font-medium text-[var(--text-color)] text-md">Электронная почта</label>
                            <input id="email" type="email" class="block w-full p-2 mt-1 border-b-2 border-gray-400 rounded-sm shadow-sm bg-[var(--input-bg-color)] focus:outline-none" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="text-sm text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <x-form.input-label type="password" name="password" label="Пароль" placeholder="Придумайте  пароль" required/>
                        </div>

                        <div class="mb-4">
                            <x-form.input-label type="password" name="password_confirmation" label="Повтор пароля" placeholder="Повторите пароль" required/>
                        </div>

                        <div class="flex items-center justify-between w-full mb-0">
                            <x-form.btn-submit title="Сбросить пароль" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
