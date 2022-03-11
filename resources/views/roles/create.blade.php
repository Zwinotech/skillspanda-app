@extends('../layout/' . $layout)

@section('subhead')
    <title>Skills Panda LMS - Roles</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create a Role</h2>
    </div>
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Name</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Permission</label>
                    <br/>
                    @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                    @endforeach
                    <br/>

                    @error('permission')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <!-- END: Form Layout -->
        </div>

        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">

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
