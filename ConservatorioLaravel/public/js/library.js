function removeBookFavorites(event){
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
    fetch('book/removeBookFavorites/'+element[0].textContent+'/'+element[1].textContent
        +'/'+url).then(onResponse).then(json=>{
        console.log('sono il json:'+json);
    });
    parent.remove();
}

function onJson(json){
    console.log(json);
    //console.log(json.items[0]);
    //console.log(json.items[0].volumeInfo.title);
    for (const b of json){
        console.log('ehi sono b:'+b);
        const id = b.book_id;
        const title = b.titolo;
        const thumbnail = b.thumbnail;
        console.log('ehi sono img:'+thumbnail);
        
        
        const book = document.createElement('div');
        const img = document.createElement('img');
        const caption = document.createElement('span');
        const caption2 = document.createElement('span');
        const btn = document.createElement('button');
        btn.addEventListener('click',removeBookFavorites);

        let imgSrc = thumbnail.replaceAll("@","/");
        imgSrc = imgSrc.replaceAll("|","?");
        console.log("ImgSrc"+ imgSrc);
        img.src = imgSrc;
        console.log('ehi sono img2:'+img.src);
        caption.textContent = title;
        caption2.textContent = id;
        btn.textContent = 'rimuovi';
        book.appendChild(img).appendChild(document.createElement("br"));
        book.appendChild(caption).appendChild(document.createElement("br"));
        book.appendChild(caption2).appendChild(document.createElement("br"));
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

fetch('favouriteLibrary/uploadFavouriteBooks').then(onResponse).then(onJson);
