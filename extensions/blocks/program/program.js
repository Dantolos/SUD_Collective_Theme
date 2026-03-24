document.addEventListener('DOMContentLoaded', () => {
  const RowsWithSubcontent = document.querySelectorAll('.program-row.has_subcontent');

  if (RowsWithSubcontent.length > 0) {
    RowsWithSubcontent.forEach((row) => {
      const content = row.querySelector('.program-row-content');
      console.log('Row:', row, '→ Content:', content); // check this too

      row.addEventListener('click', () => {
        console.log('clicked!');
        content.classList.toggle('active-program-row');
        row.setAttribute('aria-expanded', content.classList.contains('active-program-row') ? 'true' : 'false');
      });
    });
  } else {
    console.warn('No .program-row.has_subcontent elements found — check your HTML output');
  }
});
