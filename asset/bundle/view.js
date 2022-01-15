function load_view() {
	
	document.querySelector('#import-data').value = '';
	
	$.ajax({
			
		url: api.get
		
	}).done((res)=>{
		
		$('#tbl-view').empty();
		
		if (res.length > 0) {
			
			let i = 1;
			
			res.forEach((row)=>{
				
				$('#tbl-view').append(`
					<tr>
						<td>${i++}</td>
						<td>${row.nama}</td>
						<td>${row.category_name}</td>
						<td>${row.stok}</td>
						<td>
							<button onClick="remove('${row.id}')" class="btn btn-danger btn-sm">delete</button>
						</td>
					</tr>`
				);
			});
			
		} else {
			
			$('#tbl-view').append(`<tr><td colspan='5'><h4 class="text-center">Tidak ada data</h4></td></tr>`);
		}
	});
}


$('#proses').on('click', function(){
	
	let _form = new FormData();
	let _file = document.querySelector('#import-data').files;
	
	_form.append('file', _file[0], _file[0].name);
	
	$.ajax({
		url: api.store,
		type: 'POST',
		data: _form,
		enctype: 'multipart/form-data',
		contentType:false,
		processData:false
	})
	.done(function(){
		
		load_view();
		
		$('#import-modal').modal('hide');
		$('body').append(`
			<div style="position:fixed;width:100%;top:0;left:0">
				<div class="alert alert-success">
					<strong>Success</strong> data berhasil di import
					<button type="button" class="close" data-dismiss="alert">&times;</button>
				</div>
			</div>
		`)
	})
	.fail(function(e){
		
		$('#import-modal').modal('hide');
		$('body').append(`
			<div style="position:fixed;width:100%;top:0;left:0">
				<div class="alert alert-danger">
					<strong>Error</strong> ${e.responseText}
					<button type="button" class="close" data-dismiss="alert">&times;</button>
				</div>
			</div>
		`)
	});
});


function remove(item) {
	
	$.ajax({
		url: api.delete + item,
	}).done(function(){
		
		load_view();
	});
}

load_view();