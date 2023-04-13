<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-3">
                        <h1 class="text-2xl">Image Gallery (Add Images) </h1>
                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-5 gap-4">
                            <div class="col-span-2">
                                <div class="flex justify-center items-center h-full">
                                    <div class="w-3/4 h-full border border-gray-300 shadow-sm bg-gray-100 relative mx-auto flex items-center justify-center overflow-hidden">
                                        <strong class="text-gray-500">Add Image</strong>
                                        <input type="file" name="image" class="cursor-pointer absolute opacity-0 top-0 left-0 w-full h-full min-h-">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-3">
                                <div class="mb-3">
                                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                                    <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                                    <textarea name="description" id="description" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Post Now
                            </button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const imageInput = document.querySelector('input[name="image"]');
        const imageContainer = imageInput.parentElement;
    
        imageInput.addEventListener('change', () => {
            const file = imageInput.files[0];
            const reader = new FileReader();
    
            reader.onload = () => {
                imageContainer.style.backgroundImage = `url(${reader.result})`;
                imageContainer.style.backgroundSize = 'cover';
                const textHint = imageContainer.querySelector('strong');
                textHint.style.display = reader.result ? 'none' : 'inline-block';
            };

    
            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
    
</x-app-layout>