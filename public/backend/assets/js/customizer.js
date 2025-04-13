// Customizer
// $("body").append('<div class=customizer-layer></div><div class=customizer-action><i data-feather="settings"></i></div><div class=theme-cutomizer><div class=customizer-header><h4>Theme Setting</h4><div class=close-customizer><i data-feather="x"></i></div></div><div class=customizer-body><div class="cutomize-group d-none d-xl-block"><h6 class=customizer-title>Sidebar Type</h6><ul class="customizeoption-list sidebaroption-list"><li class=sidedefault-action>Default<li class=sidecompact-action>compact<li class=sidehorizontal-action>horizontal</ul></div><div class="cutomize-group mb-0"><h6 class=customizer-title>Layout mode</h6><ul class=customizeoption-list><li class=light-action>light<li class=dark-action>dark</ul></div></div></div>');

const body = $('body');
const darkModeBtn = $('.action-dark');
const lightIcon = $('.icon-light');
const darkIcon = $('.icon-dark');


// Function to highlight the active mode button
function setActiveMode(button) {
    $('.light-action, .dark-action').removeClass('active-mode');
    button.addClass('active-mode');
}

//*** Light & Dark toggle action ***//
darkModeBtn.click(function () {
    const isDark = body.attr('data-bs-theme') === 'dark';

    // Toggle theme
    body.attr('data-bs-theme', isDark ? 'light' : 'dark');
    localStorage.setItem('theme', isDark ? 'light' : 'dark');

    // Toggle icons
    darkIcon.toggle(!isDark);
    lightIcon.toggle(isDark);

    // Set active mode
    setActiveMode(isDark ? $('.light-action') : $('.dark-action'));
});

// Handle light mode action
$('.light-action').click(function () {
    body.attr('data-bs-theme', 'light');
    localStorage.setItem('theme', 'light');
    setActiveMode($('.light-action'));
    lightIcon.show();
    darkIcon.hide();
});

// Handle dark mode action
$('.dark-action').click(function () {
    body.attr('data-bs-theme', 'dark');
    localStorage.setItem('theme', 'dark');
    setActiveMode($('.dark-action'));
    darkIcon.show();
    lightIcon.hide();
});

// Load theme from localStorage on page load
const savedTheme = localStorage.getItem('theme') || 'light';
body.attr('data-bs-theme', savedTheme);

// Set initial icons and active mode based on saved theme
if (savedTheme === 'dark') {
    darkIcon.show();
    lightIcon.hide();
    setActiveMode($('.dark-action'));
} else {
    lightIcon.show();
    darkIcon.hide();
    setActiveMode($('.light-action'));
}


//*** Direction Mode ***
$('.ltr-action').click(function () {
    body.attr('data-bs-direction', 'ltr');
    localStorage.setItem('direction', 'ltr');
    setActiveMode($('.ltr-action'));
});

$('.rtl-action').click(function () {
    body.attr('data-bs-direction', 'rtl');
    localStorage.setItem('direction', 'rtl');
    setActiveMode($('.rtl-action'));
});

// Load direction from localStorage
const savedDirection = localStorage.getItem('direction') || 'ltr';
body.attr('data-bs-direction', savedDirection);
if (savedDirection === 'rtl') {
    setActiveMode($('.rtl-action'));
} else {
    setActiveMode($('.ltr-action'));
}

//*** Sidebar Type ***
$('.sidedefault-action').click(function () {
    body.attr('data-sidebar-type', 'default');
    localStorage.setItem('sidebartype', 'default');
    setActiveMode($('.sidedefault-action'));
    window.location.reload();
});
$('.sidecompact-action').click(function () {
    body.attr('data-sidebar-type', 'compact');
    localStorage.setItem('sidebartype', 'compact');
    setActiveMode($('.sidecompact-action'));
    window.location.reload();
});
$('.sidehorizontal-action').click(function () {
    body.attr('data-sidebar-type', 'horizontal');
    localStorage.setItem('sidebartype', 'horizontal');
    setActiveMode($('.sidehorizontal-action'));
    window.location.reload();
});


// Load sidebar type from localStorage
const savedSidebatype = localStorage.getItem('sidebartype') || 'default';
$('body').attr('data-sidebar-type', savedSidebatype);

if (savedSidebatype === 'compact') {
    setActiveMode($('.sidecompact-action'));
} else if (savedSidebatype === 'horizontal') {
    setActiveMode($('.sidehorizontal-action'));

    const $menuWrapper = $('.codex-menuwrapper');
    const $menu = $('.codex-menu');
    let currentPosition = 0;

    // Calculate and set the menu width dynamically
    function calculateMenuWidth() {
        let menuWidth = 0;
        $menu.children('li').each(function () {
            menuWidth += $(this).outerWidth(true);
        });
        $menu.css('width', menuWidth + 'px');
        return menuWidth;
    }

    const wrapperWidth = $menuWrapper.width();
    const menuWidth = calculateMenuWidth();

    // Update scroll position and handle button states
    function updateMenu() {
        const maxScroll = menuWidth - wrapperWidth;

        // Ensure position is within bounds
        if (currentPosition < 0) currentPosition = 0;
        if (currentPosition > maxScroll) currentPosition = maxScroll;

        // Adjust menu position and toggle button states
        $menu.css({ position: 'relative', left: -currentPosition + 'px' });
        $('.menu-preve').toggleClass('disabled', currentPosition === 0);
        $('.menu-next').toggleClass('disabled', currentPosition >= maxScroll);
    }

    // Click event for "Next" button
    $('.menu-next').click(function () {
        const maxScroll = menuWidth - wrapperWidth;
        if (currentPosition < maxScroll) {
            currentPosition += $menu.children('li').outerWidth(true);
            updateMenu();
        }
    });

    // Click event for "Previous" button
    $('.menu-preve').click(function () {
        if (currentPosition > 0) {
            currentPosition -= $menu.children('li').outerWidth(true);
            updateMenu();
        }
    });

    // Initialize menu state
    if (menuWidth > wrapperWidth) {
        updateMenu();
    } else {
        $('.menu-next, .menu-preve').addClass('disabled');
    }


} else {
    setActiveMode($('.sidedefault-action'));
}

// Function to toggle active mode
function setActiveMode(activeItem) {
    activeItem.addClass('active-mode');
    activeItem.siblings().removeClass('active-mode');
}


if ($(window).width() > 1200){
    if (sidebar_compact){
        body.attr('data-sidebar-type', 'compact');
    }
}
if (dark_mode){
    body.attr('data-bs-theme', 'dark');
}

//** Theme color mode  ***//
$(document).ready(function () {
    $('.customizeoption-list.themecolor-list li').on('click', function () {
        $('.customizeoption-list.themecolor-list li').removeClass('active-mode');
        $(this).addClass('active-mode');
        const themeColor = $(this).data('theme-color');
        $('body').attr('data-theme-color', themeColor);
    });
});



//*** Customizer Action ***//
// $('.customizer-action').click(function(){
//     $('.theme-cutomizer , .customizer-layer').toggleClass('active');
// });

$('.customizer-header').click(function(){
    $('.theme-cutomizer , .customizer-layer').toggleClass('active');
});

$('.customizer-layer').click(function(){
    $(this).removeClass('active');
    $('.theme-cutomizer').removeClass('active');
});
