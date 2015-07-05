@extends('layout.master')

@section('content')

{{ HTML::style('css/dist/css/bootstrap-theme.css') }}
{{ HTML::style('css/dist/css/bootstrap-theme.min.css') }}
{{ HTML::style('css/dist/css/bootstrap.css') }}
{{ HTML::style('css/dist/css/bootstrap-theme.css') }}
{{ HTML::style('css/dist/css/list.css') }}
{{ HTML::style('css/dist/css/list.js') }}
<script type="text/javascript">
	function delete(){
		alert('are you sure');
	}
</script>
<h1 align="center">Products Information</h1>
<h5 align="center">{{ link_to('products/create', 'Create New Order') }}<h5>
<div class="cont">
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Product Information</h3>
					<div class="pull-right">
						<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
							<i class="glyphicon glyphicon-filter"></i>
						</span>
					</div>
				</div>
			<div class="panel-body">
				<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
			</div>
				<table class="table table-hover" id="dev-table">
					<thead>
						<tr>
							<th>Code</th>
							<th>Name</th>
							<th>Type</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($products as $product)
						<tr>
							<td>{{ link_to('products/edit/'.$product['prodcode'], $product['prodcode']) }}</td>
							<td>{{ $product['prodname'] }}</td>
							<td>{{ $product['prodtype'] }}</td>
							<td>{{ number_format($product['prodqty']) }}</td>
							<td>{{ number_format($product['prodprice'],2) }}</td>
							<td>{{ link_to('products/delete/'.$product['prodcode'],'Delete') }}</td>
						</tr>
							@endforeach
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection