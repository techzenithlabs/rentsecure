@include('includes.header')

<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Content -->

    <section class="main-wrapper">
        @include('layouts.admin.sidebar')
        <div class="main-content">
            <div class="cont-wrapper" style="min-height:500px">
                <!-- success message -->
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- error message -->
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="container mx-auto py-8">
                    <h1 class="text-2xl font-bold mb-4">All Posts</h1><div class="float-end"><a class="btn btn-primary" href="{{ route('posts.create') }}">Create Post</a></div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                                <tr>
                                    <th class="py-3 px-6 text-left">ID</th>
                                    <th class="py-3 px-6 text-left">Title</th>
                                    <th class="py-3 px-6 text-left">Image</th>
                                    <th class="py-3 px-6 text-left">Description</th>
                                    <th class="py-3 px-6 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($posts as $post)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $post->id }}</td>
                                    <td class="py-3 px-6 text-left">{{ $post->title }}</td>
                                    <td class="py-3 px-6 text-left">
                                        <img width="60px" src="{{ $post->image_url }}" alt="{{ $post->title }}" class="h-10 w-10 rounded-full">
                                    </td>
                                    <td class="py-3 px-6 text-left">{{ $post->content }}</td>
                                    <td class="py-3 px-6 text-left flex">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>&nbsp;&nbsp;
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@include('includes.footer')
