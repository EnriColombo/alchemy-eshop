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
            path: '/cart',
            name: 'cart',
            component: Cart,
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
            component: Checkout,
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
