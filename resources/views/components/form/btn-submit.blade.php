<div class="w-full">
    @props([
        'title' => 'save'
    ])

    <button  {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center active:scale-[0.9] justify-center w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded-sm shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50']) }}>
        {{$title}}
    </button>
</div>