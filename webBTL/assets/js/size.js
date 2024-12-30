function showSection(section) {
  document.getElementById("womenMenu").style.display =
    section === "women" ? "flex" : "none";
  document.getElementById("menMenu").style.display =
    section === "men" ? "flex" : "none";

  document
    .querySelectorAll(".content")
    .forEach((el) => (el.style.display = "none"));

  if (section === "women") {
    showContent(
      "womenShoesContent",
      document.querySelector("#womenMenu li:first-child")
    );
  } else if (section === "men") {
    showContent(
      "menShoesContent",
      document.querySelector("#menMenu li:first-child")
    );
  }

  document
    .querySelectorAll(".size__main > ul:first-of-type li")
    .forEach((li) => li.classList.remove("active"));
  document
    .querySelector(
      `.size__main > ul:first-of-type li[onclick="showSection('${section}')"]`
    )
    .classList.add("active");
}

function showContent(contentId, element) {
  document
    .querySelectorAll(".content")
    .forEach((el) => (el.style.display = "none"));

  document.getElementById(contentId).style.display = "block";

  document
    .querySelectorAll("#womenMenu li, #menMenu li")
    .forEach((li) => li.classList.remove("sub-active"));
  element.classList.add("sub-active");
}

window.onload = function () {
  showSection("women"); 
};