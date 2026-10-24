<footer class="footer">
    <div class="footer-grid">
        <div>
            <a href="{{ route('beranda') }}" class="brand brand-light">
                <span class="brand-logo">AK</span>
                <span class="brand-text"><strong>Aku &amp; Kamu</strong><small>Social Platform</small></span>
            </a>
            <p class="footer-desc">
                Platform sosial digital untuk donasi, volunteer, edukasi keluarga,
                laporan sosial, konsultasi, dan pemetaan wilayah rawan.
            </p>
        </div>
        <div>
            <h4>Fitur</h4>
            <a href="{{ route('donasi.index') }}">Donasi</a>
            <a href="{{ route('volunteer') }}">Volunteer</a>
            <a href="{{ route('edukasi') }}">Edukasi</a>
            <a href="{{ route('peta') }}">Peta Interaktif</a>
        </div>
        <div>
            <h4>Akun</h4>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('daftar') }}">Daftar</a>
            <a href="{{ route('forum') }}">Forum</a>
        </div>
    </div>
</footer>
