
function minus(element){
    var a = Number(element.innerText) - 1;
    if(a <= 0) element.innerText = 0;
    else  element.innerText = a;
}
function plus(element){
    var a = Number(element.innerText) + 1;
    if(a <= 0) element.innerText = 0;
    else  element.innerText = a;
}
function display_total(element1, element2, element3){
    var a = element1.innerText[0] * element2.innerText;
    console.log(element1.innerText);
    if(a <= 0) element3.innerText = 0;
    else element3.innerText = a + element1.innerText.slice(1, element1.innerText.length);
}

var node = document.getElementsByClassName("node")[0];
var price = node.getElementsByClassName("price")[0];
var total = node.getElementsByClassName("total")[0];
var click = node.getElementsByClassName("click");
var value_click = node.getElementsByClassName("value_click")[0];
var remove = node.getElementsByClassName("fas fa-times")[0];

click[0].onclick = function(){minus(value_click);display_total(price, value_click, total);};
click[1].onclick = function(){plus(value_click);display_total(price, value_click, total);};
remove.onclick = function(){console.log(node.parentNode.remove())};

/***********************************************************/

var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var button = document.getElementsByClassName("btn btn-primary")[2];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
button.onclick = function(){
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}