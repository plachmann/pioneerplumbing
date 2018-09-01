jQuery(document).ready(function ($) {
    // Add custom css
    $('html').click(function() {
        $('.site-header .form-holder form').hide()
    });
    $('.form-holder').click(function(event) {
        event.stopPropagation()
    });
    $(".search-btn").click(function() {
        $(".site-header .form-holder form").slideToggle();
        return !1
    });
});
