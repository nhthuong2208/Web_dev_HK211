document.getElementsByTagName("button")[3].onclick = function(){
    var input = document.getElementsByTagName("input");
    console.log("1");
    console.log(input[1].value);
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "?url=Home/delete_news/" + input[1].value, true);
    xmlhttp.send();
    
};