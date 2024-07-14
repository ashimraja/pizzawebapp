$(document).ready(function() {
    $("#sidebar-toggle").on("click", function() {
        $("#sidebar").toggleClass("collapsed");
    });
});
var path = window.location.href;
// console.log(path);
$(".sidebar-link").each(function(){

    var href = $(this).attr('href');
//   console.log(href);
    if(path === decodeURIComponent(href))
    {
    $(this).addClass('active');
    };
});
