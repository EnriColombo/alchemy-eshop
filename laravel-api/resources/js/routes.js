import Home from './views/Home'
import Product from "./views/Product";
import Cart from "./views/Cart";
import Checkout from "./views/Checkout";
import Dashboard from "./views/Dashboard";
import ManageProducts from "./components/dashboard/ManageProducts";

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
                axios.get('/api/authenticated').then(()=>{
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
                axios.get('/api/authenticated').then(()=>{
                    next()
                }).catch(()=>{
                    // Redirect to Laravel' route 'login'
                    window.location.href = 'login';
                })
            }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            beforeEnter: (to, from, next) => {
                axios.get('/api/authenticated/isadmin').then(()=>{
                    next()
                }).catch(()=>{
                    // Redirect to Laravel' route 'login'
                    window.location.href = 'login';
                })
            }
        },
    ]
}
