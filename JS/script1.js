$(document).ready(function () {
    $('#btnInsertPodaci').click(function () {
       // var datum = $("#datePrikaz").val();
       // console.log(datum);
       //  alert("Nesto");
        var url = "http://localhost:8080/ipsStatistika/uploads/excel.xlsx";
        var oReq = new XMLHttpRequest();
        oReq.open("GET", url, true);
        oReq.responseType = "arraybuffer";

        oReq.onload = function (e) {
            var arraybuffer = oReq.response;
            var data = new Uint8Array(arraybuffer);
            var arr = new Array();
            for(var i = 0; i!= data.length; ++i) arr[i] = String.fromCharCode(data[i]);
            var bstr = arr.join("");
            var workbook = XLSX.read(bstr, {
                type : "binary"
            });
            var first_sheet_name = workbook.SheetNames[0];
            var worksheet = workbook.Sheets[first_sheet_name];
            // console.log(XLSX.utils.sheet_to_json(worksheet, {
            //     raw : true
            // }));
             var podaci = XLSX.utils.sheet_to_json(worksheet, { raw: true});
            var data = {
                'podaci' : podaci,
                'success' : true
            }
            $.ajax({
                method: 'post',
                url: 'modules/podaciInsert.php',
                dataType: 'json',
                data: data,
                // success: function (data) {
                //     console.log(data);
                //
                // },
                // error: function (xhr, status, error) {
                //     console.log(xhr.status);
                // }
            });
        };
        oReq.send();
        alert("Uspesno uneto u bazu! :P");
        window.location.replace("http://localhost:8080/ipsStatistika/index.php");
        location.reload();
    });
});