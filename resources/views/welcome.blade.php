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
  <div class="card" style="">
  <div class="card-body">
    <h5 class="card-title">{{ $article->title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">By <b>{{$array[$article->user_id][$article->user_id]}}</b> | {{$article->time}}</h6>
    <?php 
      if (strlen($article->content) > 64) {
        $suffix = "...";
    } else {
        $suffix = "";
    }
    ?>
    <p class="card-text">{{  substr($article->content,0,64) . $suffix   }}</p>
    <a href="/post/{{ $article->id}}" class="card-link">Read More..</a>
    <a href="/post/{{ $article->id}}/#comment" class="card-link">Comment ({{$article->commentcount}})</a>
  </div>
</div>
<br>
         @endforeach
  
  @include('footer')