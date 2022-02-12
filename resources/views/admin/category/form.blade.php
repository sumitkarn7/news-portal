@extends('admin.template')

@section('title','Admin Panel || Category Form')




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
								<h3 class="page-title">Category</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">
                                    @isset($edit_cat)
                                    Update
                                    @else
                                    Add
                                    @endisset
                                        
                                     Category</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Category Form</h4>
                                    
									<div class="col-auto float-right ml-auto">
										<a href="{{ route('category.index') }}" class="btn add-btn" ><i class="fa fa-arrow-left"></i> Back </a>
									</div>
								</div>
								<div class="card-body">
                                    @isset($edit_cat)
									{{ Form::open(['url'=>route('category.update',$edit_cat->id)])}}
                                    @method('put')
                                    @else
									{{ Form::open(['url'=>route('category.store')])}}
                                    @endisset
										<div class="form-group row">
                                            {{ Form::label('title','Title:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::text('title',@$edit_cat->title,['class'=>'form-control '.($errors->has('title') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter Category Title Here......'])}}
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
                                            {{ Form::label('parent_id','Sub-Category-Of:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::select('parent_id',$parent_cat->pluck('title','id'),@$edit_cat->parent_id,['class'=>'form-control '.($errors->has('parent_id') ?'is-invalid':''),'required'=>false,'placeholder'=>'------Select Any If------'])}}
												</div>
											</div>
										</div>
                                        @error('parent_id')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror


                                        <div class="form-group row">
                                            {{ Form::label('description','Description:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::textarea('description',@$edit_cat->description,['class'=>'form-control '.($errors->has('description') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Category Description Here......','rows'=>5,'style'=>'resize:none;'])}}
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
                                            {{ Form::label('status','Status:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::select('status',['active'=>'Active','inactive'=>'In-Active'],@$edit_cat->status,['class'=>'form-control '.($errors->has('status') ?'is-invalid':''),'required'=>true,'placeholder'=>'------Select Any One------'])}}
												</div>
											</div>
										</div>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror

                                     

                                       

                                        <div class="form-group row">
											<div class="offset-md-2 col-lg-10">
												{{ Form::button('<i class="fa fa-times"></i> Reset',['class'=>'btn btn-danger','type'=>'reset'])}}

                                                @isset($edit_cat)
												{{ Form::button('<i class="fa fa-send"></i> Update',['class'=>'btn btn-success','type'=>'submit'])}}
                                                @else
												{{ Form::button('<i class="fa fa-send"></i> Add',['class'=>'btn btn-success','type'=>'submit'])}}
                                                @endisset

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




