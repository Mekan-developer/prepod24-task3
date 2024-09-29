@extends('layouts.auth')

@section('content')
<div class="container px-4 mx-auto">
    <div class="flex justify-center">
        <div class="w-full max-w-lg p-6 rounded-sm bg-gray-50">
            <div class="bg-[var(--bg-color)] rounded-sm shadow-md">
                <div class="px-4 py-2 bg-gray-100 border-b">
                    <h2 class="text-lg font-semibold">Восстановление пароля</h2>
                </div>

                <div class="p-4">
                    @if (session('status'))
                        <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <x-form.input-label name="email" type="email" label="Электронная почта" placeholder="Введите e-mail" required/>
                        </div>
                        <div class="flex items-center justify-between mb-0">
                            <x-form.btn-submit title="Востановит пароль"/>
                        </div>
                       
                        <div class="flex justify-end mt-2">
                            <a class="text-blue-400 hover:underline text-[14px]" href="{{ route('login') }}">
                                вернуться на страницу входа!
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
