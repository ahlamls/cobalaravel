@include('header')
  @foreach ($articles as $article)
  
    <h1>{{ $article->title}}</h1>
    <h6 class="card-subtitle mb-2 text-muted">{{$article->time}}</h6>
    <p class="card-text">{{$article->content}}</p>
 
<br>
         @endforeach
  
  @include('footer')