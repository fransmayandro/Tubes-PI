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
            <a class="nav-link text-primary" aria-current="page" href="/home">Pekerjaan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/companypage">Perusahaan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/createcompany">Buat Lowongan</a>
            </li>
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
            <h3>Cari Lowongan Pekerjaan Berdasarkan Lokasi</h3><br> 
        </label>
    </form>
    <form method="POST" action="/searchjobs" style="text-align: center;">
        @csrf
        <input type="text" class="st-default-search-input" placeholder="Nama Pekerjaan" style="width: 300px; height: 40px" name="cariPekerjaan" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>">
        <input type="text" class="st-default-search-input" placeholder="Lokasi Pekerjaan" style="width: 300px; height: 40px" name="cariLokasi" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>">
        <button class="btn btn-primary" type="submit">Cari Pekerjaan</button><br>   
    </from>
    <div class="m-3 d-flex justify-content-center" style="padding-top: 10px">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($jobs as $job)
            <div class="col">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$job->job_title}}</h5>
                    <p class="card-text">{{$job->company_name}}</p>
                    <p class="card-text">{{$job->company_location}}</p>
                    <p class="card-text">{{$job->job_description}}</p>
                    <p class="card-text">{{$job->salary_range}}</p>
                    <p class="card-text">{{$job->requirements}}</p>
                    <a href="#" class="btn btn-primary">Lamar</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        @if($jobs->isEmpty())
            <h3>Data tidak ditemukan</h3>
        @endif
    </div>
  </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
  <footer>
        <div class="footer">
         <p>&copy; 2023, by JobStorage</p>
     </div>
  </footer>
</html>