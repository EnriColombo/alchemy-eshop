<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body" v-if="user != null">
                        Welcome {{user.name}}!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data: function () {
            return {
                user: null
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('/api/user')
                .then((response) => {
                    console.log(response.data);
                    this.user = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
</script>
