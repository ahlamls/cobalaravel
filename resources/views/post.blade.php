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
  <?php 
if ($article->image_url == null) {
  $col = "12";
  $display = "none";
} else {
  $col = "9";
  $display = "block";
}
  ?>
    <h1>{{ $article->title}}</h1>

    <h6 class="card-subtitle mb-2 text-muted">By <b>{{$array[$article->user_id][$article->user_id]}}</b> | {{$article->time}}</h6>
    <hr>
    <div class="row">
    <div class="col-md-3 col-12" style="display:{{$display}}">
    <img src="{{ asset($article->image_url) }}" width="100%">
    </div>
    <div class="col-md-{{$col}} col-12">
      <p class="card-text">{!! nl2br(e($article->content)) !!} </p>
    </div>
    </div>

<hr>
<h5 id="comment">Comment ({{$article->commentcount}})</h5>
<hr>
<form action="/handlecomment" method="POST">

@csrf 
<input type="hidden" name="id" value="{{$article->id}}">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
  <label for="comment" class="form-label">Comment</label>
    <textarea name="comment" rows="3" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<hr>
@foreach ($comments as $comment)
<div class="card" style="">
  <div class="card-body">
    <h5 class="card-title">{{$comment->name}}</h5>
    <h6 class="card-text mb-2 text-muted">{{$comment->time}}</h6>
    <p class="card-text">{{$comment->comment}}</p>
   
  </div>
</div>
<br>
@endforeach

         @endforeach
  
  @include('footer')