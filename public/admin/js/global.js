var url  = $('meta[name = path]').attr("content");
var csrf    = $('mata[name = csrf-token]').attr("content");
$.ajaxSetup({
    
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// datatable
$( document ).ready(function() {
    var TableEle = document.getElementById("example");
    if(TableEle){
        $("#example").DataTable();
    }
 });