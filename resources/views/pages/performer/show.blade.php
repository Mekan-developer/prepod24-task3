@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $task->title }}</h1>
    <p class="text-gray-600 mb-6">{{ $task->description }}</p>

    <h3 class="text-2xl font-semibold text-gray-700 mb-3">Детали задания:</h3>
    <ul class="list-disc list-inside text-gray-600 mb-6">
        <li><strong>Бюджет:</strong> {{ $task->price }} руб.</li>
        <li><strong>Дата создания:</strong> {{ $task->created_at->format('d.m.Y') }}</li>
        <li><strong>Дедлайн:</strong> {{ $task->deadline }}</li>
    </ul>

    <h3 class="text-2xl font-semibold text-gray-700 mb-3">Действия:</h3>

    @auth
        {{-- @if(Auth::user()->role == 'performer') --}}
                <form action="{{ route('bids.store', $task->id) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="message" class="block text-gray-700 font-medium mb-2">Ваше предложение:</label>
                    <textarea name="message" id="message" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required></textarea>
                </div>
                <div>
                    <label for="bid_amount" class="block text-gray-700 font-medium mb-2">Сумма предложения:</label>
                    <input type="number" name="bid_amount" id="bid_amount" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Отправить заявку</button>
            </form>
        {{-- @endif --}}
    @endauth
</div>
@endsection
