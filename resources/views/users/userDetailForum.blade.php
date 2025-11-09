<style>
    .comments-wrapper {
        transition: all 0.3s ease;
    }

    .scroll-active {
        max-height: 350px;
        /* tinggi area komentar, bisa diatur */
        overflow-y: auto;
        padding-right: 5px;
    }

    /* scrollbar tampak halus */
    .scroll-active::-webkit-scrollbar {
        width: 6px;
    }

    .scroll-active::-webkit-scrollbar-thumb {
        background: #c4c4c4;
        border-radius: 10px;
    }

    .scroll-active::-webkit-scrollbar-thumb:hover {
        background: #999;
    }
</style>
<x-layoutUser>
    @section('title', 'Dashboard | Forum Diskusi Alumni')

    <main class="container py-4 py-md-5">
        <div class="row g-4">

            <!-- KIRI: DETAIL FORUM -->
            <div class="col-lg-8">
                <article class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="fw-bold mb-3">{{ $forum->nama_forum }}</h1>

                        @if ($forum->gambar)
                            <img src="https://picsum.photos/1200/675?blur=1" class="img-fluid rounded-4 mb-3"
                                style="object-fit:cover; aspect-ratio:16/9;">
                        @endif

                        <div class="d-flex align-items-center text-muted small mb-4">
                            <div class="me-2 rounded-circle bg-light d-flex align-items-center justify-content-center"
                                style="width:40px;height:40px;">
                                {{ strtoupper(substr($forum->user->name ?? 'A', 0, 1)) }}</div>
                            <div>
                                Diposting oleh <strong class="text-dark">{{ $forum->user->name ?? 'Admin' }}</strong>
                                • {{ $forum->created_at->diffForHumans() }}
                            </div>
                        </div>

                        <p class="fs-6 lh-lg">{{ $forum->deskripsi }}</p>
                    </div>
                </article>

                <!-- BAGIAN KOMENTAR -->
                <section class="mt-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="h5 fw-semibold mb-4">Komentar ({{ $forum->comments->count() }})</h2>

                            {{-- Bungkus daftar komentar dalam div scroll --}}
                            <div class="comments-wrapper {{ $forum->comments->count() > 3 ? 'scroll-active' : '' }}">
                                @forelse($forum->comments as $comment)
                                    <div class="border rounded-4 p-3 mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                                    style="width:40px;height:40px;">
                                                    {{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}
                                                </div>
                                                <div>
                                                    <strong>{{ Str::ucfirst($comment->user->tb_biodata->nama ?? 'admin') }}</strong><br>
                                                    <small
                                                        class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-2 mb-0">{{ $comment->komentar }}</p>
                                    </div>
                                @empty
                                    <p class="text-muted">Belum ada komentar.</p>
                                @endforelse
                            </div>

                            {{-- Form Komentar --}}
                            <div class="border-top pt-4 mt-3">
                                @auth
                                    <form action="{{ route('komentar.store') }}" method="POST" class="needs-validation"
                                        novalidate>
                                        @csrf
                                        <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                                        <label class="form-label fw-semibold">Tulis Komentar</label>
                                        <textarea name="komentar" rows="4" maxlength="1000" class="form-control rounded-4" required
                                            placeholder="Tulis sesuatu yang sopan dan relevan..."></textarea>
                                        <div class="d-flex justify-content-between mt-2">
                                            <small class="text-muted">Maks. 1000 karakter</small>
                                            <button class="btn btn-primary btn-pill"><i class="bi bi-send"></i>
                                                Kirim</button>
                                        </div>
                                        <div class="invalid-feedback">Komentar tidak boleh kosong.</div>
                                    </form>
                                @else
                                    <div
                                        class="alert alert-primary rounded-4 d-flex justify-content-between align-items-center">
                                        <div>Untuk menulis komentar, silakan <strong>login</strong> terlebih dahulu.</div>
                                        <a href="{{ route('login', ['redirect_to' => url()->full()]) }}"
                                            class="btn btn-primary btn-sm btn-pill">
                                            Masuk
                                        </a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- KANAN: INFORMASI TERKINI -->
            <aside class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="h6 fw-semibold mb-3">Informasi Terkini</h3>
                        <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                            <li class="d-flex align-items-center gap-3">
                                <div class="rounded-3 bg-light" style="width:72px;height:72px;"></div>
                                <div class="small">
                                    <div class="fw-semibold line-clamp-2">Kegiatan Alumni USK Berbagi Pengalaman</div>
                                    <div class="text-muted">2 jam lalu</div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-3">
                                <div class="rounded-3 bg-light" style="width:72px;height:72px;"></div>
                                <div class="small">
                                    <div class="fw-semibold line-clamp-2">Forum Diskusi Karier 2025</div>
                                    <div class="text-muted">3 hari lalu</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <script>
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</x-layoutUser>
