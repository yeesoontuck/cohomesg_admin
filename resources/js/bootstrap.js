import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import mask from '@alpinejs/mask'
import focus from '@alpinejs/focus'
import './lightbox'

window.Alpine = Alpine

Alpine.plugin(collapse)
Alpine.plugin(mask)
Alpine.plugin(focus)

Alpine.start()