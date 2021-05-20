<!DOCTYPE html>
<html>
<style>
#div-to-be-changed{
    height: 100px;
    width: 100%;
    border: 3px solid red;
}
</style>
<body>

    <div id="div-to-be-changed"></div>

    <input id="written-text" placeholder="Type something">

    <script>
            function changeText()
            {
                document.getElementById("div-to-be-changed").textContent = document.getElementById("written-text").value;
            }
    </script>
    <button onclick="changeText()">Change Text</button>
</body>
</html>
