<div>
    <nav class="bg-white shadow">
        <div class="container px-4 mx-auto">
            <div class="flex items-center justify-between py-4">
                <a class="text-lg font-bold" href="{{ url('/') }}">
                    LOGO
                </a>
                <div class="flex items-center w-full">
                    <ul class="flex justify-center flex-1 space-x-16 mr-16 text-[#777] text-[14px] font-semibold">
                        <li class="hover:text-black">
                            <a href="">Мои заказы</a>
                        </li>
                        <li class="hover:text-black">
                            <a href="">Авторы</a>
                        </li>
                        <li class="hover:text-black">
                            <a href="">Готовые работы</a>
                        </li>
                    </ul>
                    <ul class="flex items-center ml-auto space-x-10">
                        <li class="flex justify-center items-center">
                            <a href="{{route('create.order')}}" class="border-2 border-[#a1c67a] hover:bg-[#a1c67a] p-2 rounded-[4px] text-[#555] hover:text-white font-semibold">
                                    Создать задание
                            </a>
                        </li>
                        <li class="relative mr-4 cursor-pointer group">
                            <x-heroicon-o-bell-snooze class="w-[35px]" />
                            <div class="absolute -top-[2px] -right-[2px] text-white bg-red-600 rounded-full text-[12px] w-[18px] text-center aspect-square"> 1</div>

                            <div class="hidden absolute top-[calc(100%+26px)] right-[calc(100%-45px)] group-hover:block ">
                                <span class="px-4 py-3 rounded-sm border border-blue-300 text-nowrap">
                                    У вас нет новых уведомлений
                                </span>
                            </div>
                        </li>

                        <li class="relative group">
                            <a  class="cursor-pointer py-4text-gray-700 hover:text-blue-500">
                                <span  class="flex gap-1 w-[100px]">
                                    <x-heroicon-s-user class="bg-black text-gray-50 w-[32px] aspect-square" /> <x-heroicon-o-chevron-right class="rotate-90  w-[24px]" />
                                </span>
                            </a>
                        
                            <div class="absolute right-8 z-10 hidden w-[150px] bg-white border border-gray-400 rounded shadow-lg top-[calc(100%+4px)] group-hover:block" >
                                <div class="relative py-2 text-center border-b-2">
                                    <div class="absolute -top-[7px] right-4 rotate-45 w-[12px] aspect-square border-t border-l border-gray-400  bg-white" ></div>
                                    <span>{{ Auth::user()->name }}</span>
                                </div>
                                
                                <a class="block px-4 py-2 text-sm text-gray-700 no-underline cursor-pointer hover:bg-gray-50">
                                    <span>
                                        Баланс
                                    </span>
                                </a>
                                <a href="{{route('profile')}}" class="block px-4 py-2 text-sm text-gray-700 no-underline cursor-pointer hover:bg-gray-50">
                                    <span>
                                        Настройки
                                    </span>
                                </a>

                                <a class="block px-4 py-2 text-sm text-gray-700 no-underline cursor-pointer hover:bg-gray-50" href="{{ route('logout') }}"
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

</div>
