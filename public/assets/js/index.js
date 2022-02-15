let sidebar = $('#sidebar');
let sidebar_collapse_btn = $('#collapse_sidebar');
let sidebar_toggle = false;
let title = $('#title');
let title_collapsed = $('#title_collapsed');
let sidebar_profile = $('.sidebar-profile');
let sidebar_text = $('.sidebar-text');
let sidebar_btn = $('.sidebar-btn'); 

$(document).ready(function () {
    sidebar_collapse_btn.click(function() {
        if(sidebar_toggle == false) {
            sidebar_toggle = true;
            sidebar.addClass('sidebar-collapse')
            document.documentElement.style.setProperty('--sidebar-width', '100px');
            title_collapsed.removeClass('d-none')
            title_collapsed.addClass('d-block')
            title.addClass('d-none')
            sidebar_profile.addClass('d-none')
            sidebar_text.addClass('d-none')
            sidebar_btn.addClass('justify-content-center')
            sidebar_btn.addClass('text-center')
        } else {
            sidebar_toggle = false;
            sidebar.removeClass('sidebar-collapse')
            document.documentElement.style.setProperty('--sidebar-width', '280px');
            title_collapsed.addClass('d-none')
            title_collapsed.removeClass('d-block')
            title.removeClass('d-none')
            title.addClass('d-block')
            sidebar_profile.removeClass('d-none')
            sidebar_text.removeClass('d-none')
            sidebar_btn.removeClass('justify-content-center')
            sidebar_btn.removeClass('text-center')
        }
    });
});