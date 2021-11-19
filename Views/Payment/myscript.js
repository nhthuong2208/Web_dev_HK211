var modal = document.getElementById("myModal");
var btn = document.getElementById("credit");
var span = document.getElementsByClassName("close")[0];
var button = document.getElementsByClassName("btn btn-primary");
btn.onclick = function() {
  modal.style.display = "block";
}
button[1].onclick = function(){
    alert('Bạn đã thanh toán xong!');
}
span.onclick = function() {
  modal.style.display = "none";
}
button[2].onclick = function(){
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
console.log("hello");