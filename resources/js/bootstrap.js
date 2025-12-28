import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import mask from '@alpinejs/mask'
import focus from '@alpinejs/focus'
import sort from '@alpinejs/sort'
import './lightbox'
import ajax from '@imacrayon/alpine-ajax'

window.Alpine = Alpine

Alpine.plugin(collapse)
Alpine.plugin(mask)
Alpine.plugin(focus)
Alpine.plugin(sort)
Alpine.plugin(ajax)

Alpine.start()


import Quill from 'quill';
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
// import { Delta } from 'quill';
// import Link from 'quill/formats/link';

window.Quill = Quill;

// const options = {
// //   debug: 'info',
//   modules: {
//     toolbar: true,
//   },
//   placeholder: 'Compose an epic...',
//   theme: 'snow'
// };
// const quill = new Quill('#editor', options);
