@extends('layouts.auth')

@section('content')
<div class="container px-4 mx-auto text-[var(--text-color)] ">
    <div class="flex justify-center"> 
        <div class="w-full max-w-lg p-6 rounded-sm bg-gray-50">
            <div class="bg-[var(--bg-color)] rounded-sm shadow-md overflow-hidden ">
                <div class="px-4 py-2 bg-gray-100 border-b">
                    <h2 class="text-lg font-semibold">РЕГИСТРАЦИЯ</h2>
                </div>
                <div class="p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <x-form.input-label name="name" type="text" label="Имя" placeholder="Введите имя" required/>
                        </div>

                        <div class="mb-4">
                            <x-form.input-label name="email" type="email" label="Электронная почта" placeholder="Введите адрес почты" required/>
                        </div>

                        <div class="mb-4">
                            <x-form.input-label name="password" type="password" label="Пароль" placeholder="Придумайте  пароль" required/>
                        </div>

                        <div class="mb-4">
                            <x-form.input-label name="password_confirmation" type="password" label="Повтор пароля" placeholder="Повторите пароль" required/>
                        </div>

                        <div class="flex items-center justify-center w-full mt-6">                                    
                            <x-form.btn-submit title="ЗАРЕГИСТРИРОВАТЬСЯ" />
                        </div>

                        <div class="flex justify-end text-[14px]">
                                
                            <a class="text-blue-600 hover:underline" href="{{ route('login') }}">на страницу входа.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
