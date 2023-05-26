const books = [];
const RENDER_EVENT = 'render-books';
const SAVED_EVENT = 'saved-books';
const STORAGE_KEY = 'BOOKSHELF_APPS';



function generateID(){
  return +new Date();
}


function generateBookObject(id, title, author, year, isCompleted) {
  return {
    id,
    title,
    author,
    year,
    isCompleted
  }
}

function findbook(bookid){
  for (const bookItem of books){
    if (bookItem.id === bookid){
      return bookItem;
    }
  }
  return null;
}

function findBookIndex(bookid){
  for (index in books){
    if(books[index].id === bookid){
      return index;
    }
  }
  return -1;
}

 
function isStorageExist() /* boolean */ {
  if (typeof (Storage) === undefined) {
    alert('Browser kamu tidak mendukung local storage');
    return false;
  }
  return true;
}

function saveData() {
  if (isStorageExist()) {
    const parsed /* string */ = JSON.stringify(books);
    localStorage.setItem(STORAGE_KEY, parsed);
    document.dispatchEvent(new Event(SAVED_EVENT));
  }
}

function loadDataFromStorage() {
  const serializedData /* string */ = localStorage.getItem(STORAGE_KEY);
  let data = JSON.parse(serializedData);

  if (data !== null) {
    for (const book of data) {
      books.push(book);
    }
  }

  document.dispatchEvent(new Event(RENDER_EVENT));
}

function makeBooks(bookObject){
  const {id, title, author, year, isCompleted} = bookObject;

  const bookTitle = document.createElement ('h3');
  bookTitle.innerText = title;

  const bookAuthor = document.createElement ('p');
  bookAuthor.innerText = author;

  const bookyear = document.createElement ('p');
  bookyear.innerText = year;

  const bookContainer = document.createElement('div');
  bookContainer.classList.add('inner');
  bookContainer.append(bookTitle, bookAuthor, bookyear);

  const container = document.createElement('div');
  container.classList.add('item', 'shadow');
  container.append(bookContainer);
  container.setAttribute('id', `books-${id}`);

if (isCompleted) {
  const undoButton = document.createElement('button');
  undoButton.classList.add('undo-button');
  undoButton.addEventListener('click', function () {
    undoBookFromCompleted(id);
  });

  const trashButton = document.createElement('button');
  trashButton.classList.add('trash-button');
  trashButton.addEventListener('click', function () {
    removeBookFromCompleted(id);
  });

  container.append(undoButton, trashButton);

} else {
  const checkButton = document.createElement('button');
  checkButton.classList.add('check-button');
  checkButton.addEventListener('click', function () {
    addBookToCompleted(id);
  });

  const trashButton = document.createElement('button');
  trashButton.classList.add('trash-button');
  trashButton.addEventListener('click', function () {
    removeBookFromCompleted(id);
  });

  container.append(checkButton, trashButton);
}

return container;
}


function addbook(){
  const textBook =document.getElementById('input-title').value;
  const authorBook =document.getElementById('input-author').value;
  const yearBook =document.getElementById('input-year').value;

  const generatedID = generateID();
  const bookObject = generateBookObject(generatedID, textBook, authorBook, yearBook, false);
  books.push(bookObject);

  document.dispatchEvent(new Event(RENDER_EVENT));

  saveData();
}

function addBookToCompleted(bookid /* HTMLELement */) {
  const bookTarget = findbook(bookid);
  if (bookTarget == null) return;

  bookTarget.isCompleted = true;
  document.dispatchEvent(new Event(RENDER_EVENT));

  saveData();
}

function removeBookFromCompleted(bookid /* HTMLELement */) {
  const bookTarget = findBookIndex(bookid);
  if (bookTarget === -1) return;
  books.splice(bookTarget, 1);

  document.dispatchEvent(new Event(RENDER_EVENT));

  saveData();
}

function undoBookFromCompleted(bookid /* HTMLELement */) {
  const bookTarget = findbook(bookid);
  if (bookTarget == null) return;

  bookTarget.isCompleted = false;
  document.dispatchEvent(new Event(RENDER_EVENT));

  saveData();
}

document.addEventListener('DOMContentLoaded', function () {
  const submitForm = document.getElementById('form-data-books');
  
  submitForm.addEventListener('submit', function (event) {
    event.preventDefault();
    addbook();
  });

    if(isStorageExist()){
      loadDataFromStorage();
    }  
});

document.addEventListener(RENDER_EVENT, function () {
  const uncompletedBOOKList = document.getElementById('books');
  const listCompleted = document.getElementById('completed-books');

  // clearing list item
  uncompletedBOOKList.innerHTML = '';
  listCompleted.innerHTML = '';

  for (bookItem of books) {
    const bookElement = makeBooks(bookItem);
    if (bookItem.isCompleted) {
      listCompleted.append(bookElement);
    } else {
      uncompletedBOOKList.append(bookElement);
    }
  }
});



