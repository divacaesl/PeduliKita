<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex w-full justify-center items-center px-4 py-3 bg-dark border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-800 focus:bg-gray-800 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg']) }}>
    {{ $slot }}
</button>
