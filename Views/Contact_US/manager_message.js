function inform(element){
    modal.getElementsByTagName("input")[0].value = element.parentNode.getElementsByTagName("input")[1].value;
    id_message = element.parentNode.parentNode.getElementsByTagName("h4")[0].innerText.split("#")[1];
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

function add_notice(alert, string){
  return '<div class="alert ' + alert + '" role="alert"><strong>' + string + '</strong></div>';
}
function sendMessage(element){
  var input = element.parentNode.getElementsByTagName("input");
  var textarea = element.parentNode.getElementsByTagName("textarea")[0];
  if(input[0].value == "" || input[0].value == "" || textarea.value == ""){
    document.getElementById("notice").innerHTML = add_notice("fail", "Bạn chưa ghi đầy đủ thông tin");
    document.getElementsByClassName("alert")[0].style.display = "block";
    setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
      return;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      
      modal.style.display = "none";
      modal.getElementsByTagName("input")[1].value = "";
      modal.getElementsByTagName("textarea")[0].value = ""
       if(this.responseText != "null"){
        document.getElementById("notice").innerHTML = add_notice("success", "Thư đã phản hồi");
        document.getElementsByClassName("alert")[0].style.display = "block";
        setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
       var get = document.getElementsByClassName("col-12 white border-10 myshadow padding-20 mydotted");
       for (let index = 0; index < get.length; index++) {
           if(get[index].getElementsByTagName("h4")[0].innerText.split("#")[1] == id_message){
            get[index].getElementsByTagName("h6")[0].innerText = "Đã phản hồi";
            break;
           }
       }
       }
       else{
        document.getElementById("notice").innerHTML = add_notice("fail", "Thư không gửi được");
        document.getElementsByClassName("alert")[0].style.display = "block";
        setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
       }
    }
  };
  xmlhttp.open("GET", "?url=Home/sendmessage/-" + input[0].value + "/-" + input[1].value + "/-" + textarea.value + "/" + id_message + "/", true);
  xmlhttp.send();
};
