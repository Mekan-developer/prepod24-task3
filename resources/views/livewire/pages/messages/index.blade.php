<div class="container mx-auto px-4 pb-2 h-full overflow-auto">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Чат для задания: {{ $task->title }}</h1>
    <div class="bg-white w-full flex flex-col shadow-md rounded-md">
        {{-- chat message div started --}}
        <div class="p-4 flex flex-col justify-between">                
            <div id="messageContainer" class="w-full space-y-4  max-h-[500px] overflow-auto hide-scrollbar">
                {{-- bid message start --}}
                <div class="flex justify-end gap-4">
                    <div class="flex flex-row-reverse justify-start gap-4">
                        <div >
                            @if (isset($bid->getPerformer->getProfile->image))
                                <div class="bg-center bg-cover w-[30px] h-[30px] rounded-full" style="background-image: url('{{ asset('storage/userImage/'.$bid->getPerformer->getProfile->image) }}');"></div>
                            @else 
                                <x-heroicon-s-user class="bg-black text-gray-50 w-[30px] aspect-square rounded-full" />
                            @endif
                        </div>
                    
                        <div class="flex">
                            <div class="relative flex flex-col gap-1 bg-gray-200 border-2 border-gray-400 px-2 py-1 rounded-[4px]">
                                <div class="absolute w-[12px] aspect-square border-t-2 border-l-2 border-gray-400 bg-gray-200 top-[10px] rotate-[135deg] -right-[7px]"></div>
                                <span class="text-xs">{{$bid->created_at->format('Y-m-d H:i')}}</span>
                                <p>{{ $bid->message }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- bid message end --}}
                {{-- message start --}}
                <div wire:poll.6000ms='getMessagess({{ $bid->task_id}})' class="flex flex-col w-full gap-6">
                    @if(isset($messages) && $messages->isNotEmpty())
                        @foreach ($messages as $message)
                            <div class="flex {{ $message->sender_id == auth()->user()->id ? 'justify-end' : 'justify-start' }}">
                                <div class="flex gap-4 {{ $message->sender_id == auth()->user()->id ? 'flex-row-reverse' : '' }}">
                                    <div>
                                        @if (isset(auth()->user()->getProfile->image))
                                            @if($message->sender_id == auth()->user()->id)
                                                <div class="bg-center bg-cover w-[30px] h-[30px] rounded-full" style="background-image: url('{{ asset('storage/userImage/'.auth()->user()->getProfile->image) }}');"></div>
                                            @elseif($bid->getPerformer->getProfile->image)
                                                <div class="bg-center bg-cover w-[30px] h-[30px] rounded-full" style="background-image: url('{{ asset('storage/userImage/'.$bid->getPerformer->getProfile->image) }}');"></div>
                                            @else
                                                <x-heroicon-s-user class="bg-black text-gray-50 w-[30px] aspect-square rounded-full" />
                                            @endif
                                        @else 
                                            <x-heroicon-s-user class="bg-black text-gray-50 w-[30px] aspect-square rounded-full" />
                                        @endif
                                    </div>
                                    <div class="relative flex flex-col gap-1 bg-gray-200 border-2 border-gray-400 px-2 py-1 rounded-[4px]">
                                        <div class="absolute w-[12px] aspect-square border-t-2 border-l-2 border-gray-400 bg-gray-200 
                                            top-[10px] {{ $message->sender_id == auth()->user()->id ? 'rotate-[135deg] -right-[7px]' : '-rotate-45 -left-[7px]' }} "></div>
                                        @if($message->sender_id != auth()->user()->id)
                                            {{-- <div class="absolute w-[12px] aspect-square border-t-2 border-l-2 border-gray-400 bg-gray-200 -rotate-45 top-[10px] -left-[7px]"></div> --}}
                                            <h4 class="flex items-center gap-2">
                                                {{$bid->getPerformer->name}}
                                                @if($bid->getPerformer->is_online)
                                                    <div class="w-[10px] aspect-square rounded-full border-2 border-green-400"></div>
                                                @else 
                                                    <div class="w-[10px] aspect-square rounded-full border-2 border-red-400"></div>
                                                @endif
                                            </h4>
                                        @endif

                                        <span class="text-xs">{{$message->created_at->format('Y-m-d H:i')}}</span>
                                        <p>{{ $message->message }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>                
                {{-- message end --}}
            </div>

            <div class="my-4">
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea wire:model='message' id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 outline-none focus:border-none"
                            placeholder="Write a comment..."  ></textarea>
                    </div>
                    <div class="flex flex-row-reverse items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button wire:click="store({{$task->id}})" class="inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Отправить
                        </button>
                        <div class="flex space-x-1 ps-0 rtl:space-x-reverse sm:ps-2">
                            <button type="button"  class="inline-flex items-center justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 20">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6"/>
                                </svg>
                                <span class="sr-only">Attach file</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('messageSent', function () {
            // Scroll the message container to the bottom when a new message is sent
            let messageContainer = document.getElementById('messageContainer');
            messageContainer.scrollTop = messageContainer.scrollHeight;
        });
    });
</script>

<script>
    document.addEventListener('livewire:load', function () {
        let messageContainer = document.getElementById('messageContainer');
        messageContainer.scrollTop = messageContainer.scrollHeight;

        // Scroll to the bottom when new messages are received
        Livewire.on('messageSent', function () {
            messageContainer.scrollTop = messageContainer.scrollHeight;
        });
    });
</script>
