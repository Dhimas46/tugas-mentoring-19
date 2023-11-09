<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tugas Mentoring 18</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=site_url('public')?>/plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Tempusdominus Bootstrap 4 -->
    <link
      rel="stylesheet"
      href="<?=site_url('public')?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    />
    <!-- iCheck -->
    <link
      rel="stylesheet"
      href="<?=site_url('public')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?=site_url('public')?>/plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=site_url('public')?>/dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link
      rel="stylesheet"
      href="<?=site_url('public')?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
    />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=site_url('public')?>/plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="<?=site_url('public')?>/plugins/summernote/summernote-bs4.min.css" />
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              ><i class="fas fa-bars"></i
            ></a>
          </li>

        </ul>
        <ul class="navbar-nav ml-auto">
        </ul>
      </nav>
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img
            src="<?=site_url('public')?>/dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">DOM Content</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="<?=site_url('public')?>/dist/img/user2-160x160.png"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block">Dhimas Wahyu Prayogi</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item">
                <a href="index.html" class="nav-link active">
                  <i class="nav-icon fas fa-box"></i>
                  <p>Products</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard </li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
              <div class="card">
                  <div class="card-body">
                    <div class="col-12 mb-3">
                      <div class="row">
                          <div class="col-md-2">
                            <button style="width: 120px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal">
                              Pilih Produk
                            </button>
                          </div>
                          <div class="col-3">
                            <input type="text" class="form-control" id="valueKodeProduct" placeholder="Kode Bahan" readonly>
                          </div>
                          <div class="col-md-5">
                          <input type="text" class="form-control" id="valueProduct" placeholder="Nama product" readonly>
                          </div>
                          <div class="col-md-2">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Qty</span>
                              </div>
                              <input id="qtyProduct" type="number" class="form-control" value="1">
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="row">
                          <div class="col-md-2">
                            <button id="bahanButton" style="width: 120px" type="button" class="btn btn-primary">
                              Pilih Bahan
                            </button>
                          </div>
                          <div class="col-3">
                            <input type="text" class="form-control" id="valueKodeBahan" placeholder="Kode Bahan" readonly>
                          </div>
                          <div class="col-md-5">
                          <input type="text" class="form-control" id="valueBahan" placeholder="Nama Bahan" readonly>
                          </div>
                          <div class="col-md-2">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Stock</span>
                              </div>
                              <input type="number" id="stockBahan" class="form-control" placeholder="0" readonly>
                            </div>
                          </div>
                          </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="float-right">
                        <button type="submit" id="tambahkan" class="btn btn-primary" > <i class="fa fa-save"></i>
                          Tambahkan
                        </button>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card">
                  <div class="card-header">
                    <h4>Daftar Bahan</h4>
                  </div>
                  <div class="card-body">
                      <table class="table table-bordered">
                          <thead>
                            <th>#</th>
                            <th>Kode Bahan</th>
                            <th>Bahan</th>
                            <th>Qty</th>
                            <th>Action</th>
                          </thead>
                          <tbody id="daftarBahanTableBody">

                          </tbody>
                      </table>
                  </div>
                  <div class="card-footer ">
                    <button type="button" class="float-right btn btn-primary" id="cetakBtn" >
                        <i class="fa fa-print"></i>&nbspCetak
                      </button>
                  </div>
              </div>
          </div>
        </section>
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong
          >Copyright &copy; 2023
          <a href="https://github.com/Dhimas46">Dhimas Wahyu Prayogi</a></strong
        >
      </footer>
    </div>
    <script src="<?=site_url('public')?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?=site_url('public')?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?=site_url('public')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=site_url('public')?>/dist/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="public/index.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
   <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  </body>
</html>


<!-- Modal Cetak -->
<div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="cetakModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="kodeProduk">Kode Produk</label>
              <input type="text" class="form-control" id="kodeProduk" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="namaProduk">Nama Produk</label>
              <input type="text" class="form-control" id="namaProduk" disabled>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="quantityProduk">Quantity Produk</label>
          <input type="text" class="form-control" id="quantityProduk" disabled>
        </div>
        <hr>
        <table id="modalDaftarBahanTable" class="table ">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Bahan</th>
              <th>Nama Bahan</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody id="modalDaftarBahanTableBody">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!--Modal Product-->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			
      </div>
      <div class="modal-body table-responsive">
		<div class="mb-3">
		<a id="createProduct" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Produk</a>
		</div>
          <table style="width: 100%" class="table table-bordered" id="productTable">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Product</th>
                      <th>Stock</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>

             </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--Modal Bahan-->
<div class="modal fade" id="bahanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Data Bahan</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body table-responsive">
                   <table style="width: 100%" class="table table-bordered" id="bahanTable">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Kode</th>
                               <th>Nama Bahan</th>
                               <th>Stock</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tbody>

                      </tbody>
                   </table>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-primary">Save changes</button>
               </div>
           </div>
       </div>
   </div>
	 


<!--Modal Product-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			
      </div>
			<form id="productForm" method="post">
		
      <div class="modal-body">
			<div class="row">
				<div class="col-md-3">
				<div class="mb-3">
							 	<label for="">Kode Produk</label> <span class="text-danger ms-1">*</span>
								<input type="text" name="kode_bahan" class="form-control" placeholder="HB6GTY" maxlength="6">
					</div>
				</div>
				<div class="col-md-9">
				<div class="mb-3">
							 	<label for="">Nama Produk</label> <span class="text-danger ms-1">*</span>
								<input type="text" name="product_name" class="form-control" placeholder="Burger" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
				<div class="mb-3">
						<label for="category_id">Kategori produk</label> <span class="text-danger ms-1">*</span>
						<select name="category_id" class="form-control" id="category_id">
								<?php foreach ($categories as $category): ?>
										<option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
								<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
				<div class="mb-3">
							 	<label for="">Quantity</label> <span class="text-danger ms-1">*</span>
								<input type="number" name="quantity" class="form-control"  min="1">
					</div>
				</div>
			</div>
			<div class="mb-3">
							 	<label for="">Deskripsi</label> 
								<textarea name="deskripsi" class="form-control" cols="30" rows="4"></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
      </div>
			</form>
    </div>
  </div>
</div>

<script type="text/javascript">
    var baseUrl = '<?= base_url() ?>';
</script>

<script>
$(document).ready(function() {
    $('#productForm').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize(); 
        var url = baseUrl + 'index.php/products/create'; 

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Data berhasil disimpan.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#createModal').modal('hide'); 
														$('#productForm')[0].reset();
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Gagal menyimpan data.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

</script>
