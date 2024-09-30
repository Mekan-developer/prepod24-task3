<div>
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
                        <x-form.input-label name="work_topic" wire:model='work_topic' label="Напишите тему вашей работы *" class="p-1 border-2 border-gray-300" labelBold="font-[400]" placeholder="Напишите тему вашей работы" />
                    </div>

                    <div class="font-[400]">
                        <label for="work_type" class="font-[400]">Выберите тип работы *</label><br/>
                        <select name="work_type" wire:model='work_type' id="work_type" class="w-full h-[36px] border-2 border-gray-300 ">
                            <option value="0" default >Укажите тип работы</option>
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
                            <option value="">Select an option...</option>
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
                        <label for="explanation" class="text-gray-700 font-[400]">Пояснения и комментарии к заказу</label>
                        <textarea name="explanation" wire:model='explanation' id="explanation" rows="4" class="w-full p-[6px] border-2 border-gray-300 focus:outline-none rounded-md"></textarea>
                        @error('explanation')
                            <span class="text-sm text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex flex-row w-full gap-4 "> 
                        <div class="w-full">
                            <label for="date">Срок сдачи до *</label>
                            <input type="date" id="date" name="due_date" wire:model='due_date' min="{{$todayFormatted}}" class="block w-full p-2 border-b-2 border-gray-400 rounded-sm shadow-sm bg-[var(--input-bg-color)] text-gray-700 focus:outline-none focus:ring-2">
                            @error('due_date')
                                <span class="text-sm text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="w-full">   
                            <x-form.input-label type="number" wire:model='budget' name="order_price" label="Бюджет (в рублях)" placeholder="Бюджет (в рублях)" class="p-[6px] mt-1 border-2 border-gray-400 text-gray-700 focus:outline-none" labelBold="font-800"/>
                        </div>
                        
                    </div>
                    
                    <div>
                        <label for="file" class="p-2 text-[#ffffffe0] bg-gray-400 cursor-pointer active:p-[6px] rounded-md hover:bg-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                            
                            <span>
                                Файл не выбран
                            </span>
                        </label>
                        <input id=file type="file" class="hidden" wire:model='file'>
                        @error('file')
                            <span class="text-sm text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="block mt-1 text-gray-400">Максимальный размер загружаемого файла 31 Мб</span>
                        <span class="block mt-1 text-gray-400">* Обязательные поля формы</span>
                    </div>
                    <x-form.btn-submit title="ДАЛЕЕ" class="bg-[var(--green-color)]" wire:click='orderSave'/>
                </div>
            </div>
        </div>
        @include('includes.create-task.order-stages')
    </div>
    <x-loading loading="orderSave"/>

    <script>
        function updateInput(select) {
            let input = document.getElementById("textInput");
            if(select.value === "custom") {
                input.style.display = "block";
                select.style.display = "none";
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