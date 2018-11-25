
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