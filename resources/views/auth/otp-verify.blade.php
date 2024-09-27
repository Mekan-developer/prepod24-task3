@extends('layouts.auth')

@section('content')
<div class="container px-4 mx-auto">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-md">
                <div class="px-4 py-2 bg-gray-100 border-b">
                    {{-- <h2 class="text-lg font-semibold">{{ __('Login') }}</h2> --}}
                </div>

                <div class="p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="verify" class="block mb-1 font-medium text-gray-700 text-md">Verify OTP</label>
                            <input id="verify" type="number" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" name="otp" required autocomplete="current-verify">

                            @error('otp')
                                <span class="text-sm text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mb-0">
                            <div>
                                <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded-md shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    verify
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
