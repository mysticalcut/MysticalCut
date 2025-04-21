<template>
  <div class="container text-white">
    <!-- Encabezado -->
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
  <router-link to="/Home">
    <img src="/img/background/LOGO.png" alt="Logo" width="125" height="125" class="d-inline-block align-text-top" />
  </router-link>
</div>

      <ul class="nav col-12 justify-content-center mx-auto">
        <h1>Citas</h1>
      </ul>
    </header>

    <!-- Tabla de citas -->
    <div class="table-responsive">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>N°</th>
            <th>Fecha</th>
            <th>Servicio</th>
            <th>Valor</th>
            <th>Estado</th>
            <th v-if="userRole === 'Employee'">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(cita, index) in citas" :key="cita.id_quotes">
            <td>{{ index + 1 }}</td>
            <td>{{ formatDate(cita.date_time) }}</td>
            <td>{{ cita.name_service || 'Servicio no disponible' }}</td>
            <td>${{ cita.price ? cita.price.toLocaleString('es-CO') : 'N/A' }}</td>
            <td>{{ cita.state_quotes }}</td>
            <td v-if="userRole === 'Employee'">
              <div class="d-flex gap-2">
                <button
                  v-if="cita.state_quotes === 'pendiente'"
                  class="btn btn-sm btn-danger"
                  @click="cancelarCita(cita.id_quotes)"
                >
                  Cancelar
                </button>
                <button
                  v-if="cita.state_quotes === 'pendiente'"
                  class="btn btn-sm btn-success"
                  @click="finalizarCita(cita.id_quotes)"
                >
                  Finalizar
                </button>
                <span v-else class="text-success fw-bold">✔ Terminado</span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Botón regresar -->
    <div class="text-center my-4">
      <button class="btn btn-secondary" @click="$router.push('/Home')">Regresar</button>
    </div>

    <!-- Footer -->
    <footer class="py-3 my-4">
      <p class="text-center text-white">© 2024 www.mysticalcut.com, Inc</p>
    </footer>
  </div>
</template>

<script>
import axios from 'axios';
import { getQuotesWithServiceDetails, cancelQuote, finishQuote } from '@/services/quotesApi';

export default {
  name: 'CitasPendientes',
  data() {
    return {
      citas: [],
      userId: null,
      userRole: null,
    };
  },
  methods: {
    async cargarCitas() {
      try {
        const token = localStorage.getItem('token');
        if (!token) {
          alert("No se ha iniciado sesión.");
          this.$router.push('/');
          return;
        }

        const { data: userData } = await axios.get('http://localhost:5000/api/users/profile', {
          headers: {
            Authorization: `Bearer ${token}`
          }
        });

        this.userId = userData.user_id;
        this.userRole = userData.role;
        console.log("🧑‍💼 Usuario autenticado:", userData);
        console.log("📋 Rol del usuario:", this.userRole);

        const citasData = await getQuotesWithServiceDetails(this.userId);
        this.citas = citasData;
      } catch (error) {
        console.error('❌ Error al cargar citas:', error);
        alert("No se pudieron cargar las citas. Verifica tu conexión.");
      }
    },
    formatDate(dateString) {
      if (!dateString) return 'Fecha no disponible';
      const options = { day: '2-digit', month: '2-digit', year: 'numeric' };
      return new Date(dateString).toLocaleDateString('es-CO', options);
    },
    async cancelarCita(id) {
      try {
        await cancelQuote(id);
        this.cargarCitas();
        alert('Cita cancelada con éxito');
      } catch (error) {
        console.error('❌ Error al cancelar la cita:', error);
        alert('No se pudo cancelar la cita. Intenta nuevamente.');
      }
    },
    async finalizarCita(id) {
      try {
        await finishQuote(id);
        this.cargarCitas();
        alert('Cita finalizada con éxito');
      } catch (error) {
        console.error('❌ Error al finalizar la cita:', error);
        alert('No se pudo finalizar la cita. Intenta nuevamente.');
      }
    }
  },
  mounted() {
    this.cargarCitas();
  }
};
</script>

<style scoped>
.table {
  margin-top: 30px;
}
footer {
  border-top: 1px solid #fff;
}
</style>
