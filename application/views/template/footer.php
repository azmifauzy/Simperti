

        <!-- Start app Footer part -->
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2020 <div class="bullet"></div> Built By <a href="https://azmifauzy.github.io">Azmifauzy</a>
            </div>
            <div class="footer-right">
            
            </div>
        </footer>
    </div>
</div>
<script src="<?= base_url(); ?>assets/js/jquery.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert.js"></script>

<!-- General JS Scripts -->
<script src="<?= base_url(); ?>assets/bundles/lib.vendor.bundle.js"></script>
<script src="<?= base_url(); ?>assets/js/CodiePie.js"></script>

<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="<?= base_url(); ?>assets/js/scripts.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>
<script>
	
$(document).ready(function() {


	// DATA TABLE
	$('#bootstrap-data-table').DataTable();
	$('.bootstrap-data-table').DataTable();


	let subket 		= $('#subket');
	let inputCheck 	= $('input[type="checkbox"]');

	inputCheck.click(function() {
		inputCheck.prop('checked', false);
		subket.show();

		$(this).prop('checked', true);
		if ($(this).val() === "hadir") {
			subket.hide();
		}
	})


	// SWEET ALERT 
	let btnTerima 	= $('.btnTerima');
	let btnTolak 	= $('.btnTolak');
	let btnHps 		= $('.btnHps');
	let btnTmbh 	= $('.btnTmbh');
	let btnClose	= $('.btnClose');

	btnTerima.click(function(e) {
		e.preventDefault();
		let href = $(this).attr('href');

		swal({
		  title: "Anda Yakin?",
		  text: "Anda yakin ingin menerima Cuti Karyawan?",
		  icon: "info",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    document.location.href = href;
		  }
		});
	})

	btnTolak.click(function(e) {
		e.preventDefault();
		let href = $(this).attr('href');

		swal({
		  title: "Anda Yakin?",
		  text: "Anda yakin ingin menolak Cuti Karyawan?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    document.location.href = href;
		  }
		});
	})

	btnHps.click(function(e) {
		e.preventDefault();
		let href = $(this).attr('href');

		swal({
		  title: "Anda Yakin?",
		  text: "Anda yakin ingin menghapus Data?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    document.location.href = href;
		  }
		});
	})

	btnTmbh.click(function(e) {
		e.preventDefault();
		let href = $(this).closest('form').attr('action');

		swal({
		  title: "Anda Yakin?",
		  text: "Anda yakin Data Sudah Benar?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    $(this).unbind('click').click();
		  }
		});
	})

	btnClose.click(function(e) {
		e.preventDefault();
		$(this).closest('.card').hide();
	})
	


	// DETAIL KARYAWAN JAVASCRIPT
	let inUbah = $('.inUbah');
	inUbah.hide();

	let btnUbah = $('.btnUbah');
	let inputUbah = $('.inputUbah');
	let inputNik = $('input[name="nik"]');

	btnUbah.click(function() {
		inUbah.show();
		btnUbah.hide();

		inputUbah.prop('readonly', false);
		inputNik.attr('type', 'number');
	})

	let btnBatalUbah = $('.btnBatalUbah');
	btnBatalUbah.click(function() {
		inUbah.hide();
		btnUbah.show();

		inputUbah.prop('readonly', true);
		inputNik.attr('type', 'password');
	})

	// EDIT JABATAN JAVASCRIPT
	let btnEdit = $('.btnEdit');
	let btnSpan = $('#btnSpan');
	let titleTmbhJabatan = $('#titleTmbhJabatan');
	btnSpan.hide();

	let labelEditJabatan = $('#labelEditJabatan');
	btnEdit.click(function(e) {
		e.preventDefault();

		let dataIdJabatan = $(this).closest('.dataRowJabatan').find('.dataIdJabatan').text();
		let dataNamaJabatan = $(this).closest('.dataRowJabatan').find('.dataNamaJabatan').text();

		$('input[name="id_jabatan"]').val(dataIdJabatan);
		$('input[name="nama_jabatan"]').val(dataNamaJabatan);
		$('input[name="nama_jabatan"]').focus();

		btnTmbh.hide();
		btnSpan.show();

		titleTmbhJabatan.text('Edit Jabatan');
	})

	btnBatalUbah.click(function(e) {
		e.preventDefault();

		btnSpan.hide();
		btnTmbh.show();
		$('input[name="id_jabatan"]').val('');
		$('input[name="nama_jabatan"]').val('');

		titleTmbhJabatan.text('Tambah Jabatan');


	})
})

</script>
</body>
</html>