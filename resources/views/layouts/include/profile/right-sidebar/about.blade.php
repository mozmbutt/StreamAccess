@if ($userInfo)
    <div class="widget widget-about p-2">
        <h3 class="mt-2">My Address</h3>
        @if ($userInfo->address)
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3400.731880558374!2d{{ explode(',', $userInfo->address)[1] }}!3d{{ explode(',', $userInfo->address)[0] }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzHCsDMxJzUzLjUiTiA3NMKwMTcnNDMuOSJF!5e0!3m2!1sen!2s!4v1615062827022!5m2!1sen!2s"
                width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"> </iframe>
        @endif
    </div>
@else
    <div class="widget widget-about">
        <img src="/images/logo-light.png" alt="" height="125" width="100">
        <h3>Get Clients on Stream Access</h3>
        <span>Pay only for the Hours worked</span>
        <div class="sign_link">
            <h3><a href="/forum" title="">Forum</a></h3>
            <a href="#" title="">Local Workers</a>
        </div>
    </div>
    <!--about end-->
@endif

<!--about end-->
