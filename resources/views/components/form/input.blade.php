@props(['name','type' => 'text'])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <input required
        type="{{$type}}"
        id="{{$name}}"
        name="{{$name}}"
        class="form-control"
        value="{{old($name)}}" >
        <x-error :name="$name" />
</x-form.input-wrapper>
