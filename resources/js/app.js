require('./bootstrap');

// Se crean los elementos de Vue

import { createApp, defineAsyncComponent } from 'vue';
import { Quasar } from 'quasar'
import router from './routers/welcomeRouter.js';
import vueRecaptcha from 'vue3-recaptcha2';

// se importan los componentes

import WelcomeLayout from './components/welcome/WelcomeLayout.vue'

//Se crea la app y se anexan los componentes y plugins

createApp({
    components : {
        // app
        'welcome-layout': WelcomeLayout,
    },
})  
    .component('recaptcha', vueRecaptcha)
    .use(router)
    .use(Quasar, {
        config: {
          brand: {
            primary: '#003e7d',
            secondary: '#26A69A',
            accent: '#9C27B0',
      
            dark: '#1d1d1d',
      
            positive: '#21BA45',
            negative: '#C10015',
            info: '#31CCEC',
            warning: '#F2C037'
          }
        }
      })
    .mount("#welcome")
