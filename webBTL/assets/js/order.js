document
        .getElementById("nextButton")
        .addEventListener("click", function () {
          document.getElementById("step1").classList.add("hidden");
          document.getElementById("step2").classList.remove("hidden");
        });

document
        .getElementById("backButton")
        .addEventListener("click", function () {
          document.getElementById("step2").classList.add("hidden");
          document.getElementById("step1").classList.remove("hidden");
        });