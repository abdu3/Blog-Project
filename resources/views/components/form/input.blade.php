@props(['name', 'type'=>'text'])
<x-form.lable name={{$name}} />
        <input class="border border-gray-200 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"
        type="{{$type}}"
        {{ $attributes(['value' => old($name)]) }}
        >
    <x-form.error name={{$name}} />

</div>
