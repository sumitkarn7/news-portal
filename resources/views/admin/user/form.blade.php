@extends('admin.template')

@section('title','Admin Panel || User Profile Update')


@section('main-content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Update Profile</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    {{ Form::open(['url'=>route('user.update',auth()->user()->id),'files'=>true]) }}
                    @method('put')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('name','Name') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('name',auth()->user()->name ?? '',['class'=>'form-control '.($errors->has('name') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter You Full Name Here.....']) }}
                                    @error('name')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('email','Email') }}
                                    {{ Form::email('email',auth()->user()->email ?? '',['class'=>'form-control '.($errors->has('email') ?'is-invalid':''),'required'=>false,'disabled']) }}
                                    @error('email')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('phone_number','Phone') }}
                                    {{ Form::tel('phone_number',auth()->user()->UserInfo->phone_number ?? '',['class'=>'form-control '.($errors->has('phone_number') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Phone Number Here.....']) }}
                                    @error('phone_number')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('address','Address') }}
                                    {{ Form::textarea('address',auth()->user()->UserInfo->address ?? '',['class'=>'form-control '.($errors->has('address') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Address Here.....','rows'=>5,'style'=>'resize:none;']) }}
                                    @error('address')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('image','Profile Image') }}
                                    {{ Form::file('image',['class'=>'form-control '.($errors->has('image') ?'is-invalid':''),'accept'=>'image/*','onchange'=>'readURL(this)']) }}
                                    @error('image')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                                @if(auth()->user()->UserInfo && auth()->user()->UserInfo->image !=null)
                                    <img src="{{ asset('Uploads/User/'.auth()->user()->UserInfo->image) }}" class="img img-thumbnail img-fluid" alt="" id="image_display">
                                @endif
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


@section('js')

    <script>
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#image_display').attr('src',e.target.result).width(150)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
