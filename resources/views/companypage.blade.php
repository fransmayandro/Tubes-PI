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
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd; box-shadow: rgba(0, 37, 64, 0.35) 0px 0px 3px 0px inset;">
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
            <a class="nav-link" style="color: #19A7CE" aria-current="page" href="/companypage">Perusahaan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/salarypage">Gaji</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/createcompany">Buat Lowongan</a>
            </li> -->
            @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{route('logout')}}">Keluar</a>
            </li>
            @endif
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
  <main style="padding-top: 100px">
    <form style="text-align: center;">
        <label>
            <h3>Cari Perusahaan Berdasarkan Lokasi</h3><br> 
        </label>
    </form>
    <form method="POST" action="/searchcompanies" style="text-align: center;">
        @csrf
        <input type="text" class="st-default-search-input" placeholder="Nama Perusahaan" style="width: 300px; height: 40px; border-radius: 5px" name="cariPerusahaan" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>">
        <input type="text" class="st-default-search-input" placeholder="Lokasi Perusahaan" style="width: 300px; height: 40px; border-radius: 5px" name="cariLokasi" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>">
        <button class="btn btn-primary" type="submit" style="background-color: #19A7CE; margin-bottom: 0.4rem;">Cari</button><br>   
    </from>
    <div class="m-3 d-flex" style="padding-top: 10px; text-align: left; justify-content: center">
        <div class="row row-cols-1 row-cols-md-2 g-4" style="max-width: 1000px">
            @foreach($company as $comp)
            <div class="col">
                <div class="card" style="background-color: #e3f2fd; box-shadow: rgba(0, 37, 64, 0.35) rgba(0, 37, 64, 0.35) 0px 0px 3px 0px inset">
                <div class="card-body">
                    <h5 class="card-title">{{$comp->company_name}}</h5>
                    <p class="card-text">{{$comp->company_description}}</p>
                    <p class="card-text">{{$comp->company_location}}</p>
                    <p class="card-text">{{$comp->company_website}}</p>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        @if($company->isEmpty())
            <h3>Data tidak ditemukan</h3>
        @endif
    </div>
    <div>
    {{ $company->withQueryString()->links() }}
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>