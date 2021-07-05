function toggleHidden (event){

    const dettail = event.currentTarget;
    const description = dettail.childNodes[1];
    
    if( description.classList.contains('hidden')){
      description.classList.remove("hidden");
    }else{
      description.classList.add("hidden");
    }
  }

  // add esame in prenotati

function toggle_esame(event){
    const btn = event.currentTarget;
    const esame = event.currentTarget.parentElement;
  
    if(btn.textContent === "Prenota"){
      esami_prenotati.appendChild(esame);
      btn.textContent = "Rimuovi";
    }else{
      esami_prenotabili.appendChild(esame);
      btn.textContent = "Prenota";
    }
  }

  function caricaEsamiPrenotati(json){
    const n_esami = Object.keys(json).length;
    console.log(json);
      for (let i=0; i<n_esami; i++){
        const div = document.createElement("div");
        div.classList.add("item");
    
        const h1 = document.createElement("h1");
        h1.id = "materia";
        h1.textContent = json[i].Materia;
    
        const a_btn = document.createElement("a");
        a_btn.classList.add("bottone2");
        a_btn.textContent = "Rimuovi";
    
        const a_dettagli = document.createElement("a");
        a_dettagli.classList.add("styleDettagli");
        a_dettagli.textContent = "Dettagli";
        //
        const div_dettagli = document.createElement("div");
        div_dettagli.classList.add("conteiner","hidden");
    
        const p_data = document.createElement("p");
        p_data.id = "Info";
        p_data.textContent = "Data:"+json[i].data;
    
        const p_aula = document.createElement("p");
        p_aula.id = "Info";
        p_aula.textContent = "Aula:"+json[i].aula;

        const p_id = document.createElement("p");
        p_id.id = "Info";
        p_id.classList.add("exam_id");
        p_id.textContent = "exam_id:"+json[i].id+"\n";
    
        const p_appello = document.createElement("p");
        p_appello.id = "Info";
        p_appello.classList.add("numero_appello");
        p_appello.textContent = "Appello:"+json[i].appello;
    
        div_dettagli.appendChild(p_data);
        div_dettagli.appendChild(document.createElement("br"));
        div_dettagli.appendChild(p_aula);
        div_dettagli.appendChild(document.createElement("br"));
        div_dettagli.appendChild(p_appello);
        div_dettagli.appendChild(document.createElement("br"));
        div_dettagli.appendChild(p_id);
        //
        a_dettagli.appendChild(div_dettagli);
    
        div.appendChild(h1);
        div.appendChild(a_btn);
        div.appendChild(a_dettagli);
        console.log(div);
        esami_prenotati.appendChild(div);
      }
    }


function caricaEsamiPrenotabili(json){
    const n_esami = Object.keys(json).length;
    console.log (json);
    for (let i=0; i<n_esami; i++){
      const div = document.createElement("div");
      div.classList.add("item");
     
      const h1 = document.createElement("h1");
      h1.id = "Materia";
      h1.textContent = json[i].Materia;
    
      const a_btn = document.createElement("a");
      a_btn.classList.add("bottone2");
      a_btn.textContent = "Prenota";
  
      const a_dettagli = document.createElement("a");
      a_dettagli.classList.add("styleDettagli");
      a_dettagli.textContent = "Dettagli";
      
      //
      const div_dettagli = document.createElement("div");
      div_dettagli.classList.add("conteiner","hidden");
  
      const p_data = document.createElement("p");
      p_data.id = "Info";
      p_data.textContent = "Data:"+json[i].data;
      
  
      const p_aula = document.createElement("p");
      p_aula.id = "Info";
      p_aula.textContent = "Aula:"+json[i].aula;
    
      const p_id = document.createElement("p");
      p_id.id = "Info";
      p_id.classList.add("exam_id");
      p_id.textContent = "exam_id:"+json[i].id;
  
      const p_appello = document.createElement("p");
      p_appello.id = "Info";
      p_appello.classList.add("numero_appello");
      p_appello.textContent = "Appello:"+json[i].appello;
  
      div_dettagli.appendChild(p_data);
      div_dettagli.appendChild(p_aula);
      div_dettagli.appendChild(p_appello);
      div_dettagli.appendChild(p_id);
      //
      a_dettagli.appendChild(div_dettagli);
  
      div.appendChild(h1);
      div.appendChild(a_btn);
      div.appendChild(a_dettagli);
      esami_prenotabili.appendChild(div);
    }
  }


  function addExamsListeners(){
    const dettails = document.querySelectorAll(".styleDettagli");
    
    const btns_prenota = document.querySelectorAll(".bottone2");
    
    for(const dettail of dettails){
      dettail.addEventListener("click",toggleHidden);
    }
    for(const btn of btns_prenota){
      btn.addEventListener("click", toggle_esame);
      if(btn.textContent=="Prenota"){
        btn.addEventListener("click",addPrenotazione_db);
      }else{
        btn.addEventListener("click",removePrenotazione);
      }
    }
  }

function addPrenotazione_db(event){
    const button = event.currentTarget;
    const parent = button.parentElement;
    const element = parent.querySelector(".exam_id");
    const exam_id = element.textContent.split(":")[1];


      fetch('studentArea/createReservation/'+exam_id).then(response => {
        return response.json();
      }).then(json =>{
        button.removeEventListener("click",addPrenotazione_db);
        button.addEventListener("click",removePrenotazione);
      })
      
    }

  // fetch calcella prenotazione dal database
function removePrenotazione(event){
  const button = event.currentTarget;
  const parent = button.parentElement;
  const element = parent.querySelector(".exam_id");
  const exam_id = element.textContent.split(":")[1];


    fetch('studentArea/removeReservation/'+exam_id).then(response => {
      return response.json();
    }).then(json =>{
      button.addEventListener("click",addPrenotazione_db);
      button.removeEventListener("click",removePrenotazione);
    })
}

    
function onResponseJson(response){
    if (response.status >= 200 && response.status < 300) {
        return response.json();
    }
    console.error(response.statusText)
  }


fetch('studentArea/uploadExams').then(onResponseJson).then(caricaEsamiPrenotabili).then(addExamsListeners);
fetch('studentArea/uploadBookedExams').then(onResponseJson).then(caricaEsamiPrenotati).then(addExamsListeners);

const esami_prenotabili = document.querySelector("#cont");
const esami_prenotati = document.querySelector(".preferiti");