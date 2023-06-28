<x-admin-layout>
    <h1 class="my-4 text-center">Blogs</h1>
    <x-card-wrapper>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Intro</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->intro}}</td>
                        <td><a href="" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="/admin/blogs/{{$blog->slug}}/delete" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$blogs->links()}}
    </x-card-wrapper>
</x-admin-layout>
