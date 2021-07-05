const items = document.querySelectorAll(".item");;
const links = document.querySelectorAll(".linkword");
const btns = document.querySelectorAll(".enter");

function showItem(){
    items[0].classList.toggle('hidden'); 
    items[1].classList.toggle('hidden');    
}

function banner(e){
    const form = e.currentTarget.parentNode;
    const textAreas = form.querySelectorAll(".textBox");
    for(const textArea of textAreas){
        if (textArea.value=="") {
            alert("Ci sono dei campi vuoti");
            break;
        }
    }
}

links[0].addEventListener('click',showItem);
links[1].addEventListener('click',showItem);

btns[0].addEventListener('click',banner);
btns[1].addEventListener('click',banner);

///////////////////////////////////////////////////////////////////////////

function controlloPassword(event){
    const pswLenght = event.srcElement.value.length;
    const psw = event.srcElement.value;
    const re = /[\$\@\#\!\?\*\+\.\&\%\(\)\_\:\,\;\/\|\=\-\']+/i;
    const avviso = document.getElementById("textBoxId");
    const avviso2 = document.getElementById("errorMessage");
    
    if(pswLenght<=3 || pswLenght>=8){
        avviso.classList.remove('hidden');
    }else{
        avviso.classList.add('hidden');
    }
    
    
    if(re.test(psw)){
        avviso2.classList.remove('hidden');
    }else{
        avviso2.classList.add('hidden');   
    }
    
}


function onResponseJson(response){
    console.log(response);
    //console.log(response.json());
    if (response.status >= 200 && response.status < 300) {
        return response.json();
        //return response.text();
    }
    console.log(response.statusText);
    //console.log("response2:"+response.text());
    //return response.text();
}

function fetchControllEmail(event){
    const email = event.currentTarget.value;
    console.log("Email:"+email);
    const token = document.getElementById("_token2");
    console.log("token1:"+token);
    console.log("token2:"+token.csrf_token);
    console.log("token3:"+token.value);
    const URL = "sign-in/email";
 
    fetch(URL,{
        headers:{
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token.value
        },
        method: "POST",
        credentials:'same-origin',
        body:JSON.stringify({ email: email})
    }).then(onResponseJson).then(json => { 
        const avviso = document.getElementById("textBoxIdEmail");
        console.log("avviso: "+avviso.value);
        console.log("response: "+json);
        console.log("aaaaaaaaaaaaaaaaaaaaaaa: "+json['result']);
        console.log("json: "+JSON.stringify(json));
        if(json['result']=='false') { // il risultato vuoto di php corrisponde ad una stringa vuota
            avviso.classList.add('hidden');
        }else{
            avviso.classList.remove('hidden');
        }  
    }
    );

} 


const textBoxEmail = document.getElementById("textBoxEmail");
const textBoxPassword = document.getElementById("textBoxPassword");
textBoxEmail.addEventListener("keyup",fetchControllEmail);
textBoxPassword.addEventListener('keyup',controlloPassword);