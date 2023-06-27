@props(['name'])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <textarea
        name="{{$name}}"
        id="{{$name}}"
        cols="30"
        rows="50"
        class="form-control editor">
            {{old($name)}}
        </textarea>
</x-form.input-wrapper>
