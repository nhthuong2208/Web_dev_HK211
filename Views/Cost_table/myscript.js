
var user = document.getElementsByClassName("demo")[0].innerText;
document.getElementsByClassName("demo")[0].remove();
var list_combo = document.getElementsByClassName("card");
for (let index = 0; index < list_combo.length; index++) {
    list_combo[index].value = list_combo[index].getElementsByTagName("span")[0].innerText;
    list_combo[index].getElementsByTagName("span")[0].remove();
}

var forms = document.querySelectorAll('.needs-validation')
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })


function add_combo(element){
    if(user == "customer"){
        window.location.href = "?url=Home/Login/Cost_table/";
      }
      else{
        if(element.parentNode.parentNode.getElementsByTagName("select")[0].value == "Chọn chu kì gửi"){
          document.getElementById("notice").innerHTML = add_notice("fail", "Bạn chưa chọn chu kì");
          document.getElementsByClassName("alert")[0].style.display = "block";
          setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
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
              document.getElementById("notice").innerHTML = add_notice("success", "Đã thêm thành công");
              document.getElementsByClassName("alert")[0].style.display = "block";
              setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
            }
            else{
              document.getElementById("notice").innerHTML = add_notice("fail", "Thêm thất bại");
              document.getElementsByClassName("alert")[0].style.display = "block";
              setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
            }
          }
        };
        xmlhttp.open("GET", "?url=Home/create_order_combo/" + day_str.getFullYear() + "-" + String(day_str.getMonth() + 1) + "-" + String(day_str.getDate()) + "/" + element.parentNode.parentNode.value + "/" + element.parentNode.parentNode.getElementsByTagName("select")[0].value + "/" + index_cycle + "/", true);
        xmlhttp.send();
      }
}

function add_notice(alert, string){
  return '<div class="alert ' + alert + '" role="alert"><strong>' + string + '</strong></div>';
}

function remove_combo(cid, element){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.responseText == "OK"){
      element.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
      document.getElementById("notice").innerHTML = add_notice("success", "Đã xóa combo");
      document.getElementsByClassName("alert")[0].style.display = "block";
      setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
    } else if(this.responseText == "Nope"){
      document.getElementById("notice").innerHTML = add_notice("fail", "Xóa thất bại");
      document.getElementsByClassName("alert")[0].style.display = "block";
      setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
    }
  }
  xmlhttp.open("GET", "?url=Home/delete_combo/" + cid + "/", true);
  xmlhttp.send();
}

document.getElementById("add_cycle_Btn").onclick = function(){
  var form = document.getElementById("add_cycle");
  if(form.style.display == ""){
    form.style.display = "block";
  } else if(form.style.display == "block"){
    form.style.display = "none";
  } else if(form.style.display == "none"){
    form.style.display = "block";
  }
}

// modal add item
var modal = document.getElementById("addCombo-modal");
// var modal_update = document.getElementById("updateCombo-modal");

var btn = document.getElementById("addCombo-btn");
// var btn_update = document.getElementById("updateCombo-btn");

var span = document.getElementsByClassName("close-modal-addc")[0];
// var span_update = document.getElementsByClassName("close-modal-addc-update")[0];


if(btn){
  btn.onclick = function() {
    modal.style.display = "block";
  }
}
if(modal){
  span.onclick = function() {
    modal.style.display = "none";
  }
}
if(span){
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}

// if(btn_update){
//   btn_update.onclick = function() {
//     modal_update.style.display = "block";
//   }
// }
// if(modal_update){
//   span_update.onclick = function() {
//     modal_update.style.display = "none";
//   }
// }
// if(span_update){
//   window.onclick = function(event) {
//     if (event.target == modal_update) {
//       modal_update.style.display = "none";
//     }
//   }
// }

function update_combo(id){
  let model_id = "updateCombo-modal-" + id;
  var modal_update = document.getElementById(model_id);

  let span_id = "close-modal-addc-update-" + id;
  var span_update = document.getElementsByClassName(span_id)[0];

  modal_update.style.display = "block";

  if(modal_update){
    span_update.onclick = function() {
      modal_update.style.display = "none";
    }
  }
  if(span_update){
    window.onclick = function(event) {
      if (event.target == modal_update) {
        modal_update.style.display = "none";
      }
    }
  }
}
