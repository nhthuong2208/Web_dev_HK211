// Add active class to the current control button (highlight it)
let btnContainer = document.getElementById("filter-rating-btn");
let tabs = btnContainer.getElementsByClassName("button-filter");
for (let i of tabs) {
  i.addEventListener("click", function() {
    let current = btnContainer.getElementsByClassName("current-btn");
    current[0].className = current[0].className.replace(" current-btn", "");
    this.className += " current-btn";
  });
}

// thumbnails images of item
$(document).ready(function(){
  $('.addition-img img').click(function(e) {
    e.preventDefault();
    $('.main-img img').attr("src", $(this).attr("src"));
  })
});

// Get the modal
var modal = document.getElementById("editItem-modal");

// Get the button that opens the modal
var btn = document.getElementById("edit-itemBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-modal-edit")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}