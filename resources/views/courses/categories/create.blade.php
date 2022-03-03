@extends('../layout/' . $layout)

@section('subhead')
    <title>Course Categories</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create a Course Category</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form role="form" method="post">
                @csrf
            <div class="intro-y box p-5">
                <div>
                    <label for="name" class="form-label">Name</label>
                    <input id="name" name="name" type="text" class="form-control w-full" placeholder="{{ old('name') }}">
                </div>

                <div>
                    <label for="slug" class="form-label">Slug</label>
                    <input id="slug" name="slug" type="text" class="form-control w-full" placeholder="{{ old('slug') }}">
                </div>

                <div>
                    <label for="parent_id" class="form-label">Select parent category*</label>
                    <select type="text" name="parent_id" class="form-control">
                        <option value="">None</option>
                        @if($courseCategories)
                            @foreach($courseCategories as $category)
                                <?php $dash=''; ?>
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @if(count($category->subcategory))
                                    @include('courses.categories.subCategoryListOption',['subcategories' => $category->subcategory])
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-outline-secondary w-24 mr-1">Save</button>
                </div>
            </div>
            </form>
            <!-- END: Form Layout -->

            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            @if(\Session::has('error'))
                <div>
                    <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
                </div>
            @endif

            @if(\Session::has('success'))
                <div>
                    <li class="alert alert-success">{!! \Session::get('success') !!}</li>
                </div>
            @endif
        </div>

    </div>
@endsection

@section('script')
@endsection
