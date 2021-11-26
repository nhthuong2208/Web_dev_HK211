
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
  var node = document.getElementsByClassName("card");
  node[0].getElementsByTagName("h3")[0].innerText = enformat(node[0].getElementsByTagName("h3")[0].innerText.split("/")[0]) + "(đ)/" + node[0].getElementsByTagName("h3")[0].innerText.split("/")[1];
  document.getElementsByClassName("total")[0].getElementsByClassName("col-12")[3].getElementsByTagName("span")[0].innerText = enformat(String(Number(document.getElementsByClassName("total")[0].getElementsByClassName("col-12")[0].getElementsByTagName("span")[0].innerText) - 28000)) + "(đ)";
  document.getElementsByClassName("total")[0].getElementsByClassName("col-12")[0].getElementsByTagName("span")[0].innerText = enformat(document.getElementsByClassName("total")[0].getElementsByClassName("col-12")[0].getElementsByTagName("span")[0].innerText) + "(đ)";
  
  
  // ----------------------------------------------------------
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("credit");
  var span = document.getElementsByClassName("close")[0];
  var button = document.getElementsByClassName("btn btn-primary");
  btn.onclick = function() {
    modal.style.display = "block";
  }
  button[2].onclick = function(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      console.log(this.responseText);
      if (this.readyState == 4 && this.status == 200){
          if(this.responseText != "null"){
            alert('Mời bạn xem thêm các sản phẩm khác!');
              window.location.href = this.responseText;
            }
          else alert("Hủy thất bại");
      }
    };
    xmlhttp.open("GET", "?url=Home/delete_order_combo/", true);
    xmlhttp.send();
  }
  button[3].onclick = function(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
          if(this.responseText != "null"){ 
            alert('Bạn đã thanh toán xong!');
            window.location.href = this.responseText;
        }
          else alert("Thêm thất bại");
      }
    };
    xmlhttp.open("GET", "?url=Home/update_order_combo/", true);
    xmlhttp.send();
  }
  span.onclick = function() {
    modal.style.display = "none";
  }
  button[4].onclick = function(){
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }