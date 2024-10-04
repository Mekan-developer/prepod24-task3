<div>
    @props([
        'name' => 'name',
        'type' => 'text',
        'label' => 'label',
        'placeholder' => 'placeholder',
        'required' => false,
        'labelBold' => "font-medium",
        'title' => null
    ])

    <label for="{{$name}}" class="block mb-1  text-[var(--text-color)] text-md @if($labelBold != 'font-medium') {{$labelBold}} @else 'font-medium' @endif ">{{$label}}</label>
    <input id="{{$name}}" placeholder="{{$placeholder}}" type="{{$type}}" {{ $attributes->merge([ 'class' => 'block w-full  p-2 mt-1 border-b-2 border-gray-400 rounded-sm shadow-sm bg-[var(--input-bg-color)] focus:outline-none', 'value' => old($name) ])}} name="{{$name}}"  @if($required) required @endif >

    @error($name)
        <span class="text-sm text-red-500" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>