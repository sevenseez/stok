function upload_file(action){
    var formData = new FormData($("#uploadForm")[0]);
    formData.append("action",action);
    $.ajax({
        url:  '/stok/adres/upload',
        type: 'POST',
        cache: false,
        data: formData,
        dataType: "JSON",
        processData: false,
        contentType: false,
        success: function (data) { 
            alert('Verileriniz aktarıldı!');
        },
        error: function (e) {
            
        }
    });
}

function HandleBrowseClick()
{
    var fileinput = document.getElementById("browse");
    fileinput.click();
}
function Handlechange()
{
var fileinput = document.getElementById("browse");
var textinput = document.getElementById("filename");
textinput.value = fileinput.value;

}