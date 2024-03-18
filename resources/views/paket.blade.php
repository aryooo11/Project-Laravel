@extends ('layouts.frontend')

@section('content')

<!--==================== HOME ====================-->
{{-- <section> --}}
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <section class="islands swiper-slide">
                    <img src="/storage/{{$paket->fpaket->foto1}}" alt="ga tampil" class="islands__bg" />
    
                    <div class="islands__container container">
                        <div class="islands__data">
                            <h1 class="islands__title">{{ $paket->fpaket->nama_paket}}</h1>
                        </div>
                    </div>
    
                </section>
            </div>
        </div>
</section>
    
    <!-- blog -->
    <section class="blog section" id="blog">
        <div class="blog__container container">
            <div class="content__container">
                <div class="blog__detail" style="font-size: 1.5rem">
                    {{  $paket->fpaket->deskripsi  }}
                    <br>
                    <br>
                    Memiliki Fasilitas : {{ $paket->fpaket->fasilitas}}
                    <h2 class="popular__price" style="font-size: 1.7rem">
                      <span>Rp. </span>{{ number_format($paket->harga_paket,2) }}
                  </h2>
                <div class="blog__detail" style="font-size: 1.5rem">
                    Jumlah Peserta : {{($paket->jumlah_peserta) }}
                </div>
                    <div class="blog__footer" style="margin-top: 2rem;">
                        <div class="blog__reaction">Diskon {{ $paket->fpaket->diskon }}% !!!</div>
                       
                    </div>
                    <a  href="{{ url('/reservasi/create') }}" class="button nav__button" >Booking Now</a>
                </div>
               
            </div>
        </div>
        <div class="blog__container container">
    
          <h2 class="section__title" style="text-align: center">
              View Lokasi
          </h2>
    
          <div class="blog__content grid">
    
              <article class="blog__card">
                  <div class="blog__image">
                      <img src="/storage/{{$paket->fpaket->foto1}}" alt="" style="width: 400px" class="popular__img" />
    
                  </div>
              </article>
              <article class="blog__card">
                  <div class="blog__image">
                      <img src="/storage/{{$paket->fpaket->foto2}}" alt="" style="width: 400px" class="popular__img" />
    
                  </div>
              </article>
              <article class="blog__card">
                  <div class="blog__image">
                      <img src="/storage/{{$paket->fpaket->foto3}}" alt="" style="width: 400px" class="popular__img" />
    
                  </div>
              </article>
              <article class="blog__card">
                  <div class="blog__image">
                      <img src="/storage/{{$paket->fpaket->foto4}}" alt="" style="width: 400px" class="popular__img" />
    
                  </div>
              </article>
              <article class="blog__card">
                  <div class="blog__image">
                      <img src="/storage/{{$paket->fpaket->foto5}}" alt="" style="width: 400px" class="popular__img" />
    
                  </div>
              </article>
          </div>
      </div>
      
    </section>
    
    
    
    
    
    {{-- <section class="section" id="popular">
      <div class="container">
          <span class="section__subtitle" style="text-align: center"
              >Best Choice</span
          >
          <h2 class="section__title" style="text-align: center">
              Paket Menarik
          </h2>
    
          <div class="popular__container swiper">
              <div class="swiper-wrapper">
                  
               
                      <article class="popular__card swiper-slide">
                          <a href="{{ route('paket.show',$paket->id) }}">
    <img src="storage/{{$paket->foto1}}" alt="" class="popular__img" />
    <div class="popular__data">
        <h2 class="popular__price">
            <span>Rp. </span>{{ number_format($paket->harga_per_pack,2) }}
        </h2>
        <h3 class="popular__title">
            {{ $paket->nama_paket}}
        </h3>
        <p class="popular__description">{{ $paket->deskripsi }}</p>
    </div>
    </a>
    </article>
    
    </div>
    
    <div class="swiper-button-next">
        <i class="bx bx-chevron-right"></i>
    </div>
    <div class="swiper-button-prev">
        <i class="bx bx-chevron-left"></i>
    </div>
    </div>
    </div>
    </section> --}}
    
    
    {{-- <section class="blog" id="blog">
            <div class="blog__container container">
              <span class="section__subtitle" style="text-align: center"
                >Related Blog</span
              >
              <h2 class="section__title" style="text-align: center">
                Find The Best Places
              </h2>
    
              <div class="blog__content grid">
                @foreach($relatedBlogs as $relatedBlog)
                <article class="blog__card">
                  <div class="blog__image">
                    <img src="{{ Storage::url($relatedBlog->image) }}" alt="" class="blog__img" />
    <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="blog__button">
        <i class="bx bx-right-arrow-alt"></i>
    </a>
    </div>
    
    <div class="blog__data">
        <h2 class="blog__title">{{ $relatedBlog->title }}</h2>
        <p class="blog__description">
            {{ $relatedBlog->excerpt }}
        </p>
    
        <div class="blog__footer">
            <div class="blog__reaction">{{ date('d M Y', strtotime($relatedBlog->crated_at)) }}</div>
            <div class="blog__reaction">
                <i class="bx bx-show"></i>
                <span>{{ $relatedBlog->reads }}</span>
            </div>
        </div>
    </div>
    </article>
    @endforeach
    </div>
    </div>
    </section> --}}
@endsection

@push('style-alt')
<style>
    blockquote {
        border-left: 8px solid #b4b4b4;
        padding-left: 1rem;
    }

    .blog__detail ul li {
        list-style: initial;
    }
</style>
@endpush