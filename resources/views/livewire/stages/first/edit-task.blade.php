<div >
    <x-success-message/>
    <x-loading loading="orderUpdate"/>

    <div class="flex gap-4 flex-row h-full w-[920px] mx-auto">
        <div class="flex-1 h-full p-4 bg-white rounded-sm">
            <div class="flex flex-col justify-start bg-[var(--bg-color)] p-6 ">
                <div class="w-full p-2 border-b border-gray-300">
                    <span class="px-4 py-2 border-b-2 border-[#3d82c7] font-[400]">
                        Основное
                    </span>
                </div>

                <div class="flex flex-col gap-6 mt-10">

                    <div>
                        <x-form.input-label name="title" title='{{$task->title}}' value="{{$task->title}}" wire:model='title' label="Напишите тему вашей работы *" class="p-1 border-2 border-gray-300 text-lg" labelBold="font-[400]" placeholder="Напишите тему вашей работы" />
                    </div>

                    <div class="font-[400]">
                        <label for="work_type" class="font-[400]">Выберите тип работы *</label><br/>
                        <select name="work_type" wire:model='work_type' id="work_type" class="w-full h-[36px] border-2 border-gray-300 ">
                            @foreach ($work_types as $item)
                                <option value="{{$item->title}}" class="font-[400]">{{$item->title}}</option>
                            @endforeach
                        </select>
                        @error('work_type')
                            <span class="text-sm text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="font-[400]">
                        <label for="comboBox" class="text-gray-700 font-[400]">Выберите предмет *</label><br/>
                        <select id="comboBox" wire:model='subject' onchange="updateInput(this)" class="w-full h-[36px] border-2 border-gray-300">
                            @foreach ($subjects as $item)
                                <option value="{{$item->title}}" class="font-[400]">{{$item->title}}</option>
                            @endforeach
                            <option value="custom" class="font-[400]">Пользовательский ввод</option>
                        </select>
                        <input type="text" wire:model='subject' id="textInput" placeholder="Or type something..." oninput="updateSelect(this)" style="display:none;" class="block w-full p-1 border-2 border-gray-300 mt-1 rounded-sm shadow-sm bg-[var(--input-bg-color)] focus:outline-none'"/>
                        @error('subject')
                            <span class="text-sm text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="text-gray-700 font-[400]">Пояснения и комментарии к заказу</label>
                        <textarea wire:model='description' id="description" rows="4" class="w-full p-[6px] border-2 border-gray-300 focus:outline-none rounded-md"></textarea>
                        @error('description')
                            <span class="text-sm text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex flex-row w-full gap-4 "> 
                        <div class="w-full">
                            <label for="date">Срок сдачи до *</label>
                            <input type="date" id="date" name="deadline" wire:model='deadline' min="{{$todayFormatted}}" class="block w-full p-2 border-b-2 border-gray-400 rounded-sm shadow-sm bg-[var(--input-bg-color)] text-gray-700 focus:outline-none focus:ring-2">
                            @error('deadline')
                                <span class=" text-red-500  mb-[10px]" role="alert">
                                    <strong class="text-[14px] leading-[14px]">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="w-full">   
                            <x-form.input-label type="number" wire:model='price' name="price" label="Бюджет (в рублях)" placeholder="Бюджет (в рублях)" class="p-[6px] mt-1 border-2 border-gray-400 text-gray-700 focus:outline-none" labelBold="font-800"/>
                        </div>
                    </div>
                    
                    <div>
                        <div class="flex">
                            <label for="file" class="p-2 text-[#ffffffe0] bg-[var(--green)] cursor-pointer active:scale-[0.9] rounded-md hover:bg-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>
                                
                                <span>
                                    {{$fileChooseValidation}}
                                </span>
                            </label>
                            <input id=file type="file" wire:model='taskFile' class="hidden">
                           <div class="w-[40px]" wire:loading wire:target='taskFile'>
                                <div class="bg-[#F5F5F5] rounded-full font-bold aspect-square animate-spin-slow">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-2">
                                         <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                               </div>
                            </div>
                            @if($fileChooseValidation == 'Файл выбран')
                                <img src="{{asset('icon/tick.png')}}" alt="tick" class="w-[40px]">
                            @endif
                        </div>
                        @error('taskFile')
                            <span class="text-sm text-red-500 leading-[20px]" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="block mt-1 text-gray-400">Максимальный размер загружаемого файла 31 Мб</span>
                        <span class="block mt-1 text-gray-400">* Обязательные поля формы</span>
                    </div>
                    <x-form.btn-submit title="ОБНОВИТЬ" wire:click='orderUpdate'/>
                </div>
            </div>
        </div>
        @include('includes.create-task.order-stages', ['status' => 'default'])
    </div>


    <script>
        function updateInput(select) {
            let input = document.getElementById("textInput");
            if(select.value === "custom") {
                input.style.display = "block";
                select.style.display = "none";
                Livewire.dispatch('editCustomInput');
            } else {
                input.style.display = "none";
            }
        }

        function updateSelect(input) {
            let select = document.getElementById("comboBox");
            select.value = input.value ? "custom" : ""; // Reset select if input is empty
        }
    </script>
</div>