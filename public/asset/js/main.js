$(document).ready(function (){
    //fade in team members
    teammMembers = $(".teamCard").fadeTo(0, 0);
    $(window).scroll(function () {
        teammMembers.each(function () {
            b = $(this).offset().top - $(this).height() - $(window).scrollTop()
            if (b < 0) $(this).fadeTo(500, 1);
        });
    });

    //sweet scroll
    $(".scrollAnimate").click(function (e){
        e.preventDefault();
        //$(this).animate(function(){
        $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 1000, 'swing');
        //});
    });
});

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
(function (b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
    function () {
    (b[l].q = b[l].q || []).push(arguments)
    });
b[l].l = +new Date;
e = o.createElement(i);
r = o.getElementsByTagName(i)[0];
e.src = '//www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e, r)
}(window, document, 'script', 'ga'));
ga('create', 'UA-55275787-1');
ga('send', 'pageview');

$(document).ready(function(){

    //confirm the destroy call
  $('form').submit(function(event){
    var method = $(this).children(':hidden[name=_method]').val();
    if ($.type(method) !== 'undefined' && method =='DELETE')
        {if(!confirm('Really want to delete?'))
            event.preventDefault();
        }
    }
  );

});

$('#yes').click(function(){
    $('#have_corporate').css("display","none");
    $('#no_corporate').css("display","inline");
});

$('#no').click(function(){
    $('#no_corporate').css("display","none");
    $('#have_corporate').css("display","inline");
});

