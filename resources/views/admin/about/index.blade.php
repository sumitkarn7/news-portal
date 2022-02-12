@extends('admin.template')

@section('title','Admin Panel || About')



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
								<h3 class="page-title">About Page</h3>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mb-0">
								<div class="card-header">
									<h4 class="card-title mb-0">About Detail
									</h4>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped mb-0">
											<thead>
												<tr>
													<th>Id</th>
													<th>Name</th>
													<th>Title</th>
													<th>Image</th>
													<th>Description</th>
													<th>Action</th>
												</tr>
											</thead>
                                            <tbody>
                                                @isset($about)													
														<tr>
															<td>{{ $about->id}}</td>
															<td>{{ ucfirst($about->name) }}</td>
															<td>{{ ucfirst($about->title) }}</td>
															<td>
																@if($about->image && $about->image !=null)
																	<a href="{{ asset('Uploads/About/'.$about->image) }}" data-lightbox="image-{{ $about->id}}" data-title="{{ ucfirst($about->title)}}">View</a>
																@endif
															</td>
															<td>{{ ucfirst($about->description) }}</td>
															<td>

																
																<a href="{{ route('about.edit',$about->id) }}" class="btn btn-sm btn-info btn-style">
																	<i class="fa fa-edit"></i>
																</a>
															</td>
														</tr>
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




