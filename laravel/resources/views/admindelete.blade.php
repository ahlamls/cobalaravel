@include('adminheader')

@foreach ($articles as $article)
<div class="card text-white bg-danger mb-3" >
  <div class="card-header">Confirmation</div>
  <div class="card-body">
    <h5 class="card-title">Are you sure to delete the article <b>{{$article->title}}</b> ? </h5>
  <a class="btn  btn-lg btn-light text-danger" href="/admin/handledelete/{{$article->id}}">Delete Article</a>
  </div>
</div>
      @endforeach
      @include('footer')