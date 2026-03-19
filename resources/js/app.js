import './bootstrap';
import 'flowbite';

import Swiper from 'swiper';
import { Autoplay, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

Swiper.use([Autoplay, Pagination]);
window.Swiper = Swiper;

// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();
