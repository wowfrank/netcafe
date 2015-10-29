<div class="content-section" id="contact">
    <div class="container">
        <div class="row">
            <div class="heading-section col-md-12 text-center">
                <h2><a href="#" class="expend disabled">{{ trans('messages.Contact Us') }}</a></h2>
                <p>{{ trans('messages.Feel free to send a message') }}</p>
            </div> <!-- /.heading-section -->
        </div> <!-- /.row -->
        
        <div class="row" id="contact-form">
            <div class="col-md-7 col-sm-6">
                <p>Flex is free responsive HTML5 template by 
                    <span class="blue">template</span>
                    <span class="green">mo</span> 
                    that can be used for any commercial or personal website. 
                    Slider images and portfolio images are from <a rel="nofollow" href="http://unsplash.com">Unsplash</a> website. 
                    Duis ullamcorper tortor tellus. Ut diam libero, ultricies non augue a, mollis congue risus. 
                    Fusce a quam eget nisi luctus imperdiet. Aenean semper erat neque. 
                    Nunc et scelerisque nunc, in adipiscing magna. Phasellus in erat non tellus molestie sagittis sed a justo. 
                    Nam vehicula volutpat nibh, in posuere dolor dictum sit amet.<br><br>
		            Consectetur quod at aperiam corporis totam. Nesciunt minima laborum sapiente totam facere unde est cum quia. 
                    Hic, suscipit, praesentium earum quod ea distinctio impedit ullam deserunt minus dolore quibusdam quis saepe aliquam doloribus voluptatibus eum excepturi.
            	</p>
                <ul class="contact-info">
                    <li>{{ trans('messages.Phone') }}: <a href="tel: 010-080-0180">010-080-0180</a></li>
                    <li>{{ trans('messages.Wechat') }}: xxxxxxxxx</li>
                    <li>{{ trans('messages.Email') }}: <a href="mailto:frank.qf.cn@gmail.com">frank.qf.cn@gmail.com</a></li>
                    <li>{{ trans('messages.Address') }}: 123 Premium Studio, Thamine Street, Digital Estate</li>
                </ul>
                <!-- spacing for mobile viewing --><br><br>
            </div> <!-- /.col-md-7 -->
            <div class="col-md-5 col-sm-6">
                @include('admin.partials.errors')
                @include('admin.partials.success')
                <div class="contact-form">
                    <form method="post" name="contactform" id="contactform" action="/contact">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <p>
                            <input name="name" type="text" id="name" placeholder="{{ trans('messages.Your Name') }}" value="{{ old('name') }}">
                        </p>
                        <p>
                            <input name="email" type="text" id="email" placeholder="{{ trans('messages.Your Email') }}" value="{{ old('email') }}"> 
                        </p>
                        <p>
                            <input name="subject" type="text" id="subject" placeholder="{{ trans('messages.Subject') }}" value="{{ old('subject') }}"> 
                        </p>
                        <p>
                            <textarea name="message" id="message" placeholder="{{ trans('messages.Message') }}" >{{ old('message') }}</textarea>    
                        </p>
                        <input type="submit" class="mainBtn" id="submit" value="{{ trans('messages.Send Message') }}">
                    </form>
                </div> <!-- /.contact-form -->
            </div> <!-- /.col-md-5 -->
        </div> <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
               <div class="googlemap-wrapper">
                    <div id="map_canvas" class="map-canvas"></div>
                </div> <!-- /.googlemap-wrapper -->
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#contact -->

<!-- Load Google Map3 Asynchronously -->
    <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

function initMap() {
  var map = new google.maps.Map(document.getElementById('map_canvas'), {
    center: {lat: {{config('services.googlemapapi.lat')}}, lng: {{config('services.googlemapapi.lng')}}},
    zoom: 15
  });
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Location found.');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

    </script>
    <script src="http://maps.google.cn/maps/api/js?key={{config('services.googlemapapi.google_api_key')}}&signed_in=true&language=zh-CN&callback=initMap"
        async defer>
    </script>


        