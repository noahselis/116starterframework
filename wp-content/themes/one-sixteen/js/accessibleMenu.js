/*
An accessible menu for WordPress
https://github.com/argenteum/accessible-nav-wp
Licensed GPL v.2 (http://www.gnu.org/licenses/gpl-2.0.html)
This work derived from:
https://github.com/WordPress/twentysixteen (GPL v.2)
https://github.com/wpaccessibility/a11ythemepatterns/tree/master/menu-keyboard-arrow-nav (GPL v.2)
*/

(function($) {

    var menuContainer    = $('.menu-container');
    var menuToggle       = menuContainer.find( '.menu-button' );
    var siteNavigation   = menuContainer.find( 'nav.primary' );

    var dropdownToggle   = $('<button />', {'class': 'dropdown-toggle','aria-expanded': false})
    .append($('<span />', {'class': 'screen-readers',text: screenReaderText.expand}));

    // Toggles the menu button
    (function() {

        if (!menuToggle.length) {
            return;
        }

        menuToggle.add(siteNavigation).attr('aria-expanded', 'false');

        menuToggle.on('click', function() {
            // jscs:disable
            $(this).add( siteNavigation )
            .attr('aria-expanded', $( this )
            .add( siteNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
            // jscs:enable
        } );
    } )();

    // Adds the dropdown toggle button
    $('.menu-item-has-children > a').after(dropdownToggle);

	// If a menu button has been clicked
	$(".menu-item-has-children button").click(function(){

		// Set menu as open
		$(this).parent().toggleClass("is-open");
        $(this).attr("aria-expanded", "true");
        
        if($(this).parent().hasClass("is-open")) {
            $('span',this).text("Collapse child menu");
        } else {
            $('span',this).text("Expand child menu");
        }   
	});

	// If a new menu item has been focused on
	$( ".menu > .menu-item > a" ).focus(function() {

		// Reset menu item classes
		$(".menu-item-has-children").removeClass("is-open");
		$(".menu-item-has-children button").removeClass("toggled-on");
		$(".menu-item-has-children .sub-menu").removeClass("toggled-on");
        $(".menu-item-has-children button").attr("aria-expanded", "false");
        $(".menu-item-has-children button span").text("Expand child menu");
	});

    // Adds a class to sub-menus for styling
    $('.sub-menu .menu-item-has-children').parent('.sub-menu').addClass('has-sub-menu');


    // Keyboard navigation
    $('.menu-item a, button.dropdown-toggle').on('keydown', function(e) {

        if ([37,38,39,40].indexOf(e.keyCode) == -1) {
            return;
        }

        switch(e.keyCode) {

            case 37: 				// left key
                e.preventDefault();
                e.stopPropagation();

                if ($(this).hasClass('dropdown-toggle')){
            		$(this).prev('a').focus();
            	}
            	else {

                if ($(this).parent().prev().children('button.dropdown-toggle').length) {
                	$(this).parent().prev().children('button.dropdown-toggle').focus();
                }
                else {
                	$(this).parent().prev().children('a').focus();
                }
            	}

            	if ($(this).is('ul ul ul.sub-menu.toggled-on li:first-child a')) {
            		$(this).parents('ul.sub-menu.toggled-on li').children('button.dropdown-toggle').focus();
            	}

                break;

	    case 39: 				// right key
                e.preventDefault();
                e.stopPropagation();

		if($(this).next('button.dropdown-toggle').length) {
            		$(this).next('button.dropdown-toggle').focus();
            	}
            	else {
            		$(this).parent().next().children('a').focus();
            	}

            	if ($(this).is('ul.sub-menu .dropdown-toggle.toggled-on')){
            		$(this).parent().find('ul.sub-menu li:first-child a').focus();
            	}

                break;


           case 40: 				// down key
                e.preventDefault();
                e.stopPropagation();

		if($(this).next().length){
			$(this).next().find('li:first-child a').first().focus();
		}
		else {
			$(this).parent().next().children('a').focus();
		}

            	if (($(this).is('ul.sub-menu a')) && ($(this).next('button.dropdown-toggle').length)) {
            		$(this).parent().next().children('a').focus();
            	}

            	if (($(this).is('ul.sub-menu .dropdown-toggle')) && ($(this).parent().next().children('.dropdown-toggle').length)) {
            		$(this).parent().next().children('.dropdown-toggle').focus();
            	}

                break;


            case 38: 				// up key
                e.preventDefault();
                e.stopPropagation();

		if($(this).parent().prev().length){
			$(this).parent().prev().children('a').focus();
		}
		else {
			$(this).parents('ul').first().prev('.dropdown-toggle.toggled-on').focus();
		}

            	if (($(this).is('ul.sub-menu .dropdown-toggle')) && ($(this).parent().prev().children('.dropdown-toggle').length)) {
            		$(this).parent().prev().children('.dropdown-toggle').focus();
            	}

                break;

        }
    });
})(jQuery);

