<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $game->name }} - GutsulGames</title>
    <link rel="shortcut icon" href="{{ "/games/online/TemplateData/favicon.ico" }}">
    <link rel="stylesheet" href="{{ "/games/online/TemplateData/style.css" }}">
    <script src="{{ "/games/online/TemplateData/UnityProgress.js"}}"></script>
    <script src="{{ "/games/online/".$game->id."/Build/UnityLoader.js"}} "></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer",  "/games/online/" + {!! json_encode($game->id) !!} + "/Build/Build.json", {onProgress: UnityProgress});
    </script>
  </head>
  <body style="background-color: #454955">
    <div class="webgl-content">
      <div id="gameContainer" style="width: 1280px; height: 720px"></div>
      <div class="footer" style="display: flex; justify-content: space-between">
        <div>
          <a style="color: #FFE500; text-decoration: none; font-size: 28px" href="{{ route('main') }}">Gutsul Games</a>
        </div>
        <div>
          <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>

          <div class="title" style="color: white;">{{ $game->name }}</div>
        </div>
      </div>
    </div>
  </body>
</html>
