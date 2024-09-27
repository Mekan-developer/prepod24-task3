<div>
    @props([
        'name' => 'name',
        'type' => 'text',
        'label' => 'label',
        'placeholder' => 'placeholder',
        'required' => false
    ])

    <label for="{{$name}}" class="block mb-1 font-medium text-[var(--text-color)] text-md">{{$label}}</label>
    <input id="{{$name}}" placeholder="{{$placeholder}}" type="{{$type}}" class="block w-full p-2 mt-1 border-b-2 border-gray-400 rounded-sm shadow-sm bg-[var(--input-bg-color)] focus:outline-none" name="{{$name}}" value="{{ old($name) }}" @if($required) required @endif>

    @error($name)
        <span class="text-sm text-red-500" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>