// PART ONE
//////////////////////////////////////////////////////////////////////////////
// GET https://www.googleapis.com/books/v1/volumes?q=flowers+inauthor:keyes&key=yourAPIKey

const googleBooksApiKey = 'AIzaSyB_ytIzB3x30MCmTR5pUMhiV4GowQJPzQc';
const subject = 'music';

function addBookFavorites(event){
    const btn = event.currentTarget;
    const parent = btn.parentElement;
    const element = parent.querySelectorAll("span");
    const img = parent.querySelector('img');
    console.log("percorso immagine:"+img.src);
    console.log(element[0].textContent);
    //const title = element[0].textContent+'/'+element[1].textContent;
   /*  fetch('book/addBookFavorites/'+element[0].textContent+'/'+element[1].textContent+'/'+encodeURIComponent(img.src)).then(onResponse).then(json=>{
        console.log('sono il json:'+json);
    }); */
    let url = img.src.replaceAll("/",'@');
    url = url.replaceAll("?","|");
    console.log('url:'+url);
    fetch('book/addBookFavorites/'+element[0].textContent+'/'+element[1].textContent
        +'/'+url).then(onResponse).then(json=>{
        console.log('sono il json:'+json);
    });
}


function onJson(json){
    console.log(json);
    //console.log(json.items[0]);
    //console.log(json.items[0].volumeInfo.title);
    for (let i=0; i<10; i++){
        const id = json.items[i].id;
        const title = json.items[i].volumeInfo.title;
        const thumbnail = json.items[i].volumeInfo.imageLinks.thumbnail;
        
        const book = document.createElement('div');
        book.classList.add(".item");
        const img = document.createElement('img');
        const caption = document.createElement('span');
        const caption2 = document.createElement('span');
        const btn = document.createElement('button');
        btn.addEventListener('click',addBookFavorites);

        img.src = thumbnail;
        caption.textContent = title;
        caption2.textContent = id;
        btn.textContent = 'preferito';
        book.appendChild(img);
        book.appendChild(caption);
        book.appendChild(caption2);
        book.appendChild(btn);
        const bookContainer = document.getElementById("bookContainer");
        bookContainer.appendChild(book);
    }
}
function onResponse(response){
    console.log(response);
    const jsonResp = response.json();
    return jsonResp;
}

function onResponsetest(response){
    console.log(response);
    //const jsonResp = response.json();
    const jsonResp = response.text();
    return jsonResp;
}
function getElements(event){
    event.preventDefault();
    const search = document.getElementById('searchText').value;
    const query = search+'+subject:'+subject;
    fetch('book/serch/'+query).then(onResponse).then(onJson);
}
const form = document.getElementById("booksearch");
form.addEventListener('submit',getElements);



