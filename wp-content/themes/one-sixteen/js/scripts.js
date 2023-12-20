$(document).ready(function(){

	// =============== //
	// == Overrides == //
	// =============== //

    // Prevent focus state on click
    $("a", "button", "input", "select", "textarea").mousedown(function(e){
        e.preventDefault();
    })

    // =================== //
	// == Header Scroll == //
	// =================== //

	var vertScrollStart = $('html').scrollTop() || $('body').scrollTop();
    var lastScrollTop = 0;

	if(vertScrollStart <= 0) {
		$( "#masthead.scroll-enabled" ).addClass("top");
	}	

	$(window).scroll(function() {
	    var vertScroll = $('html').scrollTop() || $('body').scrollTop();
	    if(vertScroll <= 0) {
	        $("#masthead.scroll-enabled").addClass("top");
	    }
	    else {
	    	$( "#masthead.scroll-enabled" ).removeClass("top");
	    }	  
	});

	$(window).scroll(function(event) {
		var st = $(this).scrollTop();
		if (st > lastScrollTop) {
			$( "#masthead.scroll-enabled" ).addClass("hide"); // Downscroll
		} 
        else {
			$( "#masthead.scroll-enabled" ).removeClass("hide"); // Upscroll
		}
		if(lastScrollTop <= 0) {
			$( "#masthead.scroll-enabled" ).removeClass("hide"); // Upscroll
		}
		lastScrollTop = st;
	});

    // ==================== //
	// == Hamburger Menu == //
	// ==================== //

	$("#hamburger-opener button").click(function(){
		$( "#hamburger-links" ).addClass("open");
		$( "#hamburger-image" ).addClass("open");
		setTimeout(function() {
			$( "body" ).addClass("menu-open");
		}, 300);
	});

	$("#hamburger-closer button").click(function(){
		$( "#hamburger-links" ).removeClass("open");
		$( "#hamburger-image" ).removeClass("open");
		$( "body" ).removeClass("menu-open");
	});


    // ================== //
	// == Menu Display == //
	// ================== //

	// Set menu variables
	const menuWrapper = document.querySelector("#menu-wrapper .v-align");
	const desktopMenu = document.querySelector("#desktop-menu");
	const mobileMenu = document.querySelector("#mobile-menu");

	// Run showMenu() function on load
	// And every time the browser is resized
	showMenu();	
	$(window).resize(function(){ showMenu(); });

	// Check the current screen size
	// Then add/remove the menu to the DOM
	function showMenu() {
		if (window.innerWidth < 992) {
			menuWrapper.appendChild(mobileMenu);
			desktopMenu.remove();
		}
		else {
			menuWrapper.appendChild(desktopMenu);
			mobileMenu.remove();
		}
	}

	// ================ //
	// == Accordions == //
	// ================ //

	var acc = document.getElementsByClassName("accordion-link");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].onclick = function(){
			this.classList.toggle("active");
			this.nextElementSibling.classList.toggle("show");
		}
	}

	// =================== //
	// == Photo Gallery == //
	// =================== //

	$(".imagebox").colorbox({
		maxWidth: '80%',
		maxHeight: '80%', 
		rel: 'gallery',
		fixed: true,
		close: "X Close"
	});

	// ==================== //
	// == Number Counter == //
	// ==================== //

	// Edge / IE fix
	if (document.documentMode || /Edge/.test(navigator.userAgent) || /Edg/.test(navigator.userAgent)) {
		$( "#number-counter .column .number" ).addClass("msft");
	}

}); 


// ======================================= //
// ========== VanillaJS Rewrite ===========//
// ========================================//

document.addEventListener("DOMContentLoaded", function() {

	// =================== //
	// == Partner Logos == //
	// =================== //

	const button = document.getElementById('featured-logos-button');
	const secondaryLogos = document.querySelector("#featured-logos .secondary-logos");

	button.addEventListener("click", function() {
		const isOpened = secondaryLogos.classList.toggle("opened");
		secondaryLogos.classList.toggle("closed", !isOpened);

		button.textContent = isOpened ? "Show Less" : "View More";
	});

});

