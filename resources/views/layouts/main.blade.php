<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} </title>
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="images/favicon.png">
    {{-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"> --}}
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- CSS biasa --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Manifest PWA --}}
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#198754">

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #6366f1;
            --dark: #0f172a;
            --light: #f8fafc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
        }

        /* NAVBAR */
        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            background:
                linear-gradient(
                    rgba(15,23,42,0.75),
                    rgba(15,23,42,0.75)
                ),
                url('https://images.unsplash.com/photo-1498050108023-c5249f4df085');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            color: white;
        }

        .hero h1 {
            font-weight: 700;
        }

        .hero p {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            padding: 14px 30px;
            font-weight: 600;
        }

        .btn-main:hover {
            opacity: 0.9;
        }

        /* FEATURES */
        .features {
            padding: 40px 0;
            background-color: white;
        }

        .feature-card {
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 40px 30px;
            transition: 0.3s ease;
            background: white;
        }

        .feature-card:hover {
            /* transform: translateY(-10px); */
            box-shadow: 0 25px 50px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .feature-icon1 {
            width: 70px;
            height: 70px;
            /* background: red; */
            border: red;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            margin-bottom: 20px;
        }

        /* CTA */
        .cta {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        /* FOOTER */
        footer {
            background-color: var(--dark);
            color: #cbd5f5;
            padding: 25px 0;
        }

        /* TESTIMONI */
        .slider {
            position: relative;
            width: 100%;
            height: 450px;
            overflow: hidden;
            border-radius: 15px;
        }

        .slides {
            display: flex;
            height: 450px;
            transition: transform 0.6s ease-in-out;
        }

        .slide {
            width: 100%;
            height: 450px;
            object-fit: cover;
            flex-shrink: 0;
        }

        /* Dots */
        .dots {
            position: absolute;
            bottom: 15px;
            width: 100%;
            text-align: center;
        }

        .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 5px;
            background: rgba(255,255,255,0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
        }

        .dot.active {
            background: white;
            transform: scale(1.3);
        }
    </style>
</head>

<body>

<div class=""> <!--  container -->
  
  @include('partials.navbarmain')

  <div class="container ml-4">
    @yield('container')
  </div>

</div> <!--  container -->

{{-- JS --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });

    //SLIDE TESTIMONI
    let currentIndex = 0;
    const slides = document.getElementById('slides');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = dots.length;

    function updateSlider() {
        slides.style.transform = `translateX(-${currentIndex * 100}%)`;

        dots.forEach(dot => dot.classList.remove('active'));
        dots[currentIndex].classList.add('active');
    }

    function goToSlide(index) {
        currentIndex = index;
        updateSlider();
    }

    // Auto slide tiap 3 detik
    setInterval(() => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateSlider();
    }, 3000);
</script>

{{-- PWA Javascript --}}
<script>
    let deferredPrompt;
    const installBtn = document.getElementById('installBtn');

    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;

        // tampilkan tombol
        installBtn.classList.remove('d-none');
    });

    installBtn.addEventListener('click', async () => {
        if (!deferredPrompt) return;

        deferredPrompt.prompt();

        const { outcome } = await deferredPrompt.userChoice;

        if (outcome === 'accepted') {
            console.log('User install app');
        }

        deferredPrompt = null;
        installBtn.classList.add('d-none');
    });
</script>
{{-- Service Worker --}}
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js')
            .then(() => console.log('Service Worker Registered'));
    }
</script>


</body>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.6.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>