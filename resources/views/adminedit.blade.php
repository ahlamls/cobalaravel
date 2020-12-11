@include('adminheader')
<h1>Create New Article</h1>
<hr>
@foreach ($articles as $article)
<form action = "/admin/handleedit" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <input type="hidden" name="id" value="{{$article->id}}">
         <div class="mb-3">
    <label for="title" class="form-label">Article Title</label>
    <input type="text" value="{{$article->title}}" class="form-control" id="title" required="" name="title">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Article Content</label>
    <textarea class="form-control" id="content" rows="5" required="" name="content"></textarea>
  </div>

  <script>
  document.getElementById("content").value = atob("{{base64_encode($article->content)}}");
  </script>
  <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      @endforeach
      @include('footer')