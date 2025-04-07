@props(['value'=>''])

<input {{ $attributes->class([
    'form-control',
])->merge([
    'type' => 'text',
    'value' => (old($attributes->get('name')) ?: $value),
]) }}/>

{{--Сообщение об ошибке при заполнении--}}
@error($attributes->get('name'))
<div class="small text-danger pt-1  ">
    {{ $message }}
</div>
@enderror
