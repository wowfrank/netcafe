<div class="content-section" id="our-messages">
    <div class="container">        
        <div class="row">
            <div class="heading-section col-md-12 text-center">
                <h2><a href="/message/" class="expend">{{ trans('messages.Our Messages') }}</a></h2>
                @if(false)
                    <p>{{ trans('messages.Check out our messages') }}</p>
                @endif
            </div> <!-- /.heading-section -->
        </div> <!-- /.row -->
        <div class="row">
            <div class="col-md-8 col-sm-6">
                <ul class="list-group">
                    @if(count($messages) > 0)
                        @foreach($messages as $message)
                        <li class="list-group-item"> {!! str_limit(strip_tags($message->msg_content), $limit = 70, $end = '...') !!} <span class="badge">{{ $message->created_at->format('Y-m-d g:ia') }}</span></li>
                        @endforeach
                    @else
                        <li class="list-group-item"> {{ trans('messages.Not Found') }}</li>
                    @endif
                </ul>
            </div> <!-- /.col-md-8 -->
            <div class="col-md-4 col-sm-6">
                <ul class="progess-bars">
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $message->getPercentage('cafe_service') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $message->getPercentage('cafe_service') }}%;">{{ trans('messages.Cafe Service') }} {{ $message->getPercentage('cafe_service') }}%</div>
                        </div>
                    </li>
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $message->getPercentage('cafe_hygiene') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $message->getPercentage('cafe_hygiene') }}%;">{{ trans('messages.Cafe Hygiene') }} {{ $message->getPercentage('cafe_hygiene') }}%</div>
                        </div>
                    </li>
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $message->getPercentage('cafe_environment') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $message->getPercentage('cafe_environment') }}%;">{{ trans('messages.Cafe Environment') }} {{ $message->getPercentage('cafe_environment') }}%</div>
                        </div>
                    </li>
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $message->getPercentage('cafe_hardware') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $message->getPercentage('cafe_hardware') }}%;">{{ trans('messages.Cafe Hardware') }} {{ $message->getPercentage('cafe_hardware') }}%</div>
                        </div>
                    </li>
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $message->getPercentage('cafe_price') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $message->getPercentage('cafe_price') }}%;">{{ trans('messages.Cafe Price') }} {{ $message->getPercentage('cafe_price') }}%</div>
                        </div>
                    </li>
                </ul>
            </div> <!-- /.col-md-4 -->
        </div> <!-- /.row -->
    </div>
</div>