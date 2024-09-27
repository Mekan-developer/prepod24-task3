@extends('layouts.auth')

@section('content')
<div class="container px-4 mx-auto">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-md">
                <div class="px-4 py-2 bg-gray-100 border-b">
                    <h2 class="text-lg font-semibold">{{ __('Verify Your Email Address') }}</h2>
                </div>

                <div class="p-4">
                    @if (session('resent'))
                        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                            <strong class="font-bold">{{ __('Success!') }}</strong>
                            <span class="block sm:inline">{{ __('A fresh verification link has been sent to your email address.') }}</span>
                        </div>
                    @endif

                    <p class="mb-4">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p class="mb-4">{{ __('If you did not receive the email') }},</p>
                    <form class="inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="p-0 m-0 text-blue-600 align-baseline hover:underline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
