var acc = document.getElementsByClassName("accordion");
var i;

function selectAcc() {
  removeClass();
  this.classList.toggle("active");
  accPanel(this);
}
function accPanel(buton) {
  var panel = buton.nextElementSibling;
  if (panel.style.maxHeight){
    panel.style.maxHeight = null;
    buton.classList.remove("active");
  } else {
    var panels = document.getElementsByClassName("panel");
    for (var i = 0; i < panels.length; i++) {
      panels[i].style.maxHeight = null;
    }
    panel.style.maxHeight = panel.scrollHeight + "px";
  }
}
function removeClass(){
  for (var i = 0; i < acc.length; i++) {
    acc[i].classList.remove("active");
  }
}

for (var i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click",selectAcc);
}
