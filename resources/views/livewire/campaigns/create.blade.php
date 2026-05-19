<x-slot name="header">
    <h2 class="font-serif text-3xl font-bold text-gray-900 leading-tight">
        {{ __('Start a Campaign') }}
    </h2>
    <p class="mt-2 text-gray-500">Raise funds for the causes you care about.</p>
</x-slot>

<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative">
            
            <!-- AI Toast Notification -->
            <div x-data="{ show: false }" 
                 x-on:ai-optimized.window="show = true; setTimeout(() => show = false, 3000)"
                 x-show="show" 
                 x-transition
                 class="absolute top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg flex items-center" style="display: none;">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Optimized by AI
            </div>

            <div class="p-8 md:p-12">
                <form wire:submit.prevent="save">
                    
                    <!-- AI Assistant Banner -->
                    <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-6 mb-8 flex flex-col md:flex-row items-center justify-between">
                        <div class="mb-4 md:mb-0">
                            <h4 class="font-bold text-indigo-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                AI Campaign Optimizer
                            </h4>
                            <p class="text-sm text-indigo-700">Write a rough draft, and our AI will make it more engaging and emotional.</p>
                        </div>
                        <button type="button" wire:click="optimizeWithAI" wire:loading.attr="disabled" class="bg-indigo-600 text-white font-semibold py-2 px-6 rounded hover:bg-indigo-700 transition shadow flex items-center whitespace-nowrap disabled:opacity-50">
                            <span wire:loading.remove wire:target="optimizeWithAI">Optimize with AI ✨</span>
                            <span wire:loading wire:target="optimizeWithAI">Optimizing...</span>
                        </button>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block font-medium text-gray-700 mb-1">Campaign Title</label>
                            <input type="text" id="title" wire:model="title" class="w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm py-3 px-4" placeholder="e.g. Help Build a School in Papua">
                            @error('title') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="description" class="block font-medium text-gray-700 mb-1">Campaign Story</label>
                            <textarea id="description" wire:model="description" rows="6" class="w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm py-3 px-4" placeholder="Tell your story. Why are you raising funds? Who will it help?"></textarea>
                            @error('description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="target_amount" class="block font-medium text-gray-700 mb-1">Target Amount (Rp)</label>
                                <input type="number" id="target_amount" wire:model="target_amount" class="w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm py-3 px-4" placeholder="e.g. 50000000">
                                @error('target_amount') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="category_id" class="block font-medium text-gray-700 mb-1">Category</label>
                                <select id="category_id" wire:model="category_id" class="w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm py-3 px-4 bg-white">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="deadline" class="block font-medium text-gray-700 mb-1">Campaign Deadline</label>
                            <input type="date" id="deadline" wire:model="deadline" class="w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm py-3 px-4 text-gray-700">
                            @error('deadline') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="pt-6">
                            <button type="submit" class="w-full bg-dark text-white font-bold text-lg py-4 rounded hover:bg-gray-800 transition shadow-lg hover:shadow-xl">
                                Submit Campaign for Approval
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
