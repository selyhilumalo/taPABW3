@props(['campaign'])

<article class="card">
    <div class="card-cover">
        <span class="chip">{{ $campaign->kategori }}</span>
        <span class="card-emoji" aria-hidden="true">💝</span>
    </div>
    <div class="card-body">
        <h3>{{ $campaign->judul }}</h3>
        <p>{{ $campaign->deskripsi }}</p>

        <x-progress-bar
            :persen="$campaign->persen"
            :terkumpul="$campaign->terkumpul"
            :target="$campaign->target" />

        <a href="{{ route('donasi.show', $campaign->id) }}" class="btn btn-primary">Detail</a>
    </div>
</article>
