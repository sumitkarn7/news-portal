@extends('admin.template')

@section('title','Admin Panel || Category')



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
								<h3 class="page-title">Category</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Category List</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mb-0">
								<div class="card-header">
									<h4 class="card-title mb-0">Category
										@isset($parent)
											Of <em>"{{ $parent->title}}" Category List</em>
										@endisset
									</h4>
									<p class="card-text">
                                        All Category 
										@isset($parent)
											Of "{{ $parent->title}}"
										@endisset
										Listed Here......
									</p>
									<div class="col-auto float-right ml-auto">
										<a href="{{ route('category.create') }}" class="btn add-btn" ><i class="fa fa-plus"></i> Add Category </a>
									</div>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped mb-0">
											<thead>
												<tr>
													<th>Id</th>
													<th>Title</th>
													<th>Slug</th>
													<th>Description</th>
													<th>Status</th>
													<th>Created-By</th>
													<th>Action</th>
												</tr>
											</thead>
                                            <tbody>
                                                @isset($category)
													@foreach($category as $data)
														<tr>
															<td>{{ $data->id}}</td>
															<td>{{ ucfirst($data->title) }}</td>
															<td>{{ $data->slug}}</td>
															<td>{{ ucfirst($data->description) }}</td>
															<td>
																<div class="dropdown action-label">
																	<a class="btn btn-white btn-sm btn-rounded dropdown-toggle"  data-toggle="dropdown" aria-expanded="false">
																		<i class="fa fa-dot-circle-o text-{{ $data->status=='active' ?'success':'danger'}}"></i> {{ ucfirst($data->status=='active'?'Active':'In-Active')}}
																	</a>
																	<div class="dropdown-menu">
																		<a class="dropdown-item" href="{{ route('category.update-status',[$data->id,$data->status]) }}"><i class="fa fa-dot-circle-o text-{{ $data->status=='active'?'danger':'success'}}"></i> {{ $data->status=='active'?'In-Active':'Active'}}</a>
																	</div>
																</div>
															</td>
															<td>{!! @$data->getUser->name !!}</td>
															<td>

																@if($data->getChild && $data->getChild->count() >0)
																<a href="{{ route('category.child',$data->slug) }}" class="btn btn-sm btn-warning btn-style">
																	<i class="fa fa-list"></i>
																</a>
																@endif

																<a href="javascript:;" data-id="{{ $data->id}}" class="btn btn-sm btn-danger btn-style delete-category">
																	<i class="fa fa-trash"></i>
																</a>
																<a href="{{ route('category.edit',$data->id) }}" class="btn btn-sm btn-info btn-style">
																	<i class="fa fa-edit"></i>
																</a>
																{{ Form::open(['url'=>route('category.destroy',$data->id),'class'=>'delete-form'])}}
																@method('delete')
																{{ Form::close()}}
															</td>
														</tr>
													@endforeach
												@endisset
                                            </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
        <!-- /Page Content -->

    </div>

@endsection




