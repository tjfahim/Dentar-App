<div class="min-h-screen flex flex-col sm:justify-center items-center pt-2 sm:pt-0 bg-gray-100 custom-bottom-padding">
    <div class="custom-image-container">
        <!-- <img src="{{ asset('/storage/admin') }}/top_left_logo.png" alt="Left Image" class="left-image">
        <img src="{{ asset('/storage/admin') }}/{{settings()->website_logo}}" class="right-image"> -->
    </div>

    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
