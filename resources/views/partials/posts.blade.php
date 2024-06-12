@foreach ($entries as $entry)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            @php
                $content = $entry->get('content');
                preg_match('/!\[.*?\]\((.*?)\)/', $content, $matches);
                $image = $matches[1] ?? 'https://via.placeholder.com/150';
            @endphp
            <img src="{{ $image }}" class="card-img-top img-fluid fixed-img-size" alt="Image">
            <div class="card-body">
                <h5 class="card-title">{{ $entry->get('title') }}</h5>
                <p class="card-text">{{ Str::limit($content, 100) }}</p>
                <a href="{{ route('page.show', $entry->slug()) }}" class="btn btn-read-more">Read More</a>
            </div>
        </div>
    </div>
@endforeach
