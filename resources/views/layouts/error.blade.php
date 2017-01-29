<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>{{ Theme::get('title') }}</title>
  <meta name="keywords" content="{{ Theme::get('keywords') }}">
  <meta name="description" content="{{ Theme::get('description') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  {{ Theme::asset()->styles() }}
  {{ Theme::asset()->scripts() }}
  <!--[if lt IE 9]>
    {{ Theme::asset()->container('ie9')->scripts() }}
  <![endif]-->
</head>
<body>
  <section id="content">
    {{ Theme::content() }}
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>kayrules.com <br>&copy; {{ date('Y') }}</small>
      </p>
    </div>
  </footer>

  {{ Theme::asset()->container('core-scripts')->scripts() }}
  {{ Theme::asset()->container('post-scripts')->scripts() }}

</body>
</html>