import Home from './views/Home'
import Product from "./views/Product";

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
    ]
}
