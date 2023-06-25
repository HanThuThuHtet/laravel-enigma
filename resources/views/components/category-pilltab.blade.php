@props(['categories','currentCategory'])
<div class=" flex flex-wrap gap-5 justify-center pb-4">
    <a href="/" class="btn  {{isset($currentCategory) ?"btn-outline-dark": "btn-dark"}} rounded-pill px-3">
        All
    </a>
    @foreach ($categories as $category)
        <a href="/?category={{$category->slug}}{{request('search') ? '&search='.request('search') : ""}}{{request('username') ? '&username='.request('username') : ""}}"
            class="btn {{isset($currentCategory)&& ($currentCategory->name == $category->name ) ? "btn-dark": "btn-outline-dark"}} text-capitalize rounded-pill px-3">
            {{$category->name}}
        </a>
    @endforeach
</div>
