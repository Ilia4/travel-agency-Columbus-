document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete');
    const submitButtons = document.querySelectorAll('.submit');
  
    deleteButtons.forEach(button => {
      button.addEventListener('click', () => {
        const applicationId = button.dataset.id; // Получаем ID заявки
        changeStatus(applicationId, 'Отменено'); // Вызываем функцию для изменения статуса
      });
    });
  
    submitButtons.forEach(button => {
      button.addEventListener('click', () => {
        const applicationId = button.dataset.id; // Получаем ID заявки
        changeStatus(applicationId, 'Подтверждено'); // Вызываем функцию для изменения статуса
      });
    });
  });
  
  // Функция для изменения статуса заявки
  function changeStatus(applicationId, newStatus) {
    // AJAX-запрос для обновления статуса заявки
    fetch('update_status.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'applicationId=' + applicationId + '&newStatus=' + newStatus
    })
    .then(response => {
      // Обработка ответа от сервера
      if (response.ok) {
        // Обновление таблицы (если нужно)
        // ...
        alert('Статус заявки обновлен!');
        location.reload()
      } else {
        alert('Ошибка при обновлении статуса!');
      }
    })
    .catch(error => {
      console.error('Ошибка:', error);
      alert('Произошла ошибка!');
    });
  }
 
  const addTourButton = document.querySelector('.add-tour');
        const addCountryButton = document.querySelector('.add-country');
        const addHotelButton = document.querySelector('.add-hotel');
        const deleteTourButton = document.querySelector('.delete-tour');
        const deleteCountryButton = document.querySelector('.delete-country');
        const deleteHotelButton = document.querySelector('.delete-hotel');
        const exitButton = document.getElementById('exit');

        const addTourContainer = document.querySelector('.add-tour-container');
        const addCountryContainer = document.querySelector('.add-country-container');
        const addHotelContainer = document.querySelector('.add-hotel-container');
        const deleteHotels = document.querySelector(".deleteHotels")
        const deleteCountry = document.querySelector(".deleteCountry")
        const deleteTours = document.querySelector(".deleteTours")
        
        addTourButton.addEventListener('click', () => {
            addTourContainer.style.display = 'block';
            addCountryContainer.style.display = 'none';
            addHotelContainer.style.display = 'none';
            deleteHotels.style.display = 'none';
            deleteCountry.style.display = 'none';
            deleteTours.style.display = 'none';
        });

        addCountryButton.addEventListener('click', () => {
            addCountryContainer.style.display = 'block';
            addTourContainer.style.display = 'none';
            addHotelContainer.style.display = 'none';
            deleteHotels.style.display = 'none';
            deleteCountry.style.display = 'none';
            deleteTours.style.display = 'none';
        });

        addHotelButton.addEventListener('click', () => {
            addHotelContainer.style.display = 'block';
            addCountryContainer.style.display = 'none';
            addTourContainer.style.display = 'none';
            deleteHotels.style.display = 'none';
            deleteCountry.style.display = 'none';
            deleteTours.style.display = 'none';
        });
        
        deleteHotelButton.addEventListener('click', function(){
            deleteHotels.style.display = 'block';
            addHotelContainer.style.display = 'none';
            addCountryContainer.style.display = 'none';
            addTourContainer.style.display = 'none';
            deleteCountry.style.display = 'none';
            deleteTours.style.display = 'none';
        });

        deleteCountryButton.addEventListener('click', function(){
          deleteHotels.style.display = 'none';
          addHotelContainer.style.display = 'none';
          addCountryContainer.style.display = 'none';
          addTourContainer.style.display = 'none';
          deleteCountry.style.display = 'block';
          deleteTours.style.display = 'none';
      });

      deleteTourButton.addEventListener('click', function(){
        deleteHotels.style.display = 'none';
        addHotelContainer.style.display = 'none';
        addCountryContainer.style.display = 'none';
        addTourContainer.style.display = 'none';
        deleteCountry.style.display = 'none';
        deleteTours.style.display = 'block';
    });