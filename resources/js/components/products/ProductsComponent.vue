	<template>
  <section>
      <div class="row">
      <product-card-component v-bind:product="product" v-for="product in products"> </product-card-component>
 </div>
  </section>

</template>


<script>
  export default {
    data(){
      return {
        name: 'Products Component v2',
        products: [],
        endpoint: "/ecommerce/public/products"
      }
    },
    created(){
      this.fetchProducts();
    },
    methods: {
      fetchProducts(){
        axios.get(this.endpoint).then((response)=>{
          console.log(response.data.data);
          this.products = response.data.data;
        });
      }
    }
  }
</script>
