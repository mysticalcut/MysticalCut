<template>
  <div class="container">
    <!-- Encabezado -->
    <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <router-link to="/Home">
          <img src="/img/background/LOGO.png" alt="Logo" width="125" height="125" />
        </router-link>
      </div>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li v-for="module in roleModules" :key="module.module_route" class="nav-item">
          <a class="nav-link" :href="`/${module.module_route}`">{{ module.role_module }}</a>
        </li>
      </ul>
      <div class="col-md-3 text-end">
        <div class="dropdown">
          <button class="btn dropdown-toggle" @click="toggleMenu">
            <img src="/img/background/Icono usuario.png" alt="Profile" class="icon me-2" />
            {{ user?.full_name || 'Usuario' }}
          </button>
          <ul v-if="isMenuOpen" class="dropdown-menu dropdown-menu-end show">
            <li><button class="dropdown-item" @click="goToProfile">Perfil</button></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><button class="dropdown-item" @click="logout">Cerrar Sesión</button></li>
          </ul>
        </div>
      </div>
      <ul class="nav col-12 justify-content-center mx-auto">
        <h1>Productos</h1>
      </ul>
    </header>

    <div class="d-flex justify-content-between my-3">
      <router-link to="/AgregarProducto" class="btn btn-agregar" @click="goToRegister">
        <img src="/img/logos/person-plus-fill.svg" style="width: 20px; height: 20px; margin-right: 5px;"> Agregar
      </router-link>

      <router-link to="/ProductsInactives" class="btn btn-botonavinactive">
        <button class="btn">Ver productos inactivos</button>
      </router-link>

    </div>


    <!-- Lista de productos -->

    <div class="product-grid">
      <div class="product-card" v-for="product in products" :key="product.id_product">
        <img :src="getImageUrl(product.image)" alt="Imagen del producto" class="product-img" />
        <h2 class="product-name">{{ product.name }}</h2>
        <p class="product-description">{{ product.description }}</p>
        <p class="product-price">${{ product.price.toLocaleString() }}</p>

        <!-- Controles del producto en orden vertical -->
        <div class="card-actions">
          <!-- Switch -->
          <label class="switch">
            <input type="checkbox" :checked="product.id_status === 1" @change="() => toggleSwitch(product)" />
            <span class="slider round"
              :class="{ blocked: product.id_status === 2, active: product.id_status === 1 }"></span>
          </label>

          <!-- Botones de editar y eliminar -->
          <button class="btn-edit" @click="() => editProduct(product.id_product)">Editar</button>
          <button class="btn-delete" @click="() => confirmInactivate(product.id_product)">Eliminar</button>

          <!-- Botones de agregar al carrito y comprar -->
          <button class="btn-cart" @click="() => addToCart(product)">Agregar al carrito</button>
          <button class="btn-buy" @click="() => buyNow(product)">Comprar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="btn-regresar mt-3">
    <button class="btn back-button" @click="goBack">Regresar</button>
  </div>
  <FooterComponent />

</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import FooterComponent from "./FooterComponent.vue";
import { getProducts, updateProductStatus } from "../services/productsApi";

const products = ref([]);
const router = useRouter();

const loadProducts = async () => {
  products.value = await getProducts();
};
const getImageUrl = (imageName) => {
  return `http://localhost:5000/uploads/products/${imageName}`;
};


const toggleSwitch = async (product) => {
  const currentStatus = product.id_status;
  const newStatus = currentStatus === 1 ? 2 : 1;
  const action = newStatus === 1 ? "activo" : "agotado";

  const confirmed = confirm(`¿Estás seguro que deseas poner este producto en estado ${action}?`);
  if (!confirmed) {
    await loadProducts();
    return;
  }

  await updateProductStatus(product.id_product, newStatus);
  await loadProducts();
};

const confirmInactivate = async (id_product) => {
  const confirmDelete = confirm("¿Estás seguro que deseas eliminar (inactivar) este producto?");
  if (!confirmDelete) return;

  await updateProductStatus(id_product, 3);
  await loadProducts();
};

const goToRegister = () => {
  router.push("/register-product");
};

const editProduct = (id) => {
  router.push(`/edit-product/${id}`);
};

const isMenuOpen = ref(false);
const user = JSON.parse(localStorage.getItem("user"));
const roleModules = JSON.parse(localStorage.getItem("roleModules")) || [];

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};

const logout = () => {
  localStorage.clear();
  router.push("/");
};

const goToProfile = () => {
  router.push("/perfil");
};

const addToCart = (product) => {
  alert(`Producto "${product.name}" agregado al carrito.`);
};

const buyNow = (product) => {
  alert(`Has iniciado el proceso de compra para "${product.name}".`);
};

const goBack = () => {
  router.push('/Home');
};

onMounted(() => {
  loadProducts();
});
</script>

<style scoped>
.container {
  background-color: #000;
  color: #fff;
  min-height: 100vh;
  padding: 1rem;
}

.actions {
  display: flex;
  justify-content: flex-start;
  margin: 1rem 2rem;
}

.d-flex {
  display: flex;
  justify-content: space-between;
  /* Distribuye los botones uno a la izquierda y otro a la derecha */
  width: 100%;
  /* Asegúrate de que el contenedor ocupe todo el ancho disponible */
}

.btn-botonavinactive {
  background-color: #d4af37;
  color: black;
  border: 1px solid;
  padding: 0.5rem 1.2rem;
  border-radius: 10px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s ease;
}

.btn-botonavinactive:hover {
  background-color: #b28f2f;
}

.btn-agregar {
  background-color: #d4af37;
  color: black;
  border: none;
  padding: 1rem 1.2rem;
  border-radius: 10px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s ease;
}

.btn-agregar:hover {
  background-color: #b28f2f;
}


.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1rem;
  margin: 1rem auto;
  padding: 0 1rem;
  max-width: 1200px;
}

.product-card {
  background-color: #1c1c1c;
  border-radius: 10px;
  padding: 1rem;
  border: 1px solid #333;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 560px;
  position: relative;
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
  flex-direction: column;
  gap: 0.5rem;
  margin-top: auto;
  padding-top: 1rem;
  border-top: 1px solid #333;
}

.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
  margin: 0 auto;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  background-color: #df0000;
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

input:checked+.slider {
  background-color: #4caf50;
}

input:checked+.slider.blocked {
  background-color: red !important;
}

input:checked+.slider:before {
  transform: translateX(20px);
}

.slider.round {
  border-radius: 20px;
}

.btn-edit,
.btn-delete {
  background-color: #d4af37;
  color: black;
  border: none;
  padding: 0.4rem 0.8rem;
  border-radius: 10px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s ease;
}

.btn-delete {
  background-color: #d9534f;
  color: white;
}

.btn-edit:hover {
  background-color: #b28f2f;
}

.btn-delete:hover {
  background-color: #a71d2a;
}

.product-purchase-actions {
  display: flex;
  justify-content: space-around;
  margin-top: 0.5rem;
}

.btn-cart,
.btn-buy {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 0.4rem 0.8rem;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s ease;
}

.btn-buy {
  background-color: #28a745;
}

.btn-cart:hover {
  background-color: #0056b3;
}

.btn-buy:hover {
  background-color: #218838;
}
</style>
