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

                <!-- error messages -->
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="container mx-auto py-8">
                    <h1 class="text-2xl font-bold mb-4">Create New Post</h1>

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                            <h4><strong>Top Section Content</strong></h4>

                        <div class="form-group">
                            <label>Enter Title</label>
                            <input type="text" class="form-control" name="top_section_text"><br/>
                            <label>Upload File</label>
                            <input type="hidden" name="topimage">
                            <input type="file" class="form-control" name="top_section_file"/><br/>
                            <label>Top Content</label>
                            <textarea rows="10" cols="80" name="top_section_textarea"></textarea> <br/>



                        </div>
                        </div>
                        </div>

                        <div class="mt-5 mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" id="title" name="title"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                @error('title') border-red-500 @enderror"
                                value="{{ old('title') }}"
                            >
                            @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                @error('image') border-red-500 @enderror"
                            >
                            @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                                @error('description') border-red-500 @enderror"
                            >{{ old('description') }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 col-sm-12 mt-4">
                            <h4><strong>Bottom Section Content</strong></h4>

                        <div class="form-group">
                            <label>Enter Title</label>
                            <input type="text" class="form-control" name="bottom_section_text"><br/>
                            <label>Upload File</label>
                            <input type="hidden" name="bottomimage">
                            <input type="file" class="form-control" name="bottom_section_file"><br/>
                            <label>Bottom Content</label>
                            <textarea rows="10" cols="80" name="bottom_section_textarea"></textarea> <br/>


                        </div>
                        </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 col-sm-12 mt-4">
                            <h4><strong>Footer Section Content</strong></h4>

                        <div class="form-group">
                            <label>Enter Title</label>
                            <input type="text" class="form-control" name="footer_section_text"><br/>
                            <label>Upload File</label>
                            <input type="hidden" name="footerimage">
                            <input type="file" class="form-control" name="footer_section_file"><br/>
                            <label>Footer Content</label>
                            <textarea rows="10" cols="80" name="footer_section_textarea"></textarea> <br/>


                        </div>
                        </div>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>

@include('includes.footer')
