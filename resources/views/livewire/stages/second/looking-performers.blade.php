<div >
    <x-success-message/>
    <div class="flex gap-4 flex-row w-[920px] mx-auto">
        <div class="w-full">
            <div class="text-[18px] my-[20px] py-1">
                <h1>{{ $task->title }}</h1>
            </div>
            @include('includes.stages.second.about-task')
            <div class="flex flex-col gap-12">
                <p class="text-[24px] my-[20px]">Предложения от исполнителей ({{$bids->count()}})</p>
                @foreach ($bids as $bid)
                    <x-stages.second.offers :bid='$bid' :visibleDivId='$visibleDivId' :messages="$messages" wire:key='$bid->id'/>
                @endforeach
            </div>
        </div>

        <div>
            <p class="text-[22px] my-[20px] text-gray-500 py-1">Статус заказа</p>
            @include('includes.create-task.order-stages', ['status' => 'looking','edit' => true, 'task_id' => $task->id])
        </div>
    </div>

    <x-loading loading="sendFile"/>
</div>