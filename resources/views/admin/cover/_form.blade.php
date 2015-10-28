<div class="form-group">
	<label for="name" class="col-md-3 control-label"> {{ trans('messages.Name') }} </label>
	<div class="col-md-8">
		<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button" onclick="$('#imageUploader').click();">{{ trans('messages.Upload') }}{{ trans('messages.Name') }}@</button>
			</span>
			<input type="text" class="form-control" name="name" id="name" value="{{ $name }}" placeholder="1600*750" readonly="readonly">
		</div>
		<input name="imageUploader" id="imageUploader" type="file" style="display: none;">
	</div>
</div>


<div class="form-group">
	<label for="title" class="col-md-3 control-label"> {{ trans('messages.Title') }} </label>
	<div class="col-md-8">
		<input type="text" class="form-control" name="title" id="title" value="{{ $title }}">
	</div>
</div>

<div class="form-group">
	<label for="subtitle" class="col-md-3 control-label"> {{ trans('messages.Subtitle') }} </label>
	<div class="col-md-8">
		<input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ $subtitle }}">
	</div>
</div>

<div class="form-group">
	<label for="linktitle" class="col-md-3 control-label"> {{ trans('messages.Link') }} {{ trans('messages.Title') }} </label>
	<div class="col-md-8">
		<input type="text" class="form-control" name="linktitle" id="linktitle" value="{{ $linktitle }}">
	</div>
</div>

<div class="form-group">
	<label for="link" class="col-md-3 control-label"> {{ trans('messages.Link') }} </label>
	<div class="col-md-8">
		<input type="text" class="form-control" name="link" id="link" value="{{ $link }}">
	</div>
</div>

<div class="form-group">
	<label for="active" class="col-md-3 control-label"> {{ trans('messages.Status') }} </label>
	
	<div class="col-md-8">
		<select name="active" id="active" class="form-control">
			<option @if ($active == 1) selected @endif
				value="1">
				{{ trans('messages.In Use') }}
			</option>

			<option @if ($active == 0) selected @endif
				value="0">
				{{ trans('messages.Not In Use') }}
			</option>
		</select>
	</div>
</div>