import Home from './views/Home'
import Product from "./views/Product";
import Cart from "./views/Cart";
import Checkout from "./views/Checkout";

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/products/:id',
            component: Product,
            props: true
        },
        {
            path: '/cart', // TODO da parametrizzare in base all'utente e visualizzare solo se autenticato
            component: Cart,
            props: true
        },
        {
            path: '/checkout',
            component: Checkout, // TODO da parametrizzare in base all'utente e visualizzare solo se autenticato
            props: true
        },
    ]
}
