<!DOCTYPE html>
<html>
<head>

</head>
<body>

<style>
    .image-preview{
        width: 300px;
        min-height: 100px;
        border: 2px solid #dddddd;
        margin-top: 15px;

        display: flex:
        align-items: center;
        justify-content: center;
        font-weight: bold:
        color: #cccccc;
    }

    .image-preview__image{
        display: none;
        width: 100%;
    }

</style>

    <h1>Image Preview of File Upload</h1>
    <input type="file" name="inpFile" id="inpFile">
    <div class="image-preview" id="imagePreview">
        <img src="" alt="Image Preview" class="image-preview__image">
        <span class="image-preview__default-text">Image Preview</span>
    </div>

    <script>
        const inpFile = document.getElementById("inpFile");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview__image");
        const previewDefaultText= previewContainer.querySelector(".image-preview__default-text");

        inpFile.addEventListener("change",function() {
            const file = this.files[0];

            if(file)
            {
                const reader = new FileReader();

                previewDefaultText.style.display = "none";
                previewImage.style.display = "block";

                reader.addEventListener("load",function() {
                    previewImage.setAttribute("src",this.result);
                });

                reader.readAsDataURL(file);
            }

            else
            {
                previewDefaultText.style.display = null;
                previewImage.style.display = null;
                previewImage.setAttribute("src","");
            }

        });

    </script>
</body>
</html>
