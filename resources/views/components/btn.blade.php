@props([
    'variant' => 'primary',
    'size' => 'md',
    'state' => 'idle'
])

<button 
    data-variant="{{ $variant }}" 
    data-size="{{ $size }}" 
    data-state="{{ $state }}" 
    {{ $attributes->merge(['disabled' => ($state === 'disabled' || $state === 'loading')])->class([
        'group inline-flex items-center justify-center font-bold tracking-wide rounded-xl border transition-all duration-200 cursor-pointer select-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-950',
        
        // --- 1. Variant Styles (Data attributes mapped via custom plugin) ---
        // Primary (cyan neon)
        'variant-primary:bg-cyan-500 variant-primary:border-cyan-400 variant-primary:text-slate-955 variant-primary:hover:bg-cyan-400 variant-primary:shadow-md variant-primary:shadow-cyan-500/20 variant-primary:focus:ring-cyan-500',
        // Secondary (dark slate glass / light slate solid)
        'theme-dark:variant-secondary:bg-slate-900 theme-dark:variant-secondary:border-slate-800 theme-dark:variant-secondary:text-slate-250 theme-dark:variant-secondary:hover:bg-slate-850 theme-dark:variant-secondary:hover:border-slate-700',
        'theme-light:variant-secondary:bg-slate-100 theme-light:variant-secondary:border-slate-200 theme-light:variant-secondary:text-slate-800 theme-light:variant-secondary:hover:bg-slate-200 theme-light:variant-secondary:hover:border-slate-300',
        // Danger (rose neon)
        'variant-danger:bg-rose-600 variant-danger:border-rose-500 variant-danger:text-white variant-danger:hover:bg-rose-500 variant-danger:shadow-md variant-danger:shadow-rose-600/20 variant-danger:focus:ring-rose-500',
        // Ghost (transparent background)
        'theme-dark:variant-ghost:bg-transparent theme-dark:variant-ghost:border-transparent theme-dark:variant-ghost:text-slate-400 theme-dark:variant-ghost:hover:text-white theme-dark:variant-ghost:hover:bg-slate-900/40',
        'theme-light:variant-ghost:bg-transparent theme-light:variant-ghost:border-transparent theme-light:variant-ghost:text-slate-500 theme-light:variant-ghost:hover:text-slate-900 theme-light:variant-ghost:hover:bg-slate-100',
        // Outline (thin bordered)
        'theme-dark:variant-outline:bg-transparent theme-dark:variant-outline:border-slate-700 theme-dark:variant-outline:text-slate-300 theme-dark:variant-outline:hover:border-slate-500 theme-dark:variant-outline:hover:text-white',
        'theme-light:variant-outline:bg-transparent theme-light:variant-outline:border-slate-300 theme-light:variant-outline:text-slate-600 theme-light:variant-outline:hover:border-slate-400 theme-light:variant-outline:hover:text-slate-950',

        // --- 2. Size Styles ---
        'size-sm:px-3.5 size-sm:py-1.5 size-sm:text-xs size-sm:gap-1.5',
        'size-md:px-5 size-md:py-2.5 size-md:text-sm size-md:gap-2',
        'size-lg:px-6 size-lg:py-3.5 size-lg:text-base size-lg:gap-2.5',

        // --- 3. State Styles ---
        'state-loading:opacity-60 state-loading:cursor-not-allowed state-loading:pointer-events-none',
        'state-disabled:opacity-40 state-disabled:cursor-not-allowed state-disabled:pointer-events-none state-disabled:grayscale',
    ]) }}
>
    <!-- Dynamic Loading Spinner using parent group state! -->
    <svg class="animate-spin h-3.5 w-3.5 hidden group-state-loading:block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    
    <!-- Decorative Icon placeholder showing how group-state behaves -->
    <svg class="h-3.5 w-3.5 text-slate-400 group-variant-primary:text-slate-800 group-hover:text-white transition-colors group-state-loading:hidden group-state-disabled:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
    </svg>

    <span>{{ $slot }}</span>
</button>
