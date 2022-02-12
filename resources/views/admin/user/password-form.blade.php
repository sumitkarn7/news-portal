@extends('admin.template')

@section('title','Admin Panel || User Password Update')


@section('main-content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
    @include('admin.partials.message')
        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Update Password</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    {{ Form::open(['url'=>route('user.update-password',auth()->user()->id)]) }}
                    @method('put')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('old_password','Old-Password') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::password('old_password',['class'=>'form-control '.($errors->has('old_password') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter Old Password.....']) }}
                                    @error('old_password')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('password','New-Password') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::password('password',['class'=>'form-control '.($errors->has('password') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter New Password.....']) }}
                                    @error('password')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('password_confirmation','Re-Type Password') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::password('password_confirmation',['class'=>'form-control '.($errors->has('password') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter Password Again.....']) }}
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="submit-section">
                            {{ Form::button('Update',['class'=>'btn btn-primary submit-btn','type'=>'submit']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->

@endsection



