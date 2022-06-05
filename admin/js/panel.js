const fileInput = document.getElementById("file-input");
const form = document.getElementById("form");

function uploadImage(){
    fileInput.click();
}

fileInput.onchange = ({target})=>{
    let file = target.files[0];
    if(file){
      let fileName = file.name;
      let size = file.size;
      let fileSize;

      if(size < 1024)
        fileSize = size + " B";
      else if(size < 102400)
        fileSize = (size/1024).toFixed(2) + " KB";
      else
        fileSize = (size/(1024*1024)).toFixed(2) + " MB";

      console.log("going to upload "+fileName);
      console.log("its size is "+fileSize);

      if(fileName.length >= 12){
        let splitName = fileName.split('.');
        fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
      }
      form.submit();
    }
  }

  function editImages(){
    window.location.replace('edit.php');
  }