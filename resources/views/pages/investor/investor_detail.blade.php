@extends('welcome')

<!-- styles set and use in welcome class as master -->
@section('style')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    input {
        height: 30px;
        border-radius: 5px;
        width: 100%;
        box-sizing: border-box;
        border: none;
        background: #f2f2f2;
    }

    input.editable {
        background: #fff;
        cursor: text;
    }

    .expand-btn-container {
        text-align: left;
    }

    .toggle-btn {
        cursor: pointer;
        width: 44px;
        height: 21px;
        font-size: x-small;
        cursor: pointer;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
    }

    .detail-row {
        display: none;
        background-color: #f9f9f9;
    }

    .detail-table {
        width: 100%;
        border-collapse: collapse;
    }

    .detail-table th,
    .detail-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .detail-table th {
        background-color: #f2f2f2;
    }

    .action-btn {
        width: 44px;
        height: 21px;
        font-size: x-small;
        cursor: pointer;
        background: #007bff;
        color: white;
        border: none;
        /* padding: 5px 10px; */
        border-radius: 4px;
    }

    .action-btn.edit {
        background: #28a745;
    }

    .action-btn.save {
        background: #ffc107;
    }

    .action-btn.cancel {
        background: #dc3545;
    }

    .action-btn.delete {
        background: #dc3545;
    }

    .action-btn.add {
        background: #007bff;
    }

    .action-btn.hidden {
        display: none;
    }

    @media screen and (max-width: 768px) {

        th,
        td {
            padding: 12px 8px;
        }

        .toggle-btn,
        .action-btn {
            padding: 3px 5px;
        }

        input {
            font-size: 14px;
        }

        .table-container {
            overflow-x: auto;
        }

        .detail-table th,
        .detail-table td {
            padding: 6px;
        }

        .detail-table th {
            font-size: 14px;
        }
    }

    @media screen and (max-width: 480px) {

        th,
        td {
            padding: 8px 4px;
        }

        .toggle-btn,
        .action-btn {
            padding: 2px 4px;
            font-size: 12px;
        }

        input {
            font-size: 12px;
        }

        .table-container {
            overflow-x: auto;
        }

        .detail-table th,
        .detail-table td {
            padding: 4px;
        }

        .detail-table th {
            font-size: 12px;
        }
    }
</style>
@endsection

@section('pagetitle')
<h2 class="text-white font-weight-bold my-2 mr-5">Investor Detail's</h2>
@endsection

