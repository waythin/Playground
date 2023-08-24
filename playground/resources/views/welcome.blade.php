<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  
</head>
<body>
  <h1 class="text-5xl font-bold underline bg-red-600">
    Hello world!
  </h1>

  <div class= "font-bold text-center  bg-slate-700">
    <h1 class=" text-orange-600">
        good game

        {{auth('customer')->user()->name}}
    </h1>
  
  </div>
</body>
</html>