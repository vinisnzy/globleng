const dateInput = document.getElementById("date-input");

dateInput.addEventListener("input", function (e) {
  let value = e.target.value.replace(/\D/g, "").slice(0, 16);
  let formatted = "";

  if (value.length > 0) formatted += value.slice(0, 2);
  if (value.length > 2) formatted += "/" + value.slice(2, 4);
  if (value.length > 4) formatted += "/" + value.slice(4, 8);
  if (value.length > 8) formatted += " - " + value.slice(8, 10);
  if (value.length > 10) formatted += "/" + value.slice(10, 12);
  if (value.length > 12) formatted += "/" + value.slice(12, 16);

  e.target.value = formatted;
});
