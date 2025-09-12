<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mavzular</title>
  <!-- Google Fonts: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
    }
    #container3D {
      width: 100vw;
      height: 100vh;
    }
    /* Directional Light toggle tugmasi */
    #toggleLight {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 1000;
      padding: 10px 20px;
      background: transparent;
      color: #fff;
      border: 1px solid rgba(255,255,255,0.7);
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    #toggleLight:hover {
      background-color: rgba(255,255,255,0.2);
    }
    /* Animatsiya boshqaruv paneli: pastki markazda */
    #animationControls {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1000;
      padding: 10px 20px;
      background: rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(255,255,255,0.7);
      border-radius: 10px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    #animationControls button {
      padding: 8px 16px;
      background: transparent;
      color: #fff;
      border: none;
      cursor: pointer;
      font-size: 20px;
      transition: background-color 0.3s ease;
    }
    #animationControls button:hover {
      background-color: rgba(255,255,255,0.2);
    }
    #animationControls input[type="range"] {
      cursor: pointer;
      width: 150px;
    }
    /* Chap tomondagi info panel */
    #infoPanel {
      position: absolute;
      top: 5%;
      left: 5%;
      width: 40%;             /* Dastlabki kengligi */
      max-height: 80%;
      background: rgba(128, 128, 128, 0.5); /* Shaffof kulrang fon */
      color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      z-index: 900;           /* Animatsiya boshqaruv paneli (z-index: 1000) ustidan pastda */
      display: flex;
      flex-direction: column;
      /* Foydalanuvchi tomonidan o‘lcham o‘zgartirilishini o‘zi boshqaramiz */
      resize: none;
      position: absolute;
    }
    /* Mavzu nomi uchun header qismi */
    #infoHeader {
      background: rgba(0, 0, 0, 0.3);
      padding: 15px 20px;
      font-size: 1.5em;
      font-weight: 700;
      cursor: pointer;
      user-select: none;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    /* Tugmalar uchun umumiy styling (shu jumladan text-to-speech tugmalari) */
    #infoHeader button {
      margin-left: 10px;
      padding: 5px 10px;
      background: rgba(255,255,255,0.2);
      border: none;
      color: #fff;
      cursor: pointer;
      border-radius: 5px;
      font-size: 1em;
      transition: background 0.3s ease;
    }
    #infoHeader button:hover {
      background: rgba(255,255,255,0.4);
    }
    /* Text-to-speech tugmalari uchun konteyner */
    #textControls {
      display: flex;
      gap: 10px;
    }
    /* Mavzu matni uchun content qismi: dastlab yopiq bo‘ladi */
    #infoContent {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease, padding 0.3s ease;
    }
    /* Agar #infoPanel ga active klass qo‘shilgan bo‘lsa, content qismi ochiladi va scroll paydo bo‘ladi */
    #infoPanel.active #infoContent {
      max-height: 100%; /* Matn uzunligiga qarab bu qiymatni sozlang */
      padding: 15px 20px;
      overflow-y: auto;
    }
    #infoContent p {
      margin: 0;
      font-size: 1em;
      line-height: 1.5;
    }
    /* Resizer handle: panelning o‘ng chekkasida */
    #infoPanel .resizer {
      position: absolute;
      top: 0;
      right: 0;
      width: 8px;
      height: 100%;
      cursor: ew-resize;
      background: rgba(255, 255, 255, 0.3);
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
    }

      @media (max-width: 768px) 
      {
        #infoPanel {
          display: none;
        }
      }
  </style>
</head>
<body>
      <!-- Directional Light toggle tugmasi -->
  <button id="toggleLight">DL</button>

  <!-- Animatsiya boshqaruv paneli -->
  <div id="animationControls">
    <button id="toggleAnimation">
      <span id="toggleAnimationIcon">⏸</span>
    </button>
    <input id="animationSpeed" type="range" min="0" max="2" step="0.1" value="0.3" />
    <input id="animationTimeline" type="range" min="0" max="1" step="0.01" value="0" />
  </div>

  <!-- Three.js sahnasi uchun container -->
  <div id="container3D"></div>

  <!-- Chap tomondagi info panel: mavzu nomi va mavzu matni -->
  <div id="infoPanel">
      <!-- Mavzu nomi: header qismi ichida text-to-speech tugmalari qo'shildi -->
      <div id="infoHeader">
        <span>{{ $subject->name }}</span>
        <div id="textControls">
          <!-- Ikonali tugmalar: o'qish, pauza/davom ettirish va qayta o'qish -->
          <button id="readText" title="Matnni o'qish">🔊</button>
          <button id="pauseText" title="To'xtatish/Davom ettirish">⏸</button>
          <button id="replayText" title="Qayta boshlash">🔄</button>
        </div>
      </div>
      <!-- Mavzu matni: avval yopiq bo‘ladi -->
      <div id="infoContent">
        <p>
          {{ $subject->description }}
        </p>
      </div>
      <!-- Resizer: panel kengligini o'zgartirish uchun -->
      <div class="resizer"></div>
   </div>

  <script type="module">
    {!! $subject->libruary !!}

    const MODEL_PATH = '{{ asset("storage/".$subject->file) }}';

    {!! $subject->scripts !!}
    </script>
</body>
</html>
