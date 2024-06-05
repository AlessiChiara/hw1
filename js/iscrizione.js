
document.addEventListener("DOMContentLoaded", function () {
  fetch('assests/get_courses.php')
    .then(response => response.json())
    .then(data => {
      const priceGrid = document.querySelector('.price__grid');


      data.forEach(course => {
        const courseCard = `
          <form action="join_course.php" method="post" class="course-form" data-course-id="${course.id}">
              <div class="price__card">
                  <div class="price__card__content">
                      <h4>${course.name}</h4>
                      <h3 id="price-${course.id}" data-mensile="${course.prezzo}">${course.prezzo}€</h3>
                      <label for="scegli-piano-${course.id}">Scegli piano:</label>
                      <select id="scegli-piano-${course.id}" name="plan" data-course-id="${course.id}">
                          <option value="mensile">Mensile</option>
                          <option value="semestrale">Semestrale</option>
                          <option value="annuale">Annuale</option>
                      </select>
                  </div>
                  <button type="submit" class="btn price__btn">Join Now</button>
              </div>
          </form>
        `;

        priceGrid.insertAdjacentHTML('beforeend', courseCard);
      });


      document.querySelectorAll('select[name="plan"]').forEach(select => {
        select.addEventListener('change', function () {
          const courseId = this.dataset.courseId;
          const selectedPlan = this.value;
          const priceElement = document.getElementById(`price-${courseId}`);
          const basePrice = parseFloat(priceElement.dataset.mensile);

          let updatedPrice;
          if (selectedPlan === 'mensile') {
            updatedPrice = basePrice;
          } else if (selectedPlan === 'semestrale') {
            updatedPrice = basePrice * 6;
          } else if (selectedPlan === 'annuale') {
            updatedPrice = basePrice * 12;
          }

          priceElement.textContent = `${updatedPrice.toFixed(2)}€`;
        });
      });

      document.querySelectorAll('.course-form').forEach(form => {
        form.addEventListener('submit', function (event) {
          event.preventDefault();

          const courseId = this.dataset.courseId;
          const formData = new FormData(this);
          formData.append('course_id', courseId);

          fetch('assests/join_course.php', {
            method: 'POST',
            body: formData
          })
            .then(response => response.json())
            .then(data => {
              if (data.status === 'full') {
                alert('Il corso ha raggiunto il numero massimo di iscritti.');
              } else if (data.status === 'already_joined') {
                alert('Sei già iscritto a questo corso.');
              } else if (data.status === 'joined') {
                alert('Iscrizione completata con successo!');
                const submitButton = this.querySelector('.price__btn');
                submitButton.disabled = true;
                submitButton.textContent = 'Iscritto';
              }
            })
            .catch(error => console.error('Errore durante l\'iscrizione:', error));
        });
      });
    })
    .catch(error => console.error('Errore nel recupero dei corsi:', error));
});

