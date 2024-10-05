<div>

    @props([
        'new_bid',
        'new_bids_count'
    ])


    <div class="p-4 flex justify-between">
        <span class="text-[18px]">
            <h4 class="text-[#808080]">Уведомления <p class="font-[500] inline text-black">(новых {{$new_bids_count}})</p></h4>
        </span>

        <span class="text-[#4786C8] text-[16px]">
            <a href="" class="hover:underline">
                Удалить все
            </a>
        </span>
        
    </div>
    <div class="p-4 flex justify-between border-t-2 border-gray-200 duration-1000 delay-100 hover:bg-gray-200 group text-[16px]">
        <div class="flex items-center justify-center gap-4 ">
            <span><img src="{{asset('icon/tick.png')}}" alt="tick" class="w-[40px]"></span>
            <p class="flex justify-center items-center">Добавлена ставка в вашем заказе.</p>
        </div>
        <div class="flex items-center justify-center gap-4">
            <a href="{{ route('order.looking',['task' => $new_bid->task_id]) }}">
                <button class="w-[90px] h-[36px] uppercase flex text-[14px] items-center justify-center  text-nowrap font-[500] rounded-md  bg-[#a1c67ade] hover:bg-[#A1C67A] text-white ">В заказ</button>
            </a>
            <x-heroicon-c-x-circle class="w-[24px] h-[24px] rounded-full text-red-300 duration-1000 delay-50 group-hover:text-red-400 cursor-pointer"/>
        </div>
    </div>
</div>