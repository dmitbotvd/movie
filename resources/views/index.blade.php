<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(session()->has('success'))
    <div>{{session('success')}}</div>
@endif
<a href="{{route('films.create')}}">Create</a>
@foreach ($movies as $movie)
    <div>
        <p>Title: {{ $movie->title }}</p>
        <p>Status: {{$movie->publication_status}}</p>
        <p>Genre: {{$movie->genres->pluck('name')->implode(', ')}}</p>
        <img width="300" src="{{ asset('storage/' . $movie->poster_link) }}" alt="Постер фильма">
        <a href="{{ route('films.edit', $movie->id) }}">Edit</a>
        <form action="{{ route('films.togglePublish', $movie->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('PUT')
            <button type="submit">
                {{ $movie->publication_status == 'published' ? 'Unpublish' : 'Publish' }}
            </button>
        </form>
        <form action="{{ route('films.destroy', $movie->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
</body>
</html>
