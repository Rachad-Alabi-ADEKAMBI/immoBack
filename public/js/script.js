/*function fun() {
	alert(" Welcome to JavaScript World");
}
window.onload=fun();
*/


function closeSuccessMsg(){
	document.querySelector(".success").style.display = "none";
  }

function showMenu(){
	console.log('ok')
	document.getElementById("showMenu").style.display = "none";
	document.getElementById("closeMenu").style.display = "block";
	document.getElementById("menu-list").style.display = "block";
		}

function closeMenu(event){
	document.getElementById("showMenu").style.display = "block";
	document.getElementById("closeMenu").style.display = "none";
	document.getElementById("menu-list").style.display = "none";
	event.preventDefault();
}