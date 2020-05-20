<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $game->name }} - GutsulGames</title>
    <link rel="shortcut icon" href="{{ "/games/online/".$game->id."/TemplateData/favicon.ico" }}">
    <link rel="stylesheet" href="{{ "/games/online/".$game->id."/TemplateData/style.css" }}">
    <script src="{{ "/games/online/".$game->id."/TemplateData/UnityProgress.js"}}"></script>
    <script src="{{ "/games/online/".$game->id."/Build/UnityLoader.js"}} "></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer",  "/games/online/" + {!! json_encode($game->id) !!} + "/Build/Build.json", {onProgress: UnityProgress});
    </script>
  </head>
  <body>
    <div class="webgl-content">
      <div id="gameContainer" style="width: 1280px; height: 720px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">{{ $game->name }}</div>
      </div>
    </div>
  </body>
</html>
