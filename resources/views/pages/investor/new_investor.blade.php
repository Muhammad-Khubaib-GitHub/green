@extends('welcome')

@section('pagetitle')
<h2 class="text-white font-weight-bold my-2 mr-5">New Investor</h2>
@endsection

@section('content')

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="d-flex flex-column-fluid">
                    <div class="container">
                        <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                            <div class="alert-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="alert-text">The default page control presented by DataTables (forward and backward buttons with up to 7 page numbers in-between) is fine for most situations.
                                <br />For more info see
                                <a class="font-weight-bold" href="https://datatables.net/" target="_blank">the official home</a>of the plugin.
                            </div>
                        </div>
                        <div class="card card-custom">
                            <div class="card-body p-0">
                                <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                                    <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                                        <div class="col-xl-12 col-xxl-7">
                                        <form class="form" id="kt_form" action="{{ route('users.store') }}" method="POST">
                                            @csrf
                                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                    <h4 class="mb-10 font-weight-bold text-dark">Add New Investor</h4>

                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="" required/>
                                                                <span class="form-text text-danger error-msg" style="display: none;">Please enter first name.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" class="form-control" name="last_name" placeholder="last name" value="" required/>
                                                                <span class="form-text text-danger error-msg" style="display: none;">Please enter last name.</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" class="form-control" name="email" placeholder="abc@mail.com" value="" required/>
                                                                <span class="form-text  text-danger error-msg" style="display: none;">Please select valid email.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>Phone no</label>
                                                                <input type="text" class="form-control" name="phone_no" placeholder="0322-1224432" value="" required/>
                                                                <span class="form-text text-danger error-msg" style="display: none;">Please correct phone no.</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>CNIC</label>
                                                                <input type="text" class="form-control" name="cnic_no" placeholder="23456-9876543-2" value="" required/>
                                                                <span class="form-text text-danger error-msg" style="display: none;">Please select national ID No.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>Main Investor</label>
                                                                <select name="investor_id" class="form-control" id="investorSelect" required>
                                                                    <option value="">Select </option>
                                                                    @foreach ($investors as $investor)
                                                                        <option value="{{ $investor->id }}">{{ $investor->first_name . " " . $investor->last_name }} </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="form-text text-danger error-msg" style="display: none;">Please select an investor.</span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                    <div class="mr-2">
                                                        <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 close">Cancel</button>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
