<div class="card">
    <img class="card-img-top" src="{{ $faculty->avatarUrl() }}" alt="Card image">
    <div class="card-body lh-1">
        <a href="{{ route('faculty', [$faculty]) }}" class="d-block fw-bold fs-5 mb-1">
            {{ $faculty?->title }}
        </a>
        <span class="details">
            {{ strtoupper($faculty?->subtitle) }}
        </span>
    </div>
</div>
