jQuery(document).ready(function($){

	// Google / Google +1 Button
	$('.google_plusone').socialbutton('google_plusone', {
		lang: 'ja',
		size: 'medium'
	});

		// Facebook / Like button
	$('.facebook_like').socialbutton('facebook_like', {
		button: 'button_count'
	});

	// Twitter / Tweet Button
	$('.twitter').socialbutton('twitter', {
		button: 'horizontal'
	});

	// Evernote / Evernote Site Memory
	$('.evernote').socialbutton('evernote');

	// GREE / Social Feedback
	$('.gree').socialbutton('gree_sf', {
		button: 0
	});

		// Hatena / Hatena Bookmark
	$('.hatena').socialbutton('hatena');


});