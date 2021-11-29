filterSelection("all");
function filterSelection(c) {
  let x;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (let i = 0; i < x.length; i++) {
    removeClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
  }
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

// Add active class to the current control button (highlight it)
let btnContainer = document.getElementById("myBtnContainer");
let tabs = btnContainer.getElementsByClassName("tab-filter");
for (let i = 0; i < tabs.length; i++) {
  tabs[i].addEventListener("click", function() {
    let current = btnContainer.getElementsByClassName("active-filter");
    current[0].className = current[0].className.replace(" active-filter", "");
    this.className += " active-filter";
  });
}

//---------------------------------------------------------------------------------------------------------
function minus(element){
  var input = element.parentNode.parentNode.getElementsByTagName("input")[0]
  input.value = Number(input.value) - 1;
  if(input.value <= 0) input.value = 0;
}
function plus(element){
  var input = element.parentNode.parentNode.getElementsByTagName("input")[0]
  input.value = Number(input.value) + 1;
}


var user = document.getElementsByClassName("container-fluid")[0].getElementsByTagName("span")[0].innerText;
document.getElementsByClassName("container-fluid")[0].getElementsByTagName("span")[0].remove();

for (let index = 0; index < document.getElementsByClassName("addToCart").length; index++) {
  document.getElementsByClassName("addToCart")[index].value = document.getElementsByClassName("addToCart")[index].getElementsByTagName("span")[0].innerText;
  document.getElementsByClassName("addToCart")[index].getElementsByTagName("span")[0].remove();
}



function add_Product(element){
  if(user == "customer"){
    window.location.href = "?url=Home/Login/Products/";
  }
  else{
    var day_str = new Date();
    var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        console.log(this.responseText);
      }
	  };
    xmlhttp.open("GET", "?url=Home/create_cart/" + day_str.getFullYear() + "-" + String(day_str.getMonth() + 1) + "-" + String(day_str.getDate()) + "/" + element.value + "/" + element.parentNode.parentNode.getElementsByTagName("input")[0].value + "/", true);
    xmlhttp.send();
  }
}

function upload_pic(element){
  var fileSelected = element.files;
  if (fileSelected.length > 0) {
      var fileToLoad = fileSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoaderEvent) {
          var srcData = fileLoaderEvent.target.result;
          var newImage = document.createElement('img');
          newImage.src = srcData;
          newImage.style = "width: 50%; margin-bottom: 1rem;";
          element.parentNode.parentNode.children[1].appendChild(newImage);
      }
      fileReader.readAsDataURL(fileToLoad);
  }
}

function add_notice(string){
  if(string == "OK") return '<div class="alert success" role="alert"><strong>Xóa thành công!</strong></div>';
  return '<div class="alert fail" role="alert"><strong>Xóa thất bại!</strong></div>';
}

function remove_item(pid, element){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.responseText == "OK"){
      element.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
      document.getElementById("notice").innerHTML = add_notice(this.responseText);
      document.getElementsByClassName("alert")[0].style.display = "block";
      setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
    }
    else if(this.responseText == "Nope"){
      document.getElementById("notice").innerHTML = add_notice(this.responseText);
      document.getElementsByClassName("alert")[0].style.display = "block";
      setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
    }
    
  }
  xmlhttp.open("GET", "?url=Home/delete_item/" + pid + "/", true);
  xmlhttp.send();
}

// modal add item
var modal = document.getElementById("addItem-modal");

var btn = document.getElementById("add-itemBtn");

var span = document.getElementsByClassName("close-modal-add")[0];

if(btn){
  btn.onclick = function() {
    modal.style.display = "block";
  }
}
if(modal){
  span.onclick = function() {
    modal.style.display = "none";
  }
}
if(span){
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}