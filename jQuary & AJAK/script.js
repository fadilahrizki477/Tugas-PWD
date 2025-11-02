$(document).ready(function() {
    
    
    $("#btn-add").click(function() {
        $("#kotak1").add("#kotak3").css("background-color", "#c8e6c9");
        
        console.log("Kotak 1 dan 3 diberi latar hijau dengan .add()");
    });

    $("#btn-remove").click(function() {
        $("#kotak2").remove();
        
        $(this).prop('disabled', true);
        console.log("Kotak 2 telah dihapus dengan .remove()");
    });

    $("#btn-ajax").click(function() {
        var apiURL = 'https://jsonplaceholder.typicode.com/users/1';

        $.get(apiURL, function(data) {
            
            var namaUser = data.name;
            
            $("#hasil-ajax").html("Data User Diterima: <b>" + namaUser + "</b>");
            $("#btn-ajax").prop('disabled', true).text('Data Sudah Dimuat');
            
        }).fail(function() {
            $("#hasil-ajax").html("AJAX Gagal. Cek koneksi.");
        });
        
        $("#hasil-ajax").html("Memuat Data AJAX: <b>Loading...</b>");

    });

});