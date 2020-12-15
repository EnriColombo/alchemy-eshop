## Descrizione
Progetto di esempio per un e-commerce.
### Backend
- laravel/framework
- laravel/ui
- laravel/passport
### Frontend
- VueJs
- Vue Router
- axios
- Bootstrap.css
- vuelidate
- vue-sweetalert2
- vue-chartkick (chart.js)
## Demo
Una demo di esempio è visibile qui: [alchemy-eshop.herokuapp.com](http://alchemy-eshop.herokuapp.com)
## Utente 'admin'
E' disponibile un utente per l'accesso alla dashboard di amministrazione con le seguenti credenziali:
- email: `admin@alchemy-eshop.test`
- password: `password`
## Installazione
- Clonare il repository con `git clone`
- Rinominare il file __.env.example__ in __.env__ e modificare le credenziali del database
- Eseguire `composer install`
- Eseguire `php artisan key:generate`
- Eseguire `php artisan migrate --seed` (popola il database con dati di esempio)
- Eseguire `php artisan passport:install`
- Eseguire `npm install`
- Eseguire `npm run dev`
- Lanciare l'URL http://alchemy-eshop.test
