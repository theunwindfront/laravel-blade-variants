@props([
    'variant' => 'primary',
    'size' => 'md',
    'state' => 'idle'
])

<span 
    data-variant="{{ $variant }}" 
    data-size="{{ $size }}" 
    data-state="{{ $state }}"
    {{ $attributes->class([
        'inline-flex items-center font-semibold rounded-full border transition-all duration-200 uppercase tracking-wider',
        
        // --- Variants ---
        'variant-primary:bg-cyan-500/10 variant-primary:border-cyan-500/30 variant-primary:text-cyan-400',
        'theme-dark:variant-secondary:bg-slate-900/60 theme-dark:variant-secondary:border-slate-800 theme-dark:variant-secondary:text-slate-350',
        'theme-light:variant-secondary:bg-slate-100 theme-light:variant-secondary:border-slate-200 theme-light:variant-secondary:text-slate-700',
        'variant-success:bg-emerald-500/10 variant-success:border-emerald-500/30 variant-success:text-emerald-400',
        'variant-danger:bg-rose-500/10 variant-danger:border-rose-500/30 variant-danger:text-rose-400',
        'variant-warning:bg-amber-500/10 variant-warning:border-amber-500/30 variant-warning:text-amber-400',
        'variant-info:bg-blue-500/10 variant-info:border-blue-500/30 variant-info:text-blue-400',
        'variant-outline:bg-transparent variant-outline:border-slate-700 variant-outline:text-slate-400',

        // --- Sizes ---
        'size-sm:px-2.5 size-sm:py-0.5 size-sm:text-[9px] size-sm:gap-1.5',
        'size-md:px-3.5 size-md:py-0.5 size-md:text-[10px] size-md:gap-2',
        'size-lg:px-4.5 size-lg:py-1 size-lg:text-xs size-lg:gap-2.5',

        // --- States ---
        'state-active:ring-2 state-active:ring-offset-1 state-active:ring-offset-slate-950 variant-primary:state-active:ring-cyan-500 variant-success:state-active:ring-emerald-500 variant-danger:state-active:ring-rose-500',
        'state-disabled:opacity-40 state-disabled:cursor-not-allowed state-disabled:grayscale',
    ]) }}
>
    <!-- Dot indicator -->
    <span class="w-1.2 h-1.2 rounded-full bg-current opacity-80"></span>
    
    <span>{{ $slot }}</span>
</span>
