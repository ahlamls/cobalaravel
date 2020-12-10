@include('adminheader')
<h1>Article List</h1>
<a class="btn btn-success" href="/admin/post">Create New Article</a>
<hr>
<div class="table-responsive">
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($articles as $article)
    <tr>
      <th scope="row">{{$article->id}}</th>
      <td>{{$article->time}}</td>
      <td>{{$article->title}}</td>
      <td><a class="btn btn-sm btn-info" href="/admin/edit/{{$article->id}}" >Edit</a><a class="btn btn-sm btn-danger" href="/admin/delete/{{$article->id}}">Delete</a> </td>
    </tr>
    @endforeach
      </tbody>
</table>
</div>
      @include('footer')