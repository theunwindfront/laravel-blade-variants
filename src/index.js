const plugin = require('tailwindcss/plugin');

/**
 * @theunwindfront/laravel-blade-variants
 * A Tailwind CSS plugin that enables native browser-driven variant and state selections
 * using data attributes (data-variant, data-size, data-state, data-theme).
 */
module.exports = plugin(
  function ({ addVariant, matchVariant }) {
    // Standard presets for autocompletion
    const variants = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ghost', 'link', 'outline'];
    const sizes = ['xs', 'sm', 'md', 'lg', 'xl', '2xl'];
    const states = ['active', 'inactive', 'open', 'closed', 'loading', 'disabled', 'checked', 'selected', 'expanded'];
    const themes = ['light', 'dark', 'system'];

    // 1. Static Presets Registration
    // Registers v4-compatible CSS selectors matching exact data values
    variants.forEach((v) => {
      addVariant(`variant-${v}`, `&[data-variant="${v}"]`);
      addVariant(`group-variant-${v}`, `:merge(.group)[data-variant="${v}"] &`);
      addVariant(`peer-variant-${v}`, `:merge(.peer)[data-variant="${v}"] ~ &`);
    });

    sizes.forEach((s) => {
      addVariant(`size-${s}`, `&[data-size="${s}"]`);
      addVariant(`group-size-${s}`, `:merge(.group)[data-size="${s}"] &`);
      addVariant(`peer-size-${s}`, `:merge(.peer)[data-size="${s}"] ~ &`);
    });

    states.forEach((st) => {
      addVariant(`state-${st}`, `&[data-state="${st}"]`);
      addVariant(`group-state-${st}`, `:merge(.group)[data-state="${st}"] &`);
      addVariant(`peer-state-${st}`, `:merge(.peer)[data-state="${st}"] ~ &`);
    });

    themes.forEach((t) => {
      addVariant(`theme-${t}`, `&[data-theme="${t}"], [data-theme="${t}"] &`);
      addVariant(`group-theme-${t}`, `:merge(.group)[data-theme="${t}"] &`);
      addVariant(`peer-theme-${t}`, `:merge(.peer)[data-theme="${t}"] ~ &`);
    });

    // 2. Dynamic Arbitrary Matching Registration
    // Supports custom values e.g., variant-[my-custom-value]:bg-red-500
    matchVariant('variant', (value) => `&[data-variant="${value}"]`);
    matchVariant('group-variant', (value) => `:merge(.group)[data-variant="${value}"] &`);
    matchVariant('peer-variant', (value) => `:merge(.peer)[data-variant="${value}"] ~ &`);

    matchVariant('size', (value) => `&[data-size="${value}"]`);
    matchVariant('group-size', (value) => `:merge(.group)[data-size="${value}"] &`);
    matchVariant('peer-size', (value) => `:merge(.peer)[data-size="${value}"] ~ &`);

    matchVariant('state', (value) => `&[data-state="${value}"]`);
    matchVariant('group-state', (value) => `:merge(.group)[data-state="${value}"] &`);
    matchVariant('peer-state', (value) => `:merge(.peer)[data-state="${value}"] ~ &`);

    matchVariant('theme', (value) => `&[data-theme="${value}"], [data-theme="${value}"] &`);
    matchVariant('group-theme', (value) => `:merge(.group)[data-theme="${value}"] &`);
    matchVariant('peer-theme', (value) => `:merge(.peer)[data-theme="${value}"] ~ &`);
  }
);
