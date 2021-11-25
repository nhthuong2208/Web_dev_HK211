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

var click = document.getElementsByClassName("click");
click[0].onclick = function(){
    document.getElementsByClassName("click")[0].parentNode.parentNode.style.backgroundColor  = "#f6dcb8";
    document.getElementsByClassName("click")[0].parentNode.parentNode.style.borderLeft   = "3px solid #ffa62b";
    document.getElementsByClassName("click")[1].parentNode.parentNode.style.backgroundColor  = "white";
    document.getElementsByClassName("click")[1].parentNode.parentNode.style.borderLeft   = "none";
    document.getElementsByClassName("click")[2].style.display = "flex";
    document.getElementsByClassName("click")[3].style.display = "none";
};
click[1].onclick = function(){
    document.getElementsByClassName("click")[1].parentNode.parentNode.style.backgroundColor  = "#f6dcb8";
    document.getElementsByClassName("click")[1].parentNode.parentNode.style.borderLeft   = "3px solid #ffa62b";
    document.getElementsByClassName("click")[0].parentNode.parentNode.style.backgroundColor  = "white";
    document.getElementsByClassName("click")[0].parentNode.parentNode.style.borderLeft   = "none";
    document.getElementsByClassName("click")[3].style.display = "flex";
    document.getElementsByClassName("click")[2].style.display = "none";
};
for(var i = 0; i < click[3].getElementsByClassName("node").length; i++){
    var price = click[3].getElementsByClassName("node")[i].getElementsByClassName("price");
    var check = click[3].getElementsByClassName("node")[i].getElementsByTagName("h4")[1];
    if(check.innerText != "Chưa thanh toán"){
        if((Date.now() - new Date(check.innerText))/86400000 > 15) check.innerText = "Đã giao";
        else check.innerText = "Đang giao";
    }
    for (let index = 0; index < price.length; index++) {
        price[index].innerText = price[index].innerText.split(" ")[0] + " " + price[index].innerText.split(" ")[0] + " " + enformat(price[index].innerText.split(" ")[2]) + "(đ)";
    }
}

document.getElementsByTagName("button")[3].onclick = function(){
    if(document.getElementsByTagName("button")[3].innerText == "Thiết lập tài khoản"){
        document.getElementsByTagName("button")[3].innerText = "Xác nhận";
        var form = document.getElementsByTagName("button")[3].parentNode.parentNode;
        form.innerHTML = "<form action=\"?url=Home/updateprofile\" method=\"post\">" + form.innerHTML + "</form>";
        var linkimg = click[0].parentNode.parentNode.parentNode.getElementsByTagName("img")[0].getAttribute("src");
        var profile = document.getElementsByTagName("button")[3].parentNode.parentNode.getElementsByClassName("row")[0];
        
        profile.innerHTML = "<div class=\"col-12 d-flex justify-content-center mb-3\"><label for=\"file_pic\" style=\"cursor: pointer;\"><img src=\"" + linkimg + "\" alt=\"profile\"></label><input type=\"file\" id=\"file_pic\" name=\"file_pic\" hidden></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Họ tên:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\" name=\"fname\" value=\"Phạm Minh Hiếu\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Tên đăng nhập:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\"  name=\"username\" value=\"Phạm Minh Hiếu\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Mật khẩu:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"password\"  name=\"pwd\" value=\"Phạm Minh Hiếu\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">CMND/CCCD:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\"  name=\"cmnd\" value=\"Phạm Minh Hiếu\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Số điện thoại:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\"  name=\"phone\" value=\"Phạm Minh Hiếu\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Địa chỉ:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\"  name=\"address\" value=\"tx Gò Công, Tiền Giang\"></div>";
    }
};