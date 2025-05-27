// apaga mensagem de erro no login após 2 segundos
const passwordError = document.getElementById("password-error");

if (passwordError) {
  setTimeout(() => {
    passwordError.style.transition = "0.5s";
    passwordError.style.opacity = "0";
  }, 2000);
}

//exibir ou retirar pop-up de filtro
const lupa = document.getElementById("lupa-button");
const popupFilter = document.querySelector(".popup-filter");

lupa.addEventListener("click", () => {
  popupFilter.classList.toggle("clicked");
});
