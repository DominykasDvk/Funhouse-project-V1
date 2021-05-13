const search = document.getElementById("search");
const projectName = document.querySelectorAll(".name");
search.addEventListener("keyup", filterProjects);
function filterProjects(e) {
    const text = e.target.value.toLowerCase();
    projectName.forEach(function (project) {
        const item = project.textContent;
        if (item.toLowerCase().indexOf(text) != -1) {
            project.parentElement.style.display = ""
        } else {
            project.parentElement.style.display = "none"
        }
    })
}

const filter = document.getElementById("filter");
const taskName = document.querySelectorAll(".taskName");
const taskID = document.querySelectorAll(".taskID");
search.addEventListener("keyup", filterProjects);
function filterProjects(e) {
    const text = e.target.value.toLowerCase();
    projectName.forEach(function (project) {
        const item = project.textContent;
        if (item.toLowerCase().indexOf(text) != -1) {
            project.parentElement.style.display = ""
        } else {
            project.parentElement.style.display = "none"
        }
    })
}

function toggle(){
  var blur = document.getElementById('blurbg');
  blur.classList.toggle('active');
  var popup = document.getElementById('newprojbox');
  popup.classList.toggle('active');
  var hide = document.getElementById('allprojects')
  hide.classList.toggle('passive');
}

function tasktoggle(){
  var taskblur = document.getElementById('blurbg');
  taskblur.classList.toggle('active');
  var taskpopup = document.getElementById('newtaskbox');
  taskpopup.classList.toggle('active');
  var taskhide = document.getElementById('alltasks')
  taskhide.classList.toggle('passive');
}


window.onscroll = function() {myFunction()};
var header = document.getElementById("projheader");
var sticky = header.offsetTop;
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
