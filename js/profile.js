document.addEventListener("DOMContentLoaded", function() {
  fetch("assests/get_subscriptions.php")
    .then(response => response.json())
    .then(data => {
      const container = document.querySelector(".box-container");
      console.log(data);
      container.innerHTML = data.map(subscription => `
          <form class="box" action="assests/delete_subscription.php" method="post">
            <input type="hidden" name="subscription_id" value="${subscription.subscription_id}">
            <input type="hidden" name="course_id" value="${subscription.corso_id}">
            <button type="submit" name="delete" class="fas fa-times"></button>
            <img src="images/${subscription.back_image}">
            <div class="name">${subscription.name}</div>
            <div class="flex">
              <div class="price"><span>${subscription.prezzo}€</span></div>
            </div>
          </form>
      `).join('');
    })
    .catch(error => console.error('Errore nel recupero delle iscrizioni:', error));
});
