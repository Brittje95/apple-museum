( function () {
	var menuToggle = document.querySelector( '.menu-toggle' );
	var menu = document.querySelector( '.primary-menu' );

	if ( ! menuToggle || ! menu ) {
		return;
	}

	menuToggle.addEventListener( 'click', function () {
		var isExpanded = this.getAttribute( 'aria-expanded' ) === 'true';
		this.setAttribute( 'aria-expanded', String( ! isExpanded ) );
		menu.classList.toggle( 'is-open' );
	} );
}() );
