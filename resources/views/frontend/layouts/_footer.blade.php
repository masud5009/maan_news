<footer>
    <section class="maan-info-footer maan-data-background" data-background="{{ asset('public/frontend/img/footer/footer.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="{{ URL('/') }}"><img src="{{ asset(settings()->logo_footer) }}" alt="footer-logo"></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="maan-text">
                        <h6> {{ settings()->footer_content }}</h6>
                    </div>
                </div>
            </div>
            <div class="row maan-link-footer">
                <div class="col-lg-4 col-md-6">
                    <div class="maan-title">
                        <div class="maan-title-text">
                            <h2>{{ __('Most Viewed Posts') }}</h2>
                        </div>
                    </div>
                    <div class="maan-news-list">
                        <ul>

                            @foreach( popularsnews() as $popularnews)
                                <li>
                                    <div class="maan-list-img">
                                        @if($popularnews->image)
                                            @php
                                                $images = json_decode($popularnews->image)
                                            @endphp
                                            @if($images !='')
                                                @foreach($images as $image)
                                                    <a href="@if($popularnews->news_categoryslug){{ route(strtolower($popularnews->news_categoryslug).'.details',$popularnews->id) }} @endif">
                                                    <img src="{{ asset($image) }}" alt="list-news-img">
                                                    </a>
                                                @endforeach
                                            @endif
                                        @endif

                                    </div>
                                    <div class="maan-list-text">
                                        <h4><a href="@if($popularnews->news_categoryslug){{ route(strtolower($popularnews->news_categoryslug).'.details',$popularnews->id) }} @endif">{{ $popularnews->title }}</a></h4>
                                        <ul>
                                            <li>
                                                <span class="maan-icon"><svg viewBox="0 0 512 512"><path d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z"></path><path d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z"></path></svg></span>
                                                <span class="maan-item-text">{{ (new \Illuminate\Support\Carbon($popularnews->date))->format('d M, Y') }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="maan-title">
                        <div class="maan-title-text">
                            <h2>{{ __("News Tag's") }}</h2>
                        </div>
                    </div>
                    <div class="maan-news-tags">
                        <ul>
                             @foreach(newscategories() as $newscategory)
                                <li><a href="{{route($newscategory->slug,strtolower($newscategory->name))}}">{{ $newscategory->name }}</a></li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="maan-title">
                        <div class="maan-title-text">
                            <h2>{{ __("Download App") }}</h2>
                        </div>
                    </div>
                    <div class="footer-app-download">
                        <a href="@if (!empty(settings()->play_store_url)){{url(settings()->play_store_url)}}@endif" target="_blank" class="app-store"><img src="{{ asset('public/frontend/img/footer/playstore.png') }}" alt=""></a>
                        <a href="@if (!empty(settings()->app_store_url)){{url(settings()->app_store_url)}}@endif"  target="_blank" class="app-store"><img src="{{ asset('public/frontend/img/footer/apple.png') }}" alt=""></a>
                    </div>
                    <div class="maan-email">
                        <h4>Subscribe to Our Newsletter!</h4>
                        <form>
                            @csrf
                            <div class="input-group">
                                <label class="maan-icon" for="maanEmail">
                                    <svg viewBox="0 0 512 512"><path d="M505.168,111.894L328.124,246.77l177.408,152.64c4.122-7.792,6.468-16.661,6.468-26.073V138.662 C512,128.971,509.521,119.85,505.168,111.894z"></path><path d="M456.049,82.711H55.95c-11.013,0-21.286,3.211-29.953,8.729l220.786,165.473c5.532,4.06,12.944,4.068,18.485,0.027 l218.79-166.682C475.815,85.468,466.251,82.711,456.049,82.711z"></path><path d="M303.725,265.359l-20.561,15.665c-8.109,5.987-17.616,8.981-27.119,8.981c-9.505,0-19.007-2.993-27.119-8.981 l-0.087-0.064l-20.533-15.389L27.253,421.346c8.396,5.039,18.213,7.943,28.697,7.943h400.1c10.552,0,20.43-2.939,28.862-8.038 L303.725,265.359z"></path><path d="M5.835,113.824C2.107,121.313,0,129.743,0,138.662v234.677c0,9.477,2.376,18.407,6.553,26.237l177.166-152.433 L5.835,113.824z"></path></svg>
                                </label>
                                <input type="email" class="form-control" placeholder="Enter Your Email Address" name="email" id="maanEmail">
                            </div>
                            <button type="button" class="d-btn subscribe">{{ __('Subscribe Now') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="maan-main-footer">
                <h6>{{ __('2021') }} © {{ __('All rights reserved by') }} <a href="https://themeforest.net/user/maan_theme/portfolio">{{ __('Maan Theme') }}</a></h6>
            </div>
        </div>
    </section>
</footer>


