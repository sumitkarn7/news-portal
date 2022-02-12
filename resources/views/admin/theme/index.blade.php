@extends('admin.template')

@section('title','Admin Panel || Theme Setting')

@section('css')
@endsection

@section('main-content')

    <div class="main-wrapper">
        <!-- Page Content -->
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
                                            <h3 class="page-title">Theme Settings</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Page Header -->
                            
                                <form method="post" action="{{ route('theme.update',$all_theme[0]->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Website Name</label>
                                        <div class="col-lg-9">
                                            <input name="website_name" value="{{ $all_theme[0]->site_title}}" disabled class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Header Logo</label>
                                        <div class="col-lg-5">
                                            <input type="file" class="form-control ($errors->has('header_logo') ?'is-invalid':'') " name="header_logo">
                                            <span class="form-text text-muted">Recommended image size is 100px x 100px</span>
                                        </div>
                                        @error('header_logo')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
                                        <div class="col-lg-4">
                                            <div class="img-thumbnail float-right "><img src="{{ asset('Uploads/Header/'.$all_theme[0]->header_logo) }}" alt="" width="200" height="40"></div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Footer Logo</label>
                                        <div class="col-lg-5">
                                            <input type="file" class="form-control ($errors->has('footer_logo') ?'is-invalid':'')" name="footer_logo">
                                            <span class="form-text text-muted">Recommended image size is 100px x 100px</span>
                                        </div>
                                        @error('footer_logo')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
                                        <div class="col-lg-4">
                                            <div class="img-thumbnail float-right"><img src="{{ asset('Uploads/Footer/'.$all_theme[0]->footer_logo) }}" alt="" width="200" height="40"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Favicon</label>
                                        <div class="col-lg-7">
                                            {{ Form::file('fav_icon',['class'=>($errors->has('fav_icon') ?'is-invalid':''),'accept'=>'image/*'])}}
                                            <span class="form-text text-muted">Recommended image size is 50px x 50px</span>
                                            @error('fav_icon')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="settings-image img-thumbnail float-right"><img src="{{ asset('Uploads/Fav/'.$all_theme[0]->fav_icon) }}" class="img-fluid" width="46" height="16" alt=""></div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				<!-- /Page Content -->			
		</div>
        <!-- /Page Content -->

    </div>

@endsection

@section('js')
@endsection




