<div>
    <div class="container mx-auto">
        @if($new_bids->count() !=0 )
            @foreach ($new_bids as $new_bid)
                <div class="bg-white rounded-md shadow-md my-4">
                    <x-order.notification :new_bid="$new_bid" :new_bids_count="$new_bids->count()" />
                </div>
            @endforeach
        @endif

        <div>
            <h1 class="text-[22px] p-1 mb-4">Все заказы</h1> 
            <div class="flex flex-col gap-6">
                @foreach ($user_tasks as $key => $order)
                    <x-order.order :order="$order" wire:key="{{$order->id}}" />
                @endforeach
            </div>
        </div>

    </div>
</div>
