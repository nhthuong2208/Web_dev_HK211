
function add_notice(alert, string){
  return '<div class="alert ' + alert + '" role="alert"><strong>' + string + '</strong></div>';
}
document.getElementsByTagName("form")[1].getElementsByTagName("button")[0].onclick = function(){
    var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
    var text = document.getElementsByTagName("form")[1].getElementsByTagName("textarea")[0];

    if(input[0].value == "" || input[1].value == "" || input[2].value == "" || input[3] == "" || text.value == "") {
      
    document.getElementById("notice").innerHTML = add_notice("fail", "Bạn chưa ghi đầy đủ thông tin");
    document.getElementsByClassName("alert")[0].style.display = "block";
    setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
      return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200){
        if(this.responseText != "null"){
          document.getElementsByTagName("form")[1].reset(); 
          document.getElementById("notice").innerHTML = add_notice("success", "Cảm ơn bạn góp ý");
          document.getElementsByClassName("alert")[0].style.display = "block";
          setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
        }
        else{
          document.getElementById("notice").innerHTML = add_notice("fail", "Thư vẫn chưa được gửi");
          document.getElementsByClassName("alert")[0].style.display = "block";
          setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
        }
      }
      
    };
    xmlhttp.open("GET", "?url=Home/insert_message/" + input[0].value +"/" + input[1].value + "/" + input[2].value + "/" + input[3].value +"/" + text.value, true);
    xmlhttp.send(); //$_get["url"]
};