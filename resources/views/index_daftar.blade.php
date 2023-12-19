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
                <h3>form pendaftaran</h3>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
            <form role="form" method="post" action="{{ route('add_daftar') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="form-group">
                    <label>Nama Lengkap : </label><br>
                    <input class="form-control" type="text"name="name" /><br>
                    <label>Alamat KTP : </label><br>
                    <input class="form-control" type="text"name="alamat_ktp" /><br>
                    <label>Alamat Lengkap Saat Ini : </label><br>
                    <input class="form-control" type="text"name="alamat_lengkap" /><br>
                    <label>Kecamatan : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kecamatan"
                            id="" class="form-control">
                            @foreach ($districts as $district)
                                <option value="{{ $district->name }}">{{ $district->name }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>Kabupaten : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kabupaten"
                            id="" class="form-control">
                            @foreach ($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>Propinsi : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="provinsi"
                            id="" class="form-control">
                            @foreach ($provincies as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>No Telepon : </label><br>
                    <input class="form-control"type="text" name="no_telp" oninput="this.value = this.value.replace(/[^0-9]/g, '')"/><br>
                    <label>No HP : </label><br>
                    <input class="form-control"type="text" name="no_hp" oninput="this.value = this.value.replace(/[^0-9]/g, '')"/><br>
                    <label>Email : </label><br>
                    <input class="form-control" type="text"name="email_daftar" id="email_daftar"/><br>
                    <label>Kewarganegaraan : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kewarganegaraan"
                            id="" class="form-control">
                            <option value="WNI Asli">WNI Asli</option>
                            <option value="WNI Keturunan">WNI Keturunan</option>
                            <option value="WNA">WNA</option>
                        </select><br>
                    </div>
                    <label>Tanggal Lahir : </label><br>
                    <input class="form-control" type="date"name="tanggal_lahir" /><br>
                    <label>Tempat Lahir : </label><br>
                    <input class="form-control" type="text"name="tempat_lahir" /><br>
                    <label>Kota/Kabupaten Tempat Lahir: </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="kabupaten_lahir"
                            id="" class="form-control">
                            @foreach ($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>Propinsi Tempat Lahir: </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="propinsi_lahir"
                            id="" class="form-control">
                            @foreach ($provincies as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <label>Jenis Kelamin : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="jenis_kelamin"
                            id="" class="form-control">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select><br>
                    </div>
                    <label>Status Menikah : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="status_menikah"
                            id="" class="form-control">
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Lain-lain">Lain-lain (janda/duda)</option>
                        </select><br>
                    </div>
                    <label>Agama : </label><br>
                    <div class="custom-select" style="width:100%;">
                        <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="agama"
                            id="" class="form-control">
                            <option value="Islam">Islam</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Lain-lain">Lain-lain</option>
                        </select><br>
                    </div>

                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>

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