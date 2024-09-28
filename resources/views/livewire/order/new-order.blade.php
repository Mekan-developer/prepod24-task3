<div class="h-full">
    <div class="w-[920px] mx-auto bg-white h-full p-4">
        <div class="flex flex-col justify-start bg-[var(--bg-color)] p-6 mt-6">
            <div class="border-b border-gray-300 p-2 w-full">
                <span class="px-4 py-2 border-b-2 border-[#3d82c7] font-[400]">
                    Основное
                </span>

                <span class="px-4 py-2 text-gray-400 font-[400]">
                    Технические характеристики
                </span>
            </div>

            <div class="flex flex-col gap-6 mt-10">

                <div>
                    <x-form.input-label name="topic_name" label="Напишите тему вашей работы *" class="p-1 border-2 border-gray-300" labelBold="font-[400]" placeholder="Напишите тему вашей работы" />
                </div>

                <div class="font-[400]">
                    <label for="work_type" class="font-[400]">Выберите тип работы *</label><br/>
                  <select name="work_type" id="work_type" class="w-full h-[36px] border-2 border-gray-300">
                    <option value="0" default>Укажите тип работы</option>
                    <option value="">ASA</option>
                    <option value="">ASA</option>
                    <option value="">ASA</option>
                    <option value="">ASA</option>
                  </select>
                </div>

                <div>
                    <label for="">Выберите предмет *</label><br/>
                    <select id="comboBox" onchange="updateInput(this)" class="w-full h-[36px] border-2 border-gray-300">
                        <option value="">Select an option...</option>
                        <option value="Option 1">Option 1</option>
                        <option value="Option 2">Option 2</option>
                        <option value="Option 3">Option 3</option>
                        <option value="custom">Custom Input</option>
                    </select>
                    
                    <input type="text" id="textInput" placeholder="Or type something..." oninput="updateSelect(this)" style="display:none;" class="block w-full p-1 border-2 border-gray-300 mt-1 rounded-sm shadow-sm bg-[var(--input-bg-color)] focus:outline-none'"/>
                </div>
            </div>
            

        </div>
    </div>
</div>

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
