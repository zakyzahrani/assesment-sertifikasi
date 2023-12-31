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
    <style>
        /* Warna latar belakang tombol saat dalam keadaan terbuka */
        .accordion-button:not(.collapsed) {
            background-color: #0088C7;
        }

        /* Warna teks "Edit Akun Anda" saat accordion terbuka */
        .accordion-button:not(.collapsed) h5 {
            color: white;
        }
    </style>
</head>

<body>
    <x-navbar_user />

    <div class="container-lg mt-5 riwayat-body">
        <div class="container my-5">
            <h4 class="text-center">Selamat Datang, {{ $user->name }}</h4>
            <p class="text-center">Informasi mengenai profil anda ada disini.</p>
        </div>
        <div class="container my-3">
            <div class="card">
                <div class="card-header p-3" style="background-color: #0088C7;">
                    <h5 style="color: white">Data Diri Anda</h5>
                </div>
                <div class="card-body">
                    <div class="container ">
                        <div class="row">
                            <div class="col-lg-2">
                                <p>Nama </p>
                                <p>Email </p>
                                <p>Nomor Telepon</p>
                            </div>
                            <div class="col-lg-1">
                                <p>:</p>
                                <p>:</p>
                                <p>:</p>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $user->name }}</p>
                                <p>{{ $user->email }}</p>
                                <p>{{ $user->call_num }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h5>Edit Akun Anda</h5>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <div class="accordion-body p-5">
                            <form action="{{ route('edit_user_profile') }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" name="name" value="{{ $user->name }}"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nomor Telepon</label>
                                    <input type="text" name="call_num" value="{{ $user->call_num }}"
                                        class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>

                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-footer_user />


    <script src="{{ asset('user/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
