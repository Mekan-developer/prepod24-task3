@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Доступные задания</h1>

        @if ($tasks->isEmpty())
            <p class="text-center text-gray-500">Нет доступных заданий на данный момент.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($tasks as $task)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-lg font-semibold text-gray-900">{{ $task->title }}</h2>
                            <p class="text-gray-600">
                                <strong>Тип работы:</strong> {{ $task->work_type }}<br>
                                <strong>Предмет:</strong> {{ $task->subject }}<br>
                                <strong>Бюджет:</strong> {{ number_format($task->price, 2, ',', ' ') }} руб.<br>
                                <strong>Дедлайн:</strong> {{ \Carbon\Carbon::parse($task->deadline)->format('d.m.Y') }}
                            </p>
                            <div class="mt-4">
                                <a href="#" 
                                   class="inline-block bg-blue-500 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-600">
                                    Просмотреть задание
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
