<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>University</title>
    <link rel="icon" href="{{ asset('user/img/logo.png') }}" sizes="50">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
</head>

<body>
    <x-navbar_user />

    <div class="table-data">
        <div class="container order-container riwayat-body">
            <div class="head">
                <h3>form edit pendaftaran</h3>

            </div>
            <form role="form" method="post" action="{{ route('update_pendaftar_user', ['pendaftaran' => $pendaftaran->id]) }}" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>Nama Lengkap : </label><br>
                    <input class="form-control" type="text"name="name" value="{{ $pendaftaran->name }}" /><br>
                    <label>Alamat KTP : </label><br>
                    <input class="form-control" type="text"name="alamat_ktp" value="{{ $pendaftaran->alamat_ktp }}"/><br>
                    <label>Alamat Lengkap Saat Ini : </label><br>
                    <input class="form-control" type="text"name="alamat_lengkap" value="{{ $pendaftaran->alamat_lengkap }}"/><br>
                    <label>Kecamatan : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kecamatan"
                            id="" class="form-control"value="{{ $pendaftaran->kecamatan }}">
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
                            id="" class="form-control"value="{{ $pendaftaran->kabupaten }}">
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
                            id="" class="form-control"value="{{ $pendaftaran->provinsi }}">
                            @foreach ($provincies as $province)
                            <option value="{{ $province->name }}" {{ $province->name == $pendaftaran->provinsi ? 'selected' : '' }}>
                                {{ $province->name }}
                            </option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>No Telepon : </label><br>
                    <input class="form-control"type="number" name="no_telp" value="{{ $pendaftaran->no_telp }}"oninput="this.value = this.value.replace(/[^0-9]/g, '')"/><br>
                    <label>No HP : </label><br>
                    <input class="form-control"type="number" name="no_hp" value="{{ $pendaftaran->no_hp }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')"/><br>
                    <label>Email : </label><br>
                    <input class="form-control" type="text"name="email_daftar" value="{{ $pendaftaran->email_daftar }}" id="email_daftar"/><br>
                    <label>Kewarganegaraan : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kewarganegaraan"
                            id="" class="form-control">
                            <option value="WNI Asli" {{ $pendaftaran->kewarganegaraan == 'WNI Asli' ? 'selected' : '' }}>WNI Asli</option>
                            <option value="WNI Keturunan" {{ $pendaftaran->kewarganegaraan == 'WNI Keturunan' ? 'selected' : '' }}>WNI Keturunan</option>
                            <option value="WNA" {{ $pendaftaran->kewarganegaraan == 'WNA' ? 'selected' : '' }}>WNA</option>
                        </select><br>
                    </div>
                    <label>Tanggal Lahir : </label><br>
                    <input class="form-control" type="date"name="tanggal_lahir" value="{{ $pendaftaran->tanggal_lahir }}"/><br>
                    <label>Tempat Lahir : </label><br>
                    <input class="form-control" type="text"name="tempat_lahir" value="{{ $pendaftaran->tempat_lahir }}"/><br>
                    <label>Kota/Kabupaten Tempat Lahir: </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kabupaten_lahir"
                            id="" class="form-control" value="{{ $pendaftaran->kabupaten_lahir }}">
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
                            id="" class="form-control"value="{{ $pendaftaran->propinsi_lahir }}">
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
                            id="" class="form-control" value="{{ $pendaftaran->jenis_kelamin }}">
                            <option value="Pria" {{ $pendaftaran->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Wanita" {{ $pendaftaran->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                        </select><br>
                    </div>
                    <label>Status Menikah : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="status_menikah"
                            id="" class="form-control"value="{{ $pendaftaran->status_menikah }}">
                            <option value="Belum Menikah" {{ $pendaftaran->status_menikah == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                            <option value="Menikah" {{ $pendaftaran->status_menikah == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                            <option value="Lain-lain" {{ $pendaftaran->status_menikah == 'Lain-lain' ? 'selected' : '' }}>Lain-lain (janda/duda)</option>
                        </select><br>
                    </div>
                    <label>Agama : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="agama"
                            id="" class="form-control" value="{{ $pendaftaran->agama }}">
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

    <x-footer_user />

    <script src="{{ asset('user/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script>
        function validateForm() {
            // Get the value of the email field
            var emailValue = document.getElementById('email_daftar').value;

            // Define a regular expression for email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

            // Check if the email value matches the regex
            if (!emailRegex.test(emailValue)) {
                // Display an alert and prevent form submission
                alert('Invalid email format. Please enter a valid email address.');
                return false;
            }

            // Continue with form submission if the email is valid
            return true;
        }
    </script>


</body>

</html>