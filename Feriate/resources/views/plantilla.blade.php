<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title>
      @yield('titulo')
    </title>
  </head>
  <body>
    <header>
    <ul>
      <li>Home</li>
      <li>Registracion</li>
      <li>Login</li>
    </ul>
  </header>
  <section>
    @yield('principal')
  </section>
  <footer>
    Feriate_db 2019
  </footer>
 </body>
</html>
