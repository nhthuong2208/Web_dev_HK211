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
var pwd = click[2].getElementsByTagName("span")[0].innerText;
click[2].getElementsByTagName("span")[0].remove();

function upload_pic(element){
    var fileSelected = element.files;
    if (fileSelected.length > 0) {
        var fileToLoad = fileSelected[0];
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoaderEvent) {
            var srcData = fileLoaderEvent.target.result;
            var newImage = document.createElement('img');
            newImage.src = srcData;
            element.parentNode.children[0].innerHTML = newImage.outerHTML;
        }
        fileReader.readAsDataURL(fileToLoad);
    }
}


document.getElementsByTagName("button")[3].onclick = function(){
    if(document.getElementsByTagName("button")[3].innerText == "Thiết lập tài khoản"){
        document.getElementsByTagName("button")[3].innerText = "Xác nhận";
        var form = document.getElementsByTagName("button")[3].parentNode.parentNode;
        form.innerHTML = "<form action=\"?url=Home/update_profile\" method=\"POST\" enctype=\"multipart/form-data\" onsubmit=\"return false\">" + form.innerHTML + "</form>";
        var linkimg = click[0].parentNode.parentNode.parentNode.getElementsByTagName("img")[0].getAttribute("src");
        document.getElementsByTagName("button")[3].parentNode.parentNode.getElementsByClassName("col-12")[1].attributes[0].value = 'col-12 border_bot mt-3 mb-3 ';
        var profile = document.getElementsByTagName("button")[3].parentNode.parentNode.getElementsByClassName("row")[0];
        var fname = profile.getElementsByClassName("col-7")[0].innerText;
        var user = profile.getElementsByClassName("col-7")[1].innerText;
        var cmnd = profile.getElementsByClassName("col-7")[2].innerText;
        var phone = profile.getElementsByClassName("col-7")[3].innerText;
        var add = profile.getElementsByClassName("col-7")[4].innerText;
        profile.innerHTML = "<div class=\"col-12 d-flex justify-content-center mb-5\"><label for=\"file_pic\" style=\"cursor: pointer;\"><img src=\"" + linkimg + "\" alt=\"profile\" class=\"profile\"></label><input type=\"file\" id=\"file_pic\" name=\"file_pic\" onchange=\"upload_pic(this)\"hidden></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Họ tên:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\" name=\"fname\" value=\"" + fname + "\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Tên đăng nhập:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\"  name=\"username\" value=\"" + user + "\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Mật khẩu:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"password\" name=\"pwd\" value=\"" + pwd + "\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">CMND/CCCD:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\"  name=\"cmnd\" value=\"" + cmnd + "\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Số điện thoại:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\"  name=\"phone\" value=\"" + phone + "\"></div>";
        profile.innerHTML += "<div class=\"col-5 col-md-3\">Địa chỉ:</div>";
        profile.innerHTML += "<div class=\"col-7 col-md-8\"><input type=\"text\"  name=\"address\" value=\"" + add + "\"></div>";
        document.getElementsByTagName("button")[3].onclick = function(){
            document.getElementsByTagName("button")[3].parentNode.parentNode.submit();
        }
    }
};