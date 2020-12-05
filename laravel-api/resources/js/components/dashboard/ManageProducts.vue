<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Prodotti</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Categoria</th>
                    <th>Prezzo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>dolor</td>
                    <td>199,99</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Modifica</button>
                        <button type="button" class="btn btn-danger btn-sm">Rimuovi</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>amet</td>
                    <td>consectetur</td>
                    <td>adipiscing</td>
                    <td>elit</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Modifica</button>
                        <button type="button" class="btn btn-danger btn-sm">Rimuovi</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Integer</td>
                    <td>nec</td>
                    <td>odio</td>
                    <td>Praesent</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Modifica</button>
                        <button type="button" class="btn btn-danger btn-sm">Rimuovi</button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>libero</td>
                    <td>Sed</td>
                    <td>cursus</td>
                    <td>ante</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Modifica</button>
                        <button type="button" class="btn btn-danger btn-sm">Rimuovi</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
</template>

<script>
export default {
    name: "Products"
}
</script>

<style scoped>

</style>
