document.addEventListener('DOMContentLoaded', function() {
    const signinElement = document.getElementById('signin');
    if (signinElement) {
        signinElement.addEventListener('click', function() {
            window.location.href = '../pages/login.php';
        });
    }
});
const profileMenu = document.querySelector("li:nth-child(1)");
const changePasswordMenu = document.querySelector("li:nth-child(2)");
const registerSellMenu = document.querySelector("li:nth-child(3)");

const profileContent = document.getElementById("profile-content");
const changePasswordContent = document.getElementById("change-password-content");
const registerSellContent = document.getElementById("register-sell-content");

function hideAllContent() {
  profileContent.style.display = "none";
  changePasswordContent.style.display = "none";
  registerSellContent.style.display = "none";
}

profileMenu.addEventListener("click", () => {
  hideAllContent(); 
  profileContent.style.display = "block"; 
});

changePasswordMenu.addEventListener("click", () => {
  hideAllContent(); 
  changePasswordContent.style.display = "block"; 
});

registerSellMenu.addEventListener("click", () => {
  hideAllContent(); 
  registerSellContent.style.display = "block"; 
});