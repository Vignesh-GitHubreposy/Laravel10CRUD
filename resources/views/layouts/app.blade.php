<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- Scripts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style src="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"></style>
        <style src="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"></style>
        <style>
            .toolbar {
                float: left;
            }

            div.dataTables_filter input {
                width: 300px;
            }
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
                        "render": function (data) {
                            return '<a href="employees/edit/' + data +'" class="btn btn-primary btn-sm text-white" > <i class="fa-solid fa-pen-to-square"></i> Edit</a><a href="employees/' +
                                data +'" class="btn btn-danger btn-sm text-white"/><i class="fa-solid fa-trash-can"></i> Delete</a> ';
                        }
                    },

                    ],
                });
                // $('div.toolbar').html('<button type="button" name="new" class="btn btn-sm btn-info" onClick="alert(`Added..`)"> + New Cucstomer</button>');
            });
        </script>
         {{-- @push('scripts') --}}
         @if (session()->has('editdata'))
             <script>
                 $(document).ready(function() {
                     $('#staticBackdrop2').modal('show');
                 });
             </script>
         @endif
     {{-- @endpush --}}
    </body>
</html>
