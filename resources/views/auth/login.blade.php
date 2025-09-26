<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingia - Malkia Konnect</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .bg-custom {
            background-image: url("{{ asset('illustration-standing-black-woman-gynecological-health-concept-vector-illustration_146508-10470.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .bg-overlay {
            background-color: rgba(255, 255, 255, 0.9);
        }
        @media (prefers-color-scheme: dark) {
            .bg-overlay {
                background-color: rgba(0, 0, 0, 0.8);
            }
        }
    </style>
</head>
<body class="h-full bg-custom">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-sm bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <div class="p-6">
                <div class="text-center mb-6">
                    <a href="{{ url('/') }}" class="flex justify-center">
                        <img class="h-16 w-auto" src="{{ asset('LOGO-MALKIA-KONNECT.jpg') }}" alt="Malkia Konnect">
                    </a>
                    <h2 class="mt-3 text-xl font-bold text-gray-900 dark:text-white">
                        Login to Your Account
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Sign in to continue
                    </p>
                </div>

                <form class="space-y-4" id="loginForm" action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <!-- Alert container -->
                    <div id="alertContainer" class="hidden">
                        <div id="alertMessage" class="p-4 mb-4 text-sm rounded-lg" role="alert">
                        </div>
                    </div>
                    
                    <div>
                        <label for="login" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Email or Phone
                        </label>
                        <div class="mt-2">
                            <input type="text" 
                                name="login" 
                                id="login" 
                                value="{{ old('login') }}" 
                                required 
                                autofocus 
                                autocomplete="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="weka barua pepe au namba ya simu"
                                @error('login') 
                                    aria-invalid="true"
                                    aria-describedby="login-error"
                                @enderror>
                            @error('login')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Password
                            </label>
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-500 dark:text-primary-400 dark:hover:text-primary-300">
                                    Forgot password?
                                </a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input type="password" 
                                name="password" 
                                id="password" 
                                placeholder="••••••••" 
                                required 
                                autocomplete="current-password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                @error('password')
                                    aria-invalid="true"
                                    aria-describedby="password-error"
                                @enderror>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" 
                                name="remember" 
                                type="checkbox" 
                                class="w-4 h-4 border border-gray-300 rounded bg-white dark:bg-gray-700 focus:ring-2 focus:ring-primary-500 dark:border-gray-600"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                            Sign in
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                        Don't have an account? 
                        <a href="#" class="font-medium text-primary-600 hover:text-primary-500 dark:text-primary-400 dark:hover:text-primary-300">
                            Contact Admin
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const alertContainer = document.getElementById('alertContainer');
            const alertMessage = document.getElementById('alertMessage');
            const submitButton = loginForm.querySelector('button[type="submit"]');

            // Show alert function
            function showAlert(message, type = 'error') {
                alertMessage.innerHTML = message;
                alertMessage.className = `p-4 mb-4 text-sm rounded-lg ${type === 'success' ? 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400' : 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400'}`;
                alertContainer.classList.remove('hidden');
                
                // Scroll to alert
                alertContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }

            // Hide alert function
            function hideAlert() {
                alertContainer.classList.add('hidden');
            }

            // Handle form submission
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                hideAlert();

                // Show loading state
                const originalText = submitButton.textContent;
                submitButton.textContent = 'Signing in...';
                submitButton.disabled = true;

                // Get form data
                const formData = new FormData(loginForm);
                formData.append('ajax', '1'); // Indicate this is an AJAX request

                // Make AJAX request
                fetch(loginForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw response;
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        showAlert(data.message, 'success');
                        // Redirect after showing success message
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 1500);
                    } else {
                        showAlert(data.message || 'Login failed. Please try again.');
                    }
                })
                .catch(error => {
                    let errorMessage = 'An error occurred. Please try again.';
                    
                    if (error.status === 422) {
                        error.json().then(data => {
                            if (data.errors && data.errors.login) {
                                errorMessage = data.errors.login[0];
                            }
                            showAlert(errorMessage);
                        });
                    } else {
                        showAlert(errorMessage);
                    }
                })
                .finally(() => {
                    // Reset button state
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                });
            });

            // Hide alert when user starts typing
            const loginInput = document.getElementById('login');
            const passwordInput = document.getElementById('password');
            
            [loginInput, passwordInput].forEach(input => {
                input.addEventListener('input', hideAlert);
            });
        });
    </script>
</body>
</html>
