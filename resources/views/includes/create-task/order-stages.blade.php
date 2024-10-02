<div class="w-[220px] mx-auto h-full">
    <div class="flex gap-1 p-4 @if($status == "default") bg-white @endif  rounded-md shadow-sm">
        <span class="@if($status == "default") border-none bg-[var(--green)] text-white @endif flex items-center justify-center border border-gray-500 text-black w-[26px] text-[14px] leading-[26px] text-center aspect-square rounded-full">
            @if(isset($edit))<x-heroicon-o-pencil class=" w-[16px] text-[#2A78C1]"/>@else 1 @endif
        </span>
        <span class="flex-1 pl-4 font-[400]  @if(isset($edit)) text-[#2A78C1] @endif" 
        @if(isset($edit)) wire:click='redirect()' @endif>
        @if(isset($edit))
            <a href="{{ route('order.create',['task' => $task_id]) }}">Редактирование</a> 
        @else 
            <a href="{{ route('order.create') }}">Редактирование</a> 
        @endif
    </span>
    </div>
    <div class="flex gap-1 p-4  @if($status == "looking") bg-white @endif ">
        <span class="@if($status == "looking") border-none bg-[var(--green)] text-white @endif border border-gray-500 w-[26px] text-[14px] leading-[26px]  text-center aspect-square rounded-full text-black">2</span>
        <span class="flex-1 pl-4 font-[400]">Поиск автора</span>
    </div>
    <div class="flex gap-1 p-4 active:bg-white ">
        <span class="@if($status == "test") border-none bg-[var(--green)] text-white @endif border border-gray-500 w-[26px] text-[14px] leading-[26px] text-center aspect-square rounded-[100%] text-black">3</span>
        <span class="flex-1 pl-4 font-[400]">В работе</span>
    </div>

    <div class="flex gap-1 p-4 active:bg-white ">
        <span class="@if($status == "test") border-none bg-[var(--green)] text-white @endif border border-gray-500 w-[26px] text-[14px] leading-[26px] text-center aspect-square rounded-[100%] text-black">4</span>
        <span class="flex-1 pl-4 font-[400]">На гарантии</span>
    </div>

    <div class="flex gap-1 p-4 active:bg-white ">
        <span class="@if($status == "test") border-none bg-[var(--green)] text-white @endif border border-gray-500 w-[26px] text-[14px] leading-[26px] text-center aspect-square rounded-[100%] text-black">5</span>
        <span class="flex-1 pl-4 font-[400]">Завершен</span>
    </div>
</div>