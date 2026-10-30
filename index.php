<?php
function DynamicContent($MyContent) {
$Result='';
  if ($MyContent=="Home") {
    $Result="";
  }//Home
return $Result;
}

function CreateContent($MyContent) {
  global $MainRoot,$FbAppID,$TheNav,$TheContact,$TheHead,$LeftSideBarContent,$RightSideBarContent;

  $DataFile="Content-PHP/".$MyContent.".php";
  $DataFile=(file_exists($DataFile)) ? $DataFile : "Content-PHP/Home.php";
  require_once($DataFile);

  $Result=(isset($Data["Theme"]))
    ? file_get_contents("Content-Themes/".$Data["Theme"].".html")
    : file_get_contents("Content-Themes/Default.html");

  $Result=str_replace('%TheHead%',$TheHead,$Result);
  $Result=str_replace('%TheNav%',$TheNav,$Result);
  $Result=str_replace('%TheContact%',$TheContact,$Result);

  $Result=(isset($Data['LeftSideBarContent']))
    ? str_replace('%LeftSideBarContent%',$Data['LeftSideBarContent'],$Result)
    : str_replace('%LeftSideBarContent%',$LeftSideBarContent,$Result);
  $Result=(isset($Data['RightSideBarContent']))
    ? str_replace('%RightSideBarContent%',$Data['RightSideBarContent'],$Result)
    : str_replace('%RightSideBarContent%',$RightSideBarContent,$Result);

  $Result=(isset($Data['Title']))
    ? str_replace('%Title%',$Data['Title'],$Result)
    : $Result;
  $Result=(isset($Data['Description']))
    ? str_replace('%Description%',$Data['Description'],$Result)
    : $Result;
  $Result=(isset($Data['Keywords']))
    ? str_replace('%Keywords%',$Data['Keywords'],$Result)
    : $Result;
  $Result=(isset($Data['Image']))
    ? str_replace('%Image%',$MainRoot.$Data['Image'],$Result)
    : $Result;
  $Result=(isset($Data['Type']))
    ? str_replace('%Type%',$Data['Type'],$Result)
    : $Result;
  $Result=(isset($Data['Canonical']))
    ? str_replace('%Canonical%',$MainRoot.$Data['Canonical'],$Result)
    : $Result;
  $Result=(isset($Data['Content']))
    ? str_replace('%Content%',$Data['Content'],$Result)
    : $Result;
  $Result=(isset($Data['FbAppID']))
    ? str_replace('%FbAppID%',$FbAppID,$Result)
    : $Result;

  //file_put_contents("Content-HTML/".$MyContent.".html",$Result);
  return $Result;
}

$FbAppID="12345";
$MainRoot="https://thammy.top";

$TheHead='
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<link href="https://thammy.top/images/favicon.ico" rel="icon" type="image/x-icon"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://thammy.top/css.css" rel="stylesheet">
<script src="https://thammy.top/js.js"></script>
<script type="text/javascript">
  if (window.location.href.includes(".giau.co")) {
    var imported=document.createElement(\'script\');
    imported.src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6748779981849999";
    imported.async="async";
    imported.crossorigin="anonymous";
    document.head.appendChild(imported);
  }
</script>
';

$TheNav='
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="https://thammy.top/images/favicon.ico" alt="Avatar Logo" style="width:40px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Máy thẩm mỹ</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Máy triệt lông</a></li>
            <li><a class="dropdown-item" href="#">Máy trị nám</a></li>
            <li><a class="dropdown-item" href="#">Máy trị mụn</a></li>
            <li><a class="dropdown-item" href="#">Máy trị sẹo</a></li>
            <li><a class="dropdown-item" href="#">Máy giảm béo</a></li>
            <li><a class="dropdown-item" href="#">Máy xoá xăm</a></li>
            <li><a class="dropdown-item" href="#">Máy nâng cơ</a></li>
            <li><a class="dropdown-item" href="#">Máy trẻ hoá da</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Thiết bị vật tư</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="#">Mỹ phẩm</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="#">Tư vấn</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="/#LienHe">Liên hệ</a>
        </li>  
      </ul>
      <form class="d-flex">
        <div class="Adsense">
          <input class="me-2" type="text" placeholder="Tìm kiếm">
          <button class="btn btn-primary" type="button">Tìm kiếm</button>
        </div>
      </form>
    </div>
  </div>
</nav>
';

$TheContact='
<div id="ContactArea" class="p-2 bg-dark text-white text-center">
  <div class="row text-center" id="LienHe">
    <div class="col-md-4">
      <h3 class="p-3">LIÊN HỆ:</h3>
      <p>
        <img id="Logo" src="https://thammy.top/images/favicon.ico" class="mt-2 mb-2 img-fluid"/><br/>
        ThamMy.top<br/>
        Phòng 1311, toà B<br/>
        91 Nguyễn Chí Thanh, Hà Nội<br/>
        <a href="tel:0868637322">☎ 08 686 373 22</a>
      </p>
    </div>
    <div class="col-md-4 p-3">
      <iframe id="GoogleMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.2924189007176!2d105.80654967591036!3d21.020982488044446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab664ff92821%3A0xe31d49a941f8577d!2zOTEgxJAuIE5ndXnhu4VuIENow60gVGhhbmgsIFRow6BuaCBDw7RuZywgxJDhu5FuZyDEkGEsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1688565008206!5m2!1svi!2s" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col-md-4">
      <form class="CusInfo" id="FooterContact">
        <input name="CusName" required placeholder="Họ tên"/>
        <input name="CusPhone" required placeholder="Điện thoại"/>
        <input name="CusEmail" required placeholder="Email"/>
        <textarea name="CusContent" required placeholder="Thông điệp"></textarea>
        <input type="submit" value="Gửi thông điệp">
      </form>
    </div>
  </div>
</div>
';

$MyContent=(isset($_REQUEST['MyContent']))
  ? $_REQUEST['MyContent']
  : "Home";
$FinalContent=(file_exists("Content-HTML/".$MyContent.".html"))
  ? file_get_contents("Content-HTML/".$MyContent.".html")
  : CreateContent($MyContent);

echo $FinalContent;

?>