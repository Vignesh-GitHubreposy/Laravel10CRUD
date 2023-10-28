<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Employees') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-grid gap-2 d-md-block">
                        <div class="container">
                            <div class="row justify-content-center">
                                @error('status')
                                    <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                                @enderror
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header ">{{ __('Employee List') }} <button type="button"
                                                name="new"
                                                class="btn btn-sm btn-primary bg-primary text-white float-end"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                                    class="fa-solid fa-user-plus"></i> Add New
                                                Employee</button>
                                        </div>

                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <table id="example" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Employee ID</th>
                                                        <th>Employee Name</th>
                                                        <th>EMployee Mobile No</th>
                                                        <th>Employee Email Id</th>
                                                        <th>Employee DOB</th>
                                                        <th>Employee Address</th>
                                                        <th>Employee Designation</th>
                                                        <th>Employee DOJ</th>
                                                        <th>Employee Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                {{-- {{ dd($employees) }} --}}

                                                {{-- @foreach ($employees as $employee)
                                                <tr>
                                                    <td>{{ $employee->emp_id }}</td>
                                                </tr>
                                                @endforeach --}}
                                                <tfoot>
                                                    <tr>
                                                        <th>Employee ID</th>
                                                        <th>Employee Name</th>
                                                        <th>EMployee Mobile No</th>
                                                        <th>Employee Email Id</th>
                                                        <th>Employee DOB</th>
                                                        <th>Employee Address</th>
                                                        <th>Employee Designation</th>
                                                        <th>Employee DOJ</th>
                                                        <th>Employee Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            {{-- {!! $employees->links() !!} --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add New Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" name="addemployee" action="/employees" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="emp_name" class="form-label">Employee Name</label>
                                <input type="text" name="emp_name"
                                    class="form-control @error('emp_name') is-invalid @else is-valid @enderror"
                                    id="emp_name" placeholder="Enter Employee Name" required
                                    value="{{ old('emp_name') }}">
                                @error('emp_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emp_phno" class="form-label">Employee Mobile Number</label>
                                <input type="text" name="emp_phno"
                                    class="form-control @error('emp_phno') is-invalid @else is-valid @enderror"
                                    id="emp_phno" placeholder="Enter Employee Mobile Number with Country code" required
                                    onkeyup="if (/[^\d\+\(\)\-]/g.test(this.value)) this.value = this.value.replace(/[^\d\+\(\)\-]/g,'')"
                                    value="{{ old('emp_phno') }}">
                                @error('emp_phno')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emp_email" class="form-label">Employee Email Id</label>
                                <input type="email" name="emp_email"
                                    class="form-control @error('emp_email') is-invalid @else is-valid @enderror"
                                    id="emp_email" placeholder="Enter Employee Email Id" required
                                    value="{{ old('emp_email') }}">
                                @error('emp_email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emp_dob" class="form-label">Employee DOB</label>
                                <input type="date" name="emp_dob"
                                    class="form-control @error('emp_dob') is-invalid @else is-valid @enderror"
                                    id="emp_dob" placeholder="Enter Employee DOB" required
                                    value="{{ old('emp_dob') }}">
                                @error('emp_dob')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emp_address" class="form-label">Employee Address</label>
                                <textarea class="form-control @error('emp_address') is-invalid @else is-valid @enderror" name="emp_address"
                                    id="emp_address" rows="2" required>{{ old('emp_address') }}</textarea>
                                @error('emp_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emp_designation" class="form-label">Employee Designation</label>
                                <input type="text" name="emp_designation"
                                    class="form-control @error('emp_designation') is-invalid @else is-valid @enderror"
                                    id="emp_designation" placeholder="Enter Employee Designation" required
                                    value="{{ old('emp_designation') }}">
                                @error('emp_designation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emp_doj" class="form-label">Employee Date of Joining</label>
                                <input type="date" name="emp_doj"
                                    class="form-control @error('emp_doj') is-invalid @else is-valid @enderror"
                                    id="emp_doj" placeholder="Enter Employee Date of Joining" required
                                    value="{{ old('emp_doj') }}">
                                @error('emp_doj')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emp_photo" class="form-label">Upload Employee Photo</label>
                                <input class="form-control @error('emp_photo') is-invalid @else is-valid @enderror"
                                    type="file" name="emp_photo" id="emp_photo" required
                                    value="{{ old('emp_photo') }}">
                                @error('emp_photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary bg-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" class="btn btn-primary bg-primary"
                                id="submitform">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- update Employee --}}
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                @if (session()->has('editdata'))
                    @php
                        $editdata = session()->get('editdata');
                        //dd($editdata);
                    @endphp
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update Employee #{{ $editdata[0]->id }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" name="addEmployee" action="/employees" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label for="emp_name" class="form-label">Employee Name</label>
                                    <input type="text" name="emp_name"
                                        class="form-control @error('emp_name') is-invalid @else is-valid @enderror"
                                        id="emp_name" placeholder="Enter Employee Name" required
                                        value="{{ $editdata[0]->name }}" />
                                    @error('emp_name')
                                        <div class=" alert alert-danger">{{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="emp_phno" class="form-label">Mobile No</label>
                                    <input type="text" name="emp_phno"
                                        class="form-control @error('emp_phno') is-invalid @else is-valid @enderror"
                                        id="emp_phno" placeholder="Enter Employee Mobile Number with Country code"
                                        onkeyup="if (/[^\d\+\(\)\-]/g.test(this.value)) this.value = this.value.replace(/[^\d\+\(\)\-]/g,'')"
                                        required value="{{ $editdata[0]->emp_phno }}" />
                                    @error('emp_phno')
                                        <div class=" alert alert-danger">{{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="emp_email" class="form-label">Email address</label>
                                    <input type="emp_email" name="emp_email"
                                        class="form-control @error('emp_email') is-invalid @else is-valid @enderror"
                                        id="emp_email" placeholder="Enter Employee Email Id" required
                                        value="{{ $editdata[0]->emp_email }}" />
                                    @error('emp_email')
                                        <div class=" alert alert-danger">{{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="emp_dob" class="form-label">Employee Date of Birth</label>
                                    <input type="date" name="emp_dob"
                                        class="form-control @error('emp_dob') is-invalid @else is-valid @enderror"
                                        id="emp_dob" placeholder="Enter Employee DOB" required
                                        value="{{ $editdata[0]->emp_dob }}" />
                                    @error('emp_dob')
                                        <div class=" alert alert-danger">{{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="emp_address" class="form-label">Employee Address</label>
                                    <textarea class="form-control @error('emp_address') is-invalid @else is-valid @enderror" name="emp_address"
                                        id="emp_address" rows="2" required>{{ $editdata[0]->emp_address }}</textarea>
                                    @error('emp_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="emp_designation" class="form-label">Employee Designation</label>
                                    <input type="text" name="emp_designation"
                                        class="form-control @error('emp_designation') is-invalid @else is-valid @enderror"
                                        id="emp_designation" placeholder="Enter Employee Name" required
                                        value="{{ $editdata[0]->emp_designation }}" />
                                    @error('emp_designation')
                                        <div class=" alert alert-danger">{{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="emp_doj" class="form-label">Employee Date of Joining</label>
                                    <input type="date" name="emp_doj"
                                        class="form-control @error('emp_doj') is-invalid @else is-valid @enderror"
                                        id="emp_doj" placeholder="Enter Employee DOJ" required
                                        value="{{ $editdata[0]->emp_doj }}" />
                                    @error('emp_doj')
                                        <div class=" alert alert-danger">{{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="emp_photo" class="form-label">Upload Employee Photo</label>
                                    <input
                                        class="form-control @error('emp_photo') is-invalid @else is-valid @enderror"
                                        type="file" name="emp_photo" id="emp_photo"
                                        value="{{ $editdata[0]->emp_photo }}" />
                                    <span>Uploaded Employee Photo : {{ $editdata[0]->emp_photo }} </span><br>
                                    <img src="storage/profile/{{ $editdata[0]->emp_photo }}" width="50px">
                                    @error('emp_photo')
                                        <div class="alert alert-danger">{{ $message }} </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="prev_image" value="{{ $editdata[0]->emp_photo }}" />
                                <input type="hidden" name="id" value="{{ $editdata[0]->emp_id }}" />
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-primary" id="submitform">Update
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        @push('scripts')
            <style src="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"></style>
            {{-- <style src="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"></style> --}}
            <style>
                .toolbar {
                    float: left;
                }

                div.dataTables_filter input {
                    width: 300px;
                }
            </style>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
            <script>
                //add Employee

                $(document).ready(function() {
                    $(".alert").delay(9000).slideUp(300).fadeOut(300);
                });
                //update Employee
                $(document).ready(function() {
                    $("input[name='emp_phno']").keyup(function() {
                        $(this).val($(this).val().replace(/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/,
                            "($1) $2-$3-$4"));
                    });
                });
                //datatable process
                $(document).ready(function() {
                    // $('#example').DataTable();
                    $('#example').DataTable({
                        // dom: '<"toolbar">frtip',
                        processing: true,
                        ajax: {
                            url: 'employees',
                            dataSrc: '',
                        },
                        columns: [{
                                data: 'emp_id'
                            },
                            {
                                data: 'emp_name'
                            },
                            {
                                data: 'emp_phno'
                            },
                            {
                                data: 'emp_email'
                            },
                            {
                                data: 'emp_dob'
                            },
                            {
                                data: 'emp_address'
                            },
                            {
                                data: 'emp_designation'
                            },
                            {
                                data: 'emp_doj'
                            },
                            {
                                data: 'emp_photo',
                                "render": function(data) {
                                    return '<img src="storage/profile/' + data + '" width="40px">';
                                }
                            },
                            {
                                data: 'emp_id',
                                "render": function(data) {
                                    return '<a href="employees/' + data +
                                        '" class="btn btn-primary btn-sm text-white" > <i class="fa-solid fa-pen-to-square"></i> Edit</a><a href="employees/' +
                                        data +
                                        '" class="btn btn-danger btn-sm text-white"/><i class="fa-solid fa-trash-can"></i> Delete</a> ';
                                }
                            },

                        ],
                    });
                    // $('div.toolbar').html('<button type="button" name="new" class="btn btn-sm btn-info" onClick="alert(`Added..`)"> + New Cucstomer</button>');
                });
            </script>
            @if (session()->has('editdata'))
                <script>
                    $(document).ready(function() {
                        $('#staticBackdrop2').modal('show');
                    });
                </script>
            @endif
        @endpush

</x-app-layout>
