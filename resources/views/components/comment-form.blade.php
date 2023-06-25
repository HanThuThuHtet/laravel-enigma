@props(['blog'])
<x-card-wrapper class="bg-light">
    <form action="/blogs/{{$blog->slug}}/comments" method="post">
        @csrf
        <div class="mb-3">
            <textarea required name="body" id="" cols="10" rows="5"  placeholder="Write a comment...."
            class="form-control
            @error('body')
                is-invalid
            @enderror
            "></textarea>
            <x-error name='body' />
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit"
                    class="btn btn-dark">
                Submit
            </button>
        </div>
    </form>
</x-card-wrapper>
