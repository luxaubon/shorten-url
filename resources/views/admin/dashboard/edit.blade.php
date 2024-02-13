			<div class="row">
					<div class="col-md-8 alert alert-dark">
                        <!-- begin panel -->
                        <div class="panel">
                            <ul class="nav nav-tabs">
								<li class="nav-items">
									<a href="#default-tab-sup-1" data-toggle="tab" class="nav-link active">
										<span class="d-sm-none">
											<i class="fas fa-lg fa-fw m-r-10 fa-user"></i> 
										</span>
										<span class="d-sm-block d-none">
											<i class="fas fa-lg fa-fw m-r-10 fa-user"></i>
										</span>
									</a>
								</li>
							</ul>

                            <div class="tab-content m-b-0 ">
                                <div class="tab-pane fade active show" id="default-tab-sup-1">
                                <!-- Start TAP -->

									<label class="control-label">Name <span class="text-danger">*</span></label>
			                        <div class="row row-space-10">
			                            <div class="col-md-6 m-b-15">
			                                <input type="text" class="form-control" placeholder="First name" required  name="name" value="{{ $user_id->name }}"/>
			                            </div>
			                            <div class="col-md-6 m-b-15">
			                                <input type="text" class="form-control" placeholder="Last name" required  name="lname" value="{{ $user_id->lname }}"/>
			                            </div>
			                        </div>
			                        <label class="control-label">Email <span class="text-danger">*</span></label>
			                        <div class="row m-b-15">
			                            <div class="col-md-12">
			                                <input type="email" class="form-control" placeholder="Email address" readonly=""  name="email" value="{{ $user_id->email }}"/>
			                            </div>
			                        </div>
			                        <label class="control-label">Password <span class="text-danger">*</span></label>
			                        <div class="row m-b-15">
			                            <div class="col-md-12">
			                                <input type="password" class="form-control" placeholder="Password"  name="password" />
			                            </div>
			                        </div>
			                        <label class="control-label">Password Confirmation<span class="text-danger">*</span></label>
			                        <div class="row m-b-15">
			                            <div class="col-md-12">
			                                <input type="password" class="form-control" placeholder="Password Confirmation"  name="password_confirmation" />
			                            </div>
			                        </div>
                                <!-- END TAP -->
                                </div>


                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 bg-grey-light">
							  <p class="m-b-10 p-0 ">

								<!-- UPDATE BUTTON -->
									<button type="submit" id="Save" class="btn btn-success m-t-5">
									<i class="fa fa-save"></i> Save</button>
								<!-- UPDATE BUTTON -->

							  </p>

								<div class="panel-group alert alert-dark" id="accordion">

	                            <!-- begin panel -->
	                            <div class="panel panel-inverse overflow-hidden">
	                                <div class="panel-heading">
	                                    <h3 class="panel-title">
	                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
	                                            Setting
	                                        </a>
	                                    </h3>
	                                </div>
	                                <div id="collapse1" class="panel-collapse collapse show">
	                                   	<div class="panel-body">
			
	                                        <div class="profile-thum"  style="height: 200px;">
	                                        	@if($user_id->image)
	                                        		<img id="cover-thumb" src="{{ asset('images/'.$user_id->image) }}" width="100%">
	                                        	@endif
						                	<div class="blah"><i class="fa fa-camera fa-2x"></i><br>Select images<br></div>
						                	<div id="img-thumb"></div>
						                	<div id="img-thumb-cover"></div>
						                	<input name="image" type="file" class="file_input_hidden" id="image" onchange="javascript: document.getElementById('image').value = this.value" accept="image/*" />

						                	</div>
						                	<hr>
                                    	
	                                </div>
	                            </div>
	                            <!-- end panel -->

	                        @if(count($errors))
	                         <div class="panel panel-inverse overflow-hidden">
	                                <div class="panel-heading">
	                                    <h3 class="panel-title">
	                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
	                                            Error
	                                        </a>
	                                    </h3>
	                                </div>
	                                <div id="collapse3" class="panel-collapse collapse show">
	                                   <div class="panel-body">
	                                   @include('admin.layouts.error')
	                                </div>
	                            </div>
	                        </div>
	                        @endif
	                        <!-- end panel -->
				   			</div>
	                    <!-- end col-6 -->
	                </div>
         </div>
