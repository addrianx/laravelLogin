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
  

            @if($user->role == 'admin')
            <div class="container">
                <div class="row"> 
                    <div class="col-12 my-2">
                        <h5 class="text-center">Daftar Member yang Terdaftar</h5>                        
                    </div>
                    
                    
                        @if (session('success'))
                            <div class="col-12">
                                <div id="successAlert" class="alert alert-success alert-dismissible">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            </div>
                        @endif     
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Tanggal Daftar</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if ($members->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="text-center">Tidak Ada member yang terdaftar</td>
                                                </tr>
                                            @else
                                                @foreach($members as $member)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $member->name }}</td>
                                                        <td>{{ $member->email }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($member->created_at)->format('d/m/Y') }}</td>
                                                        <td scope="col"><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $member->id }}">Hapus</button></td>
                                                    </tr>
                                                    <!-- Modal Konfirmasi Hapus -->
                                                    <div class="modal fade" id="deleteModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus pengguna {{ $member->name }}?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <form method="POST" action="{{ route('delete.member', ['id' => $member->id]) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
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