document.getElementsByClassName("container-fuild")[0].classList.add("white");
function see_profile(element){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != "null"){
                modal.getElementsByTagName("button")[0].value = element.value;
                modal.getElementsByTagName("button")[1].value = element.value;
                modal.getElementsByClassName("modal-body")[0].innerHTML = this.responseText;
                modal.style.display = "block";
            }
            else{
                document.getElementById("notice").innerHTML = add_notice("fail", "Danh sách thành viên bị lỗi" );
                document.getElementsByClassName("alert")[0].style.display = "block";
                setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
            }
        }
    };
    xmlhttp.open("GET", "?url=Home/get_user/" + element.value +"/", true);
    xmlhttp.send();
  
}
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
var modal_button = document.getElementsByClassName("modal-button");

span.onclick = function() {
  modal.style.display = "none";
};
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
function remove_account(element){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != "null"){
                var list = document.getElementsByClassName("card card_node");
                for (let index = 0; index < list.length; index++) {
                    if(list[index].getElementsByTagName("button")[0].value == element.value){
                        list[index].parentNode.remove();
                        break;
                    }
                }
                document.getElementById("notice").innerHTML = add_notice("success", "Xóa tài khoản thành công" );
                document.getElementsByClassName("alert")[0].style.display = "block";
                setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
                modal.style.display = "none";
            }
            else{
                document.getElementById("notice").innerHTML = add_notice("fail", "Xóa tài khoản thất bại" );
                document.getElementsByClassName("alert")[0].style.display = "block";
                setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
            }
        }
    };
    xmlhttp.open("GET", "?url=Home/remove_user/" + element.value +"/", true);
    xmlhttp.send();
}

function ban_account(element){
    var value = element.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != "null"){
                var list = document.getElementsByClassName("card card_node");
                for (let index = 0; index < list.length; index++) {
                    if(list[index].getElementsByTagName("button")[0].value == value){
                        console.log("hello");
                        list[index].parentNode.remove();
                        break;
                    }
                }
                console.log(this.responseText);
                document.getElementById("notice").innerHTML = add_notice("success", "Cấm tài khoản thành công" );
                document.getElementsByClassName("alert")[0].style.display = "block";
                setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
                modal.style.display = "none";
            }
            else{
                document.getElementById("notice").innerHTML = add_notice("fail", "Cấm tài khoản thất bại" );
                document.getElementsByClassName("alert")[0].style.display = "block";
                setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
            }
        }
    };
    xmlhttp.open("GET", "?url=Home/ban_user/" + element.value +"/", true);
    xmlhttp.send();
}

function add_notice(alert, string){
    return '<div class="alert ' + alert + '" role="alert"><strong>' + string + '</strong></div>';
}
/*
button.onclick = function(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    modal.style.display = "none";
  };
  xmlhttp.open("GET", "?url=Home/update_user/", true);
  xmlhttp.send();
  
};*/
