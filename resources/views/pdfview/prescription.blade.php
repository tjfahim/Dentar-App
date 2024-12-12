<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Design</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center">
                    <span class="text-white font-bold text-lg">DB</span>
                </div>
                <h1 class="font-bold text-lg">DENTER</h1>
            </div>
        </div>
        
        <!-- Patient Info -->
        <div class="mb-4">
            <div class="flex items-center space-x-4">
                <span>Name:</span>
                <div class="flex-grow border-b border-gray-300"></div>
            </div>
            <div class="flex items-center space-x-4 mt-2">
                <span>Address:</span>
                <div class="flex-grow border-b border-gray-300"></div>
            </div>
            <div class="flex items-center space-x-4 mt-2">
                <span>Age:</span>
                <div class="flex-grow border-b border-gray-300 w-16"></div>
                <span>Male</span>
                <input type="checkbox" class="form-checkbox text-gray-600">
                <span>Female</span>
                <input type="checkbox" checked class="form-checkbox text-purple-600">
            </div>
        </div>

        <!-- Table -->
        <table class="w-full text-sm border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">Description</th>
                    <th class="border border-gray-300 p-2">Guideline</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 p-2">01.</td>
                    <td class="border border-gray-300 p-2">
                        <div>1+0+1</div>
                        <div>Before</div>
                        <div>10 Days</div>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 p-2">02.</td>
                    <td class="border border-gray-300 p-2">
                        <div>1+0+1</div>
                        <div>After</div>
                        <div>01 Month</div>
                    </td>
                </tr>
                <!-- Repeat rows as needed -->
                <tr>
                    <td class="border border-gray-300 p-2">03.</td>
                    <td class="border border-gray-300 p-2">
                        <div>1+0+1</div>
                        <div>Before</div>
                        <div>01 Week</div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Note -->
        <div class="mt-4">
            <span>Note:</span>
            <div class="border-t border-gray-300 mt-2"></div>
        </div>

        <!-- Footer -->
        <div class="mt-6 text-sm">
            <p>Dr. Abdullah</p>
            <p>License No: 1234</p>
            <p>DD/MM/YY</p>
            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Send</button>
        </div>
    </div>
</body>
</html>
