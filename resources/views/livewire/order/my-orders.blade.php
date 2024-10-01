<div>
    <div class="container mx-auto">
        <h1 class="text-[22px] p-1 mb-4">Все заказы</h1>
            
        <div class="flex flex-col gap-6">
            @foreach ($user_tasks as $key => $order)
            <div class="flex flex-col border">
                <div class="flex flex-col w-full bg-white p-[10px] " >
                    <h1 class="text-[#4786C8]">wyoristka</h1>  
                    <p class="font-[400] ">Курсовая работа, Медицина</p>
                </div>
                <div class=" flex flex-row gap-10 bg-[#e2e2e2] w-full p-[10px]">
                    <div class="flex flex-row">
                        #151535
                    </div>

                    <div class="flex flex-row gap-4 border-l-2 border-[#F5F5F5] pl-2">
                        <span>
                            <x-heroicon-o-clipboard-document-list class="w-6"/>
                        </span>
                        sad
                    </div>

                    <div class="flex flex-row gap-4 border-l-2 border-[#F5F5F5] pl-2">
                        <span>
                            <x-heroicon-o-clock class="w-6 bg-[var(--green)] rounded-full text-white"/>
                        </span>
                        sad
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
