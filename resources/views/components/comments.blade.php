@props(['comments'])
<section class="container">
    <div class="col-md-6 mx-auto">
        <h5 class="my-3 text-secondary">
            Comments ({{$comments->count()}})
        </h5>
        @foreach ($comments as $comment)
            <x-single-comment :comment='$comment' />
        @endforeach
        {{$comments->links()}}
    </div>
</section>
