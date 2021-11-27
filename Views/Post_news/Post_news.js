document.getElementsByTagName("form")[1].getElementsByTagName("button")[0].onclick = function(){
    var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
    var text_area = document.getElementsByTagName("form")[1].getElementsByTagName("textarea");
    var img = document.getElementsByTagName("form")[1].getElementsByTagName("img");
    if(input[0].value == "" || input[1].value == "" || input[2].value == "" || text_area[0].value == "" || text_area[1].value == "") return;

    console.log(input[2].value);
    console.log(input[0].value);
    console.log(text_area[0].value);
    console.log(input[1].value);
    console.log(text_area[1].value);
    console.log(img.src);

    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() {
      console.log(this.responseText);
      document.getElementsByTagName("form")[1].reset();
    };

    xmlhttp.open("GET", "?url=Home/insert_news/" + input[2].value +"/" + input[0].value + "/" + input[0].value + "/" + input[1].value +"/" + text_area[1].value, true);
    xmlhttp.send();
  };

function upload_pic(element){
  var fileSelected = element.files;
  if (fileSelected.length > 0) {
      var fileToLoad = fileSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoaderEvent) {
        var srcData = fileLoaderEvent.target.result;
        var newImage = document.createElement('img');
        newImage.src = srcData;
        newImage.style= "width:300px;" 
        element.parentNode.children[0].innerHTML = newImage.outerHTML;
      }
      fileReader.readAsDataURL(fileToLoad);
  }
}
