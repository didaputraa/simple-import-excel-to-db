<div class="col">
	<h1 class="mb-4">Product</h1>
	<button class="btn btn-success" data-toggle="modal" data-target="#import-modal" style="width:100px;margin-bottom:4px">Import</button>
	<table class="table">
		<tr>
			<td>#</td>
			<td>Nama</td>
			<td>category</td>
			<td>Stok</td>
			<td>Action</td>
		</tr>
		<tbody id="tbl-view"></tbody>
	</table>
</div>

<div class="modal fade" id="import-modal" data-backdrop="static" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Import data</label>
					<input type="file" id="import-data" class="form-control" />
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button class="btn btn-primary" id="proses">Proses</button>
			</div>
		</div>
	</div>
</div>

<script src="config.js"></script>
<script src="asset/bundle/view.js"></script>