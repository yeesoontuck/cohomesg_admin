<button @click="darkMode = !darkMode; localStorage.theme = darkMode ? 'dark' : 'light'"
    class="relative flex h-7 w-[3.25rem] items-center rounded-full border border-gray-200/70 dark:border-white/[0.07] hover:border-gray-200 dark:hover:border-white/10 p-1 cursor-pointer"
    aria-label="Toggle dark mode">
    <div class="z-10 flex w-full items-center justify-between px-1">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor"
            xmlns="http://www.w3.org/2000/svg" class="size-3 text-gray-600 dark:text-gray-600 fill-current">
            <g clip-path="url(#clip0_2880_7340)">
                <path d="M8 1.11133V2.00022" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                </path>
                <path d="M12.8711 3.12891L12.2427 3.75735" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M14.8889 8H14" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                </path>
                <path d="M12.8711 12.8711L12.2427 12.2427" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M8 14.8889V14" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                </path>
                <path d="M3.12891 12.8711L3.75735 12.2427" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M1.11133 8H2.00022" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                </path>
                <path d="M3.12891 3.12891L3.75735 3.75735" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path
                    d="M8.00043 11.7782C10.0868 11.7782 11.7782 10.0868 11.7782 8.00043C11.7782 5.91402 10.0868 4.22266 8.00043 4.22266C5.91402 4.22266 4.22266 5.91402 4.22266 8.00043C4.22266 10.0868 5.91402 11.7782 8.00043 11.7782Z"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
            <defs>
                <clipPath id="clip0_2880_7340">
                    <rect width="16" height="16" fill="white"></rect>
                </clipPath>
            </defs>
        </svg>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor"
            xmlns="http://www.w3.org/2000/svg" class="size-3 text-gray-300 dark:text-gray-300 fill-current">
            <g clip-path="url(#clip0_2880_7355)">
                <path
                    d="M11.5556 10.4445C8.48717 10.4445 6.00005 7.95743 6.00005 4.88899C6.00005 3.68721 6.38494 2.57877 7.03294 1.66943C4.04272 2.22766 1.77783 4.84721 1.77783 8.0001C1.77783 11.5592 4.66317 14.4445 8.22228 14.4445C11.2196 14.4445 13.7316 12.3948 14.4525 9.62321C13.6081 10.1414 12.6187 10.4445 11.5556 10.4445Z"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
            <defs>
                <clipPath id="clip0_2880_7355">
                    <rect width="16" height="16" fill="white"></rect>
                </clipPath>
            </defs>
        </svg>
    </div>
    <div
        class="absolute left-1 h-5 w-5 rounded-full bg-gray-100 dark:bg-white/[0.07] transition-transform duration-200 dark:translate-x-[1.40rem]">
    </div>
</button>