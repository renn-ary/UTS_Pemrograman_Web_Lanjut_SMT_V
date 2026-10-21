<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Inventaris</title>
</head>
<body>
    <h1>Login Inventaris</h1>
    @if ($errors->any())
        <div>
          @foreach ($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
      @csrf

      <div>
        <label for='email'>Email</label>
        <input 
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            >
      </div>

      <div>
          <label for="password">Password</label>
          <input 
            id="password"
            type="password"
            name="password"
            required
            >
      </div>

      <button type="submit">Login</button>
    </form>
</body>
</html>