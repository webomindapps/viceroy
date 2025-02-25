<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-center">
                        <a onclick="history.length > 1 ? history.go(-1) : window.location = window.location.origin;">
                            <i class="fas fa-chevron-left fs-5"></i>
                        </a>
                        <h3>Add Staff</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 pb-4">
                <div class="form-card px-3">
                    <form action="{{ route('staffmaster.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-contents">
                            <div class="row mb-2">
                                <h4 class="col-lg-12">General Info</h4>

                                <div class="col-lg-6">
                                    <label for="name" class="form-label">Staff Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password"
                                            required>
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="togglePasswordVisibility()">
                                            <i class="fa fa-eye-slash" id="togglePassword"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="conf_password" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="conf_password"
                                            id="conf_password" required>
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="togglePasswordVisibility2()">
                                            <i class="fa fa-eye-slash" id="togglePassword1"></i>
                                        </button>
                                    </div>
                                    @error('conf_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.getElementById("togglePassword");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }

        function togglePasswordVisibility2() {
            var passwordField = document.getElementById("conf_password");
            var toggleIcon = document.getElementById("togglePassword1");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
</x-app-layout>
