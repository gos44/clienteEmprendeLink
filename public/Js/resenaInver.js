
      document.addEventListener("DOMContentLoaded", function() {
        fetch("footerInversor.html")
          .then(response => response.text())
          .then(data => {
            document.getElementById("footer").innerHTML = data;
          });
      });
    

  
    function getCurrentTime() {
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12;
        return `${hours}:${minutes.toString().padStart(2, '0')} ${ampm}`;
    }

    function submitReview() {
        const reviewText = document.querySelector('.review-textarea').value;
        const rating = document.querySelector('input[name="rate"]:checked')?.value;
        
        if (!reviewText || !rating) {
            alert('Por favor completa tu reseña y calificación');
            return;
        }

        const newReview = `
            <div class="review-card">
                <div class="review-header">
                    <div class="company-info">
                        <a href="reseñas2.html">
                            <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/81273ca7-55d8-4cbc-8794-1b39725c261e/dga6e4t-0db8f8c3-e59c-45b4-8e5e-997ad15c9a20.jpg/v1/fill/w_894,h_894,q_70,strp/sukuna_smile_manga_3_by_ae19oe_dga6e4t-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MzYwMCIsInBhdGgiOiJcL2ZcLzgxMjczY2E3LTU1ZDgtNGNiYy04Nzk0LTFiMzk3MjVjMjYxZVwvZGdhNmU0dC0wZGI4ZjhjMy1lNTljLTQ1YjQtOGU1ZS05OTdhZDE1YzlhMjAuanBnIiwid2lkdGgiOiI8PTM2MDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.l_g3-4d6r-AZyDHigTm9byy-tFurBL7Ts73QeFCzXGg" alt="Kevin" class="company-logo">
                        </a>
                        <div class="company-details">
                            <h3>Gustavo Andres Sanchez Cerón</h3>
                            <span class="timestamp">${getCurrentTime()}</span>
                        </div>
                    </div>
                    <div class="rating-container">
                        <div class="rating">
                            ${generateStarRating(rating)}
                        </div>
                    </div>
                </div>
                <div class="review-content">
                    <p>${reviewText}</p>
                </div>
            </div>
        `;

        const reviewsGrid = document.querySelector('.reviews-grid');
        reviewsGrid.insertAdjacentHTML('afterbegin', newReview);

        // Limpiar el formulario
        document.querySelector('.review-textarea').value = '';
        document.querySelector('input[name="rate"]:checked').checked = false;
    }

    function generateStarRating(rating) {
        let html = '';
        for (let i = 5; i >= 1; i--) {
            html += `
                <input value="${i}" name="rate-new" id="new-star${i}" type="radio" ${i === parseInt(rating) ? 'checked' : ''}>
                <label title="text" for="new-star${i}"></label>
            `;
        }
        return html;
    }
    
