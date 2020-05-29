let messages = [{title: "trolls exist", content:"they steal your socks"}, {title: "In the news", content:"they are coming for you!"}, {title: "Quote of the day", content:"A scorpion's sting is worse than its bite"}];
let current = 0;

$(document).ready(function() {
    arthropodiacBannerCarouselAnimation();
    setInterval(arthropodiacBannerCarouselAnimation, 9000);    
});

function arthropodiacBannerCarouselAnimation() {
   let messageToShow = messages[current];
   current = (current + 1) % (messages.length);
   $(".arthropodiac-banner-header").html(messageToShow.title);
   $(".arthropodiac-banner-content").html(messageToShow.content);
   // transform: translate(-100%,0); // transform: translate(-100%,0);
   $(".arthropodiac-banner-header").attr("style", "opacity:0;left:-=100");
   $(".arthropodiac-banner-content").attr("style", "opacity:0;" );
   $(".arthropodiac-banner-hr").attr("style", "width:0px;" )
   

   $(".arthropodiac-banner-header").animate({
    opacity: '1',
    left: "+=100"
  }, 1000, "swing");
   $(".arthropodiac-banner-hr").animate({width: '15em' }, 2000);
   $(".arthropodiac-banner-content").animate({opacity: '1'}, 2000);  

}
