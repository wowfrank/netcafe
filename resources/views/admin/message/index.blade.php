@extends('admin.layout')

@section('content')
	<div class="container-fluid">
		<div class="row page-title-row">
			<div class="col-md-6">
				<h3>{{ trans('messages.Message') }} <small>» {{ trans('messages.Listing') }} </small></h3>
			</div>
			@if(false)
			<div class="col-md-6 text-right">
				<a href="/admin/team/create" class="btn btn-success btn-md">
					<i class="fa fa-plus-circle"></i> {{ trans('messages.New Member') }}
				</a>
			</div>
			@endif
		</div>

		<div class="row">
			<div class="col-sm-12">

				@include('admin.partials.errors')
				@include('admin.partials.success')

				<table id="teams-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>{{ trans('messages.Name') }}</th>
							<th>{{ trans('messages.Message Content') }}</th>

							<th data-sortable="false">{{ trans('messages.Actions') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($msgs as $msg)
						<tr>
							<td>{{ $msg->id }}</td>
							<td>{{ $msg->user->name }}</td>
							<td>{{ $msg->msg_content }}</td>
							
							<td>
								<form method="POST" action="/admin/message/{{ $msg->id }}" onsubmit="return confirm('Do you really want to DELETE the message?');">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="_method" value="DELETE">
									<button type="submit" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete">
										<i class="fa fa-times-circle"></i>
										{{ trans('messages.Delete') }}
									</button>
								</form>
							</td>
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	
@stop

@section('scripts')
	<script>
		$(function() {
			$("#teams-table").DataTable({
			});
		});
	</script>
@stop