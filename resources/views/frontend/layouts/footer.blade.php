{{--
<!-- Footer Start -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">গুরুত্বপূর্ণ লিংক</h3>
                    <ul>
                        <li>
                            <a href="http://www.bangladesh.gov.bd/"
                                >গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</a
                            >
                        </li>
                        <li>
                            <a href="http://www.moedu.gov.bd/"
                                >শিক্ষা মন্ত্রণালয়</a
                            >
                        </li>
                        <li>
                            <a href="http://www.educationboard.gov.bd/"
                                >আন্ত: শিক্ষা বোর্ড</a
                            >
                        </li>
                        <li>
                            <a href="http://118.67.215.141/ebook/">ebook</a>
                        </li>
                        <li>
                            <a
                                href="http://118.67.215.141/studentHome.php?page=1"
                                >আই-বুক</a
                            >
                        </li>
                        <li>
                            <a href="https://diabetes-covid19.org/"
                                >কোভিড-১৯ ও ডায়াবেটিস</a
                            >
                        </li>
                        <li>
                            <a href="www.techedu.gov.bd"
                                >কারিগরি শিক্ষা অধিদপ্তর</a
                            >
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">পরিকল্পনা ও বাস্তবায়নে:&nbsp;</h3>
                    <ul>
                        <li>
                            <a href="http://www.cabinet.gov.bd/"
                                >মন্ত্রিপরিষদ বিভাগ,&nbsp;</a
                            >
                        </li>
                        <li><a href="https://a2i.gov.bd">এটুআই,&nbsp;</a></li>
                        <li>
                            <a href="http://www.bcc.net.bd/">বিসিসি,&nbsp;</a>
                        </li>
                        <li>
                            <a href="http://doict.gov.bd/"
                                >ডিওআইসিটি&nbsp;ও&nbsp;</a
                            >
                        </li>
                        <li><a href="http://www.basis.org.bd/">বেসিস।</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Get in Touch</h3>
                    <div class="contact-info">
                        <p>
                            <i class="fa fa-map-marker"></i>Baroghoria,
                            Chapainawabganj, Bangladesh
                        </p>
                        <p>
                            <i class="fa fa-envelope"></i
                            ><a
                                href="mailto:chapaipoly@gmail.com"
                                class="text-light"
                                target="_blank"
                                >chapaipoly@gmail.com</a
                            >
                        </p>
                        <p><i class="fa fa-phone"></i>+8801724-441634</p>
                        <div class="social">
                            <a href="#"><i class="fab fa-twitter mt-1"></i></a>
                            <a href="#"><i class="fab fa-facebook mt-1"></i></a>
                            <a href="#"><i class="fab fa-linkedin mt-1"></i></a>
                            <a href="#"
                                ><i class="fab fa-instagram mt-1"></i
                            ></a>
                            <a href="#"><i class="fab fa-youtube mt-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Newsletter</h3>
                    <div class="newsletter">
                        <p>
                            To get latest updates about our posts subscribe to
                            our newsletter program. Thanks for your time.
                        </p>
                        <form>
                            <input
                                class="form-control"
                                type="email"
                                placeholder="Your email here"
                            />
                            <button class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Footer Bottom Start -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>
                    Copyright &copy;
                    <a href="{{ url('/') }}">{{ website()->site_name }}</a
                    >. All Rights Reserved
                </p>
            </div>
            <div class="col-md-6 template-by">
                <p>
                    Developer
                    <a
                        href="https://linktr.ee/almasali"
                        >{{ website()->site_author_name }}</a
                    >
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->
--}}

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify text-muted">
                    This part will be connect with backend database, till that
                    enjoy the lorem. <br />
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nesciunt, rem consequatur possimus dolorum deleniti illum
                    animi in molestiae nulla libero temporibus totam minus,
                    dolorem eaque suscipit odit unde, dicta aperiam.
                    Consequuntur nam numquam provident dolor eligendi
                    laudantium, corrupti distinctio quod ad hic assumenda natus
                    quibusdam fuga, iusto non aspernatur dolorum.
                </p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Categories</h6>
                <ul class="footer-links">
                    @foreach (getAllCategories() as $category)
                    <li>
                        <a
                            href="{{ url('categories').'/'.$category->slug }}"
                            >{{ $category->name }}</a
                        >
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li>
                        <a href="{{ route('privacy_policy') }}"
                            >Privacy Policy</a
                        >
                    </li>
                    {{--
                    <li><a href="{{ route('sitemaps') }}">Sitemap</a></li>
                    --}}
                </ul>
            </div>
        </div>
        <hr />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text text-muted">
                    Copyright &copy; 2022 All Rights Reserved by
                    <a
                        href="{{ route('home') }}"
                        class="text-light"
                        >{{ website()->site_name }}</a
                    >
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li>
                        <a
                            class="facebook"
                            href="{{ getSocial()->facebook }}"
                            target="_blank"
                            ><i class="fa-brands fa-facebook mt-2"></i
                        ></a>
                    </li>
                    <li>
                        <a
                            class="instagram"
                            href="{{ getSocial()->instagram }}"
                            target="_blank"
                            ><i class="fa-brands fa-instagram mt-2"></i
                        ></a>
                    </li>
                    <li>
                        <a
                            class="twitter"
                            href="{{ getSocial()->twitter }}"
                            target="_blank"
                            ><i class="fa-brands fa-twitter mt-2"></i
                        ></a>
                    </li>
                    <li>
                        <a
                            class="linkedin"
                            href="{{ getSocial()->linkedin }}"
                            target="_blank"
                            ><i class="fa-brands fa-linkedin mt-2"></i
                        ></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
