<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <style>
        /*Common*/
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");

@import url("https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200");

@font-face {
  font-family: "Material Symbols Outlined";
  font-style: normal;
  src: url(https://example.com/material-symbols.woff) format("woff");
}

.material-symbols-outlined {
  font-family: "Material Symbols Outlined";
  font-weight: normal;
  font-style: normal;
  display: inline-block;
  line-height: 1;
  text-transform: none;
  letter-spacing: normal;
  word-wrap: normal;
  white-space: nowrap;
  direction: ltr;
  font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 48;
}
:root {
  --text: #20202b;
  --text-light: #45424b;
  --dark-grey: #333;
}
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: "Montserrat";
}
body {
  background: #eee;
}

main {
  display: flex;
  flex-direction: column;
  height: 100vh;
  width: 100%;
  place-content: center;
  align-items: center;
  overflow: hidden;
  position: relative;
  padding: 64px;
}
.container {
  text-align: center;
}
h1 {
  font-size: clamp(10vw, 20vw, 300px);
  opacity: 0;
  transform: translateY(-100vh);
}
h2 {
  font-size: clamp(3vw, 7vw, 100px);

  color: transparent;
  text-shadow: 2px 2px 0 red, -2px -2px 0 green, 6px 0 0 violet, -6px 0 0 yellow,
    0 -6px 0 aqua, 0 6px 0 yellowgreen;
  color: #eee;
}
h1,
h2 {
  margin: 0;
  line-height: clamp(5vw, 10vw, 150px);
}
body .material-symbols-outlined {
  font-size: clamp(10vw, 20vw, 300px);
  text-shadow: 2px 2px 0 red, -2px -2px 0 green, 6px 0 0 violet, -6px 0 0 yellow,
    0 -6px 0 cyan, 0 6px 0 yellowgreen;
}

    </style>
</head>
<body>
    <main>
      <div class="container"><span class="material-symbols-outlined search">search</span>
        <h1 class="h1">404</h1>
        <h2>Not Found</h2>
      </div>
    </main>
  </body>

  <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>

  <script>
    const timeline = gsap.timeline({ defaults: { duration: 1 } });
timeline
  .fromTo(
    ".search",
    { x: "-200px", y: "100px", opacity: 0 },
    {
      x: "200px",
      y: "-100px",
      rotate: 40,
      opacity: 1,
      yoyo: true
    }
  )
  .to("h1", { y: "0", ease: "bounce", opacity: 1 })
  .to(".search", { x: "0", y: "0", rotate: 0, ease: "bounce" })
  .fromTo("h2", { opacity: 0 }, { opacity: 1, delay: 0.2 });


  </script>

</html>
