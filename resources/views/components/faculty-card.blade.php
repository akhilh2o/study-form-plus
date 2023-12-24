<div class="card">
    <a href="{{ route('faculty', [$faculty]) }}" class="d-block fw-bold fs-5 mb-1">
    <img class="card-img-top" src="{{ $faculty->avatarUrl() }}" alt="Card image">
    <div class="card-body lh-1">
            {{ $faculty?->title }}
            {{-- <span class="details">
                {{ strtoupper($faculty?->subtitle) }}
            </span> --}}
        </div>
    </a>
</div>
