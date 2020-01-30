var e = document.getElementById("category");
e.onchange = function (){
var result = e.options[e.selectedIndex].text;
if(result === "Colleges"){
  document.getElementById("college").style.display = "block";
  document.getElementById("course").style.display = "none";
  document.getElementById("module").style.display = "none";
}else if(result === "Courses"){
  document.getElementById("college").style.display = "none";
  document.getElementById("module").style.display = "none";
  document.getElementById("course").style.display = "block";
}else if(result === "Modules"){
  document.getElementById("college").style.display = "none";
  document.getElementById("course").style.display = "none";
  document.getElementById("module").style.display = "block";
}
}
