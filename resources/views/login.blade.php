<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Masuk Akun</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container" style="padding-top: 150px">
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><b>JobStorage</b><br>Website Pencarian Kerja</h3>
            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif
            <form action=" {{route('login')}} " method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-block" style="background-color: #19A7CE">Masuk</button>
                <hr>
                <p class="text-center">Belum punya akun? <a href="/register" style="color: #19A7CE">Daftar</a> sekarang!</p>
            </form>
        </div>
    </div>
    @if($message = Session::get('failed'))
      <script>
        Swal.fire('{{ $message }}');
      </script>
    @endif

    @if($message = Session::get('success'))
      <script>
        Swal.fire('{{ $message }}');
      </script>
    @endif
</body>
</html>