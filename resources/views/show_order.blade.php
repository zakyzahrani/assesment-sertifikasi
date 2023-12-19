<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University</title>
    <link rel="icon" href="{{ asset('user/img/logo.png') }}" sizes="50" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>

<body>

    <x-navbar_user />
    <!-- START HISTORY -->
    <div class="container order-container riwayat-body">
        <div class="mt-5 flex-column justify-content-center align-items-center">
            <h1 class="display-5 text-center">Riwayat pengajuan</h1>

        <div class="table-data">
            <div class="order">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                <table id="myTable" class="">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pendaftaran</th>
                            <th>ID User</th>
                            <th>Nama Pendaftar</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Status</th>
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
                                <td>{{ $pendaftar->status_daftar }}</td>
                                <td>
                                    @if ($pendaftar->status_daftar == "Perlu Konfirmasi Admin")
                                        <span style="display: flex;">
                                            <form action="{{ route('show_edit', $pendaftar) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    Edit
                                                </button>
                                            </form>
                                            <form action="{{ route('delete_pendaftar', $pendaftar) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pendaftaran ini?');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    delete
                                                </button>
                                            </form>                                            
                                        </span>
                                    @else
                                        <span style="display: flex;">
                                            <form action="{{ route('show_edit', $pendaftar) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    Edit
                                                </button>
                                            </form>
                                            <form action="{{ route('delete_pendaftar', $pendaftar) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pendaftaran ini?');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    delete
                                                </button>
                                            </form>
                                            <form action="{{ route('pdf_user', $pendaftar->id) }}" method="post">
                                                @csrf
                                                <button class="btn btn-success" type="submit">Download PDF</button>
                                            </form>
                                        </span>
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
            
        </div>
    </div>
    <!-- END ORDER HISTORY -->
    <x-footer_user />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>    
    <script src="{{ asset('admin/assets/script.js') }}"></script>
    <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>
</body>

</html>