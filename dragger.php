<!DOCTYPE HTML>
<html>
<head>
<style>
#div1 {
  width: 350px;
  height: 70px;
  padding: 10px;
  border: 1px solid #aaaaaa;
   } 
  #whole{
  width:100%;
  height:100%;
  border: 1px solid #aaaaaa;

}
</style>
<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("Text", ev.target.id);
}

function drop(ev) {
  var data = ev.dataTransfer.getData("Text");
  ev.target.appendChild(document.getElementById(data));
  console.log (data);
  ev.preventDefault();
}
</script>
</head>
<body >
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <img src="/images/earth_day.jpg" id="html5" width="256px" height="256px" alt="HTML5" draggable="true" ondragstart="drag(event)" />
<div id="whole" ondrop="drop(event)" ondragover="allowDrop(event)">
<div id="div1" >some stuff</div>
<br><div id="div1" ><button >This is a draggable paragraph. Drag this element into the rectangle.</button></div>
<button id="drag1" draggable="true" ondragstart="drag(event)">This is a draggable paragraph. Drag this element into the rectangle.</button>
</div>


<script>
    $(document).ready(function () {
        $('html5').on('dragstart', function () {
            return false;
        });
    });
</script>
</body>
</html>