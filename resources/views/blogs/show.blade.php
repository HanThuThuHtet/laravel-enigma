<x-layout>
    <div class="container pb-5 ">
        <div class="row">
          <div class="col-md-6 mx-auto text-start">
            <img
              src="/img/courtesyofversace.jpg"
              class="card-img-top"
              alt="..."
            />
            {{-- <h3 class="my-3">{{$blog->title}}</h3>
            <div><a href="/?category={{$blog->category->slug}}"><span class="badge bg-dark">{{$blog->category->name}}</span></a></div>
            <div>
              <div class="d-flex">Author - <a href="/?username={{$blog->author->username}}" class="link nav-link text-dark fw-bolder">{{$blog->author->name}}</a> </div>

              <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
            </div> --}}
            <div class="tags mb-3 mt-3">
                <a href="/?category={{$blog->category->slug}}"><span class="badge bg-dark text-capitalize">{{$blog->category->name}}</span></a>
              </div>
          <h3 class="card-title">{{$blog->title}}</h3>

          <div class="d-flex pt-2 justify-content-between">
            <div>
                <p class="fs-6 text-dark">
                    <a href="/?username={{$blog->author->username}}" class="text-decoration-none text-dark fw-bold text-capitalize">{{$blog->author->name}}</a>
                    <span> - {{$blog->created_at->diffForHumans()}}</span>
                </p>
            </div>
            <div class="">
                <form action="/blogs/{{$blog->slug}}/subscription" method="post">
                    @csrf
                    @auth
                        @if (auth()->user()->isSubscribed($blog))
                            <button class="btn btn-outline-dark btn-sm">Unsubscribe</button>
                        @else
                            <button class="btn btn-dark btn-sm">Subscribe</button>
                        @endif
                    @endauth
                </form>
            </div>
          </div>

            <p class="lh-md mt-3">
              {{$blog->body}}
            </p>
          </div>
        </div>
    </div>

    <section class="container">
        <div class="col-md-6 mx-auto">
            @auth
                <x-comment-form :blog="$blog"  />
            @else
            <p class="">Please <a href="/login" class="text-dark fw-bolder">login</a> to participate in this discussion.</p>
            @endauth
        </div>
    </section>

    @if($blog->comments->count())
        <x-comments :comments='$blog->comments()->latest()->paginate(3)' />
    @endif

    <x-blogs-you-may-like :randomBlogs="$randomBlogs" />

</x-layout>
