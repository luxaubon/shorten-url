@extends('admin.layouts.head_notable')
        
@section('content')

		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home </a></li>
				<!--li class="breadcrumb-item"><a href="javascript:;">UI Elements</a></li-->
				<li class="breadcrumb-item active">{{ ucfirst($folder) }}</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">{{ ucfirst($folder) }}</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-6 -->
			    <div class="col-lg-12">
			    	<!-- begin nav-tabs -->

						<ul class="nav nav-tabs">
						<li class="nav-items">
							<a href="#default-tab-5" data-toggle="tab" class="nav-link active">
								<span class="d-sm-none"><i class="fas fa-cog fa-fw"></i> Setting Web</span>
								<span class="d-sm-block d-none"><i class="fas fa-cog fa-fw"></i> Setting Web</span>
							</a>
						</li>
						
					</ul>
							 
						<form method="post" id="upload_form" enctype="multipart/form-data">
							
							<div class="search-result-total" style="text-align: right;">
								<input type="submit" name="upload" id="upload" class="btn btn-success m-t-5" value="Save">
							</div>
						 @csrf
						<div class="tab-content">
							
							<!-- end tab-pane -->
							<!-- begin tab-pane -->
							<div class="tab-pane fade active show" id="default-tab-5">
								 @include('admin.'.$folder.'.setting')
							</div>
							<!-- end tab-pane -->
						</div>
					</form>

					<!-- end tab-content -->
				</div>
			    <!-- end col-6 -->
			</div>
			
			<!-- end row -->
		</div>
 @include('admin.'.$folder.'.js')
		

@endsection
