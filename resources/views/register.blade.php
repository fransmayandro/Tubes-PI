<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Akun</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container" style="padding-top: 100px"><br>
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><b>JobStorage</b><br>Website Pencarian Kerja</h3>
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            <form action="{{route('register')}}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block" style="background-color: #19A7CE">Daftar</button>
                </div>
                <p class="text-center">Sudah punya akun silahkan <a href="/login" style="color: #19A7CE">Login Disini</a></p>
            </form>
        </div>
    </div>
</body>
</html>