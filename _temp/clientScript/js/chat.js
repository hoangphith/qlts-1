$(function() {
	'use strict'
	const ps = new PerfectScrollbar('#ChatList', {
		suppressScrollX: true
	});
	
	const ps1 = new PerfectScrollbar('#ChatBody', {
		suppressScrollX: true
	});
    const ps2 = new PerfectScrollbar('.chat-account', {
        suppressScrollX: true
    });
});