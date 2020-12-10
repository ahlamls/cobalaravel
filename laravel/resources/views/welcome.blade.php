@include('header')
  @foreach ($articles as $article)
  <div class="card" style="">
  <div class="card-body">
    <h5 class="card-title">{{ $article->title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$article->time}}</h6>
    <?php 
      if (strlen($article->content) > 64) {
        $suffix = "...";
    } else {
        $suffix = "";
    }
    ?>
    <p class="card-text">{{  substr($article->content,0,64) . $suffix   }}</p>
    <a href="/post/{{ $article->id}}" class="card-link">Read More..</a>
  </div>
</div>
<br>
         @endforeach
  
  @include('footer')