<footer class="footer bg-footer" id="footer" style="background: url({{ url('images/bg-footer.png') }}) no-repeat center center;">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ftr-about">
                    <span class="ftr-logo">
                        <img class="img-block" src="{{ url('images/logo.png') }}" alt="">
                    </span>
                    {{-- <p><i class="fas fa-map-marker-alt"></i>W. Vista Ave, Phoenix, AZ 85069</p> --}}
                    <ul class="ftr-contact">
                        <li><i class="fas fa-map-marker-alt"></i>P.O. Box 30253, Laughlin, NV 89029</li>
                        <li><a href="#"><i class="far fa-envelope"></i>admin@americanmodel.net</a></li>
                        {{-- <li><a href="#"><i class="fas fa-phone-alt"></i>(480) 265-0187</a></li> --}}
                    </ul>
                    <p>All Rights Reserved By Model Management, LLC.</p>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                <ul class="d-flex justify-content-center ftr-social-list">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://twitter.com/AllAgesCasting"><i class="fab fa-twitter"></i></a></li>
                </ul>
                <div class="ftr-newsltr">
                    <p>Subscribe To Our Newsletter And Stay Up-To-Date</p>
                    {{-- Ajax  call developer.js  --}}
                    <form action="" method="GET"  id="newsletter_form">
                        @csrf
                        <div class="ftr-newsltr-wrap d-flex">
                            <div class="newsltr-wrap-lft">
                                <div class="input-white-wrap">
                                    <input type="email" name="email" class="form-control input-white" placeholder="ex. email@gmail.com" required>
                                </div>
                            </div>
                            <div class="newsltr-wrap-rgt">
                                <button type="submit" class="ftr-subs-btn">subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="ftr-btm">
        <div class="container-fluid left-right-40">
            <div class="row">
                <div class="col-12">
                    <div class="ftr-btm-text">
                        <p>&copy; 2022-2023 by Model Management, LLC. | Designed by Aqualeaf It Solution Pvt. Ltd.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>