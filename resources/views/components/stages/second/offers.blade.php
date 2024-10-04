<div>
    @props([
        'bid' => ''
    ])    
        <div class="relative pt-[40px] bg-white w-full flex flex-col">
            <x-heroicon-o-x-mark class="absolute top-2 right-2 w-[22px] text-gray-500 cursor-pointer" />
            <div class="flex justify-between px-8">
                <div class="flex flex-row gap-4">
                    <div class="w-[80px] h-[80px]">
                        @if (isset($bid->getPerformer->getProfile->image))
                            <div class="bg-center bg-cover w-[80px] h-[80px]" style="background-image: url('{{ asset('storage/userImage/'.$bid->getPerformer->getProfile->image) }}');"></div>
                        @else 
                            <x-heroicon-s-user class="bg-black text-gray-50 w-[80px] aspect-square" />
                        @endif
                    </div>
                    <div class="flex flex-col">
                        <h4>{{$bid->getPerformer->name}}</h4>
                        <span class="text-[12px] text-gray-400 font-[600]">{{$bid->getPerformer->created_at->format('Y-m-d H:i');}}</span>
                        @if($bid->getPerformer->is_online)
                        <div class="flex items-center gap-1">
                            <div class="w-[12px] h-[12px] rounded-full border-2 border-green-400"></div>
                            <span class="text-[12px] text-gray-300">В сети</span>
                        </div>
                            
                        @else 
                            <div class="flex items-center gap-1">
                                <div class="w-[12px] h-[12px] rounded-full border-2 border-red-400"></div>
                                <span class="text-[12px] text-gray-300">Не в сети</span>
                            </div>
                           
                        @endif
                    </div>
                </div>
                <div>
                    <div class="my-1">
                        Сделаю за {{$bid->bid_amount}} руб.
                    </div>
                    <div>
                        <button class="bg-[var(--green)] w-[200px] h-[40px] flex justify-center items-center text-white rounded-md">Выбрать исполнителя</button>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center px-8">
                  <span class="px-12 py-4 font-[700]">{{ $bid->message }}</span>  
            </div>
            <div class="flex flex-col px-8 py-4 bg-gray-200">
                <div class="flex gap-4">
                    <div class="flex gap-4 text-gray-400">
                        <x-heroicon-s-hand-thumb-up class="size-6 text-green-400" /> 
                        Хорошо <span class="font-[600] text-black">109</span>
                    </div>
                    <div class="flex gap-4 text-gray-400">
                        <x-heroicon-s-hand-thumb-down class="size-6 text-red-400 transform scale-x-[-1]" />Плохо  <span class="font-[600] text-black">26</span>
                    </div>
                    <div class="flex gap-4 text-gray-400">
                        <x-heroicon-o-clipboard-document-list class="size-6 text-green-400" />Всего работ <span class="font-[600] text-black"> 381 </span>
                    </div>
                </div>
                <div>
    
                </div>
            </div>
    
        </div>
    
    
</div>