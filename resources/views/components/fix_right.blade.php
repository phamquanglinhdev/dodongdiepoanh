<style>
    .fix_right {
        position: fixed;
        right: 0;
        bottom: 1em;
    }
</style>
<div class="fix_right px-2 py-lg-3 py-4 d-flex flex-column justify-content-center align-items-center">
    <div class="rounded-circle mb-lg-3 mb-2">
        <a href="{{setting("facebook_page_message_code")}}">
            <img src="{{asset("img/message_icon.png")}}"
                 style="width: 2.5em">
        </a>
    </div>
    <div class="rounded-circle mb-lg-3 mb-2">
        <a href="{{setting("zalo_page_message_code")}}">
            <img src="{{asset("img/zalo_icon.png")}}"
                 style="width: 2.5em">
        </a>
    </div>
    <div class="rounded-circle">
        <a href="tel:{{str_replace(" ","",setting("business_phone"))}}">
            <img src="{{asset("img/phones.gif")}}"
                 style="width: 3em">
        </a>
    </div>
</div>
