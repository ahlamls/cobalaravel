@include('adminheader')
<h1>Create New Article</h1>
<hr>
<form action = "/admin/create" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="mb-3">
    <label for="title" class="form-label">Article Title</label>
    <input type="text" class="form-control" id="title" required="" name="title">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Article Content</label>
    <textarea class="form-control" id="content" rows="5" required="" name="content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      @include('footer')