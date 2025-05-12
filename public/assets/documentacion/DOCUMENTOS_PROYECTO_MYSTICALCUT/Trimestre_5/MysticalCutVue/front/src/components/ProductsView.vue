<template>
  <div class="container">
    <HeaderComponent />

    <h1 class="title">Productos</h1>

    <div class="actions">
      <button class="btn-add" @click="goToRegister">
        <i class="fas fa-pen"></i> Agregar
      </button>
      <button class="btn-delete" @click="toggleDeleteMode">
        Eliminar <i class="fas fa-times-circle"></i>
      </button>
    </div>

    <div class="product-grid">
      <div
        class="product-card"
        v-for="product in products"
        :key="product.id_product"
      >
        <img :src="product.image" alt="Imagen del producto" class="product-img" />

        <h2 class="product-name">{{ product.name }}</h2>
        <p class="product-description">{{ product.description }}</p>
        <p class="product-price">${{ product.price.toLocaleString() }}</p>

        <div class="card-actions">
          <button class="btn-edit" @click="editProduct(product.id_product)">Editar</button>

          <label class="switch">
            <input
              type="checkbox"
              :checked="product.id_status === 1"
              @change="toggleStatus(product)"
              :disabled="deleteMode"
            />
            <span class="slider round"></span>
          </label>

          <input
            type="checkbox"
            v-if="deleteMode"
            v-model="selectedProducts"
            :value="product.id_product"
          />
        </div>
      </div>
    </div>

    <FooterComponent />
  </div>
</template>

<script>
import HeaderComponent from "./HeaderComponent.vue";
import FooterComponent from "./FooterComponent.vue";
import {
  getProducts,
  updateProductStatus,
  deleteProduct,
} from "../services/productsApi";

export default {
  name: "ProductView",
  components: {
    HeaderComponent,
    FooterComponent,
  },
  data() {
    return {
      products: [],
      deleteMode: false,
      selectedProducts: [],
    };
  },
  mounted() {
    this.loadProducts();
  },
  methods: {
    async loadProducts() {
      this.products = await getProducts();
    },
    async toggleStatus(product) {
      const newStatus = product.id_status === 1 ? 2 : 1;
      await updateProductStatus(product.id_product, newStatus);
      this.loadProducts();
    },
    toggleDeleteMode() {
      this.deleteMode = !this.deleteMode;
      this.selectedProducts = [];
    },
    async deleteSelected() {
      for (const id of this.selectedProducts) {
        await deleteProduct(id);
      }
      this.loadProducts();
      this.deleteMode = false;
    },
    goToRegister() {
      this.$router.push("/register-product");
    },
    editProduct(id) {
      this.$router.push(`/edit-product/${id}`);
    },
  },
};
</script>

<style scoped>
.product-container {
  background-color: #000;
  color: #fff;
  min-height: 100vh;
  padding: 1rem;
}

.title {
  text-align: center;
  color: #d4af37;
  font-weight: bold;
  font-size: 2.5rem;
  margin: 1rem 0;
}

.actions {
  display: flex;
  justify-content: space-between;
  margin: 1rem 2rem;
}

.btn-add,
.btn-delete,
.btn-edit {
  background-color: #d4af37;
  color: black;
  border: none;
  padding: 0.6rem 1.2rem;
  border-radius: 10px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s ease;
}

.btn-delete {
  background-color: #d9534f;
  color: white;
}

.btn-add:hover,
.btn-edit:hover {
  background-color: #b28f2f;
}

.btn-delete:hover {
  background-color: #c9302c;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 1rem;
  margin: 1rem 2rem;
}

.product-card {
  background-color: #1c1c1c;
  border-radius: 10px;
  padding: 1rem;
  text-align: center;
  border: 1px solid #333;
}

.product-img {
  width: 100%;
  height: 160px;
  object-fit: contain;
  margin-bottom: 0.5rem;
}

.product-name {
  font-size: 1.2rem;
  font-weight: bold;
  color: #d4af37;
}

.product-description {
  font-size: 0.95rem;
  color: #ccc;
  margin: 0.4rem 0;
}

.product-price {
  font-size: 1rem;
  font-weight: bold;
  color: white;
  margin-bottom: 0.8rem;
}

.card-actions {
  display: flex;
  justify-content: space-around;
  align-items: center;
}

.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  background-color: #ccc;
  border-radius: 20px;
  transition: 0.4s;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}

.slider:before {
  position: absolute;
  content: "";
  height: 14px;
  width: 14px;
  border-radius: 50%;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: #4caf50;
}

input:checked + .slider:before {
  transform: translateX(20px);
}

.slider.round {
  border-radius: 20px;
}
</style>
