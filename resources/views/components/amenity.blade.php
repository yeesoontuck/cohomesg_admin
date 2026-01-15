@props([
    'name',
    'label',
    'status' => false,
    'disabled' => false
])

<label for="{{ $label }}" class="inline-flex items-center gap-3">
    <input id="{{ $label }}" type="checkbox" name="{{ $name }}" class="peer sr-only" role="switch" @checked($status) {{ $disabled ? 'disabled':'' }} />
    <div class="relative h-6 w-11 after:h-5 after:w-5 peer-checked:after:translate-x-5 rounded-full border border-outline bg-surface-alt after:absolute after:bottom-0 after:left-[0.0625rem] after:top-0 after:my-auto after:rounded-full after:bg-on-surface after:transition-all after:content-[''] peer-checked:bg-success peer-checked:after:bg-on-primary peer-focus:outline-2 peer-focus:outline-offset-2 peer-focus:outline-outline-strong peer-focus:peer-checked:outline-primary peer-active:outline-offset-0 peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:border-outline-dark dark:bg-surface-dark-alt dark:after:bg-on-surface-dark dark:peer-checked:bg-success-dark dark:peer-checked:after:bg-on-primary-dark dark:peer-focus:outline-outline-dark-strong dark:peer-focus:peer-checked:outline-primary-dark"
        aria-hidden="true"></div>
    <span
        class="tracking-wide text-sm font-medium text-on-surface peer-checked:text-on-surface-strong peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-on-surface-dark dark:peer-checked:text-on-surface-dark-strong">
        {{ $label }}
    </span>
</label>
