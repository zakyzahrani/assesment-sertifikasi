<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('user/img/logo.png') }}">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/style.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <title>Validasi</title>
</head>

<body>
    <x-sidebar-admin />
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Pendaftar</h1>
            </div>

        </div>

        <div class="table-data">
            <div class="order">

                <table id="myTable" class="">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pendaftaran</th>
                            <th>ID User</th>
                            <th>Nama Pendaftar</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        @foreach ($pendaftar as $pendaftar)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $pendaftar->id }}</td>
                                <td>{{ $pendaftar->user_id }}</td>
                                <td>{{ $pendaftar->name }}</td>
                                <td>{{ $pendaftar->jenis_kelamin }}</td>
                                <td>{{ $pendaftar->email_daftar }}</td>
                                <td>                                    
                                @if ($pendaftar->status_daftar == "Perlu Konfirmasi Admin")
                                    <form action="{{ route('edit_pendaftar', $pendaftar) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-edit" style="color:green; font-size: 20px;"></i>
                                        </button>
                                    </form>
                                @else
                                    Approved
                                @endif
                                </td>
                            </tr>
                            <?php
                            $no++;
                            ?>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>
    <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="{{ asset('admin/assets/script.js') }}"></script>
    <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>
</body>

</html>
