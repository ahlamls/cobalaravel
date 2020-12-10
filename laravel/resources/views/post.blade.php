@include('header')
<?php 
    $array = [
        0 => 'unknown',
    ];

    foreach ($users as $user) {
        array_push($array,[$user->id => $user->name]);
    }
  //  die(var_dump($array));
    ?>
  @foreach ($articles as $article)
  
    <h1>{{ $article->title}}</h1>

    <h6 class="card-subtitle mb-2 text-muted">By <b>{{$array[$article->user_id][$article->user_id]}}</b> | {{$article->time}}</h6>
    <hr>
    <p class="card-text">{{$article->content}}</p>
 

<hr>
<h5 id="comment">Comment ({{$article->commentcount}})</h5>
<hr>
<div class="card" style="">
  <div class="card-body">
    <h5 class="card-title">Nama</h5>
    <p class="card-text mb-2 text-muted">ubtitleCard s</p>
  </div>
</div>

         @endforeach
  
  @include('footer')