@section('content')

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                <div class="d-flex flex-column-fluid">
                    <div class="container" style="max-width: 99%;">
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
                                    <h3 class="card-label">Investor list
                                        <span class="d-block text-muted pt-2 font-size-sm">extended pagination options</span>
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline mr-2">
                                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                                        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                                    </g>
                                                </svg>
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
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-pdf-o"></i>
                                                        </span>
                                                        <span class="navi-text">PDF</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-primary font-weight-bolder">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>New Record</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <h2 class="text-white font-weight-bold my-2 mr-5">Investor Details</h2>
                                    <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
                                    <div class="container-fluid">
                                        <div class="table-container">
                                            @foreach ($shipments as $investor)

                                            <table id="collapsibleTable">
                                                <thead>
                                                    <tr>
                                                        <th>Investor #</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>CNIC</th>
                                                        <th>Phone</th>
                                                        <th class="expand-btn-container"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="collapsible-row" data-investor-id="{{$investor->id}}">

                                                        <td><input type="text" value="{{$investor->id}}" readonly></td>
                                                        <td><input type="text" value="{{$investor->first_name}}" readonly></td>
                                                        <td><input type="email" value="{{$investor->email}}" readonly></td>
                                                        <td><input type="text" value="Address ... " readonly></td>
                                                        <td><input type="text" value="{{$investor->cnic}}" readonly></td>
                                                        <td><input type="text" value="{{$investor->phone}}" readonly></td>
                                                        <td class="expand-btn-container">
                                                            <button class="toggle-btn">+</button>
                                                            <button class="action-btn edit">Edit</button>
                                                            <button class="action-btn add">Add</button>
                                                            <button class="action-btn save hidden">Save</button>
                                                            <button class="action-btn cancel hidden">Cancel</button>
                                                        </td>
                                                    </tr>
                                                    <tr class="detail-row">
                                                        <td colspan="7">
                                                            <div class="table-container">
                                                                <table class="detail-table" class="shipmentsTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Shipment</th>
                                                                            <th>Amount</th>
                                                                            <th>Container</th>
                                                                            <th>Cycle Days</th>
                                                                            <th>Processing</th>
                                                                            <th>Return</th>
                                                                            <th>Created</th>
                                                                            <!-- <th>Investor</th> -->
                                                                            <th>Profit</th>
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if ($investor)
                                                                        @forelse ($investor->shipments as $shipment)
                                                                        <tr data-id="{{ $shipment->id }}" data-delete-url="{{ route('shipment.destroy', $shipment->id) }}" data-update-url="{{ route('shipment.update', $shipment->id) }}" data-investor-id="{{$investor->id}}">
                                                                            <td><input type="text" name="id" value="{{ $shipment->id }}" readonly ></td>
                                                                            <td><input type="number" name="amount" value="{{ $shipment->amount }}" readonly required></td>
                                                                            <td><input type="number" name="container_id" value="{{ $shipment->container_id }}" readonly required></td>
                                                                            <td><input type="number" name="user_container_cycle_id" value="{{ $shipment->user_container_cycle }}" readonly required></td>
                                                                            <td><input type="date" name="processing_date" value="{{ \Carbon\Carbon::parse($shipment->processing_date)->format('Y-m-d') }}" readonly required></td>
                                                                            <td><input type="date" name="return_date" value="{{ \Carbon\Carbon::parse($shipment->return_date)->format('Y-m-d') }}" readonly required></td>
                                                                            <td><input type="date" name="current_date" value="{{ \Carbon\Carbon::parse($shipment->current_date)->format('Y-m-d') }}" readonly required></td>
                                                                            <!-- <td><input type="text" name="investor_id" value="{{ $shipment->user_id }}" readonly></td> -->
                                                                            <td><input type="number" name="profit" value="{{ $shipment->profit }}" readonly required></td>
                                                                            <td>
                                                                                <button class="action-btn edit" onclick="handleEdit(this)">Edit</button>
                                                                                <button class="action-btn save hidden" onclick="handleSave(this)">Save</button>
                                                                                <button class="action-btn cancel hidden" onclick="handleCancel(this)">Cancel</button>
                                                                                <button class="action-btn delete" onclick="handleDelete(this)">Delete</button>
                                                                            </td>
                                                                        </tr>
                                                                        @empty
                                                                        <tr>
                                                                            <td colspan="9">No data found</td>
                                                                        </tr>
                                                                        @endforelse
                                                                        @else
                                                                        <tr>
                                                                            <td colspan="9">Investor not found</td>
                                                                        </tr>
                                                                        @endif

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- Add more rows as needed -->
                                                </tbody>
                                            </table>
                                            </br>
                                            </br>
                                            @endforeach
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

@section('script')

