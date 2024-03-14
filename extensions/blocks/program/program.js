
const RowsWithSubcontent = document.querySelectorAll('.program-row');

console.log(RowsWithSubcontent)
if( RowsWithSubcontent.length > 0 ) {
     RowsWithSubcontent.forEach( (row) => {
          row.addEventListener('click', () => {
               let contentElement = row.querySelector('.program-row-content')
               contentElement.classList.toggle('active-program-row')
          })
     })
}