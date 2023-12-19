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

    <title>Validasi Pengembalian</title>
    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ccc;
            margin-bottom: 0.5rem;
        }

        input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ccc;
            margin-bottom: 0.5rem;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>
    <x-sidebar-admin />
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>User Approval</h1>
            </div>

        </div>

        <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>form pendaftaran</h3>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
            <form role="form" method="post" action="{{ route('update_pendaftar', ['pendaftaran' => $pendaftaran->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>Nama Lengkap : </label><br>
                    <input class="form-control" type="text"name="name" value="{{ $pendaftaran->name }}" disabled/><br>
                    <label>Alamat KTP : </label><br>
                    <input class="form-control" type="text"name="alamat_ktp" value="{{ $pendaftaran->alamat_ktp }}"disabled/><br>
                    <label>Alamat Lengkap Saat Ini : </label><br>
                    <input class="form-control" type="text"name="alamat_lengkap" value="{{ $pendaftaran->alamat_lengkap }}"disabled/><br>
                    <label>Kecamatan : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kecamatan"
                            id="" class="form-control"value="{{ $pendaftaran->kecamatan }}"disabled>
                            @foreach ($districts as $district)
                                <option value="{{ $district->name }}" {{ $district->name == $pendaftaran->kecamatan ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>Kabupaten : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kabupaten"
                            id="" class="form-control"value="{{ $pendaftaran->kabupaten }}"disabled>
                            @foreach ($cities as $city)
                            <option value="{{ $city->name }}" {{ $city->name == $pendaftaran->kabupaten ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>Propinsi : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="provinsi"
                            id="" class="form-control"value="{{ $pendaftaran->provinsi }}"disabled>
                            @foreach ($provincies as $province)
                            <option value="{{ $province->name }}" {{ $province->name == $pendaftaran->provinsi ? 'selected' : '' }}>
                                {{ $province->name }}
                            </option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>No Telepon : </label><br>
                    <input class="form-control"type="number" name="no_telp" value="{{ $pendaftaran->no_telp }}"disabled/><br>
                    <label>No HP : </label><br>
                    <input class="form-control"type="number" name="no_hp" value="{{ $pendaftaran->no_hp }}"disabled/><br>
                    <label>Email : </label><br>
                    <input class="form-control" type="email"name="email_daftar" value="{{ $pendaftaran->email_daftar }}"disabled/><br>
                    <label>Kewarganegaraan : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kewarganegaraan"
                            id="" class="form-control"disabled>
                            <option value="WNI Asli" {{ $pendaftaran->kewarganegaraan == 'WNI Asli' ? 'selected' : '' }}>WNI Asli</option>
                            <option value="WNI Keturunan" {{ $pendaftaran->kewarganegaraan == 'WNI Keturunan' ? 'selected' : '' }}>WNI Keturunan</option>
                            <option value="WNA" {{ $pendaftaran->kewarganegaraan == 'WNA' ? 'selected' : '' }}>WNA</option>
                        </select><br>
                    </div>
                    <label>Tanggal Lahir : </label><br>
                    <input class="form-control" type="date"name="tanggal_lahir" value="{{ $pendaftaran->tanggal_lahir }}"disabled/><br>
                    <label>Tempat Lahir : </label><br>
                    <input class="form-control" type="text"name="tempat_lahir" value="{{ $pendaftaran->tempat_lahir }}"disabled/><br>
                    <label>Kota/Kabupaten Tempat Lahir: </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kabupaten_lahir"
                            id="" class="form-control" value="{{ $pendaftaran->kabupaten_lahir }}"disabled>
                            @foreach ($cities as $city)
                            <option value="{{ $city->name }}" {{ $city->name == $pendaftaran->kabupaten_lahir ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>Propinsi Tempat Lahir: </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="propinsi_lahir"
                            id="" class="form-control"value="{{ $pendaftaran->propinsi_lahir }}"disabled>
                            @foreach ($provincies as $province)
                            <option value="{{ $province->name }}" {{ $province->name == $pendaftaran->propinsi_lahir ? 'selected' : '' }}>
                                {{ $province->name }}
                            </option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>Jenis Kelamin : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="jenis_kelamin"
                            id="" class="form-control" value="{{ $pendaftaran->jenis_kelamin }}"disabled>
                            <option value="Pria" {{ $pendaftaran->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Wanita" {{ $pendaftaran->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                        </select><br>
                    </div>
                    <label>Status Menikah : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="status_menikah"
                            id="" class="form-control"value="{{ $pendaftaran->status_menikah }}"disabled>
                            <option value="Belum Menikah" {{ $pendaftaran->status_menikah == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                            <option value="Menikah" {{ $pendaftaran->status_menikah == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                            <option value="Lain-lain" {{ $pendaftaran->status_menikah == 'Lain-lain' ? 'selected' : '' }}>Lain-lain (janda/duda)</option>
                        </select><br>
                    </div>
                    <label>Agama : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="agama"
                            id="" class="form-control" value="{{ $pendaftaran->agama }}"disabled>
                            <option value="Islam" {{ $pendaftaran->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Katolik" {{ $pendaftaran->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Kristen" {{ $pendaftaran->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Hindu" {{ $pendaftaran->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Budha" {{ $pendaftaran->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                            <option value="Lain-lain" {{ $pendaftaran->agama == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                        </select><br>
                    </div>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="status_daftar"
                            id="" class="form-control"value="{{ $pendaftaran->status_daftar }}">
                            <option value="Perlu Konfirmasi Admin">Perlu Konfirmasi Admin</option>
                            <option value="Approved">Approved</option>
                        </select><br>
                    </div>                    
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>

    </div>
    </main>
    <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="{{ asset('admin/assets/script.js') }}"></script>
</body>

</html>
