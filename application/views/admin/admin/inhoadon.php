<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<style type="text/css">
	body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
}
.company {
    background-color:#FFFFFF;
    text-align:center;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
</style>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo" style="line-height: 1.5">Quán cầm đồ <br>
        	Mã QHNS:1055507
        </div>
        <div class="company">Mẫu số C45-BB<br>
        	<p>(Ban hành kèm theo thông tư số 107/2017/TT-BTC<br>
        	ngày 10/10/2017 của Bộ Tài chính)</p>
        </div>
    </div>
  <br/>
  <div class="title">
        Biên lai thu tiền lãi   
  </div>
  
  	<?php $date = getdate();
        echo "<p style='text-align:center'>Ngày ".$date['mday']." tháng ".$date['mon']." năm ".$date['year']."</p>";?>
	<div style="float: right;">
		Quyển số:.............................................<br>
		Số:.....................................................
	</div>
	<br>
	<br>
	<br>
  <div>
  	Họ và tên người nộp: <strong style="font-style: italic;"><?php echo $hoadon['hoten'];?></strong><br>
  	Địa chỉ: <strong><?php echo $hoadon['diachi'];?></strong><br>
    Số điện thoại: <strong><?php echo $hoadon['sodienthoai'];?></strong><br>
    Số chứng minh: <strong><?php echo $hoadon['sochungminh'];?></strong><br>

  	Nội dung thu:<strong> Thu tiền lãi</strong><br>
    Số tiền thu: <strong><?php echo number_format((int)$hoadon['sotiendong'])." VNĐ";?></strong>
  </div>
  
  <div class="footer-left"> NGƯỜI NỘP TIỀN<br/>
    (Ký, họ tên) </div>
  <div class="footer-right"> NGƯỜI THU TIỀN<br/>
    (Ký, họ tên) </div>
</div>
</body>
