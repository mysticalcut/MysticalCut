const express = require('express');
const router = express.Router();
const productController = require('../controllers/productController');
const authenticateToken = require('../middlewares/authMiddleware');

/**
 * @swagger
 * tags:
 *   name: Productos
 *   description: Endpoints para la gestión de productos
 */

/**
 * @swagger
 * /api/products:
 *   get:
 *     summary: Obtener todos los productos
 *     tags: [Productos]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de productos
 */
router.get('/', authenticateToken, productController.getProducts);

/**
 * @swagger
 * /api/products/{id}:
 *   get:
 *     summary: Obtener un producto por ID
 *     tags: [Productos]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - name: id
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Producto obtenido
 */
router.get('/:id', authenticateToken, productController.getProductById);

/**
 * @swagger
 * /api/products:
 *   post:
 *     summary: Registrar un nuevo producto
 *     tags: [Productos]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             required:
 *               - name
 *               - price
 *               - stock
 *             properties:
 *               name:
 *                 type: string
 *               description:
 *                 type: string
 *               price:
 *                 type: number
 *               amount:
 *                 type: integer
 *               id_category:
 *                 type: integer
 *               id_status:
 *                 type: integer
 *     responses:
 *       201:
 *         description: Producto creado
 */
router.post('/create', authenticateToken, productController.createProduct);

/**
 * @swagger
 * /api/products/{id}:
 *   put:
 *     summary: Actualizar un producto
 *     tags: [Productos]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - name: id
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *     requestBody:
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *     responses:
 *       200:
 *         description: Producto actualizado
 */
router.put('/:id', authenticateToken, productController.updateProduct);

/**
 * @swagger
 * /api/products/status/{id}:
 *   put:
 *     summary: Cambiar estado de un producto
 *     tags: [Productos]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - name: id
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Estado del producto actualizado
 */
router.put('/status/:id', authenticateToken, productController.updateProductStatus);

/**
 * @swagger
 * /api/products/{id}:
 *   delete:
 *     summary: Eliminar producto (lógica suave)
 *     tags: [Productos]
 *     security:
 *       - bearerAuth: []
 *     parameters:
 *       - name: id
 *         in: path
 *         required: true
 *         schema:
 *           type: integer
 *     responses:
 *       200:
 *         description: Producto marcado como eliminado
 */
router.delete('/:id', authenticateToken, productController.deleteProduct);

module.exports = router;
