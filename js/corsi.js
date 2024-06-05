
document.addEventListener("DOMContentLoaded", function() {
  fetch('assests/corsi.php')
    .then(response => response.json())
    .then(data => {
      const classList = document.querySelector('.class-list');

      data.forEach(classItem => {
        const progressPercentage = ((classItem.n_iscritti / classItem.max_iscritti) * 100).toFixed(0);

        const classCard = `
          <li class="scrollbar-item">
            <div class="class-card">
              <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                <img src="images/${classItem.back_image}" width="416" height="240" loading="lazy" alt="${classItem.name}" class="img-cover">
              </figure>
              <div class="card-content">
                <div class="title-wrapper">
                <img src="images/${classItem.image}" width="52" height="52" aria-hidden="true" alt=""
                    class="title-icon">
                  <h3 class="h3">
                    <a href="#" class="card-title">${classItem.name}</a>
                  </h3>
                </div>
                <p class="card-text">
                  ${classItem.descrizione}
                </p>
                <div class="card-progress">
                  <div class="progress-wrapper">
                    <p class="progress-label">Class Full</p>
                    <span class="progress-value">${progressPercentage}%</span>
                  </div>
                  <div class="progress-bg">
                    <div class="progress-bar" style="width: ${progressPercentage}%"></div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        `;

        classList.insertAdjacentHTML('beforeend', classCard);
      });
    })
    .catch(error => console.error('Errore nel recupero delle classi:', error));
});

