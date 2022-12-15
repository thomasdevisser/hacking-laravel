<x-layout>
  <h2>Sign up for HackingLaravel</h2>
  <form action="/register" method="POST">
    @csrf
    <div class="form-group">
      <label for="register-username">Username</label>
      <input value="{{old('username')}}" type="text" name="username" id="register-username" placeholder="Pick a username" autocomplete="off">
      @error('username')
          <small>{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="register-email">Email</label>
      <input value="{{old('email')}}" type="text" name="email" id="register-email" placeholder="you@example.com" autocomplete="off">
      @error('email')
          <small>{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="register-password">Password</label>
      <input type="password" name="password" id="register-password" placeholder="Create a password">
      @error('password')
          <small>{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="register-password">Confirm Password</label>
      <input type="password" name="password_confirmation" id="register-password-confirm" placeholder="Confirm password">
    </div>

    <button type="submit">Sign up for HackingLaravel</button>
  </form>
</x-layout>