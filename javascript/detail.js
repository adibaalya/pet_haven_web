function toggleHeart(button) {
  button.classList.toggle("liked");
}
//hi
document.getElementById("adopt-now").addEventListener("click", function() {
  if (document.getElementById("agree").checked) {
      alert("Thank you for your interest in adopting Simba, " + document.getElementById("name").value + "!");
      document.getElementById("Adopt").style.display = "none";
  } else {
      alert("Please indicate that you agree to the terms and conditions.");
  }
});
