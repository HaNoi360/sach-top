<?php
$Str=file_get_contents("https://alonhadat.com.vn/cu-chi-4004m2-co-500m2-tho-cu-so-hong-rieng-chinh-chu-ngop-ngan-hang-ban-nhanh-gia-re-12672748.html");
$Str=str_replace('href="/','href="//alonhadat.com.vn/',$Str);
$Str=str_replace('src="/','src="//alonhadat.com.vn/',$Str);
$NewStr='
<script>
$("document").ready(function(){
$(".relative-property img,#ctl00_content_random_vip_box img").each(function(){
  var URL=$(this).attr("src");
  URL="//alonhadat.com.vn/"+URL;
  $(this).attr("src",URL);
  });
})
</script>
</body>
';
$Str=str_replace('</body>',$NewStr,$Str);
echo $Str;
?>