<form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="image">
  <button type="submit">Upload</button>
</form>

@if(session('success'))
  <div>{{ session('success') }}</div>
@endif
