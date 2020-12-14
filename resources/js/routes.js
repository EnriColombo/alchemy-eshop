import Home from './views/Home'
import Product from "./views/Product";
import Cart from "./views/Cart";
import Checkout from "./views/Checkout";
import Dashboard from "./views/Dashboard";
import DashboardHome from "./components/dashboard/DashboardHome";
import ManageProducts from "./components/dashboard/ManageProducts";
import ProductCreate from "./components/dashboard/ProductCreate";
import ProductEdit from "./components/dashboard/ProductEdit";
import ManageCategories from "./components/dashboard/ManageCategories";
import CategoryCreate from "./components/dashboard/CategoryCreate";
import CategoryEdit from "./components/dashboard/CategoryEdit";
import ManageCustomers from "./components/dashboard/ManageCustomers";
import CustomerDetails from "./components/dashboard/CustomerDetails";
import ManagePurchases from "./components/dashboard/ManagePurchases";
import PurchaseDetails from "./components/dashboard/PurchaseDetails";

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
                    window.location.href = '/login';
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
                    window.location.href = '/login';
                })
            }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            children: [
                {
                    path: '',
                    component: DashboardHome
                },
                {
                    path: 'products',
                    component: ManageProducts,
                },
                {
                    path: 'products/new',
                    component: ProductCreate
                },
                {
                    path: 'products/:product',
                    name: 'ProductEdit',
                    component: ProductEdit,
                    props: true
                },
                {
                    path: 'categories',
                    component: ManageCategories
                },
                {
                    path: 'categories/new',
                    component: CategoryCreate
                },
                {
                    path: 'categories/:category',
                    name: 'CategoryEdit',
                    component: CategoryEdit,
                    props: true
                },
                {
                    path: 'customers',
                    component: ManageCustomers
                },
                {
                    path: 'customers/:customer',
                    name: 'CustomerDetails',
                    component: CustomerDetails,
                    props: true
                },
                {
                    path: 'purchases',
                    component: ManagePurchases
                },
                {
                    path: 'purchases/:purchase',
                    name: 'PurchaseDetails',
                    component: PurchaseDetails,
                    props: true
                },
            ],
            beforeEnter: (to, from, next) => {
                axios.get('/api/authenticated/isadmin').then(()=>{
                    next()
                }).catch(()=>{
                    // Redirect to Laravel' route 'login'
                    window.location.href = '/login';
                })
            }
        },
    ]
}
