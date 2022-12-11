<!-- Google Tag Manager -->
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KFD26M7');
</script>
<!-- End Google Tag Manager -->

{{-- Recaptcha --}}
<script src="https://www.google.com/recaptcha/api.js"></script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe title="tagmanager" src="https://www.googletagmanager.com/ns.html?id=GTM-KFD26M7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

{{-- FACEBOOK CODE --}}
<!-- Messenger Plugin de chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin de chat code -->
<div id="fb-customer-chat" class="fb-customerchat"></div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "111283597682731");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml   : true,
            version : 'v15.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    } (document, 'script', 'facebook-jssdk'));
</script>
{{-- END FACEBOOK CODE --}}
