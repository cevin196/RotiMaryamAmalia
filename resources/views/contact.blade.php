@extends('layouts.app')

{{-- @include('admin.includes.formater') --}}

@section('content')

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="map">
            {{-- <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="map__inner">
                            <h6>Yogyakarta</h6>
                            <ul>
                                <li>1000 Lakepoint Dr, Frisco, CO 80443, USA</li>
                                <li>Sweetcake@support.com</li>
                                <li>+1 800-786-1000</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="map__iframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126501.37629727593!2d110.20535996249997!3d-7.772002199999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5873fc26cb03%3A0xe42448a588d34b18!2sAmalia%20Frozen%20Food!5e0!3m2!1sid!2sid!4v1651474394700!5m2!1sid!2sid" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
        <div class="contact__address">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="contact__address__item">
                        <h6>Yogyakarta</h6>
                        <ul>
                            <li>
                                <span class="icon_pin_alt"></span>
                                <p>Karang Wetan, Nogotirto, Kec. Gamping, Kabupaten Sleman</p>
                            </li>
                            <li><span class="icon_headphones"></span>
                                <p>0813-7092-9996</p>
                            </li>
                            <li><span class="social_instagram"></span>
                                <p>@roti.maryam.id</p>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact__address__item">
                        <h6>Los angeles</h6>
                        <ul>
                            <li>
                                <span class="icon_pin_alt"></span>
                                <p>639 S Spring St, Los Angeles, CA 90014, USA</p>
                            </li>
                            <li><span class="icon_headphones"></span>
                                <p>+1 213-612-3000</p>
                            </li>
                            <li><span class="icon_mail_alt"></span>
                                <p>Sweetcake@support.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact__address__item">
                        <h6>san bernardino</h6>
                        <ul>
                            <li>
                                <span class="icon_pin_alt"></span>
                                <p>1000 Lakepoint Dr, Frisco, CO 80443, USA</p>
                            </li>
                            <li><span class="icon_headphones"></span>
                                <p>+1 800-786-1000</p>
                            </li>
                            <li><span class="icon_mail_alt"></span>
                                <p>Sweetcake@support.com</p>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="contact__text">
                    <h3>Kontak Dengan Kami</h3>
                    <ul>
                        <li>Perwakilan atau Penasihat tersedia:</li>
                        <li>Senin - Jumat: 9:00 - 17:00</li>
                        <li>Sabtu - Minggu: 9:00 - 11:30</li>
                    </ul>
                    <img src="{{asset('templateUser/img/cake-piece.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact__form">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Nama">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Pesan"></textarea>
                                <button type="submit" class="site-btn">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

@endsection