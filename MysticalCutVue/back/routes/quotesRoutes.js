const express = require('express');
const router = express.Router();
const quotesController = require('../controllers/quotesController');
const authenticateToken = require('../middlewares/authMiddleware');

/**
 * @swagger
 * tags:
 *   name: Citas
 *   description: Endpoints para gestionar citas
 */

/**
 * @swagger
 * /api/quotes:
 *   post:
 *     summary: Crear una nueva cita
 *     tags: [Citas]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               user_id:
 *                 type: integer
 *               barber_id:
 *                 type: integer
 *               date_time:
 *                 type: string
 *                 format: date-time
 *               state_quotes:
 *                 type: string
 *               id_services:
 *                 type: integer
 *     responses:
 *       201:
 *         description: Cita creada correctamente
 *       400:
 *         description: Faltan datos requeridos
 *       409:
 *         description: El barbero ya tiene una cita en ese horario
 */
router.post('/', authenticateToken, quotesController.createQuote);

/**
 * @swagger
 * /api/quotes/mes:
 *   get:
 *     summary: Obtener citas por barbero, año y mes
 *     tags: [Citas]
 *     parameters:
 *       - in: query
 *         name: barber_id
 *         schema:
 *           type: integer
 *         required: true
 *       - in: query
 *         name: year
 *         schema:
 *           type: integer
 *         required: true
 *       - in: query
 *         name: month
 *         schema:
 *           type: integer
 *         required: true
 *     responses:
 *       200:
 *         description: Lista de citas encontradas
 */
router.get('/mes', quotesController.getQuotesByBarberAndMonth);

/**
 * @swagger
 * /api/quotes/detalles:
 *   get:
 *     summary: Obtener citas con detalles de servicio (por usuario o barbero)
 *     tags: [Citas]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: query
 *         name: user_id
 *         schema:
 *           type: integer
 *       - in: query
 *         name: barber_id
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Lista de citas con detalles
 *       400:
 *         description: Falta el parámetro user_id o barber_id
 */
router.get('/detalles', authenticateToken, quotesController.getQuotesWithServiceDetails);

/**
 * @swagger
 * /api/quotes/cancel/{id}:
 *   put:
 *     summary: Cancelar una cita
 *     tags: [Citas]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Cita cancelada con éxito
 *       404:
 *         description: Cita no encontrada
 */
router.put('/cancel/:id', authenticateToken, quotesController.cancelQuote);

/**
 * @swagger
 * /api/quotes/finish/{id}:
 *   put:
 *     summary: Finalizar una cita
 *     tags: [Citas]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - in: path
 *         name: id
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Cita finalizada con éxito
 *       404:
 *         description: Cita no encontrada
 */
router.put('/finish/:id', authenticateToken, quotesController.finishQuote);

/**
 * @swagger
 * /api/quotes/quotes:
 *   get:
 *     summary: Obtener citas de un barbero por fecha
 *     tags: [Citas]
 *     parameters:
 *       - in: query
 *         name: barber_id
 *         schema:
 *           type: integer
 *         required: true
 *       - in: query
 *         name: date
 *         schema:
 *           type: string
 *           format: date
 *         required: true
 *     responses:
 *       200:
 *         description: Citas encontradas para esa fecha
 */
router.get('/quotes', quotesController.getQuotesByBarberAndDate);

/**
 * @swagger
 * /api/quotes/send-email:
 *   post:
 *     summary: Enviar correo de confirmación de cita
 *     tags: [Citas]
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               email:
 *                 type: string
 *               servicio:
 *                 type: string
 *               fecha:
 *                 type: string
 *               hora:
 *                 type: string
 *               total:
 *                 type: number
 *     responses:
 *       200:
 *         description: Correo enviado exitosamente
 *       400:
 *         description: Faltan datos del correo
 */
router.post('/send-email', quotesController.sendQuoteEmail);

module.exports = router;
