<div class="flex justify-start bg-[var(--bg-color)] py-6 mt-6">
    <div class="w-[200px] h-full px-4 font-[400]">
        Информация
    </div>
    
    <div class="flex flex-col gap-2 justify-start items-start w-[380px]">

        <div class="flex flex-col w-full">
            <div class="flex gap-4">
                <x-form.input-label type="text" name="name" label="Имя" placeholder="Имя" class="p-[6px] mt-1 border border-gray-400 text-gray-700" labelBold="font-800"/>
                <x-form.input-label type="text" name="lname" label="Фамилия" placeholder="Не обязательно" class="p-[6px] mt-1 border border-gray-400 text-gray-700"/>
            </div>
            
            <span class="font-[400]">Если вы укажете имя и фамилию, то сможете выбирать как вас отображать на сайте - по имени</span>
        </div>

        <div class="w-full"> 
            <label for="date_birth">День рождения</label>
            <input type="date" id="date_birth" name="date_of_birth" min="1970-01-01" max="2016-12-31" class="block w-full p-2 border-b-2 border-gray-400 rounded-sm shadow-sm bg-[var(--input-bg-color)] text-gray-700 focus:outline-none focus:ring-2">
        </div>

        <div class="w-full">
            <x-form.input-label type="tel" name="phone_number" label="Телефон*" placeholder="Введите свой номер телефона" class="p-[6px] mt-1 border border-gray-400 text-gray-700 w-full"/>
        </div>
       
        <x-form.btn-submit title="Сохранить" class="bg-[#4786c8] mt-2"/>
    </div>
</div>