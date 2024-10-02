<div class="flex justify-start bg-[var(--bg-color)] py-6 mt-6">
    <div class="w-[200px] h-full px-4 font-[400]">
        Аватар
    </div>
    <div class="flex items-center justify-start flex-1 gap-10">

        <div class="flex flex-col justify-between">
            @if($userImage)
                <img class="bg-[#242222d3] text-gray-50 w-[150px] " src="{{asset('storage/userImage/'.$userImage)}}" alt="">
            @else
                <x-heroicon-s-user class="bg-[#242222d3] text-gray-50 w-[150px] aspect-square" />
            @endif
            <div>
                <a href="#" class="text-[12px] text-blue-400 hover:underline hover:text-blue-900">Требования к фотографии</a>
            </div>
        </div>
        

        <div class="flex flex-col p-16 bg-white">
            <label for="image" class="flex gap-4 items-center founded-lg px-12 py-1 bg-[var(--green)] text-white cursor-pointer active:scale-[0.9]">
                <x-heroicon-s-arrow-down-tray class="w-[36px] aspect-square"/>
                <span class=" text-nowrap">Загрузить фото</span>
            </label>
            <input id="image" type="file" accept="image/jpg, image/png, image/webp, image/jpeg, image/gif" wire:model='image' class="hidden">
            <div class="h-1">
                @error('image') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
        </div> 
    </div>
</div>