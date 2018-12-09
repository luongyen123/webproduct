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
    <a href="<?php echo admin_url('admin/getIndexPhieucamdo/')?>" class=" btn btn-success"> Quay lạy danh sách</a>
<div id="page" class="page">
    <div class="header">
        <div style="text-align: center;">
            <p>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
            <p>ĐỘC LẬP - TỰ DO- HẠNH PHÚC</p>
        </div>
    </div>
  <br/>
  <div class="title">
        HỢP ĐỒNG CHO VAY CẦM ĐỒ
  </div>
  
  	<?php $date = getdate();
        echo "<p style='text-align:center'>Ngày ".$date['mday']." tháng ".$date['mon']." năm ".$date['year']."</p>";?>
  <div>
    <h4>BÊN CHO VAY - CÔNG TY CỔ PHẦN KINH DOANH A (sau đây gọi là <strong>Bên A</strong>)</h4>
    <div style="float:left">Địa chỉ: Trâu Quỳ - Gia Lâm - Hà Nội</div>
    <div style="float: right;">ĐT: 04 7301 5388</div><br>
  	<div style="float:left">Đại diện: <?php echo ($this->session->userdata())['logged_in']->name;?></div>
    <div style="float: right;">Chức vụ: Nhân viên</div>

  </div>
  <br>
  <div>
    <h4>BÊN VAY - ÔNG (BÀ): <?php echo $fullname;?> (sau đây gọi là <strong>Bên B</strong>)</h4>
    <div>CMND/Hộ chiếu số: <?php echo $CMND;?></div>
    <div style="float:left">Địa chỉ hiện tại: <?php echo $address;?></div>
    <div style="float: right;">ĐT: <?php echo $phone;?></div><br>
    Hai bên thống nhất với nhau ký kết hợp đồng cho vay cầm cố (sau đây gọi là Hợp đồng) theo các nội dung sau
  </div>
  <div>
    <h4>ĐIỀU 1: KHOẢN VAY</h4>
    <p>1.1 Giá trị khoản vay: <?php echo $sotien;?></p>
    <p>1.2 Thời hạn cho vay từ ngày <?php echo $ngaycam;?> đến ngày: <?php echo $ngayhethan;?></p>
    <p>1.3 Hình thức lãi: ngày</p>
    
  </div>
  
  <div class="footer-left"> Bên A<br/>
    (Ký, họ tên) </div>
  <div class="footer-right"> Bên B<br/>
    (Ký, họ tên) </div>
</div>
</body>
