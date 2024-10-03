<div class="flex-1 flex flex-col gap-6  p-4 bg-white rounded-md shadow-md">
    <div class="border-b border-gray-300 py-4">Добавьте описание к заказу, так авторы быстрее смогут его оценить</div>
    <div class="flex py-2">
        
        <div class="flex-1 flex flex-col gap-8 border-r-2 border-gray-300">
            <div class="flex">
                <span class="w-[120px] flex gap-2">
                    <x-heroicon-o-currency-dollar class="w-[20px]" />
                    Бюджет
                </span>
                <span class="flex-1">
                    @if($task->price)
                        <p>{{$task->price}} руб.</p>
                    @else 
                        <p>еще нет</p>
                    @endif
                    
                </span>
            </div>
            <div class="flex">
                <span class="w-[120px] flex items-center gap-2">
                    <x-heroicon-o-clock class="w-[20px]" />
                    Срок сдачи
                </span>
                <span class="flex-1">
                    <p>{{ $task->deadline }}</p>
                </span>
            </div>
            <div class="flex">
                        {{--  --}}
            </div>
        </div>
        <div class="flex-1 flex flex-col gap-8 px-4">
            <div class="flex">
                <span class="w-[120px] flex gap-2">
                    <x-heroicon-o-document-text class="w-[20px]" />
                    Тип работы:
                </span>
                <span class="flex-1">
                    <p>{{ $task->work_type }}</p>
                </span>
            </div>
            <div class="flex">
                <span class="w-[120px] flex gap-2">
                    <x-heroicon-o-book-open class="w-[20px]" />
                    Предмет:
                </span>
                <span class="flex-1">
                    <p>{{ $task->subject }}</p>
                </span>
            </div>
            <div class="flex">
                <span class="w-[120px] flex gap-2 text-nowrap">
                    <x-heroicon-o-identification />
                    Номер заказа:
                </span>
                <span class="flex-1 px-1">
                    <p>№ {{ $task->id }}</p>
                </span>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-300 py-6">
        <p>Файлы Заказчика</p><br/>
        <div class="flex">
            <label for="file" class="p-2 text-[#ffffffe0] bg-[var(--green)] cursor-pointer active:p-[6px] rounded-sm hover:bg-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>
                <span>
                    {{$fileChooseValidation}}
                </span>
            </label>
            <input id=file type="file" class="hidden" wire:model='sendFile'>
            <div wire:loading wire:target='sendFile' class="w-[40px]">
                <div class="rounded-full font-bold aspect-square animate-spin-slow text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-2">
                         <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
               </div>
            </div>
            @if($fileChooseValidation == 'Файл прикреплен')
                <img src="{{asset('icon/tick.png')}}" alt="tick" class="w-[40px]">
            @endif
        </div>
    </div>
</div>