@extends('layouts.app')

@section('content')
<div class="container px-4 mx-auto">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-md">
                <div class="px-4 py-2 bg-gray-100 border-b">
                    <h2 class="text-lg font-semibold">{{ __('Dashboard') }}</h2>
                    <x-heroicon-s-user />
                </div>

                <div class="p-4">
                    @if (session('status'))
                        <div class="p-2 mb-4 text-white bg-green-500 rounded" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>
                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
