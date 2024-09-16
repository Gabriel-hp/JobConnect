<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/styles.css">
   <!-- Fonte do Google -->
   <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>JobConnect</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand h1 text-light" href="{{ route('vagas.index') }}">JobConnect</a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav ml-auto align-items-center">
        @guest
        <li class="nav-item">
          <a href="/login" class="nav-link text-light">Entrar</a>
        </li>
        <li class="nav-item">
          <a href="/register" class="nav-link text-light">Cadastrar</a>
        </li>
        @endguest
        @auth
        <li class="nav-item">
                <a href="/" class="nav-link">Vagas</a>
              </li>
              
              <li class="nav-item">
                <a href="/perfil" class="nav-link">Meu curriculo </a>
              </li>

              <li class="nav-item">
                <a href="/candidaturas" class="nav-link">Candidaturas </a>
              </li>
        
        <li class="nav-item">
          
          <form action="/logout" method="POST" class="m-0 p-0 bg-dark">
            @csrf
            <a href="/logout" 
              class="nav-link text-light" 
              onclick="event.preventDefault(); this.closest('form').submit();">
              Sair
            </a>
          </form>
        </li>

    
        @endauth
      </ul>
    </div>
  </div>
</nav>

<body>
    <div class="container">
        @yield('content')
      
    </div>
</body>