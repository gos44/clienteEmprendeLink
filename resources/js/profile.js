
document.querySelector('.menu-toggle').addEventListener('click', function() {
    this.classList.toggle('active');
    document.querySelector('.sidebar').classList.toggle('active');
});

document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', () => {
        const accordionContent = button.nextElementSibling;
        button.classList.toggle('active');

        if (button.classList.contains('active')) {
            accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
        } else {
            accordionContent.style.maxHeight = 0;
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('#myButtons');
  
  buttons.forEach(button => {
      button.addEventListener('mouseover', function () {
          this.style.backgroundColor = '#BFF7DC'; 
          this.style.color = 'white'; 
      });
      
      button.addEventListener('mouseout', function () {
          this.style.backgroundColor = '';
          this.style.color = ''; 
      });
  });
});
