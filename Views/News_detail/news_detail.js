document.getElementsByTagName("button")[3].onclick = function(){
    var input = document.getElementsByTagName("input");
    console.log(input[1].value);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        console.log(this.responseText);
        if (this.readyState == 4 && this.status == 200) {
            ;
        }
    };
    xmlhttp.open("GET", "?url=Home/delete_news/" + input[1].value + "/" , true);
    xmlhttp.send();
    
};

document.getElementsByClassName("add-comment")[0].getElementsByTagName("button")[0].onclick = function(){
    var text = document.getElementsByClassName("add-comment")[0].getElementsByTagName("textarea");
    var input = document.getElementsByClassName("add-comment")[0].getElementsByTagName("input")[0];

    console.log("1");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      console.log(this.responseText);
      document.getElementsByClassName("add-comment")[0].getElementsByTagName("form")[0].reset();
      
    };
    xmlhttp.open("POST", "?url=Home/add_comment_news/" + text[0].value + "/" + input.value, true);
    xmlhttp.send();
  }

  function delete_comment(cid, element){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if(this.responseText == "OK"){
        document.getElementById("notice").innerHTML = add_notice(this.responseText);
        document.getElementsByClassName("alert")[0].style.display = "block";
        setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
        setTimeout(function(){window.location.reload()}, 600);
        
        //element.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
      } else if(this.responseText == "Nope"){
        document.getElementById("notice").innerHTML = add_notice(this.responseText);
        document.getElementsByClassName("alert")[0].style.display = "block";
        setTimeout(function(){document.getElementsByClassName("alert")[0].style.opacity = 0;}, 1500);
      }
    }
    xmlhttp.open("GET", "?url=Home/delete_comment/" + cid + "/", true);
    xmlhttp.send();
  }