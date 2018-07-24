$(document).ready(function(){
    console.log("Hello");
    $('body').on('click', '#add_btn', function(){
        console.log("Clicked");
        //  <td><input type="text" class="form-control" id="inputJenis" placeholder="Jenis Obat" name="jenis[]"></td>
        var tr = $("<tr></tr>");
        $("#table_terapi tbody").append(tr);

        //$("tr:last").append("<td></td>");
        //var input_jenis = $("<input>").attr({
            //"type": "text",
            //"class": "form-control",
            //"placeholder": "Obat Jadi/Racikan",
            //"name": "jenis[]",
        //});
        //$("tr:last td:last").append(input_jenis);

        // <td><input type="number" class="form-control" id="inputNama" placeholder="nama obat" name="nama[]"></td>
        $("tr:last").append("<td></td>");
        var select_nama = $("<select>").attr({
            "type": "text",
            "class": "form-control",
            "placeholder": "Nama Obat",
            "name": "nama[]",
        });
        $("tr:last td:last").append(select_nama);

        //<td><input type="number" class="form-control" id="inputSatuan" placeholder="satuan obat" name="satuan[]"></td>
        // $("tr:last").append("<td></td>");
        // let select_satuan = $("<select>").attr({
        //     "type": "text",
        //     "class": "form-control",
        //     "placeholder": "Satuan Obat",
        //     "name": "satuan[]",
        // });
        // $("tr:last td:last").append(select_satuan);

        // <td><input type="number" class="form-control" id="inputJml" placeholder="jml obat" name="jumlah[]"></td>
        $("tr:last").append("<td></td>");
        var input_jumlah = $("<input>").attr({
            "type": "number",
            "class": "form-control",
            "placeholder": "Jml Obat",
            "name": "jumlah[]",
        });
        $("tr:last td:last").append(input_jumlah);

        // <td><input type="text" class="form-control" id="inputAturan" placeholder="_x sehari" name="aturan[]"></td>
         $("tr:last").append("<td></td>");
        var input_aturan = $("<input>").attr({
            "type": "text",
            "class": "form-control",
            "placeholder": "Aturan Pakai",
            "name": "aturan[]",
        });
        $("tr:last td:last").append(input_aturan);

        // <td><textarea type="text" class="form-control" id="inputKetobat" placeholder="keterangan" name="keterangan[]"></textarea></td>
        $("tr:last").append("<td></td>");
        var input_keterangan = $("<textarea></textarea>").attr({
            "type": "text",
            "class": "form-control",
            "placeholder": "Keterangan",
            "name": "keterangan[]",
        });
        $("tr:last td:last").append(input_keterangan);

        // <td><button class="btn btn-danger" data-target="#delete" name="remove[]">Remove</button></td>
        // $("tr:last").append("<td></td>");
        // let input_remove = $("<button></button>").attr({
        //     "class": "btn btn-danger",
        //     "name": "remove[]",
        // });
        // $("tr:last td:last").append(input_remove);
    });


});

function test_click(){
    console.log("dasdsa");
}

