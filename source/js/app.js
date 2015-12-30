// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();
window.addEventListener("load", init);

function init(){
	//alert("Hello World");
	var $menu = document.querySelector(".icon-bar");
	var $menu_item = document.querySelector(".item");
	var $menu_item_height= window.getComputedStyle($menu_item).height;
	$menu.style.width = $menu_item_height;

	$('#map iframe').addClass('scrolloff');
    $('#map').on("mouseup",function(){
        $('#map iframe').addClass('scrolloff')
    })
    $('#map').on("mousedown",function(){
        $('#map iframe').removeClass('scrolloff')
    })
    $("#map iframe").mouseleave(function () {
        $('#map').addClass('scrolloff')
    })

    
}