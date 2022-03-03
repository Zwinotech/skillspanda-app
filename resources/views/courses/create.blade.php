@extends('../layout/' . $layout)

@section('subhead')
    <title>Skills Panda LMS - Courses</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create a Course</h2>
    </div>
    <form method="post" enctype="multipart/form-data" action="{{ route("courses/store") }}">
        @csrf

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Title</label>
                    <input id="title" name="title" type="text" class="form-control w-full" placeholder="{{ old('title') }}">

                    @error('title')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Slug</label>
                    <input id="slug" name="slug" type="text" class="form-control w-full" placeholder="{{ old('title') }}">

                    @error('slug')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="course_category_id" class="form-label">Category</label>
                    <select data-placeholder="" class="tom-select w-full" id="course_category_id" name="course_category_id">
                        @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : ''}}>
                            {{ ucwords($category->name )}}
                        </option>
                        @endforeach
                    </select>

                    @error('course_category_id')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="difficulty" class="form-label">Difficulty</label>
                    <div class="input-group">
                        <input id="difficulty" name="difficulty" type="text" class="form-control" placeholder="{{ old('difficulty') }}" aria-describedby="input-group-1">

                        @error('difficulty')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <label for="crud-form-4" class="form-label">Runtime</label>
                    <div class="input-group">
                        <input id="runtime" name="runtime" type="text" class="form-control" placeholder="{{ old('runtime') }}" aria-describedby="input-group-2">
                        <div id="input-group-2" class="input-group-text">minutes</div>

                        @error('runtime')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <label for="difficulty" class="form-label">Price</label>
                    <div class="input-group">
                        <input id="price" name="price" type="text" class="form-control" placeholder="{{ old('price') }}" aria-describedby="input-group-1">
                    </div>

                    @error('price')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

{{--                <div class="mt-3">--}}
{{--                    <label>Active Status</label>--}}
{{--                    <div class="form-switch mt-2">--}}
{{--                        <input type="checkbox" class="form-check-input">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="mt-3">
                    <label>Description</label>
                    <div class="mt-2">
                        <textarea class="editor" name="description" id="description" cols="30" rows="10"></textarea>

                        @error('description')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>

        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">

                <div class="mt-3">
                    <label><Details></Details></label>
                    <div class="mt-2">
                        <textarea class="editor" name="details" id="details" cols="30" rows="10"></textarea>

                        @error('details')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Graphic</label>
                    <input name="graphic" id="brochure" type="file" />

                    @error('graphic')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="brochure" class="form-label">Brochure</label>
                    <input name="brochure" id="brochure" type="file" />

                    @error('brochure')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Video</label>
                    <input id="video" name="video" type="text" class="form-control w-full" placeholder="{{ old('video') }}">

                    @error('video')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
            </div>

            <!-- END: Form Layout -->
        </div>
    </div>

    </form>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
