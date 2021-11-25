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