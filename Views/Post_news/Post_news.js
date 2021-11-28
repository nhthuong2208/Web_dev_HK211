function upload_pic(element){
  var fileSelected = element.files;
  if (fileSelected.length > 0) {
      var fileToLoad = fileSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoaderEvent) {
          var srcData = fileLoaderEvent.target.result;
          element.parentNode.children[0].src = srcData;
      }
      fileReader.readAsDataURL(fileToLoad);
  }
}