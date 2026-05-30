@props([
    'variant' => 'secondary',
    'size' => 'md',
    'state' => 'idle'
])

<div 
    data-variant="{{ $variant }}" 
    data-size="{{ $size }}" 
    data-state="{{ $state }}"
    {{ $attributes->class([
        'group flex flex-col justify-between rounded-2xl border transition-all duration-300 relative overflow-hidden backdrop-blur-md',
        
        // --- Variants ---
        'variant-primary:bg-cyan-500/5 variant-primary:border-cyan-500/20 variant-primary:shadow-lg variant-primary:shadow-cyan-500/5',
        'theme-dark:variant-secondary:bg-slate-900/40 theme-dark:variant-secondary:border-slate-800/80',
        'theme-light:variant-secondary:bg-white theme-light:variant-secondary:border-slate-200 theme-light:variant-secondary:shadow-sm',
        'variant-outline:bg-transparent variant-outline:border-slate-800',
        'variant-ghost:bg-transparent variant-ghost:border-transparent',

        // --- Sizes ---
        'size-sm:p-4 size-sm:gap-3',
        'size-md:p-6 size-md:gap-4',
        'size-lg:p-8 size-lg:gap-5',

        // --- States ---
        'state-active:border-cyan-500/40 state-active:bg-slate-900/60 state-active:shadow-2xl',
        'state-disabled:opacity-40 state-disabled:grayscale state-disabled:pointer-events-none',
    ]) }}
>
    <!-- Background grid overlay -->
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.02] group-variant-primary:opacity-[0.05] pointer-events-none"></div>

    <!-- Header Section -->
    <div class="flex items-center justify-between pb-3 border-b border-slate-900/50 relative z-10">
        <!-- Title with group state modifiers -->
        <h4 class="font-bold text-xs sm:text-sm tracking-wide text-slate-200 group-variant-primary:text-white group-state-active:text-cyan-400 transition-colors">
            Component Card
        </h4>
        <!-- Dynamic State Indicator -->
        <span class="w-1.5 h-1.5 rounded-full bg-slate-500 group-state-active:bg-cyan-450 group-state-disabled:bg-slate-700"></span>
    </div>

    <!-- Body Section -->
    <div class="text-[11px] sm:text-xs text-slate-455 leading-relaxed relative z-10 flex-grow">
        {{ $slot }}
    </div>

    <!-- Footer Section -->
    <div class="flex items-center justify-between pt-3 border-t border-slate-900/50 text-[9px] font-semibold uppercase tracking-wider relative z-10">
        <!-- Action Label using group variant modifier -->
        <span class="text-slate-500 group-variant-primary:text-cyan-400 group-state-active:text-cyan-400">
            Card Details
        </span>
        
        <svg class="h-3.5 w-3.5 text-slate-650 group-variant-primary:text-cyan-400 group-state-active:text-cyan-400 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
    </div>
</div>
