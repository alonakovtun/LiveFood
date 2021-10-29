var prv_val, f_val;
$("#select_ingredients").change(function () {
    var new_val = $("#select_ingredients option:selected" ).text();
    if (new_val != "") {
        prv_val = $("#target_input").val();
        if (prv_val != "") {
            f_val = prv_val + ", " + new_val;
        } else {
            f_val = new_val;
        }
        $("#target_input").val(f_val);
    }
});



