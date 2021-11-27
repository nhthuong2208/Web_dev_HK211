function inform(element){
    modal.getElementsByTagName("input")[0].value = element.parentNode.getElementsByClassName("col-9")[0].children[0].innerText;
    id_message = element.parentNode.getElementsByClassName("col-7")[0].children[0].innerText;
    modal.style.display = "block";
}

/***********************************************************/

var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
var button = document.getElementsByClassName("btn btn-primary")[4];
var id_message = "1";
span.onclick = function() {
  modal.style.display = "none";
};
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

function sendMessage(element){
  var input = element.parentNode.getElementsByTagName("input");
  var textarea = element.parentNode.getElementsByTagName("textarea")[0];
  if(input[0].value == "" || input[0].value == "" || textarea.value == ""){
      alert("Bạn chưa nhập đầy đủ");
      return;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
       if(this.responseText != "null"){
           alert("Gửi rồi nha");
       }
       var get = document.getElementsByClassName("col-12 mt-3 mydotted");
       for (let index = 0; index < get.length; index++) {
           if(get[index].getElementsByClassName("col-6")[0].innerText.split("#")[1] == id_message){
            get[index].getElementsByClassName("col-6")[1].innerText = "Đã phản hồi";
            break;
           }
       }
       modal.style.display = "none";
       modal.getElementsByTagName("input")[1].value = "";
       modal.getElementsByTagName("textarea")[0].value = ""
    }
  };
  xmlhttp.open("GET", "?url=Home/sendmessage/-" + input[0].value + "/-" + input[1].value + "/-" + textarea.value + "/" + id_message + "/", true);
  xmlhttp.send();
};
