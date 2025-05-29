<template>
  <div class="container">
    <!-- Encabezado con el logo y el título -->
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <!-- Logo que redirige al home -->
        <router-link to="/Home">
          <img src="/img/background/LOGO.png" alt="Logo" width="125" height="125" class="d-inline-block align-text-top" />
        </router-link>
      </div>
      <!-- Título centrado -->
      <ul class="nav col-12 justify-content-center mx-auto">
        <h1>Elegir Barbero</h1>
      </ul>
    </header>

    <!-- Contenido principal -->
    <div class="row">
      <!-- Columna principal que muestra la lista de barberos -->
      <div class="col-md-8">
        <h2>Barbero</h2>
        <div class="row">
          <!-- Itera sobre la lista de barberos y muestra una tarjeta por cada uno -->
          <div class="col-md-4 mb-3" v-for="barber in barbers" :key="barber.id">
            <div class="barber-card" :class="{ selected: selectedBarber && selectedBarber.id === barber.id }" @click="selectBarber(barber)">
              <!-- Imagen del barbero -->
              <img
                :src="getImageUrl(barber.image)"           
                :alt="barber.full_name"                    
                class="barber-img"
                @error="onImageError($event)"               
              />
              <h4>{{ barber.full_name }}</h4>               
              <!-- Botón para seleccionar barbero -->
              <button class="select-barber" title="Seleccionar barbero">+</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Columna lateral de resumen de selección -->
      <div class="col-md-4">
        <div class="custom-card p-4 bg-dark text-white rounded">
          <h3>Resumen de selección</h3>
          <!-- Información del barbero seleccionado -->
          <div v-if="selectedBarber">
            <p><strong>Barbero Seleccionado:</strong></p>
            <p>{{ selectedBarber.full_name }}</p>
          </div>
          <div v-else class="text-muted">Selecciona un barbero</div>

          <hr />

          <!-- Información de los servicios seleccionados -->
          <div v-if="selectedServices.length">
            <p><strong>Servicios Seleccionados:</strong></p>
            <div
              class="mb-2"
              v-for="service in selectedServices"
              :key="service.id_services">
              <p><strong></strong> {{ service.name_service }}</p>
              <p><strong>Precio:</strong> ${{ service.price }}</p>
              <p><span>Duración: {{ service.estimated_time }}</span></p>
              <hr />
            </div>
          </div>
          <div v-else class="text-muted">No hay servicios seleccionados.</div>

          <!-- Botones de acción -->
          <div class="mt-3 d-grid gap-2">
            <!-- Botón para eliminar selección actual -->
            <button class="btn btn-danger" @click="clearSelection">Eliminar selección</button>
            <!-- Botón para continuar al calendario, deshabilitado si no hay barbero -->
            <button class="btn btn-success" @click="goToCalendar" :disabled="!selectedBarber">Continuar</button>
            <!-- Botón para regresar a la vista anterior -->
            <button class="btn btn-secondary mt-2" @click="goBack">Regresar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import { getBarbers } from '@/services/api'; // Importa la función que obtiene la lista de barberos desde la API

