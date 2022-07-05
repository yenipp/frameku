const flashData = $('.flash-data').data('flashdata');

if(flashData) {
	Swal.fire({
		title: 'Berhasil ' ,
		text: flashData + ' Data',
		type: 'success'
	})
}

$('.btn-hps').on('click', function (e){

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah Anda Yakin',
		text: 'Akan menghapus data?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!',
		cancelButtonText: 'Batal'
	  }).then((result) => {
		if (result.value == true) {
		 document.location.href = href;
		} 
	})
});

$('.btn-reset').on('click', function (e){

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah Anda Yakin',
		text: 'Akan mereset password?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Reset!',
		cancelButtonText: 'Batal'
	  }).then((result) => {
		if (result.value == true) {
		 document.location.href = href;
		} 
	})
});
