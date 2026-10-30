jQuery.fn.StrokeThis=function(Thick,StrokeColor) {
var StrokeText='';
var Thick=parseInt(Thick);
for (x=0-Thick;x<Thick+1;x++) {
for (y=0-Thick;y<Thick+1;y++) {
StrokeText+=x+"px "+y+"px "+StrokeColor+",";
}  
}
$(this).css({"text-shadow":StrokeText.slice(0,-1)});
};

$(document).ready(function(){

  $("#DeviceList>div,#BestSellerList>div").addClass("card mt-1 mb-1 col-sm-6 col-lg-3 p-3 text-center");
  $("#DeviceList>div>div,#BestSellerList>div>div").addClass("card-body");
  $("#DeviceList>div>img,#BestSellerList>div>img").addClass("card-img-top");
  $("#DeviceList>div>img,#BestSellerList>div>img").css({"background":"url(https://ThamMy.top/images/dark-background.webp)"});
  $("#DeviceList>div>div>h4,#BestSellerList>div>div>h4").addClass("card-title");
  $("#DeviceList>div>div>p,#BestSellerList>div>div>p").addClass("card-text").css({"text-align":"justify"});

  $("#GoogleMap").css({
    "height":$("#FooterContact").height(),
  });

  if (window.location.href.includes(".giau.co")) {
    var imported=document.createElement('script');
    imported.src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6748779981849999";
    imported.async="async";
    imported.crossorigin="anonymous";
    document.head.appendChild(imported);
  }

  $("h1,h2,h3,h4,h5,h6").StrokeThis("1","#C49F58");

  $("#FooterContact").on("submit",function(e){
    e.preventDefault();
    var data = $('form#FooterContact').serialize();
    $('form#FooterContact')
      .html('<img src="/images/Logo-quay.webp"/>')
      .height($("#GoogleMap").height())
      .css({
        "display":"flex",
        "align-items":"center",
        "justify-content":"center",
        "width":"100%",
      })
      ;
    $.ajax({
              type : 'GET', 
              url : 'https://script.google.com/macros/s/AKfycbyLso8INo_rz2nYkWXJnD6MAFjJdFuGPRFuwQGRxudDu3kX3ZIewMkgToj-nhMpuYRo/exec',
              dataType:'json',
              crossDomain : true,
              data : data,
              success : function(data)
            {
            if(data == 'false'){alert('Error!');}else{top.location.href="https://ThamMy.top"}
            }
      });
  });

});