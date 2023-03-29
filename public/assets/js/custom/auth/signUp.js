$(document).ready(function() {
    const form = $("#SignUp");
    const usernameInput = $('#username');
    const passwordInput = $('#password');
    const emailInput = $('#email');
    const nameInput = $('#name');
    const passwordConfirmationInput = $('#password_confirmation');
  
    form.submit(function(e) {
      e.preventDefault();
  
      const username = usernameInput.val();
      const password = passwordInput.val();
      const email = emailInput.val();
      const name = nameInput.val();
      const passwordConfirmation = passwordConfirmationInput.val();
  
      if (!username) {
        showErrorAlert('Username tidak boleh kosong.');
        return;
      }
  
      if (!email) {
        showErrorAlert('Email tidak boleh kosong.');
        return;
      }
  
      if (!name) {
        showErrorAlert('Nama tidak boleh kosong.');
        return;
      }
  
      if (!password) {
        showErrorAlert('Password tidak boleh kosong.');
        return;
      }
  
      if (password !== passwordConfirmation) {
        showErrorAlert('Password tidak sama.');
        return;
      }
  
      registerUser(username, name, email, password)
        .then((response) => {
          if (response.status) {
            showSuccessAlert(response);
            window.location.href = base_url + 'dashboard';
          } else {
            showErrorAlert(response);
          }
        })
        .catch(() => {
          showErrorAlert('Silahkan hubungi admin.');
        });
    });
  
    function registerUser(username, name, email, password) {
      return $.ajax({
        url: `${base_url}sign-up`,
        type: "POST",
        data: {
          username,
          name,
          email,
          password,
        },
        dataType: "JSON"
      });
    }
  
    function showErrorAlert(text) {
      Swal.fire({
        icon: 'error',
        title: 'Peringatan!',
        text
      });
    }
  
    function showSuccessAlert(response) {
      Swal.fire({
        icon: response.icon,
        title: response.title,
        text: response.text,
        timer: 3000,
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false,
      });
    }
  });
  