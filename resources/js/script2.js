const localStorageKey = "BOOKSHELF_APPS"
const search = document.querySelector("#btnsearch");
const Svalue = document.querySelector("#input-search");

function databooks() {
    return JSON.parse(localStorage.getItem(localStorageKey)) || [];
}

search.addEventListener("click",function(e){
  e.preventDefault()
  if (localStorage.getItem(localStorageKey) == "") {    
    alert("Tidak ada data buku");
    return location.reload();   
}else{
  const getbyTitle = databooks().filter(a => a.title == Svalue.value.trim());
  if (getbyTitle.length == 0){
    const getbyAuthor = databooks().filter(a => a.author == Svalue.value.trim());
      if(getbyAuthor.length == 0){
        const getbyYear = databooks().filter(a => a.year == Svalue.value.trim());
        if(getbyYear.length == 0){
          alert(`Books Not Found`);
          return location.reload();
        }else{
          result(getbyYear);
        }
      }else{
        result(getbyAuthor);
      }
  }else{
    result(getbyTitle);
  }
}
Svalue.value = '';
})

function result(book){
  const result = document.querySelector("#form-search-result");
  
  result.innerHTML = '';

  book.forEach(books =>{
    let el = `
    <h3>${books.title}</h3>
    <hr>
    <p> AUTHOR: ${books.author}</p>
    <p>YEAR: ${books.year}</p>
    `

    result.innerHTML += el;
  });
}
