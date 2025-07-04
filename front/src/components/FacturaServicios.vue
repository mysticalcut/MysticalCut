<template>
  <div class="factura-container">
    <div class="factura-content">
      <div class="factura-wrapper">
        <p class="mini-title">MysticalCut</p>
        <h1 class="resumen-title">Resumen Servicio</h1>
        <div class="factura-box">
          <h2 class="orden-title">Orden de Servicio</h2>

          <div class="fila-dato">
            <span class="etiqueta">Servicio Seleccionado:</span>
            <span class="valor">{{ servicioSeleccionado.name || servicioSeleccionado.name_service || 'No disponible' }}</span>
          </div>

          <div class="fila-dato">
            <span class="etiqueta">Barbero:</span>
            <span class="valor">{{ barberName || 'No disponible' }}</span>
          </div>

          <div class="fila-dato">
            <span class="etiqueta">Fecha:</span>
            <span class="valor">{{ formattedDate || 'No disponible' }}</span>
          </div>

          <div class="fila-dato">
            <span class="etiqueta">Hora:</span>
            <span class="valor">{{ formattedTime || 'No disponible' }}</span>
          </div>

          <div class="fila-dato">
            <span class="etiqueta">Correo del Cliente:</span>
            <span class="valor">{{ userEmail || 'No disponible' }}</span>
          </div>

          <div class="fila-dato total">
            <span class="etiqueta"><strong>Total:</strong></span>
            <span class="valor"><strong>${{ totalServicios }}</strong></span>
          </div>

          <button class="volver-btn" @click="verCitas">Ver Citas</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { sendQuoteEmail } from '@/services/quotesApi';

export default {
  name: 'FacturaServicios',
  data() {
    return {
      userId: null,
      barberId: null,
      barberName: '',
      date: '',
      time: '',
      servicioSeleccionado: {},
      userEmail: '',
      servicios: []
    };
  },
  computed: {
    totalServicios() {
      return this.servicioSeleccionado.price || 0;
    },
    formattedDate() {
      if (!this.date) return '';
      const [year, month, day] = this.date.split('-');
      return `${day}/${month}/${year}`;
    },
    formattedTime() {
      if (!this.time) return '';
      return this.time.replace(/(\d{2}):(\d{2})/, (match, hh, mm) => {
        const hours = parseInt(hh);
        const ampm = hours >= 12 ? 'p.m.' : 'a.m.';
        const hours12 = hours % 12 || 12;
        return `${hours12}:${mm} ${ampm}`;
      });
    }
  },
  mounted() {
    this.loadFacturaData();
  },
  methods: {
    loadFacturaData() {
      const facturaData = localStorage.getItem('facturaData');
      
      if (!facturaData) {
        console.error('No se encontraron datos de factura en localStorage');
        this.$router.push('/error-factura');
        return;
      }

      try {
        const data = JSON.parse(facturaData);
        console.log('Datos de factura cargados:', data);
        
        this.userId = data.user_id;
        this.barberId = data.barber_id;
        this.barberName = data.barber_name;
        this.date = data.date;
        this.time = data.time;
        this.servicios = data.servicios || [];
        
        // Obtener el primer servicio (asumiendo que solo hay uno)
        this.servicioSeleccionado = this.servicios[0] || {};

        // Obtener email del usuario
        const storedUser = localStorage.getItem('user');
        if (storedUser) {
          const user = JSON.parse(storedUser);
          this.userEmail = user.email || '';
        }

      } catch (error) {
        console.error('Error al procesar datos de factura:', error);
        this.$router.push('/error-factura');
      }
    },
    async enviarCorreo() {
      try {
        if (!this.userEmail) {
          console.warn('No se puede enviar correo: email no definido');
          return;
        }

        console.log('📤 Enviando correo a:', this.userEmail);
        const response = await sendQuoteEmail({
          email: this.userEmail,
          servicio: this.servicioSeleccionado.name || this.servicioSeleccionado.name_service,
          fecha: this.formattedDate,
          hora: this.formattedTime,
          barbero: this.barberName,
          total: this.totalServicios
        });

        if (response.message === 'Correo enviado exitosamente') {
          console.log('✅ Correo enviado correctamente');
          alert('Correo de confirmación enviado.');
        } else {
          alert('Error al enviar el correo.');
        }
      } catch (error) {
        console.error('❌ Error al enviar correo:', error);
        alert('Ocurrió un error al enviar el correo. Intenta nuevamente.');
      }
    },
    verCitas() {
      this.enviarCorreo().then(() => {
        // Limpiar datos de factura después de usarlos
        localStorage.removeItem('facturaData');
        this.$router.push('/citas');
      });
    }
  },
  
};
</script>

<style scoped>
@font-face {
  font-family: 'Amasis_MT_Std_Black';
  src: url('@/assets/fonts/Amasis_MT_Std_Black/Amasis_MT_Std_Black.ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}

.factura-container {
  background-color: #000;
  color: #fff;
  font-family: 'Amasis_MT_Std_Black', serif;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.factura-content {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 30px;
  width: 100%;
}

.factura-wrapper {
  background-color: #111;
  padding: 50px;
  border-radius: 20px;
  border: 1px solid #555;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.5);
  width: 95%;
  max-width: 650px;
}

.mini-title {
  color: #fff;
  font-size: 16px;
  text-align: center;
  margin-bottom: 5px;
  letter-spacing: 1px;
  font-weight: bold;
  opacity: 0.9;
}

.resumen-title {
  color: #fff;
  font-size: 36px;
  margin-bottom: 35px;
  text-align: center;
  font-weight: bold;
}

.factura-box {
  background-color: #1a1a1a;
  padding: 40px;
  border-radius: 16px;
  border: 1px solid #ccc;
  min-height: 600px;
}

.orden-title {
  text-align: center;
  font-size: 26px;
  color: #D4AF37;
  margin-bottom: 40px;
}

.fila-dato {
  display: flex;
  justify-content: space-between;
  margin: 20px 0;
  font-size: 20px;
  line-height: 1.8;
}

.etiqueta {
  color: #bbb;
  font-weight: 600;
}

.valor {
  color: #fff;
  font-weight: normal;
}

.total {
  margin-top: 50px;
  font-size: 22px;
  font-weight: bold;
  color: #D4AF37;
}

.volver-btn {
  margin-top: 40px;
  background-color: #D4AF37;
  color: #000;
  border: none;
  padding: 16px 26px;
  cursor: pointer;
  border-radius: 8px;
  font-weight: bold;
  width: 100%;
}

.correo-btn {
  margin-top: 30px;
  background-color: #444;
  color: #fff;
  border: none;
  padding: 12px 22px;
  cursor: pointer;
  border-radius: 8px;
  font-weight: bold;
  width: 100%;
  transition: background-color 0.2s;
}

.correo-btn:hover {
  background-color: #666;
}
</style>