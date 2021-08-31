<head>
  
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="180x180" href="@asset('images/favicon/apple-touch-icon.png')">
  <link rel="icon" type="image/png" sizes="32x32" href="@asset('images/favicon/favicon-32x32.png')">
  <link rel="icon" type="image/png" sizes="16x16" href="@asset('images/favicon/favicon-16x16.png')">
  <link rel="manifest" href="@asset('images/favicon/site.webmanifest')">
  <link rel="shortcut icon" href="@asset('images/favicon/favicon.ico')">
  <link rel="mask-icon" href="@asset('images/favicon/safari-pinned-tab.svg')" color="#777777">
  <meta name="msapplication-TileColor" content="#d84127">
  <meta name="msapplication-config" content="@asset('images/favicon/browserconfig.xml')">
  <meta name="theme-color" content="#ffffff">
  
  <?php echo get_field('tracking_code_header', 'option'); ?>

  @php wp_head() @endphp

</head>
