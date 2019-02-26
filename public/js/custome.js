// Add active class to the current button (highlight it)--------
// var header = document.getElementById("myDIV");
// var btns = header.getElementsByClassName("button");
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("active");
//   current[0].className = current[0].className.replace(" active", "");
//   this.className += " active";
//   });
// }
var store_content = document.getElementById("store_content");
var feed_content = document.getElementById("feed_content");
var cart_content = document.getElementById("cart_content");
var first = document.getElementById("fbtn");
var second = document.getElementById("sbtn");
var third = document.getElementById("tbtn");
first.addEventListener("click",function(){
	first.classList.add("btn1-active");
	second.classList.remove("btn1-active");
	third.classList.remove("btn1-active");
	store_content.style.display = "block";
	feed_content.style.display = "none";
	cart_content.style.display = "none";

})
second.addEventListener("click",function(){
	first.classList.remove("btn1-active");
	second.classList.add("btn1-active");
	third.classList.remove("btn1-active");
	store_content.style.display = "none";
	feed_content.style.display = "block";
	cart_content.style.display = "none";
})
third.addEventListener("click",function(){
	first.classList.remove("btn1-active");
	second.classList.remove("btn1-active");
	third.classList.add("btn1-active");
	store_content.style.display = "none";
	feed_content.style.display = "none";
	cart_content.style.display = "block";
})
document.getElementById("change_img").onchange = function() {
    document.getElementById("form_change_img").submit();
}