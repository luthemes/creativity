/*
 * Hide controls whose active callback is false.
 *
 * The customizer applies a control's starting active state before the control is in
 * the page, and its display:none doesn't stick, so a control that is inactive when
 * the customizer loads stays visible until its state changes. That left Custom Footer
 * Text showing while the "powered by" credit was on. Mark inactive controls with a
 * class, which the styles added in functions-assets.php hide, and keep it in step
 * with the active state. Controls that core shows or hides for other reasons are
 * left alone.
 */
wp.customize.bind( 'ready', function() {
	var watch = function( control ) {
		var sync = function( active ) {
			control.container.toggleClass( 'creativity-control-inactive', ! active );
		};

		sync( control.active() );
		control.active.bind( sync );
	};

	wp.customize.control.each( watch );

	// Controls added later, such as widgets and menu items.
	wp.customize.control.bind( 'add', watch );
} );
