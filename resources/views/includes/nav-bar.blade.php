@php
    use App\Models\Bid;
    $new_bids_count = Bid::where('showed_client', 0)->whereHas('getTask', function ($query) { $query->where('client_id', auth()->user()->id); })->count();

    use App\Models\Message;
    $message_count = Message::where('showed_receiver', 0)->where('receiver_id', auth()->user()->id)->count();
    $new_message_count =  $message_count + $new_bids_count;
@endphp

<nav class="relative bg-white shadow" >
    <div class="w-[1200px] px-4 mx-auto">
        <div class="flex items-center justify-between py-4">
            <a class="text-lg font-bold" href="{{ url('/') }}" wire:navigate>
                LOGO
            </a>
            
            <div class="flex items-center w-full">
                <ul class="flex justify-center flex-1 space-x-16 mr-16 text-[#777] text-[14px] font-semibold">
                    <li class="hover:text-black {{Request::routeIs('order.index') ? 'text-black' : ''}}">
                        <a href="{{route('order.index')}}" wire:navigate>Мои заказы</a>
                    </li>
                    <li class="hover:text-black">
                        <a href="" >Авторы</a>
                    </li>
                    <li class="hover:text-black">
                        <a href="" >Готовые работы</a>
                    </li>
                    <li class="hover:text-black">
                        <a href="{{route('tasks.showTasks')}}" wire:navigate>
                        Все задания</a>
                    </li>
                </ul>
                <ul class="flex items-center ml-auto space-x-10">
                    <li class="flex items-center justify-center">
                        <a href="{{route('order.create')}}" wire:navigate class="border-2 border-[#a1c67a] duration-[600ms] delay-50 hover:bg-[#a1c67a] p-2 rounded-[4px] text-[#555] hover:text-white font-semibold">
                                Создать задание
                        </a>
                    </li>
                    <li class="relative mr-4 cursor-pointer group">
                        <x-heroicon-o-envelope class="w-[35px]" />

                        @if(isset($new_message_count) && $new_message_count !=0 )
                            <div class="absolute -top-[4px] -right-1 text-white bg-red-600 border-2 border-white rounded-full text-[12px] w-[22px] text-center aspect-square">{{ $new_message_count }} </div>
                        @endif

                        <div class="hidden absolute top-[calc(100%+26px)] right-[calc(100%-45px)] group-hover:block ">
                            <span class="px-4 py-3 border border-blue-300 rounded-sm text-nowrap">
                                У вас нет новых уведомлений
                            </span>
                        </div>
                    </li>
                    <li class="relative mr-4 cursor-pointer group">
                        <x-heroicon-o-bell-snooze class="w-[35px]" />
                        @if(isset($new_bids_count) && $new_bids_count !=0 )
                            <div class="absolute -top-[4px] -right-1 text-white bg-red-600 border-2 border-white rounded-full text-[12px] w-[22px] text-center aspect-square">{{ $new_bids_count }} </div>
                        @endif
                        <div class="hidden absolute top-full right-[calc(100%-45px)] group-hover:block ">
                           <div class="flex flex-col gap-1 w-[300px] px-4 py-3 border border-gray-300 rounded-sm text-nowrap bg-white text-[14px]">
                                @if(isset($new_bids_count) && $new_bids_count !=0 )
                                    <div class="border-b border-gray-200 px-1 py-2">Новые уведомления:</div>
                                    <div class="flex justify-center items-center border-b border-gray-200 py-2 hover:bg-gray-100">
                                        <p>
                                            Добавлена ставка в вашем заказе
                                        </p>
                                        
                                    </div>
                                    <div class="flex justify-center items-center hover:underline text-blue-300">
                                        <a href="#">
                                            Очистить уведомления
                                        </a>
                                    </div>
                                @else
                                    <span class="flex justify-center items-center">
                                        У вас нет новых уведомлений
                                    </span>
                                @endif
                           </div>
                        </div>
                    </li>

                    <li class="relative group ">
                        <div class="py-[10px]">
                            <a  class="text-gray-700 cursor-pointer hover:text-blue-500">
                                <span  class="flex gap-1">
                                    <div class=" w-[32px] aspect-square">
                                        @if(isset($userImage))
                                            <div class="bg-center bg-cover w-[32px] h-[32px]" style="background-image: url('{{ asset('storage/userImage/'.$userImage) }}');"></div>
                                        @else
                                            <x-heroicon-s-user class="bg-black text-gray-50 w-[32px] aspect-square" />
                                        @endif
                                    </div>
                                     <x-heroicon-o-chevron-right class="rotate-90  w-[24px]" />
                                </span>
                            </a>
                        </div>
                       
                    
                        <div class="absolute -right-[4px] z-10 hidden w-[150px] bg-white border border-gray-400 rounded shadow-lg top-[calc(100%)]  group-hover:block" >
                            <div class="relative py-2 text-center border-b-2">
                                <div class="absolute -top-[7px] right-4 rotate-45 w-[12px] aspect-square border-t border-l border-gray-400  bg-white" ></div>
                                <span>{{ Auth::user()->name }}</span>
                            </div>
                            
                            <a class="block px-4 py-2 text-sm text-gray-700 no-underline cursor-pointer hover:bg-gray-50">
                                <span>
                                    Баланс
                                </span>
                            </a>
                            <a href="{{route('profile')}}" wire:navigate class="block px-4 py-2 text-sm text-gray-700 no-underline cursor-pointer hover:bg-gray-50">
                                <span>
                                    Настройки
                                </span>
                            </a>

                            <a  class="block px-4 py-2 text-sm text-gray-700 no-underline cursor-pointer hover:bg-gray-50" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Выход
                            </a>
                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>