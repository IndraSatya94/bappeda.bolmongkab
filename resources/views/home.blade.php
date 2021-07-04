@extends('layouts.frontend.app')
@section('content')
 <!-- ======= About Section ======= -->
 <section id="about" class="about">
          <div class="container">
    
          <div class="section-title">
            <h2>Tentang BAPPEDA</h2>
        </div>
    
            <div class="row">
              <div class="col-xl-6 col-lg-7" data-aos="fade-right">
                <img src="template/frontend/assets/img/bappedaabout.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-xl-6 col-lg-5 pt-5 pt-lg-0">
                <h3 data-aos="fade-up">BAPPEDA Bolmong</h3>
                <hr>
                <p data-aos="fade-up">
                  Badan Perencanaan dan Pembangunan Daerah (BAPPEDA) atau dalam bahasa inggris disebut sebagai Development Planning Agency at Sub-National Level adalah unsur pendukung pemerintah Provinsi/Kabupaten/Kota di bidang Perencanaan Pembangunan Daerah yang dipimpin oleh seorang kepala dan bertanggungjawab kepada Gubernur/Bupati/Walikota melalui Sekretaris Daerah.
                </p>
              </div>
            </div>
    
          </div>
        </section><!-- End About Section -->
<section id="blog" class="blog">
    <div class="container">

        <div class="section-title">
            <h2>News</h2>
        </div>

        <div class="row">
            @foreach($news as $item)
            <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <article class="entry">
                    @if(Storage::disk('public')->exists($item->image ?? null))
                    <div class="entry-img">
                        <img src="{{ Storage::url($item->image ?? null) }}" alt="" class="img-fluid" style="height:250px; width:100%; object-fit:cover; object-position:center;">
                    </div>
                    @endif

                    <h2 class="entry-title">
                        <a href="{{ route('detail-news', $item->slug) }}">{{ $item->name }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-user"></i> {{ $item->author->name }}</li>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <time datetime="2021-03-25">{{ $item->created_at->diffForHumans() }}</time></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>
                            {{ Str::limit($item->body ?? null, 100) }}
                        </p>
                        <div class="read-more">
                            <a href="{{ route('detail-news', $item->slug) }}">Selengkapnya</a>
                        </div>
                    </div>

                </article><!-- End blog entry -->
            </div>
            @endforeach

        </div>

    </div>
</section><!-- End Blog Section -->

<section id="more" class="services">
    <div class="container">

        <div class="row">
            @if($information->count() > 0)
            <div class="col">
                <div class="section-title">
                    <h2>Information</h2>
                </div>
                @foreach($information as $item)
                <div class="row">
                    <div class="col-md-12">
                        <div class="icon-box d-flex align-items-center">
                            @if(Storage::disk('public')->exists($item->image ?? null))
                            <img src="{{ Storage::url($item->image ?? null ) }}" width="100" alt="">
                            @endif
                            <h4><a href="{{ route('information', $item->slug) }}">{{ $item->name ?? null }}</a></h4>
                            <p class="text-secondary">Event Date : {{ $item->event_date ?? null }} | Event Time : {{ $item->event_time ?? null }}</p>
                            <p>{{ Str::limit($item->body ?? null, 100) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if($events->count() > 0)
            <div class="col">
                <div class="section-title">
                    <!-- <p></p> -->
                    <h2>Events</h2>
                </div>
                @foreach($events as $item)
                <div class="row">
                    <div class="col">
                        <div class="icon-box align-items-center">
                            @if(Storage::disk('public')->exists($item->image ?? null))
                            <img src="{{ Storage::url($item->image ?? null ) }}" width="100" alt="">
                            @endif
                            <h4><a href="{{ route('event', $item) }}">{{ $item->name ?? null }}</a></h4>
                            <p class="text-secondary">Event Date : {{ $item->event_date ?? null }} | Event Time : {{ $item->event_time ?? null }}</p>
                            <p>{{ Str::limit($item->body ?? null, 100) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

    </div>
</section>
@endsection