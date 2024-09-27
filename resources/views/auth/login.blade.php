@extends('layouts.auth')
 
@section('content')
<div class="container px-4 mx-auto">
    <div class="flex justify-center">
        <div class="w-full max-w-lg p-6 rounded-sm bg-gray-50">
            <div class="bg-[var(--bg-color)] shadow-md rounded-sm">
                <div class="px-4 py-2 border-b ">
                    <h2 class="text-lg font-semibold">Войти</h2>
                </div>
                <div class="p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <x-form.input-label name="email" type="email" label="E-mail" placeholder="Электронная почта" required/>
                        </div>

                        <div class="mb-4">
                            <x-form.input-label name="password" type="password" label="password" placeholder="Пароль" required/>
                        </div>

                        <div class="flex items-center mb-4">
                            <input class="w-4 mr-2 leading-tight aspect-square" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="text-sm" for="remember">Запомнить меня</label>
                        </div>

                        <div class="flex flex-col gap-2 mb-0 items-right">
                            <div class="flex justify-end">
                                <a href="{{route('register')}}" class="text-blue-400 text-[13px]">
                                    Если еще не зарегистрирован!
                                </a>
                            </div>
                            <div class="flex items-center justify-center w-full">
                                <x-form.btn-submit title="Войти" />
                            </div>

                            @if (Route::has('password.request'))
                            <div class="flex justify-end text-[14px]">
                                
                                <a class="text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                    Забыли пароль?
                                </a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
