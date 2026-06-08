# @theunwindfront/laravel-blade-variants

[![Latest Version on Packagist](https://img.shields.io/packagist/v/theunwindfront/laravel-blade-variants.svg?style=flat-square)](https://packagist.org/packages/theunwindfront/laravel-blade-variants)
[![Total Downloads](https://img.shields.io/packagist/dt/theunwindfront/laravel-blade-variants.svg?style=flat-square)](https://packagist.org/packages/theunwindfront/laravel-blade-variants)
[![NPM Version](https://img.shields.io/npm/v/%40theunwindfront/laravel-blade-variants.svg?style=flat-square)](https://www.npmjs.com/package/@theunwindfront/laravel-blade-variants)
[![NPM Downloads](https://img.shields.io/npm/dm/%40theunwindfront/laravel-blade-variants.svg?style=flat-square)](https://www.npmjs.com/package/@theunwindfront/laravel-blade-variants)
[![License](https://img.shields.io/packagist/l/theunwindfront/laravel-blade-variants.svg?style=flat-square)](https://packagist.org/packages/theunwindfront/laravel-blade-variants)

A CSS-native, browser-driven Tailwind CSS v4 plugin to manage variants, sizes, and states for Laravel Blade components with **zero server-side rendering overhead**.

---

## The Problem
Normally, implementing component variants in Laravel Blade involves complex conditional PHP arrays or calling tools like `tailwind-merge` at runtime to prevent style conflicts:
```html
<button {{ $attributes->class([
    'px-4 py-2 rounded',
    'bg-blue-600 hover:bg-blue-700' => $variant === 'primary',
    'bg-gray-100 text-gray-900' => $variant === 'secondary',
]) }}>
```
This is hard to maintain, and merging classes via regex on the server slows down page render times.

## The Solution
This plugin moves state-based styling to **native browser attribute matching**. Instead of conditionally outputting classes in PHP, you assign standard attributes (like `data-variant`, `data-size`, `data-state`) and apply clean Tailwind modifiers directly in your HTML:
```html
<button data-variant="{{ $variant }}" class="variant-primary:bg-blue-600 variant-secondary:bg-gray-100">
```
The browser automatically activates styles based on DOM attributes. This **completely eliminates class conflicts** (only one state attribute matches at a time!) and requires **zero PHP parsing overhead** to merge strings.

---

## Installation

Install the package via Composer (for Blade component integration) and NPM (for the Tailwind CSS plugin):

```bash
composer require theunwindfront/laravel-blade-variants
npm install @theunwindfront/laravel-blade-variants
```

Add the plugin to your main stylesheet (Tailwind CSS v4):
```css
@import "tailwindcss";
@plugin "@theunwindfront/laravel-blade-variants";
```

For Tailwind v3, import it in `tailwind.config.js`:
```javascript
module.exports = {
  plugins: [
    require('@theunwindfront/laravel-blade-variants'),
  ],
}
```

---

## Usage Guide

### 1. In Your Blade Component (`components/button.blade.php`)
```html
@props([
    'variant' => 'primary',
    'size' => 'md',
    'state' => 'idle'
])

<button 
    data-variant="{{ $variant }}" 
    data-size="{{ $size }}"
    data-state="{{ $state }}"
    {{ $attributes->class([
        'inline-flex items-center rounded-lg font-semibold transition-all duration-200',
        
        // Variants
        'variant-primary:bg-blue-600 variant-primary:text-white',
        'variant-secondary:bg-slate-100 variant-secondary:text-slate-900',
        'variant-danger:bg-red-600 variant-danger:text-white',
        
        // Sizes
        'size-sm:px-3 size-sm:py-1.5 size-sm:text-xs',
        'size-md:px-4 size-md:py-2 size-md:text-sm',
        'size-lg:px-6 size-lg:py-3 size-lg:text-base',
        
        // States
        'state-loading:opacity-60 state-loading:cursor-not-allowed',
        'state-disabled:opacity-50 state-disabled:cursor-not-allowed'
    ]) }}
>
    <!-- Child elements can respond to parent state using group-* modifiers! -->
    <svg class="w-4 h-4 animate-spin hidden group-state-loading:block" ...></svg>
    
    {{ $slot }}
</button>
```

### 2. Available Modifiers

| Core Variant | Matches Attribute | Parent (Group) Modifier |
| :--- | :--- | :--- |
| `variant-{value}` | `[data-variant="{value}"]` | `group-variant-{value}` |
| `size-{value}` | `[data-size="{value}"]` | `group-size-{value}` |
| `state-{value}` | `[data-state="{value}"]` | `group-state-{value}` |
| `theme-{value}` | `[data-theme="{value}"]` | `group-theme-{value}` |

### 3. Presets & Custom Values
Out of the box, standard developer variants are pre-registered for IntelliSense autocomplete:
- **Variants**: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `ghost`, `link`, `outline`
- **Sizes**: `xs`, `sm`, `md`, `lg`, `xl`, `2xl`
- **States**: `active`, `inactive`, `open`, `closed`, `loading`, `disabled`, `checked`, `selected`, `expanded`
- **Themes**: `light`, `dark`, `system`

To use a custom state value not included in the presets, use Tailwind's arbitrary bracket syntax:
```html
<div data-variant="custom-glass" class="variant-[custom-glass]:bg-white/20">
```
This compiled selector resolves natively to `[data-variant="custom-glass"]`.

## 👥 Credits

- **[Sagar Pansuriya](https://github.com/theunwindfront)** - Lead Creator & Developer

## 🤝 Support

For questions or issues, contact **pansuriya.sagar94@gmail.com**

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
