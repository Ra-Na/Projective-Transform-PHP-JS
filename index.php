<form name="uploadform" action="upload.php" method="POST" enctype="multipart/form-data"/>
    Select image to upload: <input type="file" name="image" id="file" />
    <input type="submit" name="submit" value="upload"/>
</form>



<script>
document.uploadform.addEventListener('submit', function( evt ) {
    var file = document.getElementById('file').files[0];
    if(file && file.size < 1024*1024*5) { // MB (this size is in bytes)
	    //Submit form       
    } else {
        //Prevent default and display error
	    evt.preventDefault();
	    alert("File to big. The file has "+file.size/1024/1024+" MB, the limit is 5 MB.");
    }
}, false);
</script>
