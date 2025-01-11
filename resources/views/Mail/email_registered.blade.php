<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header with Logo Area -->
            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white text-center">Welcome to Our Service</h1>
            </div>

            <!-- Main Content -->
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Hello 
                    {{ $user->name }}!
                </h2>
                
                <p class="text-gray-600 mb-6">Your account has been successfully created. Below are your account details:</p>
                
                <!-- Account Details Section -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-medium text-gray-800 mb-3">Your Login Credentials:</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <span class="text-gray-600 w-24">Email:</span>
                            <span class="text-gray-800 font-medium">
                                {{ $user->email }}
                            </span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-600 w-24">Password:</span>
                            <span class="text-gray-800 font-medium">
                                {{ $user->password }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="bg-blue-50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-medium text-blue-800 mb-2">Additional Information:</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <span class="text-gray-600 w-24">Phone:</span>
                            <span class="text-gray-800">
                                {{ $user->phone }}
                            </span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-600 w-24">Address:</span>
                            <span class="text-gray-800">
                                {{ $user->address }}

                            </span>
                        </div>
                    </div>
                </div>

                <!-- Login Button -->
                <div class="text-center mb-6">
                    <p class="text-gray-600 mb-4">Click the button below to access your dashboard:</p>
                    <a href="{{ url('/admin/login') }}" 
                       class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                        Login to Dashboard
                    </a>
                </div>

                <!-- Security Notice -->
                <div class="bg-yellow-50 rounded-lg p-4 mb-6">
                    <p class="text-yellow-800 text-sm">
                        <strong>Important:</strong> For security reasons, we recommend changing your password after your first login.
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-6 py-4">
                <p class="text-sm text-gray-600 text-center">
                    If you have any questions or need assistance, please don't hesitate to contact our support team.
                </p>
            </div>
        </div>
        
        <!-- Company Footer -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>