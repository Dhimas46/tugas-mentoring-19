var data = [];
var tableBahan, tableProduct;

$(document).ready(function () {

	$('#createProduct').click(function() {
		$('#createModal').modal('show');
		$('#productModal').modal('hide');
	});
	
	
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
	
	fetch(baseUrl + 'index.php/product')
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

	fetch(baseUrl + 'index.php/product')
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
						var buttons = '<button class="btn btn-primary btn-sm check-product"><i class="fa fa-check"></i></button> ';
						buttons += '<button class="btn btn-danger btn-sm delete-product" data-nama="'+ data.nama_bahan +'" data-id="' + data.id + '"><i class="fa fa-trash"></i></button>';
						return buttons;
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
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Data bahan tidak boleh sama dengan data produk!'
			});
		} else {
			$('#valueKodeBahan').val(kodeBahan);
			$('#valueBahan').val(namaBahan);
			$('#stockBahan').val(stockBahan);
			$('#bahanModal').modal('hide');
		}
	});

	$(document).on('click', '.delete-product', function() {
		var product_id = $(this).data('id');
		var nama = $(this).data('nama');
		Swal.fire({
			title: 'Yakin ingin menghapus ' + nama + '?',
			text: 'Data yang dihapus tidak dapat dikembalikan!' ,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: baseUrl + 'index.php/products/delete/' + product_id,
					type: 'DELETE',
					success: function(response) {
						Swal.fire(
							'Terhapus!',
							'Data telah dihapus.',
							'success'
						);
						$('#productModal').modal('hide');
					},
					error: function() {
						Swal.fire(
							'Gagal!',
							'Gagal menghapus data.',
							'error'
						);
					}
				});
			}
		});
	});
	

	// Event listener untuk tombol check di tabel produk
	$('#productTable tbody').on('click', '.check-product', function () {
		var data = tableProduct.row($(this).parents('tr')).data();
		var idProduct = data.id; 
		var namaProduct = data.nama_bahan;
		var kodeProduct = data.kode_bahan;
	
		$('#valueKodeProduct').val(kodeProduct);
		$('#valueProduct').val(namaProduct);
		$('#productModal').modal("hide");
	
		// Mengirim permintaan AJAX untuk mendapatkan data ingredients berdasarkan ID produk
		$.ajax({
			url: baseUrl + 'index.php/products/ingredients/' + idProduct,
			type: 'GET',
			dataType: 'json',
			success: function(response) {
				if (response.success) {
					console.log(response)
					updateDataBahan(response.data); // Memanggil fungsi untuk memasukkan data ingredients ke dalam logika validasi quantity
				} else {
					Swal.fire({
						icon: 'warning',
						title: 'Perhatian!!',
						text: 'Data produk tidak memiliki ingredients!'
					});
				}
			},
			error: function(error) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Gagal mendapatkan data ingredients. Terjadi kesalahan saat menghubungi server.'
				});
			}
		});
	});
	
	function updateDataBahan(dataIngredients) {
		var counter = 1;
		$("#daftarBahanTableBody").empty(); 
		data = dataIngredients; 
		initialQuantities = []; 
	
		dataIngredients.forEach(function(item) {
			var newRow = "<tr>" +
				"<td>" + counter + "</td>" +
				"<td>" + item.kode + "</td>" +
				"<td>" + item.nama + "</td>" +
				"<td><input class='quantityBahan form-control' type='number' value='"+item.qty+"' min='1'></td>" +
				"<td><button class='btn btn-danger btn-sm btn-delete'>Hapus</button></td>" +
				"</tr>";
	
			$("#daftarBahanTableBody").append(newRow);
			initialQuantities.push(1);
			counter++;
		});
	}
	
});

      //Dom Tabel
      $(document).ready(function() {
      var counter = 1;
      var initialQuantities = [];
      var addedBahanCodes = [];

	  $("#tambahkan").click(function(event) {
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
		var qtyBahan = parseInt($("#stockBahan").val()); // Ubah nilai menjadi integer
	
		fetch(baseUrl + 'index.php/product')
		.then(response => response.json())
		.then(apiResponse => {
			if (apiResponse.success) {
				var data = apiResponse.data;
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
	
					initialQuantities.push(qtyBahan); // Gunakan qtyBahan langsung, tanpa perlu parseInt lagi
					addedBahanCodes.push(kodeBahan);
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Kode bahan tidak ditemukan atau quantity melebihi stock!'
					});
				}
			} else {
				console.error('Error:', apiResponse.message);
			}
		})
		.catch(error => {
			console.error('Error:', error);
		});
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
