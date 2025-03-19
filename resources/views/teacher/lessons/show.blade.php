<h2>{{ $lesson->title }}</h2>
<p>{{ $lesson->content }}</p>

@if($lesson->file_path)
    <p>Fayl yuklangan: <a href="{{ asset('storage/' . $lesson->file_path) }}" target="_blank">Ko‘rish/Yuklab olish</a></p>
@endif