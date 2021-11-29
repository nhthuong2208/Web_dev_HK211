
function add_notice(alert, string){
    return '<div class="alert ' + alert + '" role="alert"><strong>' + string + '</strong></div>';
}

document.getElementsByClassName("mybtn")[0].onclick = function(){
    var input = document.getElementsByClassName("my-login-validation")[0].getElementsByTagName("input");
    var check = 0;
    for (let index = 0; index < input.length; index++) {
        if(input[index].value == ""){
            document.getElementsByClassName("invalid-feedback")[index].style.display = "block";
            check = 1;
        }
        else{
            document.getElementsByClassName("invalid-feedback")[index].style.display = "none";
            console.log(input[index].value);
        }
    }
    if(check == 1) return;
    if(input[4].value != input[5].value){
        check = 1;
        document.getElementsByClassName("invalid-feedback")[6].style.display = "block";
    }
    else{
        document.getElementsByClassName("invalid-feedback")[6].style.display = "none";
            console.log(input[4].value + input[5].value);
    }
    if(check == 1) return;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "null1"){
                document.getElementById("notice").innerHTML = add_notice("fail", "Bạn là thành viên bị cấm" );
                document.getElementsByClassName("alert")[0].style.display = "block";
                setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
            }
            else if(this.responseText == "null2"){
                document.getElementById("notice").innerHTML = add_notice("fail", "Tài khoản của bạn đã tồn tại" );
                document.getElementsByClassName("alert")[0].style.display = "block";
                setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
            }
            else if(this.responseText == "null3"){
                document.getElementById("notice").innerHTML = add_notice("fail", "Tạo tài khoản thất bại" );
                document.getElementsByClassName("alert")[0].style.display = "block";
                setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
            }
            else if(this.responseText == "ok"){
                document.getElementById("notice").innerHTML = add_notice("success", "Tạo tài khoản thành công" );
                document.getElementsByClassName("alert")[0].style.display = "block";
                setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
                setTimeout(function(){window.location.href = "?url=/Home/Login/"});
            }
        }
    };
    xmlhttp.open("GET", "?url=Home/create_account/" + input[0].value + "/" + input[1].value + "/" + input[2].value + "/" + input[3].value + "/" + input[4].value + "/", true);
    xmlhttp.send();

};