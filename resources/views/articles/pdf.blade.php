<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $article->title }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            line-height: 1.6;
        }
        h1 {
            margin-bottom: 10px;
        }
        .meta {
            color: #666;
            font-size: 11px;
            margin-bottom: 20px;
        }
        .content {
            margin-top: 20px;
        }
        hr {
            margin: 20px 0;
        }
        img {
          max-width: 100%;
          height: auto;
          display: block;
          margin: 10px 0;
     }
    </style>
</head>
<body>

    <h1>{{ $article->title }}</h1>

    <div class="meta">
        Author: {{ $article->user->name }} <br>
        Date: {{ $article->created_at->format('d M Y') }}
    </div>

    <hr>

    <div class="content">

     @php
          $content = $article->content;

          $content = preg_replace_callback(
               '/<img[^>]+src="([^"]+)"/i',
               function ($matches) {
                    $src = $matches[1];
                    // Convert localhost or absolute URL to public_path
                    if (str_contains($src, '/storage/')) {
                         return str_replace(
                              $src,
                              public_path(parse_url($src, PHP_URL_PATH)),
                              $matches[0]
                         );
                    }
                    return $matches[0];
               },
               $content
          );
     @endphp
     {!! $content !!}
    </div>

</body>
</html>
