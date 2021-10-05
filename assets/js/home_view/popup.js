// When the user clicks on <div>, open the popup
function myFunction() {


    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");

    // Check if the popup is shown
    if (popup.classList.contains("show")) {
        setTimeout(() => popup.classList.remove("show"), 8000) // If yes hide it after 10000 milliseconds
    }

}

window.onload = myFunction();