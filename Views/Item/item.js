filterComment("all");

var forms = document.querySelectorAll('.needs-validation')
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })

  
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
  if(a <= 1) element.value = 1;
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
if (!document.getElementById("edit-itemBtn") && document.getElementsByClassName("add-comment")[0]){
  document.getElementsByClassName("add-comment")[0].getElementsByTagName("button")[0].onclick = function(){
    var text = document.getElementsByClassName("add-comment")[0].getElementsByTagName("textarea");
    var selection = document.getElementsByClassName("add-comment")[0].getElementsByTagName("select");
    var pid = document.getElementsByClassName("get-item-id")[0].innerHTML;
    document.getElementsByClassName("get-item-id")[0].remove();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      window.location.reload();
      document.getElementsByClassName("add-comment")[0].getElementsByTagName("form")[0].reset();
    };
    xmlhttp.open("POST", "?url=Home/add_item_comment/" + text[0].value + "/" + selection[0].value + "/" + pid, true);
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
          element.parentNode.children[0].src = srcData;
      }
      fileReader.readAsDataURL(fileToLoad);
  }
}

function add_notice(string){
  if(string == "OK") return '<div class="alert success" role="alert"><strong>Xóa thành công!</strong></div>';
  return '<div class="alert fail" role="alert"><strong>Xóa thất bại!</strong></div>';
}

function add_notice1(string){
  if(string == "OK") return '<div class="alert success" role="alert"><strong>Thêm thành công!</strong></div>';
  return '<div class="alert fail" role="alert"><strong>Thêm thất bại!</strong></div>';
}

function delete_comment(cid, element){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.responseText == "OK"){
      document.getElementById("notice").innerHTML = add_notice(this.responseText);
      document.getElementsByClassName("alert")[0].style.display = "block";
      setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
      setTimeout(function(){window.location.reload()}, 600);
      
      //element.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
    } else if(this.responseText == "Nope"){
      document.getElementById("notice").innerHTML = add_notice(this.responseText);
      document.getElementsByClassName("alert")[0].style.display = "block";
      setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
    }
  }
  xmlhttp.open("GET", "?url=Home/delete_comment/" + cid + "/", true);
  xmlhttp.send();
}

function sort_comment(pid){
  var sort_value = document.getElementById("sort-with").value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    document.getElementsByClassName("comment-script")[0].innerHTML = this.responseText;
    filterComment("all");
  }
  xmlhttp.open("GET", "?url=Home/sort_comment/" + pid + "/" + sort_value + "/", true);
  xmlhttp.send();
}

var user = document.getElementsByClassName("container-fluid")[0].getElementsByTagName("span")[0].innerText;
document.getElementsByClassName("container-fluid")[0].getElementsByTagName("span")[0].remove();

function add_Product(element){
  if(user == "customer"){
    window.location.href = "?url=Home/Login/Products/";
  }
  else{
    var pid = document.getElementsByClassName("addtocart-btn")[0].getElementsByTagName("button")[0].value;
    var day_str = new Date();
    var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        if(this.responseText == "1"){
          document.getElementById("notice").innerHTML = add_notice1("OK");
          document.getElementsByClassName("alert")[0].style.display = "block";
          setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
        } else if(this.responseText == "0"){
          document.getElementById("notice").innerHTML = add_notice1("Nope");
          document.getElementsByClassName("alert")[0].style.display = "block";
          setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
        }
      }
	  };
    xmlhttp.open("GET", "?url=Home/create_cart/" + day_str.getFullYear() + "-" + String(day_str.getMonth() + 1) + "-" + String(day_str.getDate()) + "/" + pid + "/" + element.parentNode.parentNode.getElementsByTagName("input")[0].value + "/", true);
    xmlhttp.send();
  }
}

if(document.getElementById("edit-itemBtn")){
  var ival = document.getElementById("get_name_val").innerText;
  document.getElementsByClassName("editItem-modal-body")[0].getElementsByTagName("input")[0].value = ival;
}

function enformat(element){
  let nodestr = "";
    for(var j = element.length; j > 3; j -= 3){
        nodestr = "," + element[j-3] + element[j-2] + element[j-1] + nodestr;
    }
    if (element .length % 3 == 0){
        nodestr = element[0] + element[1] + element[2] + nodestr;
    }
    else if(element.length % 3 == 2){
        nodestr = element[0] + element[1] + nodestr;
    }
    else nodestr = element[0] + nodestr;
    return nodestr;
}
function deformat(element){
  var list = element.split(",");
  var string = ""
  for(var i = 0; i < list.length; i++) string += list[i];
  return string;
}

document.getElementsByClassName("item-price")[0].innerText = enformat(String(Number(document.getElementsByClassName("item-price")[0].innerText.split("đ")[0]))) + "đ";
var encode_related_item = document.getElementsByClassName("related-item-price");
for (var i = 0; i < encode_related_item.length; i++){
  encode_related_item[i].innerText = enformat(String(Number(encode_related_item[i].innerText.split("đ")[0]))) + "đ";
}

// Get the modal
var modal = document.getElementById("editItem-modal");

// Get the button that opens the modal
var btn = document.getElementById("edit-itemBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-modal-edit")[0];

// When the user clicks on the button, open the modal
if(btn){
  btn.onclick = function() {
    modal.style.display = "block";
  }
}

// When the user clicks on <span> (x), close the modal
if(span){
  span.onclick = function() {
    modal.style.display = "none";
  }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}