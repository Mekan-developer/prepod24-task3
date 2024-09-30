<div class="flex justify-start bg-[var(--bg-color)] py-6 mt-6">
    <div class="w-[200px] h-full px-4 font-[400]">
        Контакты
    </div>
    
    <div class="flex flex-col gap-2 justify-start items-start flex-1">

        <div class="flex flex-col w-full">            
            <x-form.input-label name="email" type="email" wire:model="email" label="Электронная почта*" placeholder="Email" class="p-[6px] mt-1 border border-gray-400 text-gray-700" labelBold="font-800"/>
        </div>

        <div class="w-full">
            <x-form.input-label name='phone_number' type="tel" wire:model="phone_number" label="Телефон*" placeholder="Введите свой номер телефона" class="p-[6px] mt-1 border border-gray-400 text-gray-700 w-full"/>
        </div>
       
        <x-form.btn-submit wire:click='contact' title="Сохранить" class="bg-[#4786c8] mt-2"/>
    </div>
    <div class="w-[200px]"></div>
</div>