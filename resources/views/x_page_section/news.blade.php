
  <div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      <div class="row mt-5">
        @foreach($latestNews as $latest)
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">{{ $latest->category }}</a>
              </div>
              <a href="{{ route('showNews', $latest->id) }}" class="post-thumb">
                <img src="{{ $latest->image_url }}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="{{ route('showNews', $latest->id) }}">{{ $latest->title }}</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="template/assets/img/person/person_1.jpg" alt="">
                  </div>
                  <span>{{ $latest->writer }}</span>
                </div>
                <span class="mai-time">{{ $latest->created_at->diffForHumans() }}</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
       
        <div class="col-12 text-center mt-4 wow zoomIn">
          <a href="{{ route('allNews') }}" class="btn btn-primary">Read More</a>
        </div>

      </div>
    </div>
  </div> <!-- .page-section -->