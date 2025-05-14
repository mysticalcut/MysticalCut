<template>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <router-link to="/Home">
          <img src="/img/background/LOGO.png" alt="Logo" width="125" height="125" class="d-inline-block align-text-top" />
        </router-link>
      </div>
      <ul class="nav col-12 justify-content-center mx-auto">
        <h1>Productos Inactivos</h1>
      </ul>
    </header>

    <div class="content">
      <div class="pedido-container">
        <div v-for="product in inactiveProducts" :key="product.id" class="pedido-box">
          <div class="service-info">
            <div class="info-row" v-if="product.image">
              <img :src="product.image" alt="Imagen del producto" class="product-image" />
            </div>
            <div class="info-row">
              <h5 class="info-title">Producto</h5>
              <p class="info-text">{{ product.name }}</p>
            </div>
            <div class="info-row">
              <h5 class="info-title">Descripción</h5>
              <p class="info-text">{{ product.description }}</p>
            </div>
            <div class="info-row">
              <h5 class="info-title">Precio</h5>
              <p class="info-text">\${{ parseFloat(product.price).toFixed(2) }}</p>
            </div>
          </div>
          <button class="activate-btn" @click="activateProductHandler(product)">Activar</button>
        </div>
      </div>
      <div class="text-center mt-4">
        <button class="btn back-button" @click="goBack">Regresar</button>
      </div>
    </div>

    <FooterComponent />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { getInactiveProducts, activateProduct } from '@/services/productsApi';
import FooterComponent from '@/components/FooterComponent.vue';
import '@/assets/css/style.css';
import '@/assets/css/usersInfo.css';

const router = useRouter();
const inactiveProducts = ref([]);

const loadInactiveProducts = async () => {
  try {
    inactiveProducts.value = await getInactiveProducts();
  } catch (error) {
    console.error("Error al obtener productos inactivos:", error);
  }
};

const activateProductHandler = async (product) => {
  const confirmActivation = confirm(`¿Estás seguro de que deseas activar el producto "${product.name}"?`);
  if (!confirmActivation) return;

  try {
    await activateProduct(product.id);
    inactiveProducts.value = inactiveProducts.value.filter(p => p.id !== product.id);
  } catch (error) {
    console.error("Error al activar el producto:", error);
  }
};

const goBack = () => {
  router.push('/Products');
};

onMounted(loadInactiveProducts);
</script>

<style scoped>
.activate-btn {
  background-color: #CCAF54;
  color: rgb(0, 0, 0);
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
.activate-btn:hover {
  background-color: #8a7432;
}
.pedido-box {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  flex-wrap: wrap;
}
.service-info {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}
.info-row {
  margin-bottom: 15px;
}
.info-title {
  color: #CCAF54;
  font-size: 1.25rem;
  font-weight: bold;
}
.info-text {
  font-size: 1rem;
  color: #ffffff;
}
.back-button {
  background-color: #444;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1rem;
}
.back-button:hover {
  background-color: #666;
}
.product-image {
  max-width: 150px;
  max-height: 150px;
  border-radius: 10px;
  margin-bottom: 10px;
}
</style>
