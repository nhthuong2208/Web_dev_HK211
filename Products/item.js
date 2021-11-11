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