
var user = document.getElementsByClassName("demo")[0].innerText;
document.getElementsByClassName("demo")[0].remove();
var list_combo = document.getElementsByClassName("card");
for (let index = 0; index < list_combo.length; index++) {
    list_combo[index].value = list_combo[index].getElementsByTagName("span")[0].innerText;
    list_combo[index].getElementsByTagName("span")[0].remove();
}

function add_combo(element){
    if(user == "customer"){
        window.location.href = "?url=Home/Login/Cost_table/";
      }
      else{
        if(element.parentNode.parentNode.getElementsByTagName("select")[0].value == "Chọn chu kì gửi"){
            alert("Hãy chọn chu kì bạn muốn!");
            return;
        }
        var day_str = new Date();
        var xmlhttp = new XMLHttpRequest();
        var checked = element.parentNode.parentNode.getElementsByClassName("btn-group")[0].getElementsByTagName("input");
        var index_cycle = "";
        for (let index = 0; index < checked.length; index++) {
            if(checked[index].checked == true){
                index_cycle = element.parentNode.parentNode.getElementsByClassName("btn-group")[0].getElementsByTagName("label")[index].innerText;
                break;
            }
        }
        xmlhttp.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200){
            if(this.responseText != "null"){
                  window.location.href = this.responseText;
                //console.log(this.responseText);
            }
            else{
                alert("Thanh toán thất bại!");
            }
          }
        };
        xmlhttp.open("GET", "?url=Home/create_order_combo/" + day_str.getFullYear() + "-" + String(day_str.getMonth() + 1) + "-" + String(day_str.getDate()) + "/" + element.parentNode.parentNode.value + "/" + element.parentNode.parentNode.getElementsByTagName("select")[0].value + "/" + index_cycle + "/", true);
        xmlhttp.send();
      }
}