<div class="flex flex-col lg:flex-row items-center gap-3 pb-20 overflow-scroll">
    <div class="relative px-10 py-14 bg-white w-[350px] h-[300px] rounded-lg shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" id="icon-quotes-left" viewBox="0 0 32 32" fill="currentColor"
            class="absolute top-6 left-6 text-gray-300 w-6 h-6">
            <path
                d="M7.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.357-0.056 0.724-0.086 1.097-0.086zM25.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.358-0.056 0.724-0.086 1.097-0.086z">
            </path>
        </svg>
        <div class="relative text-sm text-gray-700">I’m a digital nomad, so I move often. Having everything furnished with
            Wi-Fi
            included makes settling down in a new city stress-free.
            <svg xmlns="http://www.w3.org/2000/svg" id="icon-quotes-left" viewBox="0 0 32 32" fill="currentColor"
                class="rotate-180 absolute -bottom-6 right-0 text-gray-300 w-6 h-6">
                <path
                    d="M7.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.357-0.056 0.724-0.086 1.097-0.086zM25.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.358-0.056 0.724-0.086 1.097-0.086z">
                </path>
            </svg>
        </div>
        <div x-data="{ currentVal: 5 }" class="flex items-center gap-1 mt-4 mb-6">
            <label for="oneStar" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">one star</span>
                <input x-model="currentVal" id="oneStar" type="radio" class="sr-only" name="rating" value="1">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 0 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="twoStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">two stars</span>
                <input x-model="currentVal" id="twoStars" type="radio" class="sr-only" name="rating" value="2">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 1 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="threeStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">three stars</span>
                <input x-model="currentVal" id="threeStars" type="radio" class="sr-only" name="rating" value="3">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 2 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="fourStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">four stars</span>
                <input x-model="currentVal" id="fourStars" type="radio" class="sr-only" name="rating" value="4">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 3 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="fiveStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">five stars</span>
                <input x-model="currentVal" id="fiveStars" type="radio" class="sr-only" name="rating" value="5">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 4 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
        </div>
    
        <div class="text-xl font-semibold">Lucas Hernandez</div>
        <div class="tracking-widest text-md">Freelance Designer</div>
    </div>
    
    <div class="relative px-10 py-14 bg-white w-[350px] h-[300px] rounded-lg shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" id="icon-quotes-left" viewBox="0 0 32 32" fill="currentColor"
            class="absolute top-6 left-6 text-gray-300 w-6 h-6">
            <path
                d="M7.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.357-0.056 0.724-0.086 1.097-0.086zM25.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.358-0.056 0.724-0.086 1.097-0.086z">
            </path>
        </svg>
        <div class="relative text-sm text-gray-700">The flexible lease was a lifesaver. I only needed a room for six months
            while on internship, and it was all set up
            before I arrived. Customer service is good!
            <svg xmlns="http://www.w3.org/2000/svg" id="icon-quotes-left" viewBox="0 0 32 32" fill="currentColor"
                class="rotate-180 absolute -bottom-6 right-0 text-gray-300 w-6 h-6">
                <path
                    d="M7.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.357-0.056 0.724-0.086 1.097-0.086zM25.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.358-0.056 0.724-0.086 1.097-0.086z">
                </path>
            </svg>
        </div>
        <div x-data="{ currentVal: 4 }" class="flex items-center gap-1 mt-4 mb-6">
            <label for="oneStar" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">one star</span>
                <input x-model="currentVal" id="oneStar" type="radio" class="sr-only" name="rating" value="1">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 0 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="twoStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">two stars</span>
                <input x-model="currentVal" id="twoStars" type="radio" class="sr-only" name="rating" value="2">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 1 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="threeStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">three stars</span>
                <input x-model="currentVal" id="threeStars" type="radio" class="sr-only" name="rating" value="3">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 2 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="fourStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">four stars</span>
                <input x-model="currentVal" id="fourStars" type="radio" class="sr-only" name="rating" value="4">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 3 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="fiveStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">five stars</span>
                <input x-model="currentVal" id="fiveStars" type="radio" class="sr-only" name="rating" value="5">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 4 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
        </div>
    
        <div class="text-xl font-semibold">Sophie Tan</div>
        <div class="tracking-widest text-md">Intern</div>
    </div>
    
    <div class="relative px-10 py-14 bg-white w-[350px] h-[300px] rounded-lg shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" id="icon-quotes-left" viewBox="0 0 32 32" fill="currentColor"
            class="absolute top-6 left-6 text-gray-300 w-6 h-6">
            <path
                d="M7.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.357-0.056 0.724-0.086 1.097-0.086zM25.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.358-0.056 0.724-0.086 1.097-0.086z">
            </path>
        </svg>
        <div class="relative text-sm text-gray-700">I moved to Singapore for work and didn’t know anyone. Living here
            made it easy to meet people and feel part of a
            community from day one.
            <svg xmlns="http://www.w3.org/2000/svg" id="icon-quotes-left" viewBox="0 0 32 32" fill="currentColor"
                class="rotate-180 absolute -bottom-6 right-0 text-gray-300 w-6 h-6">
                <path
                    d="M7.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.357-0.056 0.724-0.086 1.097-0.086zM25.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.358-0.056 0.724-0.086 1.097-0.086z">
                </path>
            </svg>
        </div>
        <div x-data="{ currentVal: 5 }" class="flex items-center gap-1 mt-4 mb-6">
            <label for="oneStar" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">one star</span>
                <input x-model="currentVal" id="oneStar" type="radio" class="sr-only" name="rating" value="1">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 0 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="twoStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">two stars</span>
                <input x-model="currentVal" id="twoStars" type="radio" class="sr-only" name="rating" value="2">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 1 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="threeStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">three stars</span>
                <input x-model="currentVal" id="threeStars" type="radio" class="sr-only" name="rating" value="3">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 2 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="fourStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">four stars</span>
                <input x-model="currentVal" id="fourStars" type="radio" class="sr-only" name="rating" value="4">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 3 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="fiveStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">five stars</span>
                <input x-model="currentVal" id="fiveStars" type="radio" class="sr-only" name="rating" value="5">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 4 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
        </div>
    
        <div class="text-xl font-semibold">Amir Rahman</div>
        <div class="tracking-widest text-md">Software Engineer</div>
    </div>
    
    <div class="relative px-10 py-14 bg-white w-[350px] h-[300px] rounded-lg shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" id="icon-quotes-left" viewBox="0 0 32 32" fill="currentColor"
            class="absolute top-6 left-6 text-gray-300 w-6 h-6">
            <path
                d="M7.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.357-0.056 0.724-0.086 1.097-0.086zM25.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.358-0.056 0.724-0.086 1.097-0.086z">
            </path>
        </svg>
        <div class="relative text-sm text-gray-700">I found my room in under a week. It’s close to my office and
            way more affordable than renting a whole apartment!
            <svg xmlns="http://www.w3.org/2000/svg" id="icon-quotes-left" viewBox="0 0 32 32" fill="currentColor"
                class="rotate-180 absolute -bottom-6 right-0 text-gray-300 w-6 h-6">
                <path
                    d="M7.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.357-0.056 0.724-0.086 1.097-0.086zM25.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.358-0.056 0.724-0.086 1.097-0.086z">
                </path>
            </svg>
        </div>
        <div x-data="{ currentVal: 5 }" class="flex items-center gap-1 mt-4 mb-6">
            <label for="oneStar" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">one star</span>
                <input x-model="currentVal" id="oneStar" type="radio" class="sr-only" name="rating" value="1">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 0 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="twoStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">two stars</span>
                <input x-model="currentVal" id="twoStars" type="radio" class="sr-only" name="rating" value="2">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 1 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="threeStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">three stars</span>
                <input x-model="currentVal" id="threeStars" type="radio" class="sr-only" name="rating" value="3">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 2 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="fourStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">four stars</span>
                <input x-model="currentVal" id="fourStars" type="radio" class="sr-only" name="rating" value="4">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 3 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
    
            <label for="fiveStars" class="transition hover:scale-125 has-focus:scale-125">
                <span class="sr-only">five stars</span>
                <input x-model="currentVal" id="fiveStars" type="radio" class="sr-only" name="rating" value="5">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5" x-bind:class="currentVal > 4 ? 'text-gold' : 'text-gray-300'">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                        clip-rule="evenodd">
                </svg>
            </label>
        </div>
    
        <div class="text-xl font-semibold">Mei Lin</div>
        <div class="tracking-widest text-md">IT Specialist</div>
    </div>
</div>
