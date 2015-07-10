
<style type = "text/css">

div{text-align : center ;}

body{ background-image: url("town2.jpg");
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

button{
   border: 1px solid #333;
     background: #333;
     color: #fff; 
     -webkit-border-radius: 4px;     /* Google Chrome・Safari用 */
     -moz-border-radius: 4px;    /* Firefox用 */
     border-radius: 4px;     /* 基本形 */
     padding: 5px 10px; 
     cursor: pointer; 
     display: inline-block;
}

table {
  /*width: 800px;*/
 margin-left: auto;
 margin-right: auto;
      border-spacing: 0;
      font-size:14px;
    }
    table th {
      color: #000;
      padding: 8px 15px;
      background: #eee;
      background:-moz-linear-gradient(#eee, #ddd 50%);
      background:-webkit-gradient(linear, 100% 0%, 100% 50%, from(#eee), to(#ddd));
      font-weight: bold;
      border-top:1px solid #aaa;
      border-bottom:1px solid #aaa;
      line-height: 120%;
      text-align: center;
      text-shadow:0 -1px 0 rgba(255,255,255,0.9);
      box-shadow: 0px 1px 1px rgba(255,255,255,0.3) inset;
    }
    table th:first-child {
      border-left:1px solid #aaa;
      border-radius: 5px 0 0 0;
    }
    table th:last-child {
      border-radius:0 5px 0 0;
      border-right:1px solid #aaa;
      box-shadow: 2px 2px 1px rgba(0,0,0,0.1);
    }
    table tr td {
      padding: 10px 150px;
      text-align: center;
    }
    table tr td:first-child {
      border-left: 1px solid #aaa;
    }
    table tr td:last-child {
      border-right: 1px solid #aaa;
      box-shadow: 2px 2px 1px rgba(0,0,0,0.1);
    }
    table tr {
      background: #fff;
    }
    table tr:nth-child(2n+1) {
      background: #f5f5f5;
    }
    table tr:last-child td {
      border-bottom:1px solid #aaa;
      box-shadow: 2px 2px 1px rgba(0,0,0,0.1);
    }
    table tr:last-child td:first-child {
      border-radius: 0 0 0 5px;
    }
    table tr:last-child td:last-child {
      border-radius: 0 0 5px 0;
    }
    table tr:hover {
      background: #eee;
      cursor:pointer;
    }
</style>

<?php

if (!$link = mysql_connect('localhost', 'CSexp1_cs13091', 'passwordA4')) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db('CSexp1_cs13091DB', $link)) {
    echo 'Could not select database';
    exit;
}
mysql_set_charset('utf8',$link);

$pagenum = $_REQUEST['pagenum'];
htmlspecialchars($_REQUEST['data']);
$data1 = $_REQUEST['data'];
$geodata = $_REQUEST['geodata'];
$geodata = 0;


$sql    = "SELECT * FROM cs13091aDB WHERE CONCAT(zip,kana1,kana2,kana3,addr1,addr2,addr3) LIKE \"%" .$data1."%\"";
//$sql    = "SELECT * FROM cs13091DB WHERE CONCAT(zip,kana1,kana2,kana3,addr1,addr2,addr3) LIKE %%".$data1."%%";
$sql .= "limit " . $pagenum*10 . ", 10";


$result = mysql_query($sql, $link);
if (!$result) {
echo "DB Error, could not query the database\n";
echo 'MySQL Error: ' . mysql_error();
exit;
}

$searchnumber = mysql_num_rows($result);
if($searchnumber == 0 || $data1 == null){
  //echo "該当するものはありませんでした";
  echo '<script>alert("該当するものがありませんでした");
  location.href="form3.php";
  </script>';
}

echo "<table>";
echo "<table border=\"3\">";
echo "<tr>";
echo "<th>郵便番号</th>";
echo "<th>住所</th>";
echo "</tr>";


while ($row = mysql_fetch_assoc($result)) {
    $zip = $row['zip'];
    $kana1 = $row['kana1'];
    $kana2 = $row['kana2'];
    $kana3 = $row['kana3'];
    $addr1 = $row['addr1'];
    $addr2 = $row['addr2'];
    $addr3 = $row['addr3'];

echo "<tr>";
echo "<td>".$zip."</td>";
echo "<td>";
echo "<a href = query3.php?data=".$_REQUEST['data']."&pagenum=".$pagenum."&geodata=".$addr1.$addr2.$addr3.">";
echo $addr1.$addr2.$addr3."</td>";
echo "</tr>";

}
echo "</table>";


$sql    = "SELECT * FROM cs13091aDB WHERE CONCAT(zip,kana1,kana2,kana3,addr1,addr2,addr3) LIKE \"%" .$data1."%\"";
//$sql    = "SELECT * FROM cs13091aDB WHERE CONCAT(zip,kana1,kana2,kana3,addr1,addr2,addr3) LIKE \"%".$data1."%\"";
$result = mysql_query($sql, $link);
$number = mysql_num_rows($result);


echo "<div>";
echo "検索結果".$number."件";
echo "</div>";

echo "<div>";
if (preg_match("/^[0-9]+$/",$data1)) {
    echo "郵便番号で検索されました";
} else if(preg_match("/^(¥xe3¥x82[¥xa1-¥xbf]|¥xe3¥x83[¥x80-¥xbe])+$/u",$data1)){
    echo "カタカナで検索されました";
} else{
  echo "漢字で検索されました";
}
echo "</div>";

if($number > 10){
   echo "<div>";
    echo ceil($number/10), "ページ中の",$pagenum+1,"ページ目を表示<br>";
    echo "</div>";
}


if($pagenum != 0){
echo "<div>";
    echo "<a href = query3.php?data=".$_REQUEST['data']."&pagenum=".($pagenum -1).">";
    echo "&lt 前の30件</a>";
}


if(($pagenum + 1)*10 < $number){
  if($pagenum == 0){
    echo "<div>";
  }

    echo "&nbsp;<a href = query3.php?data=".$_REQUEST['data']."&pagenum=".($pagenum +1).">";
    echo "次の30件 &gt</a>";
    echo "</div>";
}

mysql_free_result($result);
mysql_close($link);


?>

<form action = "form3.php">
<div>
<input type="submit" value="return" />
</div>
</form>

<html>
  <head>
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0px; padding: 0px }
      #map { height: 100% }
    </style>

 <!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0px; padding: 0px }
      #map { height: 500px }
    </style>

    <script src="http://maps.google.com/maps/api/js?v=3&sensor=false"
        type="text/javascript" charset="UTF-8"></script>

    <script type="text/javascript">
    //<![CDATA[

    var map;
    var geo;
    
    // 初期化。bodyのonloadでinit()を指定することで呼び出してます
    function init() {

      // Google Mapで利用する初期設定用の変数
      var latlng = new google.maps.LatLng(36, 138);
      var opts = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: latlng
      };

      // getElementById("map")の"map"は、body内の<div id="map">より
      map = new google.maps.Map(document.getElementById("map"), opts);

      // ジオコードリクエストを送信するGeocoderの作成
      geo = new google.maps.Geocoder();


      if(<?php  echo "\"".$_REQUEST['geodata']."\"" ?> != 0){
     var req = {
        address: <?php  echo "\"".$_REQUEST['geodata']."\"" ?>,
      };

      }else{
  var req = {
address: "東京スカイツリー",
  };
}


      geo.geocode(req, geoResultCallback);

    }



    function geoResultCallback(result, status) {
      if (status != google.maps.GeocoderStatus.OK) {
        alert(status);
        return;
      }

      var latlng = result[0].geometry.location;

      map.setCenter(latlng);

      var marker = new google.maps.Marker({position:latlng, map:map, title:latlng.toString(), draggable:true});

      google.maps.event.addListener(marker, 'dragend', function(event){
        marker.setTitle(event.latLng.toString());
      });

      //document.getElementById("latlngtext").innerHTML = document.getElementById("input").value + " : " + latlng.toString();

    }

    //]]>
    </script>
  </head>

  <body onload="init()">
    <div id="map"></div>
    <!--<div>住所 : <input id="input" onsubmit="buttonpress()" /><input type="button" onclick="buttonpress()" value="緯度経度を取得" /></div>-->
    <div id="latlngtext"></div>
  </body>

</html>
