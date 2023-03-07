
	const showPasswordButtons = document.querySelectorAll('button[id^="showpassword"]');

      showPasswordButtons.forEach(button => {
        const passwordInput = button.previousElementSibling;

        button.addEventListener('click', () => {
          if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            button.innerHTML = '<i class="fa-solid fa-eye-slash"></i> Hide';
          } else {
            passwordInput.type = 'password';
            button.innerHTML = '<i class="fa-solid fa-eye"></i> Show ';
          }
        });
      });

      
