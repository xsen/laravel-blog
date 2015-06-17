<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('/img/about-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>{{ $title or setting('site_name') }}</h1>
                    <hr class="small">
                    <span class="subheading">{{ $description or setting('site_description') }}</span>
                </div>
            </div>
        </div>
    </div>
</header>