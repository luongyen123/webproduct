<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

	<style>
		* {
		  box-sizing: border-box;
		}

		body {
		  background-color: #f1f1f1;
		}

		#regForm {
		  background-color: #ffffff;
		  margin: 100px auto;
		  font-family: Raleway;
		  padding: 40px;
		  width: 70%;
		  min-width: 300px;
		}

		h1 {
		  text-align: center;  
		}
		
		
		input {
		  padding: 10px;
		  width: 100%;
		  font-size: 17px;
		  font-family: Raleway;
		  border: 1px solid #aaaaaa;
		}
		
		/* Mark input boxes that gets an error on validation: */
		input.invalid {
		  background-color: #ffdddd;
		}

		/* Hide all steps by default: */
		.tab {
		  display: none;
		}

		button {
		  background-color: #4CAF50;
		  color: #ffffff;
		  border: none;
		  padding: 10px 20px;
		  font-size: 17px;
		  font-family: Raleway;
		  cursor: pointer;
		}

		button:hover {
		  opacity: 0.8;
		}

		#prevBtn {
		  background-color: #bbbbbb;
		}

		/* Make circles that indicate the steps of the form: */
		.step {
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none;  
		  border-radius: 50%;
		  display: inline-block;
		  opacity: 0.5;
		}

		.step.active {
		  opacity: 1;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color: #4CAF50;
		}
</style>


