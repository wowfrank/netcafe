@extends('layouts.message')

@section('styles')
<style>
.content-section {
		margin-top: 135px;
		padding-top: 10px;
}
/* Spotlight */

.spotlight {
	display: -moz-flex;
	display: -webkit-flex;
	display: -ms-flex;
	display: flex;
	-moz-align-items: center;
	-webkit-align-items: center;
	-ms-align-items: center;
	align-items: center;
	margin: 0 0 2em 0;
}

.spotlight .image {
	width: 30%;
	border-radius: 100%;
	margin: 0 3em 0 0;
	display: block;
}

	.spotlight .image img {
		display: block;
		border-radius: 100%;
		width: 100%;
	}

.spotlight .content {
	width: 80%;
}

	.spotlight .content > :last-child {
		margin-bottom: 0;
	}

.spotlight:nth-child(2n) {
	-moz-flex-direction: row-reverse;
	-webkit-flex-direction: row-reverse;
	-ms-flex-direction: row-reverse;
	flex-direction: row-reverse;
}

	.spotlight:nth-child(2n) .image {
		margin: 0 0 0 3em;
	}

	.spotlight:nth-child(2n) .content {
		text-align: right;
	}

@media screen and (max-width: 736px) and (orientation: landscape) {

	.spotlight .image {
		margin: 0 2em 0 0;
	}

	.spotlight:nth-child(2n) .image {
		margin: 0 0 0 2em;
	}

}

@media screen and (max-width: 736px) and (orientation: portrait) {

	.spotlight {
		-moz-flex-direction: column !important;
		-webkit-flex-direction: column !important;
		-ms-flex-direction: column !important;
		flex-direction: column !important;
	}

		.spotlight .image {
			width: 100%;
			max-width: 60%;
			margin: 0 0 2em 0 !important;
		}

		.spotlight .content {
			width: 100%;
			text-align: center !important;
		}

}


/* Wrapper */

.wrapper {
	padding: 4.5em 0 2.5em 0 ;
	background-color: #ffffff;
	/*border-bottom: solid 2px #eeeeee;*/
}

.wrapper > .inner {
	margin-left: auto;
	margin-right: auto;
	width: 50em;
}

.wrapper > .inner.alt > * {
	border-top: solid 2px #eeeeee;
	margin-bottom: 0;
	margin-top: 3em;
	padding-top: 3em;
}

.wrapper > .inner.alt > *:first-child {
	border-top: 0;
	margin-top: 0;
	padding-top: 0;
}
</style>
@stop
@section('content')
<div class="content-section" id="portfolio">
    <div class="container">
    	<form action="{{ route('message.store') }}" method="POST">
	        <div class="row">
		        <div class="col-md-6">
					@include('admin.partials.success')
					@include('admin.partials.errors')

				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    <input type="hidden" name="msg_uid" value="{{ !Auth::check() ? '': Auth::user()->id }}">
				    <textarea class="form-control {{ Auth::check() ? '':'disabled' }}" rows="5" name="msg_content" id="msg_content" autofocus placeholder="{{ trans('messages.Please tell us your feelings') }}">{{ old('msg_content') }}</textarea>
				    
				</div>
				<div class="col-md-2">
					<ul class="list-group">
						<li class="list-group-item list-group-item-info text-center">
							<input type="checkbox" class="cafe-votes" name="cafe_service" checked data-size="small" data-label-text="{{ trans('messages.Cafe Service') }}" data-on-text="<span class='fa fa-thumbs-up fa-lg'></span>" data-off-text="<span class='fa fa-thumbs-down fa-lg'></span>">
						</li>
						<li class="list-group-item list-group-item-info text-center">
							<input type="checkbox" class="cafe-votes" name="cafe_hygiene" checked data-size="small" data-label-text="{{ trans('messages.Cafe Hygiene') }}" data-on-text="<span class='fa fa-thumbs-up fa-lg'></span>" data-off-text="<span class='fa fa-thumbs-down fa-lg'></span>">
						</li>
					</ul>
				</div>
				<div class="col-md-2">
					<ul class="list-group">
						<li class="list-group-item list-group-item-info text-center">
							<input type="checkbox" class="cafe-votes" name="cafe_hardware" checked data-size="small" data-label-text="{{ trans('messages.Cafe Hardware') }}" data-on-text="<span class='fa fa-thumbs-up fa-lg'></span>" data-off-text="<span class='fa fa-thumbs-down fa-lg'></span>">
						</li>
						<li class="list-group-item list-group-item-info text-center">
							<input type="checkbox" class="cafe-votes" name="cafe_price" checked data-size="small" data-label-text="{{ trans('messages.Cafe Price') }}" data-on-text="<span class='fa fa-thumbs-up fa-lg'></span>" data-off-text="<span class='fa fa-thumbs-down fa-lg'></span>">
						</li>
					</ul>
				</div>
				<div class="col-md-2">
					<ul class="list-group">
						<li class="list-group-item list-group-item-info text-center">
							<input type="checkbox" class="cafe-votes" name="cafe_environment" checked data-size="small" data-label-text="{{ trans('messages.Cafe Environment') }}" data-on-text="<span class='fa fa-thumbs-up fa-lg'></span>" data-off-text="<span class='fa fa-thumbs-down fa-lg'></span>">
						</li>
					</ul>
				</div>
	        </div> <!-- /.row -->
	        <div class="row">
	        	<div class="col-md-2">
			        @if(!Auth::check())
						<div class="dropdown" style="width: 150px;">
							<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">{{ trans('messages.Login') }}
							<span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="{{ route('social.login', ['baidu']) }}">{{ trans('messages.BAIDU') }}</a></li>
								<li><a href="{{ route('social.login', ['qq']) }}">{{ trans('messages.QQ') }}</a></li>
								<li><a href="{{ route('social.login', ['weibo']) }}">{{ trans('messages.SINA WEIBO') }}</a></li>
							</ul>
						</div>
				    @else
				    	<button type="submit" class="btn btn-info btn-sm {{ Auth::check() ? '':'disabled' }}" name="sendMsg" id="sendMsg">{{ trans('messages.Send') }}</button>
				    @endif
				</div>
	        </div>
        </form>

		<section id="one" class="wrapper">
			<div class="col-md-12">
				@if(count($messages) > 0)
			        @foreach($messages as $message)
				        <section class="spotlight">
							<div class="image" style="width: 64px"><img src="{{ $message->user->avatar }}" alt="" /></div>
							<div class="content">
								<h3> {{ $message->user->name}}</h3>
								<p> {{	$message->msg_content }}</p>
							</div>
						</section>
					@endforeach
				@endif
				<div class="text-center"> {!! $messages->render() !!} </div>
       		</div>
		</section>
    </div> <!-- /.container -->
</div> <!-- /#portfolio -->
<script type="text/javascript">
	$(".cafe-votes").bootstrapSwitch();
</script>
@stop
