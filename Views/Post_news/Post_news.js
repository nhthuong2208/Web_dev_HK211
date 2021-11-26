document.getElementsByTagName("form")[1].getElementsByTagName("button")[0].onclick = function(){
    var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
    var text_area = document.getElementsByTagName("form")[1].getElementsByTagName("textarea");
    // if(input[0].value == "" || input[1].value == "" || input[2].value == "" || text_area[0].value == "" || text_area[1].value == "") return;
    console.log("1");
    console.log(input[0].value);
    console.log(text_area[1].value);
    console.log( text_area[0].value);
    console.log(input[1].value)
    console.log(input[2].value)
    var day = new Date();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        console.log(this.responseText);
      document.getElementsByTagName("form")[1].reset();
    };

    xmlhttp.open("GET", "?url=Home/insert_news/" + input[2].value +"/" + input[0].value + "/" + text_area[0].value + "/" + input[1].value +"/" + text_area[1].value, true);
    xmlhttp.send();
};