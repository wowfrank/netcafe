<div class="content-section" id="contact">
    <div class="container">
        <div class="row">
            <div class="heading-section col-md-12 text-center">
                <h2><a class="expend disabled">{{ trans('messages.Contact Us') }}</a></h2>
                @if(false)
                    <p>{{ trans('messages.Feel free to send a message') }}</p>
                @endif
            </div> <!-- /.heading-section -->
        </div> <!-- /.row -->
        
        <div class="row" id="contact-form">
            <div class="col-md-7 col-sm-6">
                <p><span class="blue">熊猫网咖</span>于2016年在浙江东阳创立，坐落于<span class="green">东阳市环城北路与十字街交叉路口</span>。我们拥有一支年轻的队伍，以及对电竞和理想<span class="red">坚持不懈的追求</span>。我们本着为广大电竞爱好者提供更好的服务的初衷，以创造健康上网、快乐游戏的生活为使命，不断努力。<br><br>
                这里是一个多元化产业的平台，只要你的目标是让自己更加的优秀和更加的有品质，你会爱上我们的环境。我们期待你可以充分发挥自己的能力，敬业进取，一起把<span class="blue">熊猫网咖</span>照顾的更好。 <br><br>

                <span class="blue">熊猫网咖</span>的企业愿景：<span class="red">发自内心的微笑</span><br>
                <span class="blue">熊猫网咖</span>的服务理念：<span class="red">以客户的满意为根本</span><br>
                <span class="blue">熊猫网咖</span>的经营理念：<span class="red">诚信--创新--共赢</span><br>
                <span class="blue">熊猫网咖</span>的作风准则：<span class="red">高效--严谨--坚守承诺</span>
            	</p>
                <ul class="contact-info">
                    <li>{{ trans('messages.Phone') }}: <a href="tel: 010-080-0180">010-080-0180</a></li>
                    @if(false) <li>{{ trans('messages.Wechat') }}: xxxxxxxxx</li> @endif
                    <li>{{ trans('messages.Email') }}: <a href="mailto:frank.qf.cn@gmail.com">frank.qf.cn@gmail.com</a></li>
                    <li>{{ trans('messages.Address') }}: 浙江省东阳市十字街163号-209</li>
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
    function loadMapAPI() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'http://maps.google.cn/maps/api/js?sensor=true&language=zh-CN&callback=mapInit';
            document.body.appendChild(script);

            var scriptGM = document.createElement('script');
            scriptGM.type = 'text/javascript';
            scriptGM.src = '/js/vendor/jquery.gmap3.min.js';
            document.body.appendChild(scriptGM);
        }

    function mapInit() {
        // Map Initialization Code
        $('#map_canvas').gmap3({
            marker:{
                address: '{{ config("services.googlemapapi.lat") }}, {{ config("services.googlemapapi.lng") }}',
                callback: function() {
                    $(this).css('border', '5px solid orange');
                }
            },
            map:{
                options:{
                    zoom: 15,
                    scrollwheel: false,
                    streetViewControl : true
                }
            }
        });
    }

    (function ($) {
        $(window).load(loadMapAPI);
    })(jQuery);
</script>


        