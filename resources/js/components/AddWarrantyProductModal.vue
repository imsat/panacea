<template>
    <div class="modal fade" id="add-warranty-product" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="row justify-content-center" v-if="is_loading">
                            <i class="fas fa-spinner fa-2x fa-spin text-warning"></i>
                        </div>

                        <div class="row" v-else>
                            <div class="col-12">
                                <form>
                                    <div class="form-group">
                                        <label for="category_id">Select Category</label>
                                        <select class="form-control" id="category_id" v-model="category_id">
                                            <option
                                            v-for="(category, index) in categories"
                                            :value="category.identifier"
                                            :key="index">
                                            {{category.name}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_id">Select Product</label>
                                        <select class="form-control" id="product_id" v-model="form.product_id" :disabled="!products.length> 0">
                                            <option
                                            v-for="(product, i) in products"
                                            :key="i"
                                            :value="product.identifier">
                                            {{product.name}}
                                            </option>
                                        </select>

                                        <span class="text-danger" v-if="errors.product_id">{{errors.product_id[0]}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="alphabetic_code">Enter a Unique Code</label>
                                        <input type="text" v-model="form.alphabetic_code" class="form-control" id="alphabetic_code">
                                        <span class="text-danger" v-if="errors.alphabetic_code">{{errors.alphabetic_code[0]}}</span>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-sm btn-primary" @click.prevent="addProduct()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import swal from 'sweetalert';
    export default {
        data(){
          return {
              categories: [],
              products: [],
              category_id: '',
              is_loading: false,
              errors:{},
              form: {
                  alphabetic_code:'',
                  product_id: '',
              },
          }
        },
        created() {
            this.getCategories('/categories');
        },
        mounted() {
            // for modal destroy event.
            // $('add-warranty-product').on("hidden.bs.modal", this.onHidden)
        },
        watch: {
            category_id() {
                this.getProducts();
            }
        },
        methods: {
            getCategories(route){
                this.is_loading = true;
                axios.get(route)
                .then(response => {
                    this.is_loading = false;
                    this.categories = response.data.data;
                })
                .catch(error => {
                    console.log(error)
                    this.is_loading = false;
                    })
            },
            getProducts(){
                this.is_loading = true;
                axios.get(`/categories-products/${this.category_id}`)
                    .then(response => {
                        this.is_loading = false;
                        this.products = response.data.data;
                    })
                    .catch(error => {
                        this.is_loading = false;
                        console.log(error)
                    })
            },
            addProduct(){
                this.is_loading = true;

                axios.post(`/warranty-products`, this.form)
                    .then(response => {
                        this.is_loading = false;
                        $("#add-warranty-product").modal('hide');
                        this.form = {};
                        this.category_id = '';
                        swal({title: "Successfully added product", icon: "success",timer: 3000});
                    })
                    .catch(error => {
                        this.is_loading = false;
                        console.log(error);
                        this.errors = error.response.data.errors
                    })
            }
        }
    }
</script>
