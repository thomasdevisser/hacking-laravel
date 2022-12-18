<x-layout>
  <h2>Update your profile image</h2>
  <form action="/update-profile-image" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="profile-image">Profile Image</label>
      <input value="{{ old('profile-image') }}" type="file" name="profile-image" id="profile-image">
      @error('profile-image')
        <small class="error">{{ $message }}</small>
      @enderror
    </div>

    <button>Save Profile Image</button>
  </form>
</x-layout>