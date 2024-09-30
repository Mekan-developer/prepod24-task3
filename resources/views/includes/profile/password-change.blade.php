<div class="flex justify-start bg-[var(--bg-color)] py-6 mt-6">
    <div class="w-[200px] h-full px-4 font-[400]">
        Пароль
    </div>
    
    <div class="flex flex-col gap-2 justify-start items-start w-[380px] flex-1">

        <div class="flex flex-col gap-4">
            <x-form.input-label name='old_password' type="password" wire:model="old_password" label="Старый пароль*" placeholder="Старый пароль" class="p-[6px] mt-1 border border-gray-400 text-gray-700"/>
            <x-form.input-label name='new_password' type="password" wire:model="new_password" label="Новый пароль*" placeholder="Новый пароль" class="p-[6px] mt-1 border border-gray-400 text-gray-700"/>
            <x-form.input-label name='new_password_confirmation' type="password" wire:model="new_password_confirmation" label="Повторить*" placeholder="Повторить" class="p-[6px] mt-1 border border-gray-400 text-gray-700"/>
        </div>
       
        <x-form.btn-submit wire:click='changePassword' title="Изменить" class="bg-[#4786c8] mt-2"/>
    </div>
    <div class="w-[200px]"></div>
</div>