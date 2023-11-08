var data = [];
var tableBahan, tableProduct;


//Dom form bahan dan product
$(document).ready(function () {
	$('#bahanButton').click(function() {
		var valueKodeProduct = $('#valueKodeProduct').val();
		var valueProduct = $('#valueProduct').val();
	
		if (valueKodeProduct && valueProduct) {
			$('#bahanModal').modal('show');
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Silakan pilih produk terlebih dahulu!'
			});
		}
	});
	
	fetch('http://fetch-api.test/index.php/product')
	.then(response => response.json())
	.then(apiData => {
		data = apiData.data;
	
		tableBahan = $('#bahanTable').DataTable({
			responsive: true,
			width: '100%',
			data: data,
			columns: [
				{
					data: null,
					render: function (data, type, row, meta) {
						return meta.row + 1;
					}
				},
				{ data: 'kode_bahan' },
				{ data: 'nama_bahan' },
				{ data: 'stock_bahan' },
				{
					data: null,
					className: 'text-center',
					render: function (data, type, row) {
						return '<button class="btn btn-primary btn-sm  check-bahan"><i class="fa fa-check"></i></button>';
					}
				}
			]
		});
	})
	.catch(error => {
		console.error('Error fetching bahan data:', error);
	});

	fetch('http://fetch-api.test/index.php/product')
	.then(response => response.json())
	.then(apiData => {
		data = apiData.data;
		
		tableProduct = $('#productTable').DataTable({
			responsive: true,
			width: '100%',
			data: data,
			columns: [
				{
					data: null,
					render: function (data, type, row, meta) {
						return meta.row + 1;
					}
				},
				{ data: 'kode_bahan' },
				{ data: 'nama_bahan' },
				{ data: 'stock_bahan' },
				{
					data: null,
					className: 'text-center',
					render: function (data, type, row) {
						return '<button class="btn btn-primary btn-sm check-product"><i class="fa fa-check"></i></button>';
					}
				}
			]
		});
	})
	.catch(error => {
		console.error('Error fetching product data:', error);
	});

	// Event listener untuk tombol check di tabel bahan
	$('#bahanTable tbody').on('click', '.check-bahan', function () {
		var data = tableBahan.row($(this).parents('tr')).data();
		var namaBahan = data.nama_bahan;
		var kodeBahan = data.kode_bahan;
		var stockBahan = data.stock_bahan;
		var kodeProduct = $('#valueKodeProduct').val();
	
		if (kodeBahan === kodeProduct) {
			// Menampilkan pesan SweetAlert jika kode bahan sama dengan kode product
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Data bahan tidak boleh sama dengan data produk!'
			});
		} else {
			// Mengisi nilai input dengan data yang dipilih
			$('#valueKodeBahan').val(kodeBahan);
			$('#valueBahan').val(namaBahan);
			$('#stockBahan').val(stockBahan);
			$('#bahanModal').modal('hide');
		}
	});

	// Event listener untuk tombol check di tabel produk
	$('#productTable tbody').on('click', '.check-product', function () {
		var data = tableProduct.row($(this).parents('tr')).data();
		var namaProduct = data.nama_bahan;
		var kodeProduct = data.kode_bahan;

		$('#valueKodeProduct').val(kodeProduct);
		$('#valueProduct').val(namaProduct);
		$('#productModal').modal("hide");
	
	});
});

      //Dom Tabel
      $(document).ready(function() {
      var counter = 1;
      var initialQuantities = [];
      var addedBahanCodes = [];

    $("button[type='submit']").click(function(event) {
        event.preventDefault();
        var kodeBahan = $("#valueKodeBahan").val();
        if (addedBahanCodes.includes(kodeBahan)) {
           Swal.fire({
               icon: 'error',
               title: 'Oops...',
               text: 'Bahan dengan kode yang sama sudah ditambahkan sebelumnya!'
           });
           return;
       }
        var namaBahan = $("#valueBahan").val();
        var qtyBahan = $("#stockBahan").val();

        var dataBahan = data.find(function(item) {
            return item.kode_bahan === kodeBahan;
        });

        if (dataBahan && parseInt(qtyBahan) <= dataBahan.stock_bahan) {
            var newRow = "<tr>" +
                "<td>" + counter + "</td>" +
                "<td>" + kodeBahan + "</td>" +
                "<td>" + namaBahan + "</td>" +
                "<td><input class='quantityBahan form-control' type='number' value='" + qtyBahan + "'></td>" +
                "<td><button class='btn btn-danger btn-sm btn-delete'>Hapus</button></td>" +
                "</tr>";

            $("#daftarBahanTableBody").append(newRow);
            $("#valueKodeBahan").val("");
            $("#valueBahan").val("");
            $("#stockBahan").val("1");
            counter++;

            initialQuantities.push(parseInt(qtyBahan));
             addedBahanCodes.push(kodeBahan);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kode bahan tidak ditemukan atau quantity melebihi stock!'
            });
        }
    });

    $("#daftarBahanTableBody").on("input", ".quantityBahan", function() {
          var inputQty = $(this).val();
          var rowIndex = $(this).closest("tr").index();
          var kodeBahan = $(this).closest("tr").find("td:eq(1)").text();
          var dataBahan = data.find(function(item) {
              return item.kode_bahan === kodeBahan;
          });

          if (parseInt(inputQty) > dataBahan.stock_bahan) {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Quantity tidak boleh melebihi stock!'
              });

              $(this).val(initialQuantities[rowIndex]);
          } else {
              initialQuantities[rowIndex] = parseInt(inputQty);
          }
      });
    $("#daftarBahanTableBody").on("click", ".btn-delete", function() {
        var rowIndex = $(this).closest("tr").index();
        initialQuantities.splice(rowIndex, 1);
        $(this).closest("tr").remove();
        updateNumbering();
    });

    function updateNumbering() {
        var rowNumber = 1;
        $("#daftarBahanTableBody tr").each(function() {
            $(this).find("td:first").text(rowNumber);
            rowNumber++;
        });
    }
    $("#cetakModal").on("show.bs.modal", function(event) {
      // Menampilkan informasi produk di modal
      var kodeProduk = $("#valueKodeProduct").val();
      var namaProduk = $("#valueProduct").val();
      var qtyProduct = $("#qtyProduct").val();

      $("#kodeProduk").val(kodeProduk);
       $("#namaProduk").val(namaProduk);
       $("#quantityProduk").val(qtyProduct);

      // Menampilkan informasi bahan di modal
      $("#modalDaftarBahanTableBody").empty();
      $("#daftarBahanTableBody tr").each(function(index) {
        var kodeBahan = $(this).find("td:eq(1)").text();
        var namaBahan = $(this).find("td:eq(2)").text();
        var quantity = $(this).find(".quantityBahan").val();

        // Menambahkan baris ke tabel daftar bahan di modal
        var newRow = "<tr>" +
          "<td>" + (index + 1) + "</td>" +
          "<td>" + kodeBahan + "</td>" +
          "<td>" + namaBahan + "</td>" +
          "<td>" + quantity + "</td>" +
          "</tr>";
        $("#modalDaftarBahanTableBody").append(newRow);
        $("#modalDaftarBahanTable").DataTable();
      });
    });

});


//Dom cetak
$(document).ready(function() {
    $("#cetakBtn").click(function() {
        var rowCount = $("#daftarBahanTableBody tr").length;
        if (rowCount === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tidak ada data bahan untuk dicetak!'
            });
        } else {
            $("#cetakModal").modal('show');
        }
    });
});
