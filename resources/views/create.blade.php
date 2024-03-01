<form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Название фильма:</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="poster">Постер фильма:</label>
        <input type="file" name="poster_link" id="poster" class="form-control" accept="image/*">
    </div>
    <div class="form-group">
        <label for="publication_status">Публикация:</label>
        <select name="publication_status" id="publication_status" class="form-control">
            <option value="published">Опубликовано</option>
            <option value="unpublished">Не опубликовано</option>
        </select>
    </div>
    <div class="form-group">
        <label for="genres">Жанры:</label><br>
        @foreach($genres as $genre)
            <input type="checkbox" id="genre_{{ $genre->id }}" name="genres[]" value="{{ $genre->id }}">
            <label for="genre_{{ $genre->id }}">{{ $genre->name }}</label><br>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Добавить фильм</button>
</form>
