<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JobStorage | Website Pencari Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styleHome.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/allmin.css">

  </head>
  <body>
  <header>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="/"><h4>JobStorage</h4></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/home">Pekerjaan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/companypage">Perusahaan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-primary" aria-current="page" href="/createcompany">Buat Lowongan</a>
            @unless (Auth::check())
              <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/register">Daftar</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/login">Masuk</a>
              </li>
            @endunless
        </ul>
        </div>
    </div>
    </nav>
  </header>
  <main style="padding-top: 25px">
    <div class="container d-flex justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/storecompany"> 
            @csrf
            <div>
                <label><h3>Masukkan Data - Data Lowongan</h3><br></label>
            </div>
            <div class="mb-3">
                <label for="nama">Nama Perusahaan</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Perusahaan</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="umur">Lokasi Perusahaan</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control">
            </div>
            <div class="mb-3">
                <label for="umur">Website Perusahaan</label>
                <input type="text" name="website" id="website" class="form-control">
            </div>
            <div class="mb-3">
                <label for="umur">Nama Pekerjaan</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="umur">Deskripsi Pekerjaan</label>
                <textarea class="form-control" name="deskripsipekerjaan" id="deskripsipekerjaan" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="umur">Range Gaji</label>
                <input type="text" name="range" id="range" class="form-control">
            </div>
            <div class="mb-3">
                <label for="umur">Persyaratan</label>
                <textarea class="form-control" name="persyaratan" id="persyaratan" rows="3"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>

</html>