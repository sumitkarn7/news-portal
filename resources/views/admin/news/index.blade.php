@extends('admin.template')

@section('title','Admin Panel || News')

@section('css')
@endsection

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
								<h3 class="page-title">News</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">News List</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mb-0">
								<div class="card-header">
									<h4 class="card-title mb-0">News
									</h4>
									<p class="card-text">
                                        All News Listed Here......
									</p>
									<div class="col-auto float-right ml-auto">
										<a href="{{ route('news.create') }}" class="btn add-btn" ><i class="fa fa-plus"></i> Add News </a>
									</div>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped mb-0 text-center">
											<thead>
												<tr>
													<th>Id</th>
													<th>Title</th>
													<th>Slug</th>
													<th>Category</th>
													<th>Status</th>
													<th>View</th>
													<th>Image</th>
													<th>Updated At</th>
													<th>Created-By</th>
													<th>Action</th>
												</tr>
											</thead>
                                            <tbody>
                                                @isset($news)
													@foreach($news as $data)
														<tr>
															<td>{{ $data->id}}</td>
															<td>{{ ucfirst($data->title) }}</td>
															<td>{{ $data->slug}}</td>
															<td>{{ @$data->getCat->title}}</td>
															<td>
																<div class="dropdown action-label">
																	<a class="btn btn-white btn-sm btn-rounded dropdown-toggle"  data-toggle="dropdown" aria-expanded="false">
																		<i class="fa fa-dot-circle-o text-{{ $data->status=='active' ?'success':'danger'}}"></i> {{ ucfirst($data->status=='active'?'Active':'In-Active')}}
																	</a>
																	<div class="dropdown-menu">
																		<a class="dropdown-item" href="{{ route('news.update-status',[$data->id,$data->status]) }}"><i class="fa fa-dot-circle-o text-{{ $data->status=='active'?'danger':'success'}}"></i> {{ $data->status=='active'?'In-Active':'Active'}}</a>
																	</div>
																</div>
															</td>
															<td>
																@if($data->view_count && $data->view_count !=null)
																	{{ $data->viewe_count}}
																@else
																 No View
																@endif
															</td>
															<td>
																@if($data->image && $data->image !=null)
																	<a href="{{ asset('Uploads/News/'.$data->image) }}" data-lightbox="image-{{ $data->id}}" data-title="{{ ucfirst($data->title)}}">View</a>
																@endif
															</td>
															<td>{{ $data->updated_at->diffForHumans()}}</td>
															<td>{{ $data->admin->name}}</td>
															<td>

																

																<a href="javascript:;" data-id="{{ $data->id}}" class="btn btn-sm btn-danger btn-style delete-news">
																	<i class="fa fa-trash"></i>
																</a>
																<a href="{{ route('news.edit',$data->id) }}" class="btn btn-sm btn-info btn-style">
																	<i class="fa fa-edit"></i>
																</a>
																{{ Form::open(['url'=>route('news.destroy',$data->id),'class'=>'delete-form'])}}
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

@section('js')
@endsection




