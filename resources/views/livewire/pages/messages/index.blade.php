<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Чат для задания: {{ $task->title }}</h1>

    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <div class="space-y-4">
            <div class="flex {{ $bid->performer_id == auth()->user()->id ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-lg w-full {{ $bid->performer_id == auth()->user()->id ? 'bg-blue-100' : 'bg-gray-100' }} p-4 rounded-lg shadow-md">
                    <strong class="block text-gray-700">{{ $bid->getPerformer->name }}:</strong>
                    <p class="text-gray-800 mt-1">{{ $bid->message }}</p>
                    <small class="text-gray-500 mt-2 block text-right">{{ $bid->created_at->format('d.m.Y H:i') }}</small>
                </div>
            </div>
            @if($messages->isNotEmpty())
                @foreach($messages as $message)
                    <div class="flex {{ $message->sender_id == auth()->user()->id ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-lg w-full {{ $message->sender_id == auth()->user()->id ? 'bg-blue-100' : 'bg-gray-100' }} p-4 rounded-lg shadow-md">
                            <strong class="block text-gray-700">{{ $message->sender->name }}:</strong>
                            <p class="text-gray-800 mt-1">{{ $message->message }}</p>
                            <small class="text-gray-500 mt-2 block text-right">{{ $message->created_at->format('d.m.Y H:i') }}</small>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <hr class="mb-6">

    <div  class="space-y-4">
        @csrf
        <div>
            <textarea wire:model="message" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="Введите сообщение..." required></textarea>
        </div>
        <button wire:click="store({{$task->id}})" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Отправить сообщение</button>
    </div>
</div>