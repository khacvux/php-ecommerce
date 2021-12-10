let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});


//select all product
function toggle(source) {
  checkboxes = document.getElementsByName('check');
      for(var i=0, n=checkboxes.length;i<n;i++) {
          checkboxes[i].checked = source.checked;
      }
  }

// input file
$('#button').click(function () {
  $("input[type='file']").trigger('click');
})

$("input[type='file']").change(function () {
  $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
})