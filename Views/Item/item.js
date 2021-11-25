filterComment("all");

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

function minus(element){
  var a = Number(element.value) - 1;
  if(a <= 0) element.value = 0;
  else  element.value = a;
}
function plus(element){
  var a = Number(element.value) + 1;
  element.value = a;
}
function display_total(element1, element2, element3){
  var a = element1.innerText[0] * element2.innerText;
  console.log(element1.innerText);
  if(a <= 0) element3.innerText = 0;
  else element3.innerText = a + element1.innerText.slice(1, element1.innerText.length);
}

var right_content = document.getElementsByClassName("right-content")[0];
var minusBtn = right_content.getElementsByClassName("minus-qty-btn")[0];
var plusBtn = right_content.getElementsByClassName("plus-qty-btn")[0];
var qty = right_content.getElementsByTagName("input")[0];

if(minusBtn) minusBtn.onclick = function(){minus(qty);};
if(plusBtn) plusBtn.onclick = function(){plus(qty)};


function filterComment(c) {
  let x;
  x = document.getElementsByClassName("filterCmt");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (let i = 0; i < x.length; i++) {
    removeClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
  }
  if (!document.getElementById("if-no-cmt")) {
  let check = false;
  for(let i = 0; i < x.length; i++){
    if (x[i].classList.contains("show")) {
      check = true;
    }
  }
  if (!check) {
    document.getElementsByClassName("no-filter-cmt")[0].innerHTML = "<div class=\"card\"><div class=\"card-body\">No comment</div></div>";
  } else {
    document.getElementsByClassName("no-filter-cmt")[0].innerHTML = '';
  }}
}

// Show filtered elements
function addClass(element, name) {
  let arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (let i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function removeClass(element, name) {
  var arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (let i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

document.getElementsByClassName("add-comment")[0].getElementsByTagName("button")[0].onclick = function(){
  var text = document.getElementsByClassName("add-comment")[0].getElementsByTagName("textarea");
  var selection = document.getElementsByClassName("add-comment")[0].getElementsByTagName("select");
  var item = document.getElementsByClassName("right-content")[0].getElementsByClassName("title-item")[0].innerHTML;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    console.log(this.responseText);
    document.getElementsByClassName("add-comment")[0].getElementsByTagName("form")[0].reset();
    
  };
  xmlhttp.open("POST", "?url=Home/add_item_comment/" + text[0].value + "/" + selection[0].value + "/" + item, true);
  xmlhttp.send();
}

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