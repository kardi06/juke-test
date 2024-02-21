@extends('admin.app')

@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Profile</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div><!-- /.col -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('dashboard-profile.create') }}" class="btn btn-md btn-primary mb-3"><i
                                class="fa fa-plus mr-2"></i>Create</a>

                        <table id="table-profile" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fullname</th>
                                    <th>Username</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @foreach ($profil as $prof)
                                    <tr>
                                        <td>{{ $num }}</td>
                                        <td>{{ $prof->first_name }} {{ $prof->last_name }}</td>
                                        <td>{{ $prof->username }}</td>
                                        <td>{{ $prof->city }}</td>
                                        <td>{{ $prof->state }}</td>
                                        <td>{{ $prof->zip_code }}</td>
                                        <td>{{ $prof->address }}</td>
                                        <td align="center"><a href="{{ route('dashboard-profile.edit', $prof->id) }}"
                                                class="btn btn-md btn-success mb-2 mr-2"><i class="fa fa-pen"></i></a><a
                                                onclick="delete_profile({{$prof->id}},'{{$prof->first_name}}','{{$prof->last_name}}')"
                                                class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    @php
                                        $num++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('tambah_style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ url('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('tambah_script')
    <script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(function() {
            $('#table-profile').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        function delete_profile(id, nama,last_name) {
            var id = id;
            // var nomor = String(no);
            // console.log(id);
            swal.fire({
                title: 'Apakah Anda Yakin Menghapus Profil ' + nama + ' ' + last_name + '?',
                text: "Data tidak bisa dikembalikan",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/dashboard-profile/') }}/" + id,
                        // dataType:"JSON",
                        data: {
                            '_method': 'DELETE',
                            '_token': "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(data) {
                            swal.fire(
                                'Deleted!',
                                'Profile has beed deleted.',
                                'success'
                            )
                            setTimeout(function() { // wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 500);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // console.log(textStatus);
                            // console.log(jqXHR);
                            swal.fire(
                                'Error!',
                                'Try again',
                                'info'
                            )
                        }
                    });

                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    swal.fire(
                        'Cancelled',
                        'Data still save :)',
                        'error'
                    )
                }
            });
        }
    </script>
    @if ($message = Session::get('simpan'))
        <script type="text/javascript">
            swal.fire(
                'Success!',
                'Profile Has Been Added',
                'success'
            )
        </script>
    @elseif($message = Session::get('update'))
        <script type="text/javascript">
            swal.fire(
                'Success!',
                'Profile Has Been Updated',
                'success'
            )
        </script>
    @endif
@endsection
