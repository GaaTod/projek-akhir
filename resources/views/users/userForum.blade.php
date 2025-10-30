    <style>
        body {
            background-color: #fff;
            font-family: "Poppins", sans-serif;
        }

        .btn-primary-custom {
            background-color: #33c0ff;
            border: none;
            font-weight: 600;
            color: #000;
        }

        .btn-primary-custom:hover {
            background-color: #29a9e0;
            color: #fff;
        }

        .post-card {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
        }

        .sidebar-info {
            background-color: #fff;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .info-thumb {
            width: 70px;
            height: 70px;
            background-color: #e0e0e0;
            border-radius: 5px;
            margin-right: 10px;
        }

        .info-text {
            font-size: 14px;
            color: #555;
        }

        .post-img {
            width: 100%;
            height: 250px;
            background-color: #d9d9d9;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .post-meta {
            font-size: 14px;
            color: #666;
        }
    </style>
    <x-layoutUser>
        <!-- Content -->
        <div class="container my-5">
            <div class="row g-4">

                <!-- Left: Post -->
                <div class="col-lg-8">
                    <div class="post-card">
                        <h4 class="fw-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
                        <div class="post-img d-flex justify-content-center align-items-center text-muted">
                            <span>Gambar</span>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo
                            consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim
                            id est laborum.
                        </p>
                        <p class="fw-semibold mb-0">Diposting oleh Imam</p>
                        <p class="post-meta">10.59 , 22 Februari 2025</p>
                    </div>
                </div>

                <!-- Right: Sidebar -->
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3">Informasi terkini</h6>
                    <div class="sidebar-info">
                        <div class="info-item">
                            <div class="info-thumb"></div>
                            <div class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                        </div>
                        <div class="info-item">
                            <div class="info-thumb"></div>
                            <div class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                        </div>
                        <div class="info-item">
                            <div class="info-thumb"></div>
                            <div class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                        </div>
                        <div class="info-item">
                            <div class="info-thumb"></div>
                            <div class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-layoutUser>
