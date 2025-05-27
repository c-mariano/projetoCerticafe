const passwordError = document.getElementById("password-error");

if (passwordError) {
  setTimeout(() => {
    passwordError.style.transition = "0.5s";
    passwordError.style.opacity = "0";
  }, 2000);
}
