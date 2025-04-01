<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Visitors Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white h-screen shadow-lg p-5">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">AVMS</h2>
            <ul>
                <li class="mb-3"><a href="#" class="flex items-center text-blue-600 font-semibold"><span class="mr-2">&#128202;</span> Dashboard</a></li>
                <li class="mb-3"><a href="#" class="flex items-center"><span class="mr-2">&#128100;</span> New Visitor</a></li>
                <li class="mb-3"><a href="#" class="flex items-center"><span class="mr-2">&#128101;</span> Manage Visitors</a></li>
                <li><a href="#" class="flex items-center"><span class="mr-2">&#128196;</span> Visitors B/w Dates</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <input type="text" placeholder="Search by name & mobile number..." class="border px-4 py-2 w-96 rounded-md">
                <div class="flex items-center space-x-4">
                    <span>Admin User</span>
                    <img src="https://via.placeholder.com/40" class="rounded-full" alt="Admin">
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-4 gap-6">
                <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white p-6 rounded-lg shadow-md">
                    <p class="text-2xl font-bold">2</p>
                    <p>Today's Visitors</p>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-teal-500 text-white p-6 rounded-lg shadow-md">
                    <p class="text-2xl font-bold">0</p>
                    <p>Yesterday Visitors</p>
                </div>
                <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white p-6 rounded-lg shadow-md">
                    <p class="text-2xl font-bold">2</p>
                    <p>Last 7 Days Visitors</p>
                </div>
                <div class="bg-gradient-to-r from-yellow-500 to-green-500 text-white p-6 rounded-lg shadow-md">
                    <p class="text-2xl font-bold">4</p>
                    <p>Total Visitors Till Date</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
