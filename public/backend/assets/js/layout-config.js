// Theme Setting
var dark_mode 			= false;  // true | false
var sidebar_compact 	= false;  // true | false

var themeprimary = localStorage.getItem("themeprimary") || '#6d64ac';
var themesecondary = localStorage.getItem("themesecondary") || '#439acb';
var themesuccess = localStorage.getItem("themesuccess") || '#13a55b';
var themeinfo = localStorage.getItem("themeinfo") || '#1fbfec';
var themewarning = localStorage.getItem("themewarning") || '#db7441';

window.CodexRohi = {
	themeprimary: themeprimary,
	themesecondary: themesecondary,
	themesuccess: themesuccess,
	themeinfo: themeinfo,
	themewarning: themewarning,
};