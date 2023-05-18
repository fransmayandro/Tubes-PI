<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="Images/book.png" />
    <title>JobStorage</title>
</head>
<body>
    <header>
        <div class="jumbotron">
        <h1>JobStorage</h1>
        <p>Job Search | Jobs by JobStorage</p>
        </div>
    <nav>
        <ul>
			<li><a href="#insert">Find Jobs</a></li>
			<li><a href="#finished">Company Reviews</a></li>
        </ul>
      </nav>
    </header>

    <main>
		<aside>
			<article id="search" class=" profile card">
				<h2>Search</h2>
				<hr>
					<form id="form-data-search">
						<div id="form-search">
							<label for="input-search">Keyword</label><br>
							<input id="input-search" type="text" placeholder="Keyword"><br>
							<button class="btn" type="sumbit" id="btnsearch">Search</button>
						</div>
					</form>	
						<div id="form-search-result">
							<hr>
						</div>
			</article>
		</aside>
        <!-- <div id="content">
            <div class="box center">
        		<article id="insert" class="card">
					<h2>Submit Your CV</h2>
						<hr>
					<form id="form-data-books">
						<div id="form-title">
							<label for="input-title">Title</label><br>
							<input id="input-title" type="text" name="title" placeholder="book title" required><br>
						</div>	
						<div id="form-auhor">
							<label for="input-author">Author</label><br>
							<input id="input-author" type="text" name="author" placeholder="author user" required><br>
						</div>	
						<div id="form-year">
							<label for="input-year">Year</label><br>
							<input id="input-year" type="number" name="year" placeholder="year user"required><br>
						</div>	
						<hr>
			  			<input type="submit" value="Submit" name="Submit" class="btn">
					</form>
				</article>
			</div> -->
		<!-- </div>
		<div id="content">
            <div class="box center">
        		<article id="unfinished" class="card">
					<h2 >Belum Selesai Dibaca</h2>
					<hr>
					<div class="list-item" id="books"></div>
				</article>
			</div>
		</div>
		<div id="content">
            <div class="box center">
        		<article id="finished" class="card">
					<h2 >Selesai Dibaca</h2>
					<hr>
					<div class="list-item" id="completed-books">
				</article>
			</div>
		</div> -->
		
    </main>

    <footer>
        <div class="footer">
         <p>&copy; 2023, by JobStorage</p>
     </div>
    </footer>
  </body>
  
  <script src="js/script.js"></script>
  <script src="js/script2.js"></script>
</html>