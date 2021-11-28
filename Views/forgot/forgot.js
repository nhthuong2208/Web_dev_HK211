function add_notice(string){
    if(string == "OK") return '<div class="alert alert-success" role="alert"><strong>Đã thay đổi mật khẩu của bạn<br>Vui lòng bạn kiểm tra lại email!</strong></div>';
    return '<div class="alert alert-danger" role="alert"><strong>Email không chính xác!</strong></div>';
  }


document.getElementsByClassName("card mt-3")[0].onclick = function(){
  var input = document.getElementsByClassName("card-wrapper col-md-8 border-warning")[0].getElementsByTagName("input")[0].value;
  if(input == ""){
    document.getElementById("notice").innerHTML = add_notice("nope");
    document.getElementsByClassName("alert")[0].style.display = "block";
    setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
    return;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
        if(this.responseText != "null"){
            document.getElementById("notice").innerHTML = add_notice("OK");
            document.getElementsByClassName("alert")[0].style.display = "block";
            setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
            document.getElementsByClassName("card-wrapper col-md-8 border-warning")[0].getElementsByTagName("input")[0].value = "";
            window.location.href = "?url=/Home/Login/";
        }
        else{
            document.getElementById("notice").innerHTML = add_notice("nope");
            document.getElementsByClassName("alert")[0].style.display = "block";
            setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
        }
    }
  };
  xmlhttp.open("GET", "?url=Home/change_passwork/" + input + "/", true);
  xmlhttp.send();
};