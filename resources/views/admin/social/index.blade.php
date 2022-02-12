@extends('admin.template')

@section('title','Admin Panel || Social')



@section('main-content')

    <div class="main-wrapper">

        <!-- Page Content -->
        <div class="page-wrapper">
		@include('admin.partials.message')

                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">

								<h3 class="page-title">Social</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Social Setting</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Page Content -->
                    <div class="content container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Page Header -->
							<div class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">Social Settings</h3>
									</div>
								</div>
							</div>
							<!-- /Page Header -->
							<form action="{{ route('social.update',$social->id) }}" method="post">
                                @csrf

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Facebook</label>
									<div class="col-lg-5">
                                        {{ Form::url('facebook',@$social->facebook,['class'=>'form-control '.($errors->has('facebook') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Facebook Link Here'])}}
										
										
                                        
                                        @error('facebook')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Twitter</label>
									<div class="col-lg-5">
                                        {{ Form::url('twitter',@$social->twitter,['class'=>'form-control '.($errors->has('twitter') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter twitter Link Here'])}}
										
										
                                        
                                        @error('twitter')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Youtube</label>
									<div class="col-lg-5">
                                        {{ Form::url('youtube',@$social->youtube,['class'=>'form-control '.($errors->has('youtube') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter youtube Link Here'])}}
										
										
                                        
                                        @error('youtube')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Watsaap</label>
									<div class="col-lg-5">
                                        {{ Form::url('watsaap',@$social->watsaap,['class'=>'form-control '.($errors->has('watsaap') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter watsaap Link Here'])}}
										
										
                                        
                                        @error('watsaap')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>


								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Pinterest</label>
									<div class="col-lg-5">
                                        {{ Form::url('pinterest',@$social->pinterest,['class'=>'form-control '.($errors->has('pinterest') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter pinterest Link Here'])}}
										
										
                                        
                                        @error('pinterest')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Google</label>
									<div class="col-lg-5">
                                        {{ Form::url('gogle',@$social->gogle,['class'=>'form-control '.($errors->has('google') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter google Link Here'])}}
										
										
                                        
                                        @error('google')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Linkedin</label>
									<div class="col-lg-5">
                                        {{ Form::url('linkedin',@$social->linkedin,['class'=>'form-control '.($errors->has('linkedin') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter linkedin Link Here'])}}
										
										
                                        
                                        @error('linkedin')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>


                                
								<div class="submit-section">
                                    {{ Form::button('Save',['class'=>'btn btn-primary submit-btn','type'=>'submit'])}}
								</div>
							</form>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				</div>			
			</div>
        <!-- /Page Content -->

    </div>

@endsection




