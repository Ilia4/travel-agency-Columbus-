/* Когда пользователь нажимает на кнопку,
переключение между скрытием и отображением раскрывающегося содержимого */
document.getElementById("list").addEventListener("click" , function(){
    document.getElementById("myDropdown").classList.toggle("show");
})
  // Закройте выпадающее меню, если пользователь щелкает за его пределами
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  function profile(){
    window.location.href = "profilepage.php";
  }
  function popularTravel(){
    window.location.href = 'popularTravel.php';
  };
  function alltours(){
    window.location.href = 'alltours.php';
  }
  function main(){
    window.location.href = 'index.php';
  }
  function openForm(){
    document.getElementById("signupForm").style = "display:block";
  }
  function Close(){

    document.getElementById("signupForm").style = "display:none";
  }
  function Close2(){
  
    document.getElementById("loginForm").style = "display:none";
  }
  
  function openLogin(){
    document.getElementById("signupForm").style = "display:none";
    document.getElementById("loginForm").style = "display:block";
  }
  
  function openSignup(){
    document.getElementById("loginForm").style = "display:none";
    document.getElementById("signupForm").style = "display:block";
  }
  
  function exit(){
    window.location.href = 'exit.php';
  }


  var textInputFields = document.querySelectorAll('input[type="text"]');

        textInputFields.forEach(function(inputField) {
            inputField.addEventListener('input', function() {
                var userInput = inputField.value;
                var filteredInput = userInput.replace(/[^а-яА-Я]/g, ''); // Оставляем только буквы и пробелы
                if (userInput !== filteredInput) {
                    inputField.value = filteredInput; // Присваиваем очищенный от недопустимых символов ввод
                }
            });

            inputField.addEventListener('keydown', function(event) {
                if (![8, 9, 37, 39].includes(event.keyCode) && // Разрешаем Backspace, Tab, влево и вправо
                    !event.key.match(/[а-яА-Я]/)) { // Проверяем, содержит ли введенный символ букву или пробел
                    event.preventDefault(); // Отменяем ввод недопустимого символа
                    inputField.classList.add('invalid-input'); // Добавляем класс для подсветки
                } else {
                    inputField.classList.remove('invalid-input'); // Удаляем класс ошибки
                }
            });
        });