<div class="col-md-11">
	<div class="main-content col-content radius bg-white">
	<?php echo form_open($this->uri->uri_string(), 'role="form" class="form-horizontal" id="regForm"'); ?>
		<div class="tab">Thông tin khách hàng:
			<table class="table table-hover">

				<thead>

					<tr class="success">
						<th>Select</th>

						<th>Tên khách hàng</th>

						<th class="text-center">Số diện thoại</th>

						<th class="text-center">Địa chỉ</th>

						<th class="text-center">Số chứng minh</th>

					</tr>

				</thead>

				<tbody>

				 <?php foreach ($customers AS $customer) {?>

					

					<tr>
						<td><input type="checkbox" name="" value="<?php echo $customer->id;?>" class="customer_select"></td>

						<td id="fullname<?php echo $customer->id?>"><?php echo $customer->fullname;?></td>

						<td class="text-center " id="phone<?php echo $customer->id?>"><?php echo $customer->phone;?></td>

						<td class="text-center " id="address<?php echo $customer->id?>"><?php echo $customer->address;?></td>

						<td class="text-center " id="CMND<?php echo $customer->id?>"><?php echo $customer->CMND;?></td>

					</tr>

				<?php } ?> 

				</tbody>

			</table>
			<p><input placeholder="Số chứng minh thư" oninput="this.className = ''" name="CMND" id="chungminh"></p>
			<p><input placeholder="Họ tên" oninput="this.className = ''" name="fullname" id="ho_ten"></p>
			<p><input placeholder="Số điện thoại" oninput="this.className = ''" name="phone" id="sodienthoai"></p>
			<p><input placeholder="Địa chỉ" oninput="this.className = ''" name="address" id="address"></p>

		</div>
		<div class="tab">Sản phẩm:
			<input type="radio" name="loaisp" value="Oto" class="loaisp"> Ô tô
			<input type="radio" name="loaisp" value="xemay" class="loaisp"> Xe máy
			<input type="radio" name="loaisp" value="laptop" class="loaisp"> Lap top
			<input type="radio" name="loaisp" value="dienthoai" class="loaisp"> Điện thoại
			<input type="radio" name="loaisp" value="tablet" class="loaisp"> Tablet 
			<p><input placeholder="Thông tin sản phẩm" oninput="this.className = ''" name="thongtinsp" id="thongtinsp"></p>
			<button id="dinhgia" type="button">Định giá tự động</button>
			<input type="text" name="dinhgia_tudong" placeholder="Định giá tự động">
		</div>
		<div class="tab">Lãi suất:
			<div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">

					<li role="presentation" class="active"><a href="#ngay" aria-controls="dien" role="tab" data-toggle="tab">Lãi suất ngày</a></li>

					<li role="presentation"><a href="#tuan" aria-controls="tuan" role="tab" data-toggle="tab">Lãi suất tuần</a></li>					

				</ul>
				<div class="tab-content">
				<!-- Điện -->
				<div role="tabpanel" class="tab-pane active" id="ngay">
				
					<table class="table table-hover">
						<thead>
							<tr class="success">
								<td>Select</td>
								<th>Tên bảng giá</th>

								<th class="text-center">2 triệu– 5 triệu</th>
								<th class="text-center">5 triệu – 10 triệu</th>
								<th class="text-center">> 10 triệu</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($giangay AS $gia) { $muc = $gia->bg_mucgia;?>
							
							<tr>
								<td><input type="radio" name="banggia" value="<?php echo $gia->bg_id;?>"></td>
								<td><?php echo $gia->bg_ten;?></td>
								<td class="text-center"><?php echo $muc['ngay2'];?>%</td>
								<td class="text-center"><?php echo $muc['ngay5'];?>%</td>
								<td class="text-center"><?php echo $muc['ngay10'];?>%</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- Hết Ngày -->
				
				<!-- Tuần -->
				<div role="tabpanel" class="tab-pane" id="tuan">
					
					<table class="table table-hover">
						<thead>
							<tr class="success">
								<th>Select</th>
								<th>Tên bảng giá</th>

								<th class="text-center">2 triệu– 5 triệu</th>
								<th class="text-center">5 triệu – 10 triệu</th>
								<th class="text-center">> 10 triệu</th>
							</tr>
						</thead>
						<tbody>
							<!--Bảng giá lãi suất tuần-->
							<?php foreach ($giatuan AS $gia) { $muc = $gia->bg_mucgia;?>
							
							<tr>
								<td><input type="radio" name="banggia" value="<?php echo $gia->bg_id;?>"></td>
								<td><?php echo $gia->bg_ten;?></td>
								<td class="text-center"><?php echo $muc['tuan2'];?>%</td>
								<td class="text-center"><?php echo $muc['tuan5'];?>%</td>
								<td class="text-center"><?php echo $muc['tuan10'];?>%</td>
							</tr>
							<?php } ?>
							
						</tbody>
					</table>
				</div>
				
			</div>
			</div>
			
			<p><input placeholder="Số tiền vay VNĐ" oninput="this.className = ''" name="sotien" id="sotien"></p>
		</div>
		<div class="tab">Ngày đáo hạn
			<p><input type="date" placeholder="Ngày hết hạn..." oninput="this.className = ''" name="ngayhethan"></p>
			
		</div>
		<div style="overflow:auto;">
			<div style="float:right;">
				<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
				<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
			</div>
		</div>
		<!-- Circles which indicates the steps of the form: -->
		<div style="text-align:center;margin-top:40px;">
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
		</div>
		<?php echo form_submit('submit', 'Lưu', 'class="btn btn-danger"  id ="phieucam" style="width: 100%;display:none"'); ?>
		<?php echo form_close();?>
	</div>
</div>
<script src="http://localhost/webproduct/style/js/jquery.min.js"></script>
<script type="text/javascript">	
	$('.customer_select').click(function(event) {
		var id= $(this).val();

		document.getElementById('chungminh').value = document.getElementById("CMND"+id).textContent;
		document.getElementById('ho_ten').value = document.getElementById("fullname"+id).textContent;
		document.getElementById('sodienthoai').value = document.getElementById("phone"+id).textContent;
		document.getElementById('address').value = document.getElementById("address"+id).textContent;
	});
</script>
<script>
	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the crurrent tab

	function showTab(n) {
	  // This function will display the specified tab of the form...
	  var x = document.getElementsByClassName("tab");
	  x[n].style.display = "block";
	  //... and fix the Previous/Next buttons:
	  if (n == 0) {
	    document.getElementById("prevBtn").style.display = "none";
	  } else {
	    document.getElementById("prevBtn").style.display = "inline";
	  }
	  if (n == (x.length - 1)) {
	    document.getElementById("nextBtn").style.display = "none";
	    document.getElementById("phieucam").style.display = "inline";

	  } else {
	    document.getElementById("nextBtn").innerHTML = "Next";
	  }
	  //... and run a function that will display the correct step indicator:
	  fixStepIndicator(n)
	}

	function nextPrev(n) {
	  // This function will figure out which tab to display
	  var x = document.getElementsByClassName("tab");
	  // Exit the function if any field in the current tab is invalid:
	  if (n == 1 && !validateForm()) return false;
	  // Hide the current tab:
	  x[currentTab].style.display = "none";
	  // Increase or decrease the current tab by 1:
	  currentTab = currentTab + n;
	  // if you have reached the end of the form...
	  if (currentTab >= x.length) {
	    // ... the form gets submitted:
	    document.getElementById("regForm").submit();
	    return false;
	  }
	  // Otherwise, display the correct tab:
	  showTab(currentTab);
	}

	function validateForm() {
	  // This function deals with validation of the form fields
	  var x, y, i, valid = true;
	  x = document.getElementsByClassName("tab");
	  y = x[currentTab].getElementsByTagName("input");
	  // A loop that checks every input field in the current tab:
	  for (i = 0; i < y.length; i++) {
	    // If a field is empty...
	    if (y[i].value == "") {
	      // add an "invalid" class to the field:
	      y[i].className += " invalid";
	      // and set the current valid status to false
	      valid = false;
	    }
	  }
	  // If the valid status is true, mark the step as finished and valid:
	  if (valid) {
	    document.getElementsByClassName("step")[currentTab].className += " finish";
	  }
	  return valid; // return the valid status
	}

	function fixStepIndicator(n) {
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {
	    x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class on the current step:
	  x[n].className += " active";
	}
</script>

<script type="text/javascript">
	$('.loaisp').change(function(event) {
		function autocomplete(inp, arr) {
		  /*the autocomplete function takes two arguments,
		  the text field element and an array of possible autocompleted values:*/
		  var currentFocus;
		  /*execute a function when someone writes in the text field:*/
		  inp.addEventListener("input", function(e) {
		      var a, b, i, val = this.value;
		      /*close any already open lists of autocompleted values*/
		      closeAllLists();
		      if (!val) { return false;}
		      currentFocus = -1;
		      /*create a DIV element that will contain the items (values):*/
		      a = document.createElement("DIV");
		      a.setAttribute("id", this.id + "autocomplete-list");
		      a.setAttribute("class", "autocomplete-items");
		      /*append the DIV element as a child of the autocomplete container:*/
		      this.parentNode.appendChild(a);
		      /*for each item in the array...*/
		      for (i = 0; i < arr.length; i++) {
		        /*check if the item starts with the same letters as the text field value:*/
		        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
		          /*create a DIV element for each matching element:*/
		          b = document.createElement("DIV");
		          /*make the matching letters bold:*/
		          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
		          b.innerHTML += arr[i].substr(val.length);
		          /*insert a input field that will hold the current array item's value:*/
		          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
		          /*execute a function when someone clicks on the item value (DIV element):*/
		          b.addEventListener("click", function(e) {
		              /*insert the value for the autocomplete text field:*/
		              inp.value = this.getElementsByTagName("input")[0].value;
		              /*close the list of autocompleted values,
		              (or any other open lists of autocompleted values:*/
		              closeAllLists();
		          });
		          a.appendChild(b);
		        }
		      }
		  });
		  /*execute a function presses a key on the keyboard:*/
		  inp.addEventListener("keydown", function(e) {
		      var x = document.getElementById(this.id + "autocomplete-list");
		      if (x) x = x.getElementsByTagName("div");
		      if (e.keyCode == 40) {
		        /*If the arrow DOWN key is pressed,
		        increase the currentFocus variable:*/
		        currentFocus++;
		        /*and and make the current item more visible:*/
		        addActive(x);
		      } else if (e.keyCode == 38) { //up
		        /*If the arrow UP key is pressed,
		        decrease the currentFocus variable:*/
		        currentFocus--;
		        /*and and make the current item more visible:*/
		        addActive(x);
		      } else if (e.keyCode == 13) {
		        /*If the ENTER key is pressed, prevent the form from being submitted,*/
		        e.preventDefault();
		        if (currentFocus > -1) {
		          /*and simulate a click on the "active" item:*/
		          if (x) x[currentFocus].click();
		        }
		      }
		  });
		  function addActive(x) {
		    /*a function to classify an item as "active":*/
		    if (!x) return false;
		    /*start by removing the "active" class on all items:*/
		    removeActive(x);
		    if (currentFocus >= x.length) currentFocus = 0;
		    if (currentFocus < 0) currentFocus = (x.length - 1);
		    /*add class "autocomplete-active":*/
		    x[currentFocus].classList.add("autocomplete-active");
		  }
		  function removeActive(x) {
		    /*a function to remove the "active" class from all autocomplete items:*/
		    for (var i = 0; i < x.length; i++) {
		      x[i].classList.remove("autocomplete-active");
		    }
		  }
		  function closeAllLists(elmnt) {
		    /*close all autocomplete lists in the document,
		    except the one passed as an argument:*/
		    var x = document.getElementsByClassName("autocomplete-items");
		    for (var i = 0; i < x.length; i++) {
		      if (elmnt != x[i] && elmnt != inp) {
		        x[i].parentNode.removeChild(x[i]);
		      }
		    }
		  }
		  /*execute a function when someone clicks in the document:*/
		  document.addEventListener("click", function (e) {
		      closeAllLists(e.target);
		  });
		}
		var giati = $('input[name=loaisp]:checked').val();
		switch(giati){
			case "oto":
			var oto_array =["Audi A8 2014","Audi Q8 2014", "Audi R8 2014", "Audi E Tron 2014","Audi A6 2014","Audi A7 2014","Audi Q3 2014","Audi Q5 2014","Audi A8 2015","Audi Q8 2015","Audi R8 2015","Audi E Tron 2015","Audi A6 2015","Audi A7 2015","Audi Q3 2015","Audi Q5 2015","Audi A8 2016","Audi Q8 2016", "Audi R8 2016", "Audi E Tron 2016","Audi A6 2016","Audi A7 2016","Audi Q3 2016","Audi Q5 2016","Audi A8 2017","Audi Q8 2017","Audi R8 2017","Audi E Tron 2017","Audi A6 2017","Audi A7 2017","Audi Q3 2017","Audi Q5 2017","Audi A8 2018","Audi Q8 2018","Audi R8 2018","Audi E Tron 2018", "Audi A6 2018","Audi A7 2018", "Audi Q3 2018","Audi Q5 2018", "BMW X5 2014","BMW 320i 2014","BMW X4 2014", "BMW X3 2014","BMW X2 2014","BMW X7 2014", "BMW 118i 2014", "BMW Z4 2014","BMW 530i 2014","BMW X8 2015","BMW X5 2015","BMW 320i 2015","BMW X4 2015","BMW X3 2015","BMW X2 2015","BMW X7 2015","BMW 118i 2015","BMW Z4 2015","BMW 530i 2015","BMW X8 2015","BMW X5 2016","BMW 320i 2016","BMW X4 2016","BMW X3 2016","BMW X2 2016","BMW X7 2016","BMW 118i 2016","BMW Z4 2016","BMW 530i 2016","BMW X8 2016","BMW X5 2017","BMW 320i 2017","BMW X4 2017","BMW X3 2017","BMW X2 2017","BMW X7 2017","BMW 118i 2017","BMW Z4 2017","BMW 530i 2017","BMW X8 2017",
               "BMW X5 2018",
               "BMW 320i 2018",
               "BMW X4 2018",
               "BMW X3 2018",
               "BMW X2 2018",
               "BMW X7 2018",
               "BMW 118i 2018",
               "BMW Z4 2018",
               "BMW 530i 2018",
               "BMW X8 2018",
               "Huyndai Palisade 2014",
               "Huyndai Elatran 2014",
               "Huyndai Kona 2014",
               "Huyndai Accent 2014",
               "Huyndai Tucson 2014",
               "Huyndai Grand I10 2014",
               "Huyndai Santaphe 2014",
               "Huyndai Palisade 2015",
               "Huyndai Elatran 2015",
               "Huyndai Kona 2015",
               "Huyndai Accent 2015",
               "Huyndai Tucson 2015",
               "Huyndai Grand I10 2015",
               "Huyndai Santaphe 2015",
               "Huyndai Palisade 2016",
               "Huyndai Elatran 2016",
               "Huyndai Kona 2016",
               "Huyndai Accent 2016",
               "Huyndai Tucson 2016",
               "Huyndai Grand I10 2016",
               "Huyndai Santaphe 2016",
               "Huyndai Palisade 2017",
               "Huyndai Elatran 2017",
               "Huyndai Kona 2017",
               "Huyndai Accent 2017",
               "Huyndai Tucson 2017",
               "Huyndai Grand I10 2017",
               "Huyndai Santaphe 2017",
               "Huyndai Palisade 2018",
               "Huyndai Elatran 2018",
               "Huyndai Kona 2018",
               "Huyndai Accent 2018",
               "Huyndai Tucson 2018",
               "Huyndai Grand I10 2018",
               "Huyndai Santaphe 2018",
               "Suzuki  Celerio 2014",
               "Suzuki Swift 2014",
               "Suzuki Ertiga 2014",
               "Suzuki Vitara 2014",
               "Suzuki  Celerio 2014",
               "Suzuki Swift 2015",
               "Suzuki Ertiga 2015",
               "Suzuki Vitara 2015",
               "Suzuki  Celerio 2015",
               "Suzuki Swift 2016",
               "Suzuki Ertiga 2016",
               "Suzuki Vitara 2016",
               "Suzuki  Celerio 2016",
               "Suzuki Swift 2017",
               "Suzuki Ertiga 2017",
               "Suzuki Vitara 2017",
               "Suzuki  Celerio 2017",
               "Suzuki Swift 2018",
               "Suzuki Ertiga 2018",
               "Suzuki Vitara 2018",
               "Suzuki  Celerio 2018",
              ];
        autocomplete(document.getElementById("thongtinsp"), oto_array);
				break;
			case "xemay":
				var xemay_array =["Honda	Wave Alpha 2014", "Honda WaveS 2014","Honda Wave RSX 2014","Honda Lead 2014", "Honda Vison 2014", "Honda Air Blade 2014","Honda SH 2014", "Honda SH Mode 2014","Honda Winner 2014","Honda Future 2014","Honda Dream 2014",
				"Honda	Wave Alpha 2015", "Honda WaveS 2015","Honda Wave RSX 2015","Honda Lead 2015", "Honda Vison 2015", "Honda Air Blade 2015","Honda SH 2015", "Honda SH Mode 2015","Honda Winner 2015","Honda Future 2015","Honda Dream 2015",
				"Honda	Wave Alpha 2016", "Honda WaveS 2016","Honda Wave RSX 2016","Honda Lead 2016", "Honda Vison 2016", "Honda Air Blade 2016","Honda SH 2016", "Honda SH Mode 2016","Honda Winner 2016","Honda Future 2016","Honda Dream 2016",
				"Honda	Wave Alpha 2017", "Honda WaveS 2017","Honda Wave RSX 2017","Honda Lead 2017", "Honda Vison 2017", "Honda Air Blade 2017","Honda SH 2017", "Honda SH Mode 2017","Honda Winner 2017","Honda Future 2017","Honda Dream 2017",
				"Honda	Wave Alpha 2018", "Honda WaveS 2018","Honda Wave RSX 2018","Honda Lead 2018", "Honda Vison 2018", "Honda Air Blade 2018","Honda SH 2018", "Honda SH Mode 2018","Honda Winner 2018","Honda Future 2018","Honda Dream 2018",
				"Yamaha Exciter 2014", "Yamaha Jupiter 2014"," Yamaha Sirius 2014", "Yamaha NVX 2014", "Yamaha TFX 2014","Yamaha Acruzo 2014",
				"Yamaha Exciter 2015", "Yamaha Jupiter 2015"," Yamaha Sirius 2015", "Yamaha NVX 2015", "Yamaha TFX 2015","Yamaha Acruzo 2015",
				"Yamaha Exciter 2016", "Yamaha Jupiter 2016"," Yamaha Sirius 2016", "Yamaha NVX 2016", "Yamaha TFX 2016","Yamaha Acruzo 2016",
				"Yamaha Exciter 2017", "Yamaha Jupiter 2017"," Yamaha Sirius 2017", "Yamaha NVX 2017", "Yamaha TFX 2017","Yamaha Acruzo 2017",
				"Yamaha Exciter 2018", "Yamaha Jupiter 2018"," Yamaha Sirius 2018", "Yamaha NVX 2018", "Yamaha TFX 2018","Yamaha Acruzo 2018",
				"Suzuki VIVA 2014", "Suzuki Revo 2014", "Suzuki Axelo 2014", "Suzuki Impulse 2014","Suzuki GD110 2014","Suzuki GSX-S150 2014",
					]
				console.log("xemay");
				autocomplete(document.getElementById("thongtinsp"), xemay_array);
				break;
			case "laptop":
				console.log("laptop");
				var laptop_array =[" DELL  Ins N3452A"," DELL  N3552"," DELL  N3452 Pen"," DELL  N3451N2840/2GB/500GB","DELL  N3442 3558U/4GB/500GB"," DELL PENTIUM Dell 3442/ Penitum 3558u/ Ram 4G/ Hdd 500G 2016",
					 "ASUS  X402CA /P1007U/2GB/500GB","ASUS  X402CA /P1007U/2GB/500GB","ASUS  E202SA/ N3050/2GB/500GB","ASUS  X453 /N2840/2GB/500GB","ASUS  X551C /P1007U/2GB/500GB",
					"ACER  Z1401 N2940/2GB/500GB","ACER  4738 P6100/2GB/500GB","ACER  Aspire 4738/Core i3-M350/RAM 2GB/HDD 500GB","ACER  Aspire V3-371/Core i5-4200u/RAM 4G/HDD 500GB",
					" LENOVO  B470e Pen B970/2GB/500GB","LENOVO  Z5070/ Core i7 4510u/ RAM 8GB/ HDD 500GB","LENOVO  Z5170/ Core i7 5500u/ RAM 4GB/ HDD 500GB"," LENOVO  IdeaPad 100 N2840",
					"HP  Stream N2840/2GB/500GB","HP  X360/ N3700/4GB/500GB","HP  350/Core i3-4005u/RAM 4GB/HDD 500GB","HP  8460p/Core i3-2330m/RAM 4GB/HDD 320GB","HP  1000 /Core i5-3230m/RAM 4GB/HDD 500GB",
					];
				autocomplete(document.getElementById("thongtinsp"), laptop_array);

				break;
			case "dienthoai":
				console.log("dienthoai");
				var dienthoai_array=["Oppo F1 64Gb", "Oppo R5 64Gb","Oppo A71 64Gb","Oppo F5 64Gb","Oppo F3 64Gb", "Oppo A37 64Gb","Oppo Mirror3 64Gb",
					 "iphone 5 32Gb", "iphone 5S 32Gb","iphone 6 32Gb", "iphone 6S 32Gb","iphone 7 32Gb","iphone 7s 32Gb","iphone 8 32Gb",
					"iphone 5 64Gb", "iphone 5S 64Gb","iphone 6 64Gb", "iphone 6S 64Gb","iphone 7 64Gb","iphone 7s 64Gb","iphone 8 64Gb",
					"Samsung Galaxy A5 64Gb","Samsung Galaxy A8 64Gb","Samsung Galaxy J2 64Gb","Samsung Galaxy J1 64Gb","Samsung Galaxy J2 64Gb","Samsung Galaxy J7 64Gb",

					]
				autocomplete(document.getElementById("thongtinsp"), dienthoai_array);

				break;
			case "tablet":
				console.log("tablet");
				var tablet_array=["Apple  Ipad 3 3G16GB","Apple  Ipad 3 3G32GB","Apple  Ipad 4 3G16GB","Apple  Ipad 4 3G32GB","Apple  Ipad 3 WIFI 16GB","Apple  Ipad 4 WIFI 64GB",
					" Samsung  Tab S3 T825 9.7'' 32GB","Apple  Ipad Pro 10.5'' 4G 512GB","Samsung  Galaxy Tab A T585 10.1''16GB",
					];
				autocomplete(document.getElementById("thongtinsp"), tablet_array);

				break;
			
			default:
				var oto_array =["Audi A8 2014","Audi Q8 2014", "Audi R8 2014", "Audi E Tron 2014","Audi A6 2014","Audi A7 2014","Audi Q3 2014","Audi Q5 2014","Audi A8 2015","Audi Q8 2015","Audi R8 2015","Audi E Tron 2015","Audi A6 2015","Audi A7 2015","Audi Q3 2015","Audi Q5 2015","Audi A8 2016","Audi Q8 2016", "Audi R8 2016", "Audi E Tron 2016","Audi A6 2016","Audi A7 2016","Audi Q3 2016","Audi Q5 2016","Audi A8 2017","Audi Q8 2017","Audi R8 2017","Audi E Tron 2017","Audi A6 2017","Audi A7 2017","Audi Q3 2017","Audi Q5 2017","Audi A8 2018","Audi Q8 2018","Audi R8 2018","Audi E Tron 2018", "Audi A6 2018","Audi A7 2018", "Audi Q3 2018","Audi Q5 2018", "BMW X5 2014","BMW 320i 2014","BMW X4 2014", "BMW X3 2014","BMW X2 2014","BMW X7 2014", "BMW 118i 2014", "BMW Z4 2014","BMW 530i 2014","BMW X8 2015","BMW X5 2015","BMW 320i 2015","BMW X4 2015","BMW X3 2015","BMW X2 2015","BMW X7 2015","BMW 118i 2015","BMW Z4 2015","BMW 530i 2015","BMW X8 2015","BMW X5 2016","BMW 320i 2016","BMW X4 2016","BMW X3 2016","BMW X2 2016","BMW X7 2016","BMW 118i 2016","BMW Z4 2016","BMW 530i 2016","BMW X8 2016","BMW X5 2017","BMW 320i 2017","BMW X4 2017","BMW X3 2017","BMW X2 2017","BMW X7 2017","BMW 118i 2017","BMW Z4 2017","BMW 530i 2017","BMW X8 2017",
               "BMW X5 2018",
               "BMW 320i 2018",
               "BMW X4 2018",
               "BMW X3 2018",
               "BMW X2 2018",
               "BMW X7 2018",
               "BMW 118i 2018",
               "BMW Z4 2018",
               "BMW 530i 2018",
               "BMW X8 2018",
               "Huyndai Palisade 2014",
               "Huyndai Elatran 2014",
               "Huyndai Kona 2014",
               "Huyndai Accent 2014",
               "Huyndai Tucson 2014",
               "Huyndai Grand I10 2014",
               "Huyndai Santaphe 2014",
               "Huyndai Palisade 2015",
               "Huyndai Elatran 2015",
               "Huyndai Kona 2015",
               "Huyndai Accent 2015",
               "Huyndai Tucson 2015",
               "Huyndai Grand I10 2015",
               "Huyndai Santaphe 2015",
               "Huyndai Palisade 2016",
               "Huyndai Elatran 2016",
               "Huyndai Kona 2016",
               "Huyndai Accent 2016",
               "Huyndai Tucson 2016",
               "Huyndai Grand I10 2016",
               "Huyndai Santaphe 2016",
               "Huyndai Palisade 2017",
               "Huyndai Elatran 2017",
               "Huyndai Kona 2017",
               "Huyndai Accent 2017",
               "Huyndai Tucson 2017",
               "Huyndai Grand I10 2017",
               "Huyndai Santaphe 2017",
               "Huyndai Palisade 2018",
               "Huyndai Elatran 2018",
               "Huyndai Kona 2018",
               "Huyndai Accent 2018",
               "Huyndai Tucson 2018",
               "Huyndai Grand I10 2018",
               "Huyndai Santaphe 2018",
               "Suzuki  Celerio 2014",
               "Suzuki Swift 2014",
               "Suzuki Ertiga 2014",
               "Suzuki Vitara 2014",
               "Suzuki  Celerio 2014",
               "Suzuki Swift 2015",
               "Suzuki Ertiga 2015",
               "Suzuki Vitara 2015",
               "Suzuki  Celerio 2015",
               "Suzuki Swift 2016",
               "Suzuki Ertiga 2016",
               "Suzuki Vitara 2016",
               "Suzuki  Celerio 2016",
               "Suzuki Swift 2017",
               "Suzuki Ertiga 2017",
               "Suzuki Vitara 2017",
               "Suzuki  Celerio 2017",
               "Suzuki Swift 2018",
               "Suzuki Ertiga 2018",
               "Suzuki Vitara 2018",
               "Suzuki  Celerio 2018",
              ];
        autocomplete(document.getElementById("thongtinsp"), oto_array);
				break;

		}
	});
</script>
<script type="text/javascript">
	$('#sotien').change(function(event) {
		var sotien = $('#sotien').val();
		document.getElementById('sotien').value = new Intl.NumberFormat('VND', { style: 'currency', currency: 'VND' }).format(sotien);

	});
	$('#dinhgia').click(function() {
		var loaisp = $('input[name=loaisp]:checked').val();
		var sanpham = $('#thongtinsp').val();
		
		$.ajax({
			url: 'http://localhost/webproduct/admin/admin/dinhgia',
			type: 'POST',
			data: {'loaisp': loaisp,'sanpham':sanpham},
			success: function(data){
				console.log(data);
			}
		});
		
		
	});
</script>