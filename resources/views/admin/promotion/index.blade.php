@extends('admin.template')

@section('title','Admin Panel || Promotion')



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

								<h3 class="page-title">Promotion</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Promotion Setting</li>
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
										<h3 class="page-title">Promotion Settings</h3>
									</div>
								</div>
							</div>
							<!-- /Page Header -->
							<form action="{{ route('promo.update',$all_adver->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Top Link</label>
									<div class="col-lg-5">
                                        {{ Form::url('top_link',@$all_adver->top_link,['class'=>'form-control '.($errors->has('top_link') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Top Promotion Link Here'])}}
										
										
                                        
                                        @error('top_link')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>


								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Top Place</label>
									<div class="col-lg-5">
                                        {{ Form::file('top_place',['class'=>'form-control '.($errors->has('top_place') ?'is-invalid':''),'accept'=>'image/*'])}}
										
										<span class="form-text text-muted">Recommended image size is 700px x 87px</span>
                                        
                                        @error('top_place')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
									<div class="col-lg-4">
                                    <div class="img-thumbnail float-right "><img src="{{ asset('Uploads/Promo_top/'.$all_adver->top_place) }}" alt="" width="200" height="40"></div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Middle Link</label>
									<div class="col-lg-5">
                                        {{ Form::url('middle_link',@$all_adver->middle_link,['class'=>'form-control '.($errors->has('middle_link') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Middle Promotion Link Here'])}}
										
										
                                        
                                        @error('middle_link')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-lg-3 col-form-label">Middle Place</label>
									<div class="col-lg-5">
                                    {{ Form::file('middle_place',['class'=>'form-control '.($errors->has('middle_place') ?'is-invalid':''),'accept'=>'image/*'])}}
										<span class="form-text text-muted">Recommended image size is 340px x 283px</span>
                                        @error('middle_place')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
									<div class="col-lg-4">
										<div class="img-thumbnail float-right"><img src="{{ asset('Uploads/Promo_middle').'/'.$all_adver->middle_place }}" alt="" width="200" height="40"></div>
									</div>
								</div>


								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Footer Link</label>
									<div class="col-lg-5">
                                        {{ Form::url('footer_link',@$all_adver->footer_link,['class'=>'form-control '.($errors->has('footer_link') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Footer Promotion Link Here'])}}
										
										
                                        
                                        @error('footer_link')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-lg-3 col-form-label">Footer Place</label>
									<div class="col-lg-5">
                                    {{ Form::file('footer_place',['class'=>'form-control '.($errors->has('footer_place') ?'is-invalid':''),'accept'=>'image/*'])}}
										<span class="form-text text-muted">Recommended image size is 980px x 121px</span>
                                        @error('footer_place')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
									</div>
									<div class="col-lg-4">
										<div class="img-thumbnail float-right"><img src="{{ asset('Uploads/Promo_footer/'.$all_adver->footer_place) }}" alt="" width="200" height="40"></div>
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




