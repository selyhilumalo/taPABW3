@props(['persen' => 0, 'terkumpul' => 0, 'target' => 0])

<div class="progress-wrap">
    <div class="progress-head">
        <span class="progress-amount">Rp {{ number_format($terkumpul, 0, ',', '.') }}</span>
        <span class="progress-percent">{{ $persen }}%</span>
    </div>
    <div class="progress-track" role="progressbar" aria-valuenow="{{ $persen }}" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-fill" style="width: {{ min($persen, 100) }}%"></div>
    </div>
    <small class="progress-note">Terkumpul dari target Rp {{ number_format($target, 0, ',', '.') }}</small>
</div>
