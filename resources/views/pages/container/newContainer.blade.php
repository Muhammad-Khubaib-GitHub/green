@extends('welcome')

@section('pagetitle')
<h2 class="text-white font-weight-bold my-2 mr-5">New Container</h2>
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
                                            <form class="form" id="kt_form" onsubmit="return validateForm()">
                                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                    <h4 class="mb-10 font-weight-bold text-dark">Add New Container</h4>
                                                    <div class="form-group">
                                                        <label>Investor Name</label>
                                                        <select name="country" class="form-control" id="investorSelect">
                                                            <option value="">Select </option>
                                                            <option value="AF"> Amir shah </option>
                                                            <option value="GB"> Usman Akram </option>
                                                            <option value="US"> Nabeel Ahmad </option>
                                                            <option value="ZW"> Ali Ahmad </option>
                                                        </select>
                                                        <span class="form-text text-danger error-msg" style="display: none;">Please select an investor.</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Select Container</label>
                                                        <select name="country" class="form-control" id="containerSelect">
                                                            <option value="">Select</option>
                                                            <option value="AF">Afghanistan</option>
                                                            <option value="GB">United Kingdom</option>
                                                            <option value="US">United States</option>
                                                            <option value="ZW">Zimbabwe</option>
                                                        </select>
                                                        <span class="form-text text-danger error-msg" style="display: none;">Please select a container.</span>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>Amount</label>
                                                                <input type="number" min=1 class="form-control" name="amount" placeholder="1000" value="" />
                                                                <span class="form-text text-danger error-msg" style="display: none;">Please enter container amount.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>Profit</label>
                                                                <input type="number" min=1 class="form-control" name="profit" placeholder="10" value="" />
                                                                <span class="form-text text-danger error-msg" style="display: none;">Please enter profit.</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>Prcessing Date</label>
                                                                <input type="date" class="form-control" name="processingDate" placeholder="dd/mm/yyyy" value="" />
                                                                <span class="form-text  text-danger error-msg" style="display: none;">Please select date.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label>Return Date</label>
                                                                <input type="date" class="form-control" name="returnDate" placeholder="dd/mm/yyyy" value="" />
                                                                <span class="form-text text-danger error-msg" style="display: none;">Please select date.</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Return Date</label>
                                                        <input type="date" class="form-control" name="returnDate" placeholder="dd/mm/yyyy" value="" />
                                                        <span class="form-text text-danger error-msg" style="display: none;">Please select date.</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                    <div class="mr-2">
                                                        <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 close">Cancel</button>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
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
