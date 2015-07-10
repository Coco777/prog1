<body class = "background">
<form class="form-container" action="query3.php" method="post">
<div  class="form-title"><h2>郵便番号または住所の一部を入力してください</h2></div>
<input class="form-field" type="text" name="data" /><br />
<div class="submit-container">
<input class="submit-button" type="submit" value="Submit" />
</div>
</form>
</body>

<style type = "text/css">



.background{

    background-image: url("Android.jpg");
  /* 画像を常に天地左右の中央に配置 */
  background-position: center center;
   
  /* 画像をタイル状に繰り返し表示しない */
  background-repeat: no-repeat;
   
  /* コンテンツの高さが画像の高さより大きい時、動かないように固定 */
  background-attachment: fixed;
   
  /* 表示するコンテナの大きさに基づいて、背景画像を調整 */
  background-size: cover;
     /*background-position:0 -150;*/
     /*background-attachment:fixed;*/
}

.form-container {
   border: 1px solid #f2e3d2;
   background: #c9b7a2;
   background: -webkit-gradient(linear, left top, left bottom, from(#f2e3d2), to(#c9b7a2));
   background: -webkit-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -moz-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -ms-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -o-linear-gradient(top, #f2e3d2, #c9b7a2);
   background-image: -ms-linear-gradient(top, #f2e3d2 0%, #c9b7a2 100%);
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -webkit-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   -moz-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   font-family: 'Helvetica Neue',Helvetica,sans-serif;
   text-decoration: none;
   vertical-align: middle;
   min-width:400px;
   padding:20px;
   width:300px;

   margin: -200px 0 0 -300px;  /*縦横の半分をネガティブマージンでずらす*/
   position: absolute;  /*body要素に対して絶対配置*/
   top: 50%;  /*上端を中央に*/
   left: 50%;  /*左端を中央に*/
   right: 50%;
   bottom: 50%;
   }
.form-field {
   border: 1px solid #c9b7a2;
   background: #e4d5c3;
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;
   color: #c9b7a2;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   padding:8px;
   margin-bottom:20px;
   width:280px;
   }
.form-field:focus {
   background: #fff;
   color: #725129;
   }
.form-container h2 {
   text-shadow: #fdf2e4 0 1px 0;
   font-size:18px;
   margin: 0 0 10px 0;
   font-weight:bold;
   text-align:center;
    }
.form-title {
   margin-bottom:10px;
   color: #725129;
   text-shadow: #fdf2e4 0 1px 0;
   }
.submit-container {
   margin:8px 0;
   text-align:right;
   }
.submit-button {
   border: 1px solid #447314;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #addc7e 0 1px 0;
   color: #31540c;
   font-family: helvetica, serif;
   padding: 8.5px 18px;
   font-size: 14px;
   text-decoration: none;
   vertical-align: middle;
   }
.submit-button:hover {
   border: 1px solid #447314;
   text-shadow: #31540c 0 1px 0;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   color: #fff;
   }


   </style>