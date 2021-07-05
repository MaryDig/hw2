// PART 2
//////////////////////////////////////////////////////////////////////////////
// GET https://www.googleapis.com/youtube/v3/videos?part=player&chart=mostPopular&q=YouTube+Data+API&key=AIzaSyB_ytIzB3x30MCmTR5pUMhiV4GowQJPzQc
const googleApiKey = 'AIzaSyB_ytIzB3x30MCmTR5pUMhiV4GowQJPzQc';

function onJson(json){
    console.log(json);
    
    for (const item of json.items){
        const videosContainer = document.getElementById("videosContainer");
        let video = document.createElement('div');
        console.log(item.player.embedHtml);
        video.innerHTML =item.player.embedHtml.trim();
        //console.log(video.innerHTML);
        videosContainer.appendChild(video);
        // bookContainer.appendChild(item.player.embedHtml); non funziona
    }
}

function onResponse(response){
    console.log(response);
    const jsonResp = response.json();
    return jsonResp;
}

document.addEventListener("DOMContentLoaded", function() {
    fetch('video/serchVideo').then(onResponse).then(onJson);
  });

