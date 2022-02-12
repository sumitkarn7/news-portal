@extends('admin.template')

@section('title','Admin Panel || About Form')




@section('main-content')

    <div class="main-wrapper">
    @include('admin.partials.message')
        <!-- Page Content -->
        <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">About</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">
                                    @isset($data)
                                    Update
                                    @else
                                    Add
                                    @endisset
                                        
                                     About</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">About Form</h4>
                                    
									<div class="col-auto float-right ml-auto">
										<a href="{{ route('category.index') }}" class="btn add-btn" ><i class="fa fa-arrow-left"></i> Back </a>
									</div>
								</div>
								<div class="card-body">
									{{ Form::open(['url'=>route('about.update',$data->id),'files'=>true])}}
                                    @method('put')
										<div class="form-group row">
                                            {{ Form::label('title','Title:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::text('title',@$data->title,['class'=>'form-control '.($errors->has('title') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter About Title Here......'])}}
												</div>
											</div>
										</div>
                                        @error('title')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror

										<div class="form-group row">
                                            {{ Form::label('name','Name:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::text('name',@$data->name,['class'=>'form-control '.($errors->has('name') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter Name Section Here......'])}}
												</div>
											</div>
										</div>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror


                                       


                                        <div class="form-group row">
                                            {{ Form::label('description','Description:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::textarea('description',@$data->description,['class'=>'form-control '.($errors->has('description') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Category Description Here......','rows'=>5,'style'=>'resize:none;'])}}
												</div>
											</div>
										</div>
                                        @error('description')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror

										<div class="form-group row">
                                            {{ Form::label('image','Image:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-5">
												<div class="input-group">
                                                    {{ Form::file('image',['class'=>($errors->has('image') ?'is-invalid':''),'accept'=>'image/*'])}}
												</div>
											</div>
											@isset($data)
												<div class="col-lg-5">
													<img src="{{ asset('Uploads/About/'.$data->image) }}" alt="" class="img-fluid img-thumbnail">
												</div>
											@endisset
										</div>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror


                                       

                                     

                                       

                                        <div class="form-group row">
											<div class="offset-md-2 col-lg-10">
												{{ Form::button('<i class="fa fa-times"></i> Reset',['class'=>'btn btn-danger','type'=>'reset'])}}

                                                
												{{ Form::button('<i class="fa fa-send"></i> Update',['class'=>'btn btn-success','type'=>'submit'])}}

											</div>
										</div>


									{{ Form::close()}}
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
        <!-- /Page Content -->

    </div>

@endsection