export default {
  name: 'SeleccionarBarbero', // Nombre del componente

  data() {
    // Datos reactivos del componente
    return {
      barbers: [],            // Lista de barberos obtenida de la API
      selectedBarber: null,   // Barbero actualmente seleccionado
      selectedServices: [],   // Servicios seleccionados previamente
      userName: '',           // Nombre del usuario (obtenido del localStorage)
      userEmail: '',          // Email del usuario
      userId: ''              // ID del usuario
    };
  },

  mounted() {
    // Se ejecuta cuando el componente es montado en el DOM
    this.fetchBarbers();     // Llama a la función para obtener barberos desde la API
    this.loadLocalData();    // Carga los datos del usuario y servicios desde localStorage
  },

  methods: {
    // Método asíncrono para obtener la lista de barberos desde la API
    async fetchBarbers() {
      try {
        this.barbers = await getBarbers(); // Asigna la respuesta a la lista local
      } catch (error) {
        console.error('❌ Error al obtener barberos:', error); // Muestra error en consola
        alert('No se pudieron cargar los barberos.');           // Alerta para el usuario
      }
    },

    // Devuelve la URL completa de la imagen del barbero o una imagen predeterminada si no existe
    getImageUrl(image) {
      return image ? `/background/${image}` : '/img/background/BarberoPredeterminado.png';
    },

    // Maneja el error de carga de imagen y muestra una imagen por defecto
    onImageError(event) {
      if (!event.target.src.includes('default-barber.png')) {
        event.target.src = '/img/background/default-barber.png';
      }
    },

    // Asigna el barbero seleccionado al estado local
    selectBarber(barber) {
      this.selectedBarber = barber;
    },

    // Carga datos desde localStorage: servicios seleccionados, nombre, email e ID del usuario
    loadLocalData() {
      const storedService = localStorage.getItem('selectedService');
      const storedName = localStorage.getItem('userName');
      const storedEmail = localStorage.getItem('userEmail');
      const storedId = localStorage.getItem('userId');

      this.selectedServices = storedService ? JSON.parse(storedService) : [];
      this.userName = storedName || '';
      this.userEmail = storedEmail || '';
      this.userId = storedId || '';
    },

    // Limpia la selección de servicios y barbero
    clearSelection() {
      localStorage.removeItem('selectedService'); // Elimina servicios del localStorage
      this.selectedServices = [];                 // Limpia servicios en memoria
      this.selectedBarber = null;                 // Deselecciona barbero
    },

    // Navega a la vista del calendario si hay un barbero seleccionado
   goToCalendar() {
  if (!this.selectedBarber) {
    return alert('Por favor selecciona un barbero antes de continuar.');
  }

  // Guarda los datos del barbero
  localStorage.setItem('barberId', this.selectedBarber.user_id);
  localStorage.setItem('barberName', this.selectedBarber.full_name);

  // Guarda los datos del usuario autenticado
  localStorage.setItem('userName', this.userName);
  localStorage.setItem('userEmail', this.userEmail);
  localStorage.setItem('userId', this.userId);

  // Guarda los servicios seleccionados con el formato solicitado
  const simplifiedServices = this.selectedServices.map(service => ({
    id: service.id_services,
    name: service.name_service,
    description: service.description,
    price: service.price,
    duration: service.estimated_time
  }));
  localStorage.setItem('selectedServices', JSON.stringify(simplifiedServices));

  // Navega al calendario
  this.$router.push('/Calendario');
},


    // Regresa a la vista de selección de servicios
    goBack() {
      this.$router.push('/Servicios');
    },

    // Da formato a la duración en minutos (por ejemplo: 1 hora 30 minutos)
    formatDuration(minutes) {
      const validMinutes = parseInt(minutes, 10); // Convierte a número

      if (isNaN(validMinutes) || validMinutes <= 0) {
        return 'Duración no disponible'; // Si no es válido, muestra mensaje predeterminado
      }

      const hrs = Math.floor(validMinutes / 60); // Calcula horas
      const mins = validMinutes % 60;            // Calcula minutos restantes

      // Devuelve el string con formato según las horas y minutos
      if (hrs && mins) return `${hrs} hora${hrs > 1 ? 's' : ''} ${mins} minuto${mins > 1 ? 's' : ''}`;
      if (hrs) return `${hrs} hora${hrs > 1 ? 's' : ''}`;
      return `${mins} minuto${mins > 1 ? 's' : ''}`;
    }
  }
};
</script>


<style scoped>
@font-face {
  font-family: 'Amasis_MT_Std_Black';
  src: url('@/assets/fonts/Amasis_MT_Std_Black/Amasis_MT_Std_Black.ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}

body {
  background-color: black;
  color: white;
  font-family: Amasis_MT_Std_Black;
}

.custom-text-white {
  color: white !important;
}

.barber-name {
  color: #CCAF54;
}

.custom-card {
  background-color: #111;
  border: 5px solid #333;
  color: #fff;
  padding: 50px;
  border-radius: 5px;
  margin-top: 20px;
}

.barber-card {
  background-color: #111;
  border: 2px solid #CCAF54;
  color: #fff;
  padding: 15px;
  border-radius: 5px;
  margin: 10px 0;
  transition: 0.3s ease-in-out;
  height: 320px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  text-align: center;
}

.barber-card:hover {
  transform: scale(1.02);
  border-color: #CCAF54;
}

.barber-card img.barber-img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  margin: 0 auto;
}

.barber-card h4 {
  margin-top: 10px;
  color: #CCAF54;
}

.barber-card .select-barber {
  margin-top: 10px;
  background-color: #CCAF54;
  border: none;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  font-size: 18px;
  color: black;
  cursor: pointer;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
}

.barber-card .select-barber:hover {
  background-color: #D4AF37;
}

.selected {
  border: 3px solid #D4AF37;
  background-color: #1a1a1a;
}

.btn {
  font-weight: bold;
  padding: 10px 20px;
  border-radius: 5px;
}

.btn-danger {
  background-color: #8B0000;
  border: none;
}

.btn-danger:hover {
  background-color: #a10000;
}

.btn-success {
  background-color: #CCAF54;
  color: black;
  border: none;
}

.btn-success:hover {
  background-color: #D4AF37;
  color: black;
}

.btn-primary {
  background-color: #333;
  border: none;
}

.btn-primary:hover {
  background-color: #444;
}
</style>