<script>
    // enable the shipment fields
    function handleEdit(button) {
        const row = button.closest('tr');
        row.querySelectorAll('input').forEach(input => input.removeAttribute('readonly'));
        row.querySelector('.edit').classList.add('hidden');
        row.querySelector('.save').classList.remove('hidden');
        row.querySelector('.cancel').classList.remove('hidden');
    }

    // update the shipment data
    function handleSave(button) {
        const row = button.closest('tr');
        const data = {};
        row.querySelectorAll('input').forEach(input => {
            data[input.name] = input.value;
            input.setAttribute('readonly', true);
        });

        const investorId = button.closest('tr').getAttribute('data-investor-id');
        data['investor_id'] = investorId;

        data['api'] = 'apicall';

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const updateUrl = row.getAttribute('data-update-url');

        fetch(updateUrl, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    toastr.success(data.message, "Success");

                    row.querySelector('input[name="id"]').value = data.data.id;

                } else {
                    toastr.info(data.message, "Info");
                }
            })
            .catch(error => {
                toastr.error(data.message, "Exception");
                console.error('Error:', error);
            });

        row.querySelector('.edit').classList.remove('hidden');
        row.querySelector('.save').classList.add('hidden');
        row.querySelector('.cancel').classList.add('hidden');
    }

    // cancel the action
    function handleCancel(button) {
        const row = button.closest('tr');
        console.log('Handling cancel for row:', row);
        row.querySelectorAll('input').forEach(input => input.setAttribute('readonly', true));
        row.querySelector('.edit').classList.remove('hidden');
        row.querySelector('.save').classList.add('hidden');
        row.querySelector('.cancel').classList.add('hidden');
    }

    // delete the shipment data
    function handleDelete(button) {
        const row = button.closest('tr');
        const data = {};
        row.querySelectorAll('input').forEach(input => {
            data[input.name] = input.value;
        });

        data['api'] = 'apicall';

        const deleteUrl = row.getAttribute('data-delete-url');

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    toastr.success(data.message, "Success");

                    row.remove();

                } else {

                    toastr.info(data.message, "Info");
                }
            })
            .catch(error => {

                console.error('Error:', error);
                toastr.error(data.message, "Error");
            });
    }

    // New shipment
    function handleCreate(button) {
        const row = button.closest('tr');
        const data = {};
        row.querySelectorAll('input').forEach(input => {
            data[input.name] = input.value;
            input.setAttribute('readonly', true);
        });
        const investorId = button.closest('tr').getAttribute('data-investor-id');
        data['investor_id'] = investorId;

        data['api'] = 'apicall';

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch("{{ route('shipment.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    toastr.success(data.message, "Success");

                    row.setAttribute('data-id', data.data.id);
                    row.setAttribute('data-update-url', "{{ route('shipment.update', '') }}/" + data.data.id);

                    const saveButton = row.querySelector('.save');
                    saveButton.setAttribute('onclick', 'handleSave(this)');
                    saveButton.classList.add('hidden');

                    const editButton = row.querySelector('.edit');
                    editButton.classList.remove('hidden');

                    const cancelButton = row.querySelector('.cancel');
                    cancelButton.classList.add('hidden');

                    row.querySelector('input[name="id"]').value = data.data.id;

                } else {
                    toastr.info(data.message, "Info");
                }
            })
            .catch(error => {

                console.error('Error:', error);
                toastr.error(data.message, "Error");

            });

        row.querySelector('.edit').classList.remove('hidden');
        row.querySelector('.save').classList.add('hidden');
        row.querySelector('.cancel').classList.add('hidden');
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Toggle functionality for collapsible rows
        const toggleButtons = document.querySelectorAll('.toggle-btn');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const detailRow = row.nextElementSibling;

                if (detailRow.style.display === 'none' || detailRow.style.display === '') {
                    detailRow.style.display = 'table-row';
                    this.textContent = '-';
                } else {
                    detailRow.style.display = 'none';
                    this.textContent = '+';
                }
            });
        });

        // Edit functionality for rows in the main table
        document.querySelectorAll('.action-btn.edit').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const inputs = row.querySelectorAll('input');
                const editBtn = row.querySelector('.action-btn.edit');
                const saveBtn = row.querySelector('.action-btn.save');
                const cancelBtn = row.querySelector('.action-btn.cancel');

                inputs.forEach(input => {
                    input.classList.add('editable');
                    input.removeAttribute('readonly');
                });

                editBtn.classList.add('hidden');
                saveBtn.classList.remove('hidden');
                cancelBtn.classList.remove('hidden');
            });
        });

        // Save functionality for rows in the main table
        document.querySelectorAll('.action-btn.save').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const inputs = row.querySelectorAll('input');
                const editBtn = row.querySelector('.action-btn.edit');
                const saveBtn = row.querySelector('.action-btn.save');
                const cancelBtn = row.querySelector('.action-btn.cancel');

                inputs.forEach(input => {
                    input.classList.remove('editable');
                    input.setAttribute('readonly', 'readonly');
                });

                editBtn.classList.remove('hidden');
                saveBtn.classList.add('hidden');
                cancelBtn.classList.add('hidden');
            });
        });

        // Cancel functionality for rows in the main table
        document.querySelectorAll('.action-btn.cancel').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const inputs = row.querySelectorAll('input');
                const editBtn = row.querySelector('.action-btn.edit');
                const saveBtn = row.querySelector('.action-btn.save');
                const cancelBtn = row.querySelector('.action-btn.cancel');

                inputs.forEach(input => {
                    input.classList.remove('editable');
                    input.setAttribute('readonly', 'readonly');
                });

                editBtn.classList.remove('hidden');
                saveBtn.classList.add('hidden');
                cancelBtn.classList.add('hidden');
            });
        });

        // Delete functionality for detail table rows
        document.querySelectorAll('.action-btn.delete').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                // row.remove();
            });
        });

        // Add new row functionality
        document.querySelectorAll('.action-btn.add').forEach(button => {
            button.addEventListener('click', function() {
                const detailRow = this.closest('tr').nextElementSibling;
                const detailTable = detailRow.querySelector('.detail-table tbody');
                const newRow = document.createElement('tr');
                const investorId = this.closest('tr').getAttribute('data-investor-id');
                newRow.setAttribute('data-investor-id', investorId);
                // <td><input type="text"   name="investor_id"       value="${investorId}" readonly></td>

                newRow.innerHTML = `
                        <td><input type="text"   name="id"                value="" readonly></td>
                        <td><input type="number" name="amount"            value="" required></td>
                        <td><input type="number" name="container_id"      value="" required></td>
                        <td><input type="number" name="user_container_cycle_id"      value="" required></td>
                        <td><input type="date"   name="processing_date"   value="" required></td>
                        <td><input type="date"   name="return_date"       value="" required></td>
                        <td><input type="date"   name="current_date"      value="" required></td>
                        <td><input type="number" name="profit"            value="" required></td>
                        <td>
                            <button class="action-btn edit hidden" onclick="handleEdit(this)">Edit</button>
                            <button class="action-btn save" onclick="handleCreate(this)">Save</button>
                            <button class="action-btn cancel hidden" onclick="handleCancel(this)" >Cancel</button>
                            <button class="action-btn delete" onclick="handleDelete(this)">Delete</button>
                        </td>
                    `;

                detailTable.appendChild(newRow);

                // Add event listeners for the new row
                newRow.querySelector('.action-btn.edit').addEventListener('click', function() {
                    const row = this.closest('tr');
                    const inputs = row.querySelectorAll('input');
                    const editBtn = row.querySelector('.action-btn.edit');
                    const saveBtn = row.querySelector('.action-btn.save');
                    const cancelBtn = row.querySelector('.action-btn.cancel');

                    inputs.forEach(input => {
                        input.classList.add('editable');
                        input.removeAttribute('readonly');
                    });

                    editBtn.classList.add('hidden');
                    saveBtn.classList.remove('hidden');
                    cancelBtn.classList.remove('hidden');
                });

                newRow.querySelector('.action-btn.save').addEventListener('click', function() {
                    const row = this.closest('tr');
                    const inputs = row.querySelectorAll('input');
                    const editBtn = row.querySelector('.action-btn.edit');
                    const saveBtn = row.querySelector('.action-btn.save');
                    const cancelBtn = row.querySelector('.action-btn.cancel');

                    inputs.forEach(input => {
                        input.classList.remove('editable');
                        input.setAttribute('readonly', 'readonly');
                    });

                    editBtn.classList.remove('hidden');
                    saveBtn.classList.add('hidden');
                    cancelBtn.classList.add('hidden');
                });

                newRow.querySelector('.action-btn.cancel').addEventListener('click', function() {
                    const row = this.closest('tr');
                    const inputs = row.querySelectorAll('input');
                    const editBtn = row.querySelector('.action-btn.edit');
                    const saveBtn = row.querySelector('.action-btn.save');
                    const cancelBtn = row.querySelector('.action-btn.cancel');

                    inputs.forEach(input => {
                        input.classList.remove('editable');
                        input.setAttribute('readonly', 'readonly');
                    });

                    editBtn.classList.remove('hidden');
                    saveBtn.classList.add('hidden');
                    cancelBtn.classList.add('hidden');
                });

                newRow.querySelector('.action-btn.delete').addEventListener('click', function() {
                    const row = this.closest('tr');
                    row.remove();
                });
            });
        });
    });
</script>

@endsection
