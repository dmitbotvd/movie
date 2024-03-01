<form action="{{ route('films.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Название фильма:</label>
    <input type="text" id="title" name="title" value="{{ $movie->title }}" required><br><br>
    <label for="publication_status">Статус публикации:</label>
    <input type="checkbox" name="publication_status" id="publication_status" value="published" {{ $movie->publication_status == 'published' ? 'checked' : '' }}> Опубликовано<br><br>
    <button type="submit">Сохранить изменения</button>
</form>
