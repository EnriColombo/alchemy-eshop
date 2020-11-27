import Home from './views/Home'
import Product from "./views/Product";
import Cart from "./views/Cart";
import Checkout from "./views/Checkout";

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/products/:id',
            name: 'product',
            component: Product,
            props: true
        },
        {
            path: '/cart', // TODO da parametrizzare in base all'utente e visualizzare solo se autenticato
            name: 'cart',
            component: Cart,
            props: true,
            beforeEnter: (to, from, next) => {
                axios.get('/api/athenticated').then(()=>{
                    next()
                }).catch(()=>{
                    // Redirect to Laravel' route 'login'
                    window.location.href = 'login';
                })
            }
        },
        {
            path: '/checkout',
            name: 'checkout',
            component: Checkout, // TODO da parametrizzare in base all'utente e visualizzare solo se autenticato
            props: true,
            beforeEnter: (to, from, next) => {
                axios.get('/api/athenticated').then(()=>{
                    next()
                }).catch(()=>{
                    // Redirect to Laravel' route 'login'
                    window.location.href = 'login';
                })
            }
        },
    ]
}
