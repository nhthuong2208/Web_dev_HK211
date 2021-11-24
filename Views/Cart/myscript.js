
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
    element3.innerText = enformat(String(Number(deformat(element1.innerText.split("(")[0])) * Number(element2.innerText))) + "(VND)";
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
function minusnode(element){
    var row = element.parentNode.parentNode.parentNode;
    minus(row.getElementsByClassName("value_click")[0]);
    display_total(row.getElementsByClassName("price")[0], row.getElementsByClassName("value_click")[0], row.getElementsByClassName("total")[0]);
}
function plusnode(element){
  var row = element.parentNode.parentNode.parentNode;
  plus(row.getElementsByClassName("value_click")[0]);
  display_total(row.getElementsByClassName("price")[0], row.getElementsByClassName("value_click")[0], row.getElementsByClassName("total")[0]);
}
function remove_product_incart(element){
  var id = element.parentNode.parentNode.value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    console.log(this.responseText);
    if(this.responseText == "ok"){
        window.location.href = "?url=Home/Login/";
    }
    element.parentNode.parentNode.remove();
  };
  xmlhttp.open("GET", "?url=Home/delete_product_incart/" + id + "/", true);
  xmlhttp.send();
}

var node = document.getElementsByClassName("node");
for(var i = 0; i < node.length ; i++){
  node[i].parentNode.value = node[i].getElementsByClassName("demo")[0].innerText;
  node[i].getElementsByClassName("demo")[0].remove();
  var price = node[i].getElementsByClassName("price")[0];
  var total = node[i].getElementsByClassName("total")[0];

  price.innerText = enformat(price.innerText.split("(")[0]) + "(VND)";
  total.innerText = enformat(total.innerText.split("(")[0]) + "(VND)";
}


var list = document.getElementsByClassName("container-fuild")[0].children[0].children[1];
console.log(list);

/***********************************************************/

var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var button = document.getElementsByClassName("btn btn-primary")[4];

btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
};
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
var id = document.getElementById("id");
console.log(id);
button.value = id.innerText;
id.remove();

button.onclick = function(){
  var input = button.parentNode.getElementsByTagName("input");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    console.log(this.responseText);
    modal.style.display = "none";
  };
  xmlhttp.open("GET", "?url=Home/update_user/" + button.value + "/" + input[0].value + "/" + input[1].value + "/" + input[2].value + "/", true);
  xmlhttp.send();
};
