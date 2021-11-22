document.getElementsByTagName("form")[1].getElementsByTagName("button")[0].onclick = function(){
    var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
    var text = document.getElementsByTagName("form")[1].getElementsByTagName("textarea")[0];
    if(input[0].value == "" || input[1].value == "" || input[2].value == "" || input[3] == "" || text.value == "") return;
    console.log(input[0].value + "/" + input[1].value + "/" + input[2].value + "/" + input[3].value +"/" + text.value);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      document.getElementsByTagName("form")[1].reset();
    };
    xmlhttp.open("GET", "?url=Home/insert_message/" + input[0].value +"/" + input[1].value + "/" + input[2].value + "/" + input[3].value +"/" + text.value, true);
    xmlhttp.send(); //$_get["url"]
};
console.log(document.getElementsByTagName("form")[1].getElementsByTagName("button")[0]);