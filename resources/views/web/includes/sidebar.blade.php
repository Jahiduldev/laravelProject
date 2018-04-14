<div class="col-md-4">
  <aside>
    <!--START NEWSLETTER-->
    <div class="widget newsletter">
      <div class="widget-title">
        <h4>
          <i class="ti-email"></i>
          SUBSCRIBE
        </h4>
      </div>
      <div class="subscribe-image">
        <img src="{{ asset('public/web') }}/images/newsletter.png" alt="Newsletter">
        <p>Subscribe our newsletter to stay updated.</p>
      </div>
      <form data-parsley-validate id="subscribe_add_form" method="post">
        {{ csrf_field() }}
        <input type="text" name="email" class="newsletter-email" placeholder="ex: mail@mail.com" required>
        <button class="newsletter-subscribe" name="subscribe" type="button" id="store-button">Subscribe</button>
      </form>
      <p class="text-center text-danger" id="email-error"></p>
      <p class="text-center text-success" id="email-success"></p>
    </div>
    <!--/END NEWSLETTER-->


    <!--Facebook Page-->
    @if(!empty($setting->facebook))
    <div class="widget">
      <div class="fb-page" data-href="{{ $setting->facebook }}" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
        <blockquote cite="{{ $setting->facebook }}" class="fb-xfbml-parse-ignore">
          <a href="{{ $setting->facebook }}">{{ $setting->website_title }}</a>
        </blockquote>
      </div>
      <div id="fb-root"></div>
      <script type="text/javascript">
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=1227264524030761&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
    </div>
    @endif
    <!--/Facebook Page-->

  </aside>
</div>