<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            
            <h3 class="mt-3">Dashboard Laravel</h3>
            

            @foreach($users as $user)
            <h4>selamat datang <b>{{$user->name}}</b>!</h4>
            @endforeach



            <div class="container">
                <div class="row"> 
                    <div class="col-12 my-2">
                    <h5 class="text-center">Daftar Member yang Terdaftar</h5>                        
                    </div>

                    @foreach($all_users as $member)
                    @if($member->role == 'member')
                        <div class="col-12 col-md-4">
                            <div class="card my-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $member->name }}</h5>
                                    <p class="card-text">Email : {{ $member->email }}</p>
                                    <p class="mb-0">Tanggal Registrasi : {{ \Carbon\Carbon::parse($member->created_at)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>           
                     @endif
                    @endforeach
                </div>
            </div>

            
            <a href="{{ route('logoutaksi') }}" class="btn btn-danger btn-block">Logout</a>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>