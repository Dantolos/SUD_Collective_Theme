

const PARTNERS = document.querySelectorAll('.partner-card');




  for(let PARTNER of PARTNERS) {
    PARTNER.addEventListener('click', () => {
        console.log('partner clock')
        let PARTNER_ID = PARTNER.dataset.partner
        console.log(PARTNER_ID)
    })
    
  } 
