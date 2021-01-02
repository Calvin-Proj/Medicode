<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex-auto justify-items-center px-12 py-1 bg-secondary border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:text-secondary focus:outline-none focus:text-highlight focus:none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
