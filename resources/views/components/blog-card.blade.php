@props(['blog'])
<a href="/blogs/{{$blog->slug}}">

    <div class="card border-0">
        <img
          src='{{asset("storage/$blog->thumbnail")}}'
          class="card-img-top object-fit-cover"
          height="200px"
          alt="..."
        />

        <div class="card-body px-0 text-start">
            <div class="tags mb-3 mt-2">
                <a href="/?category={{$blog->category->slug}}"><span class="badge bg-dark text-capitalize">{{$blog->category->name}}</span></a>
              </div>
          <h3 class="card-title">{{$blog->title}}</h3>
          <p class="fs-6 text-dark pt-2">
            <a href="/?username={{$blog->author->username}}" class="text-decoration-none text-dark fw-bold text-capitalize">{{$blog->author->name}}</a>
            <span> - {{$blog->created_at->diffForHumans()}}</span>
          </p>

          <p class="card-text">
            {{$blog->intro}}
          </p>
          {{-- <a href="/blogs/{{$blog->slug}}" class="text-dark">Read More</a> --}}

        </div>
    </div>

</a>
