@extends('admin.template')

@section('title','Admin Panel || News Form')




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
								<h3 class="page-title">News</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">
                                    @isset($edit_cat)
                                    Update
                                    @else
                                    Add
                                    @endisset
                                        
                                     News</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">News Form</h4>
                                    
									<div class="col-auto float-right ml-auto">
										<a href="{{ route('news.index') }}" class="btn add-btn" ><i class="fa fa-arrow-left"></i> Back </a>
									</div>
								</div>
								<div class="card-body">
                                    @isset($edit_cat)
									{{ Form::open(['url'=>route('news.update',$edit_cat->id),'files'=>true])}}
                                    @method('put')
                                    @else
									{{ Form::open(['url'=>route('news.store'),'files'=>true])}}
                                    @endisset
										<div class="form-group row">
                                            {{ Form::label('title','Title:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::text('title',@$edit_cat->title,['class'=>'form-control '.($errors->has('title') ?'is-invalid':''),'required'=>true,'placeholder'=>'Enter News Title Here......'])}}
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
                                            {{ Form::label('category_id','Category Of:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    <select name="category_id" id="category_id" class="form-control">
                                                    @php
                                                    echo $cat_dropdown
                                                    @endphp
                                                    </select>
                                                <!-- {{ Form::select('category_id',[],[],['class'=>'form-control '.($errors->has('category_id') ?'is-invalid':''),'required'=>true,'placeholder'=>'-----Select Any One-----'])}} -->
												</div>
											</div>
										</div>
                                        @error('category_id')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror


                                        


                                        <div class="form-group row">
                                            {{ Form::label('news_content','News Content:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                {{ Form::textarea('news_content',@$edit_cat->news_content,['class'=>'form-control '.($errors->has('news_content') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter News Content Here......','style'=>'resize:none;'])}}

												</div>
											</div>
										</div>
                                        @error('news_content')
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
                                            {{ Form::label('image','News Image:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-3">
												<div class="input-group">
                                                    {{ Form::file('image',['class'=>($errors->has('image') ?'is-invalid':''),'accept'=>'image/*','onchange'=>'readURL(this)'])}}
												</div>
											</div>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror
                                        
                                        @isset($edit_cat->image)
                                        <div class="col-lg-7">
                                            <img src="{{ asset('Uploads/News/'.@$edit_cat->image)}}" width="250px" class="img img-thumbnail img-fluid" alt="" id="image_display">
                                        </div>
                                        @else
                                        <div class="col-lg-7">
                                            <img src="" class="img img-thumbnail img-fluid" alt="" id="image_display">
                                        </div>
                                        @endif
                                        
										</div>


                                        <hr>
                                        <h2 class="text-center">Seo Setting</h2>
										<hr>
                                        <div class="form-group row">
                                            {{ Form::label('seo_title','Seo Title:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::text('seo_title',@$edit_cat->seo_title,['class'=>'form-control '.($errors->has('seo_title') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Seo Title Here......'])}}
												</div>
											</div>
										</div>
                                        @error('seo_title')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror


										<div class="form-group row">
                                            {{ Form::label('seo_subtitle','Seo Sub-Title:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::text('seo_subtitle',@$edit_cat->seo_subtitle,['class'=>'form-control '.($errors->has('seo_subtitle') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Seo Sub-Title Here......'])}}
												</div>
											</div>
										</div>
                                        @error('seo_subtitle')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror

										<div class="form-group row">
                                            {{ Form::label('seo_keywords','Seo Keywords:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::text('seo_keywords',@$edit_cat->seo_keywords,['class'=>'form-control '.($errors->has('seo_keywords') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Seo Keywords Here......'])}}
												</div>
											</div>
										</div>
                                        @error('seo_keywords')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message}}
                                        </div>
                                        @enderror


										<div class="form-group row">
                                            {{ Form::label('seo_description','Seo Description:',['class'=>'col-form-label col-lg-2'])}}
											<div class="col-lg-10">
												<div class="input-group">
                                                    {{ Form::textarea('seo_description',@$edit_cat->seo_description,['class'=>'form-control '.($errors->has('seo_description') ?'is-invalid':''),'required'=>false,'placeholder'=>'Enter Seo Description Here......','rows'=>5,'style'=>'resize:none;'])}}
												</div>
											</div>
										</div>
                                        @error('seo_description')
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

@section('js')
    <script>
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#image_display').attr('src',e.target.result).width(250)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
    CKEDITOR.replace('news_content', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
    });
    </script>

    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
    CKEDITOR.replace('seo_description', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
    });
    </script>
@endsection




