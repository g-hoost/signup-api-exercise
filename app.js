const API_POST_URL = 'http://localhost:3000/api/post.php'; // declare your endpoint
const modal = new bootstrap.Modal(document.querySelector('.modal'));
let signUpButton = document.querySelector('.signup-form form');

/**
 * Form submit
 */




document.querySelector('.signup-form form').addEventListener('submit', e =>
{
  e.preventDefault(); // prevent reload current page on submit

  // get form values
  const data = {
    username: document.querySelector('[name=username]').value,
    email: document.querySelector('[name=email]').value,
    password: document.querySelector('[name=password]').value,
    confirmPassword: document.querySelector('[name=confirm_password]').value,
    checkBox: document.querySelector('[name=checkBox]'.checked)
  }

  // send values to api
  fetch(API_POST_URL, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data)
  })
    .then(res => res.json())
    .then(res =>
    {
      console.log(res)

      // check if response is ok
      if (res === 'success') {
        modal.show();
      }
    });
});