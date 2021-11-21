@extends('layouts.layout')
@section('content')

<input name="MAIN_URL" value="{{url('/')}}">
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<form action="{{url('/')}}">
	<div class="form-group row ">
				<label class="col-xl-3 col-lg-3 col-form-label text-right start-end-date">Date Start-End</label>
				<div class="col-lg-6 col-xl-6">
					<input type='text' class="form-control dateTime" name="DateFrom"value="{{isset($_GET['DateFrom']) ? $_GET['DateFrom'] : ''}} " />
				</div>
			</div>
			<div class="form-group row ">
				<label class="col-xl-3 col-lg-3 col-form-label text-right start-end-date">Date Start-End</label>
				<div class="col-lg-6 col-xl-6">
					<input type='text' class="form-control dateTime" name="DateTo"value="{{isset($_GET['DateTo']) ? $_GET['DateTo'] : ''}}" />
				</div>
			</div>
			<div class="form-group row ">
				<label class="col-xl-3 col-lg-3 col-form-label text-right start-end-date">Price From</label>
				<div class="col-lg-6 col-xl-6">
					<input type='text' class="form-control" name="PriceFrom" id="PriceFrom" value="{{isset($_GET['PriceFrom']) ? $_GET['PriceFrom'] : ''}}" />
				</div>
			</div>
			<div class="form-group row ">
				<label class="col-xl-3 col-lg-3 col-form-label text-right start-end-date">Price To</label>
				<div class="col-lg-6 col-xl-6">
					<input type='text' class="form-control" name="PriceTo" id="PriceTo" value="{{isset($_GET['PriceTo']) ? $_GET['PriceTo'] : ''}}" />
				</div>
			</div>
			<div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-right kt-hidden-mobile">&nbsp;</label>
                    <div class="col-lg-6 col-xl-6 text-left">
                        <button type="submit" class="btn btn-outline-brand Filter"> View</button>
                    </div>
                </div>
	</form>
			
							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
        <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero"></path>
    </g>
</svg>
										</span>
										<h3 class="kt-portlet__head-title">
											Orders
										</h3>
                                        <div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											&nbsp;
											<div class="dropdown1 dropdown-inline1">
												<a  class="btn btn-brand btn-icon-sm" href="{{url('/export')}}" target="_blank">
													<i class="flaticon2-plus"></i> Export
                                                </a>

											</div>
										</div>
									</div>
									</div>
								</div>
								<div class="kt-portlet__body">

									<!--begin: Search Form -->
									<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
										<div class="row align-items-center">
											<div class="col-md-3 order-2 order-xl-1">
												<div class="row align-items-center">
													<div class="col-md-12 kt-margin-b-20-tablet-and-mobile">
														<div class="kt-input-icon kt-input-icon--left">
															<input type="text" class="form-control generalSearch" id="generalSearch" placeholder="Search..." id="generalSearchUser">
															<span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!--end: Search Form -->
								</div>
								<div class="kt-portlet__body kt-portlet__body--fit">

									<!--begin: Datatable -->
									<div class="kt-datatable" id="child_data_local"></div>
									<div class="kt-datatable1" id="child_data_local"></div>

									<!--end: Datatable -->
								</div>
							</div>
						</div>
                        <!--begin::Page Scripts(used by this page) -->
                        <script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
						<script src="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		 <script src="./assets/script/orders.js" type="text/javascript"></script> 
     
		<script src="~/Content/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
@endsection
