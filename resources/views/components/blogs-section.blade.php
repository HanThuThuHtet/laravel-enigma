@props(['blogs'])
<section class="container text-center py-5 mt-5" id="blogs">
    <h5 class="display-6 fw-bold mb-5">Blogs</h5>
    {{-- <div class="">
        <x-category-dropdown />
    </div> --}}
    <div>
        <x-category-pilltab />
    </div>
    <form action="/" method="get" class="mb-4">
      <div class="input-group mb-3">
        @if (request('category'))
            <input
            name="category"
            type="hidden"
            value="{{request('category')}}"
        />
        @endif

        @if (request('username'))
            <input
            name="username"
            type="hidden"
            value="{{request('username')}}"
        />
        @endif

        <input
          name="search"
          type="text"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
          value="{{request('search')}}"
        />
        <button
          class="input-group-text bg-dark text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">

            @forelse ($blogs as $blog)
                <div class="col-md-4 mb-4">

                        <x-blog-card :blog="$blog"/>

                </div>
            @empty
                <p class="text-center">No blogs found</p>
            @endforelse
            <div class="d-flex justify-content-center">
                {{$blogs->links()}}
            </div>
    </div>
</section>
