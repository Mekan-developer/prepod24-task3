<div>
    @props([
        'order' => 'order'
    ])

    <div class="flex flex-col border rounded-md shadow-md overflow-hidden">
        <div class="flex flex-col w-full bg-white p-[10px]">
            <h1 class="text-[#4786C8]">
                <a href="{{ route('order.looking',['task' => $order->id]) }}" wire:navigate>
                    {{$order->title}}
                </a></h1>  
            <p class="font-[400] ">{{ $order->work_type }}, {{ $order->subject }}</p>
        </div>
        <div class=" flex flex-row gap-10 bg-[#e2e2e2] w-full p-[10px] text-[16px] font-[400]">
            <div class="flex flex-row">
                #{{$order->id}}
            </div>

            <div class="flex flex-row gap-4 border-l-2 border-[#F5F5F5] pl-2">
                <span>
                    <x-heroicon-o-clipboard-document-list class="w-6"/>
                </span>
                @if($order->status == 'Looking for performer')
                    <p> Поиск автора</p>
                @endif
            </div>

            <div class="flex flex-row gap-4 border-l-2 border-[#F5F5F5] pl-2">
                <span>
                    <x-heroicon-o-clock class="w-6 bg-[var(--green)] rounded-full text-white"/>
                </span>
                <p>Сдать до: {{ $order->deadline }}</p>
            </div>
            
        </div>
    </div>
</div>