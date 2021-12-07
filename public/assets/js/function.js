$('nav li a[href="/' + location.pathname.split("/")[1] + '"]').addClass('active');

var x = 0;

function addInput() {
    var str = ' <input type="text" class="form-control input-md hhhhhhh mt-2" placeholder="Ingredients" > <div id="input' + (x + 1) + '"></div>';
    document.getElementById('input' + x).innerHTML = str;
    x++;
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })