@extends('../layout/' . $layout)

@section('subhead')
    <title>Skills Panda LMS - Courses</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create a Course</h2>
    </div>
    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
        @csrf

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Name</label>
                    {!! Form::text('firstname', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Surname</label>
                    {!! Form::text('lastname', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Email</label>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Password</label>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Confirm Password</label>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>

            </div>
            <!-- END: Form Layout -->
        </div>

        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">

                <div>
                    <label for="crud-form-1" class="form-label">Roles</label>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Gender</label>
                    {!! Form::text('gender', null, array('placeholder' => 'Gender','class' => 'form-control')) !!}
                </div>

                <div>
                    <label for="crud-form-1" class="form-label">Active</label>
                    {!! Form::text('active', null, array('placeholder' => 'Actove','class' => 'form-control')) !!}
                </div>

                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
            </div>

            <!-- END: Form Layout -->
        </div>
    </div>

    {!! Form::close() !!}
@endsection
