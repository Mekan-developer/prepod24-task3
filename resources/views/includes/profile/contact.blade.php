<div class="flex justify-start bg-[var(--bg-color)] py-6 mt-6">
    <div class="w-[200px] h-full px-4 font-[400]">
        Контакты
    </div>
    
    <div class="flex flex-col gap-2 justify-start items-start w-[380px]">

        <div class="flex flex-col w-full">
            
            <x-form.input-label type="email" name="name" label="Электронная почта*" placeholder="Email" value="{{$maskedEmail}}" class="p-[6px] mt-1 border border-gray-400 text-gray-700" labelBold="font-800"/>
        </div>

        <div class="w-full">
            <x-form.input-label type="tel" name="phone_number" label="Телефон*" placeholder="Введите свой номер телефона" class="p-[6px] mt-1 border border-gray-400 text-gray-700 w-full"/>
        </div>
       
        <x-form.btn-submit title="Сохранить" class="bg-[#4786c8] mt-2"/>
    </div>
</div>