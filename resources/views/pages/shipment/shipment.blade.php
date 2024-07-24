@extends('welcome')

@section('style')
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/shipment.style.css') }}" rel="stylesheet" type="text/css" />

<style>
    .dropdown-custom-width .dropdown-menu {
        width: 200px; /* Set your desired width here */
    }
</style>

@endsection


@section('pagetitle')
<h2 class="text-white font-weight-bold my-2 mr-5">Shipment's</h2>
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
                            <div class="card-header flex-wrap py-5">
                                <div class="card-title">
                                    <h3 class="card-label">Shipment list
                                        <span class="d-block text-muted pt-2 font-size-sm">extended pagination options</span>
                                    </h3>
                                </div>
                                <div class="card-toolbar">

                                <div class="dropdown dropdown-inline mr-2">
                                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-download"></i>
                                            </span>Export</button>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="la la-print"></i>
                                                        </span>
                                                        <span class="navi-text">Print</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="la la-copy"></i>
                                                        </span>
                                                        <span class="navi-text">Copy</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-excel-o"></i>
                                                        </span>
                                                        <span class="navi-text">Excel</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-text-o"></i>
                                                        </span>
                                                        <span class="navi-text">CSV</span>
                                                    </a>
                                                </li>
                                                <form id="pdfForm" action="{{ route('shipment.previewPdf') }}" method="GET">
                                                    <input type="hidden" name="date_range" id="pdfDateRange" value="{{ request('date_range') }}">
                                                    <input type="hidden" name="investor_id" id="pdfInvestorId" value="{{ request('investor_id') }}">
                                                    @csrf
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link" id="pdfButton">
                                                            <span class="navi-icon">
                                                                <i class="la la-file-pdf-o"></i>
                                                            </span>
                                                            <span class="navi-text">PDF</span>
                                                        </a>
                                                    </li>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>

                                    <a href="{{ route('shipment.create') }}" class="btn btn-primary font-weight-bolder" id="openModalBtn">
                                            <i class="la la-plus"></i>
                                        </span>New Record
                                    </a>
                                </div>
                            </div>


                            <div class="card card-custom">
                                <form class="form" action="{{ route('shipment.filter') }}", method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label class="col-form-label text-left">Date</label>
                                                <div class='input-group' style="width: 100%;" id='kt_daterangepicker_6'>
                                                    <input type='text' name="date_range"  id="dateRange" class="form-control" readonly="readonly" placeholder="Select date range" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label class="col-form-label text-left">Investor</label>
                                                <div class='input-group' style="width: 100%;" id='kt_daterangepicker_7'>
                                                    <select name="investor_id" class="form-control  dropdown-custom-width" id="investorSelect">
                                                        <option value="">Select </option>
                                                        @foreach ($investors as $investor)
                                                            <option value="{{ $investor->id }}" >{{ $investor->first_name . " " . $investor->last_name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-2">Filter</button>
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card-body">
                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                                    <thead>
                                        <tr>
                                            <th>Shipment</th>
                                            <th>Amount</th>
                                            <th>Container</th>
                                            <th>Processing</th>
                                            <th>Return</th>
                                            <th>Created</th>
                                            <th>Investor</th>
                                            <th>Profit</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shipments as $index => $shipment)

                                        <tr>
                                            <td>{{$shipment->id}}</td>

                                            <td>{{$shipment->amount}}</td>
                                            <td>{{$shipment->container_id}}</td>
                                            <td>{{$shipment->processing_date}}</td>
                                            <td>{{$shipment->return_date}}</td>
                                            <td>{{$shipment->current_date}}</td>
                                            <td>{{ $shipment->user->first_name ?? '' }} {{ $shipment->user->last_name ?? '' }}</td>
                                            <td>{{$shipment->profit}}</td>
                                            <td nowrap="nowrapp">

                                                <a href="{{route('shipment.edit', $shipment->id )}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                                                    <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <form action="{{ route('shipment.destroy', $shipment->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js') }}"></script>

<script>
        document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('pdfButton').addEventListener('click', function (event) {
            event.preventDefault(); 

            document.getElementById('pdfForm').submit();
    });
});
</script>

@endsection
