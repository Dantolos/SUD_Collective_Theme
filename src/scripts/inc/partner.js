
const PARTNERS = document.querySelectorAll('.partner-card');

for(let PARTNER of PARTNERS) {
  PARTNER.addEventListener('click', () => {

    let PARTNER_ID = PARTNER.dataset.partner;
    let restURL = window.location.protocol  + '/wp-json/wp/v2/partner/' + PARTNER_ID;

    getData(restURL).then(data => createLightbox(data))
    
  }) 
} 

async function getData (restURL)  {
    const response = await fetch(restURL, { method: "GET" })
    const data = await response.json();
    return data;
}

async function getImageURL(imageID){
    
    const response = await fetch(window.location.protocol  + '/wp-json/wp/v2/media/' + imageID, {method: "GET"})
    const image = await response.json();
   
    return JSON.stringify(image.source_url);
}

async function createLightbox(data){
    const BODY = document.querySelector('body');
    const CloseButton = '<div id="lightbox-close" class="lightbox-close-button"><?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"> <style type="text/css"> .st0{fill:#000000;} </style>    <rect x="0" y="22.02" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -10.3553 25)" class="st0" width="50" height="5.96"/>    <rect x="0" y="22.02" transform="matrix(0.7071 0.7071 -0.7071 0.7071 25 -10.3553)" class="st0" width="50" height="5.96"/> </svg></div>';

    const LIGHTBOXCONTAINER = document.createElement('DIV')
    LIGHTBOXCONTAINER.id = 'lightbox'
    LIGHTBOXCONTAINER.classList.add('sud-lightbox-container')
    LIGHTBOXCONTAINER.innerHTML = CloseButton
    
    const LIGHTBOX = document.createElement('DIV');
    LIGHTBOX.classList.add('sud-lightbox');
    await fillLighbox(LIGHTBOX, data)

    LIGHTBOXCONTAINER.appendChild(LIGHTBOX)
    
    BODY.appendChild(LIGHTBOXCONTAINER);

    setTimeout( closeTriggerLightbox() ,300);
}

async function fillLighbox(container, data){
    const LIGHTBOXCONTENT = document.createElement('DIV');
    LIGHTBOXCONTENT.classList.add('sud-lightbox-content')
    LIGHTBOXCONTENT.innerHTML = await PartnerContent(data);
    container.appendChild( LIGHTBOXCONTENT )
}

function closeTriggerLightbox(){
    const CLOSEBUTTON = document.getElementById('lightbox-close');

    CLOSEBUTTON.addEventListener('click', () => {
        closeLightbox()
    })
}

function closeLightbox(){
    const LIGHTBOXCONTAINER = document.querySelector('#lightbox');

    LIGHTBOXCONTAINER.remove();
    
}

async function PartnerContent(data){
    let html = '';
    const logo = await getImageURL(data.acf.logo).then( (logoURL) => { console.log(logoURL); return logoURL.replaceAll('"', '') } )
   
    html += '<div class="partner-lightbox">';
        html += '<div class="partner-lightbox-logo"><img src="'+ logo+'" ' + `alt="${data.acf.company}-logo" title="Logo ${data.acf.company}"></div>`
        html += `<h2>${data.acf.company}</h2>`;
        html += `<p>${data.acf.description}</p>`;
        html += `<a href="${data.acf.website}" target="_blank"><button>Website</button></a>`
    html += '</div>';
   
    return html;
}