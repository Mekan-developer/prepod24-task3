@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Доступные задания</h1>

        @if ($tasks->isEmpty())
            <p class="text-center text-gray-500">Нет доступных заданий на данный момент.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($tasks as $task)
                    <div class="flex flex-col justify-between bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-900">{{ $task->title }}</h2>
                            <p class="text-gray-600 mt-2">
                                <strong>Тип работы:</strong> {{ $task->work_type }}<br>
                                <strong>Предмет:</strong> {{ $task->subject }}<br>
                                <strong>Бюджет:</strong> {{ number_format($task->price, 2, ',', ' ') }} руб.<br>
                                <strong>Дедлайн:</strong> {{ \Carbon\Carbon::parse($task->deadline)->format('d.m.Y') }}
                            </p>
                        </div>
                        <div class="p-6">
                            <a href="{{ route('task.show', $task->id) }}" wire:navigate class="inline-block px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-300">
                                Подробнее
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
