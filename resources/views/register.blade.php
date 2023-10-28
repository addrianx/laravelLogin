<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<style>
        body {
            background-image: url('{{ asset('image/assets/login.jpg') }}'); /* Ganti dengan URL gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
        }

        .col-12 {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.3); /* Warna latar belakang dengan efek transparan */
            padding: 20px;
            backdrop-filter: blur(5px); /* Efek blur latar belakang */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        .col-12 h3{
            text-align: center;
            font-weight: 600;
            font-family: sans-serif;
        }
        .btn-orange {
            background-color: orange; /* Warna tombol oranye */
            color: #fff; /* Warna teks putih */
            border-radius: 20px; /* Sudut bulat */
        }
        /* Gaya untuk input form transparan */
        .form-control {
            background: none; /* Hapus latar belakang */
            backdrop-filter: blur(5px); /* Efek blur latar belakang */
        }

        .form-control::placeholder {
            color: #000000b8; /* Warna teks placeholder */
        }
    </style>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="mt-3">Halaman Registrasi</h3>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('SaveUser') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" placeholder="Nama Anda" id="name" name="name" >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Email" >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Buat Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Buat Password" id="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
                <button type="submit" class="btn btn-orange btn-block">Submit</button>
                <hr>
                <p class="text-center">Sudah Punya Akun? <a href="/">Silahkan Login!</a></p>
            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>