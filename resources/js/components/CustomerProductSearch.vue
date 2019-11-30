<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer</div>
                    <div class="card-body">
                        <div>
                            <form>
                                <div class="form-group">
                                    <label for="customerProductSearch">Search your product</label>
                                    <input id="customerProductSearch" v-model="tableData.search" @input="getData()"
                                           class="form-control form-control-lg" type="text"
                                           placeholder="Enter your code...">
                                </div>
                            </form>
                        </div>
                        <div class="row justify-content-center" v-if="is_loading">
                            <i class="fas fa-spinner fa-2x fa-spin text-warning"></i>
                        </div>
                        <div class="row justify-content-center" v-else>
                            <div v-if="warrantyProducts.length == 0 || warrantyProducts.length == 15">
                                <span v-show="tableData.draw != 0">No product found!!</span>
                            </div>
                            <table class="table table-bordered text-center table-responsive-md" v-else>
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Warranty Start Date</th>
                                    <th scope="col">Warranty End Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(warrantyProduct, index) in warrantyProducts" :key="index">
                                    <th>{{index+1}}</th>
                                    <th>{{warrantyProduct.product.product_name}}</th>
                                    <th>{{warrantyProduct.warranty_start_date}}</th>
                                    <th>{{warrantyProduct.warranty_end_date}}</th>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "CustomerProductSearch",
        data() {
            return {
                warrantyProducts: [],
                is_loading: false,
                tableData: {
                    draw: 0,
                    search: '',
                },
            }
        },
        methods: {
            getData(url = '/warranty-products') {
                this.tableData.draw++;
                this.is_loading = true;
                axios.get(url, {params: this.tableData})
                    .then(response => {
                        this.is_loading = false;
                        let data = response.data;
                        if (this.tableData.draw == data.draw) {
                            this.warrantyProducts = data.data.data;
                        }
                    })
                    .catch(errors => {
                        console.log(errors);
                    });

            },
        }
    }
</script>

<style scoped>

</style>
