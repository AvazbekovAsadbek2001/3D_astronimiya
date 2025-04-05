<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mavzular</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('lesson.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top px-4">
        <div class="d-flex align-items-center">
            <button class="toggle-btn" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <div class="rounded-circle ms-3" alt="Logo"></div>
            <div class="h5 mb-0 ms-2 text-white fw-bold d-none d-md-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Darslar ro'yhati</div>
        </div>

        <div class="ms-auto d-flex gap-2">
            <a href="{{ route('sections') }}" style="text-decoration: none">
                <button class="btn btn-light d-flex align-items-center" type="button" id="sectionDropdown">
                    <span class="d-none d-md-inline"><i class="bi bi-grid me-2"></i>Bo'limlar</span>
                </button>
            </a>
            <a href="{{ route('logout') }}" style="text-decoration: none">
                <button class="btn btn-light d-flex align-items-center" type="button" id="profileDropdown">
                    <span class="d-none d-md-inline"><i class="bi bi-box-arrow-right me-2"></i>Chiqish</span>
                </button>
            </a>
        </div>
    </nav>

    <div class="sidebar p-3 pt-5" id="sidebar">
        <br><br>
        <ul class="nav flex-column">
            @foreach ($lessons as $item)
                <li class="nav-item"><a href="{{ $item->id }}" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i> <b>{{ $loop->iteration }} - mavzu </b>{{ $item->name }}</a></li>
            @endforeach
            </ul>
    </div>

    <div class="container-fluid content" id="content">
        <div class="row">
            <div class="col-12">
                <iframe src="{{ route('object',['id' => $lesson->id]) }}" frameborder="0" width="100%" style="height: 80vh;"></iframe>
            </div>
        </div>
        <marquee style="color: red">Diqqat tizim test holatida ishlamoqda.Avtomatik so'zlatkichni ishga tushurish uchun Microsoft Edge brauzeridan foydalanishingizni so'rayman.Tizimdan foydalanganingiz uchun tashakkur!!!</marquee>
    </div>

    <footer>
        <div class="container text-center">
            <span class="text-white-50">&copy; Asronomiya uchun darslar 2025</span>
        </div>
    </footer>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('show');
            content.classList.toggle('shift');
        });

        // Mobil versiyada menyuni yopish
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if(window.innerWidth < 768) {
                    document.getElementById('sidebar').classList.remove('show');
                    document.getElementById('content').classList.add('shift');
                }
            });
        });
    </script>
</body>
</html>
