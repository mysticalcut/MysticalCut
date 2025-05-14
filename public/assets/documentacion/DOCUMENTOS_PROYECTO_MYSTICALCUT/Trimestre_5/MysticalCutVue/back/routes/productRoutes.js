const express = require('express');
const router = express.Router();
const productController = require('../controllers/productController');
const authenticateToken = require('../middlewares/authMiddleware');
const upload = require('../middlewares/upload'); // Multer para subir imágenes

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
 * /api/products/inactive:
 *   get:
 *     summary: Obtener productos inactivos
 *     tags: [Productos]
 *     security:
 *       - bearerAuth: []
 *     responses:
 *       200:
 *         description: Lista de productos inactivos
 */
router.get('/inactives', authenticateToken, productController.getInactiveProducts);

/**
 * @swagger
 * /api/products/create:
 *   post:
 *     summary: Registrar un nuevo producto con imagen
 *     tags: [Productos]
 *     security:
 *       - bearerAuth: []
 *     requestBody:
 *       required: true
 *       content:
 *         multipart/form-data:
 *           schema:
 *             type: object
 *             required:
 *               - name
 *               - price
 *               - amount
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
 *               image:
 *                 type: string
 *                 format: binary
 *     responses:
 *       201:
 *         description: Producto creado
 */
router.post('/create', authenticateToken, upload.single('image'), productController.createProduct);

/**
 * @swagger
 * /api/products/{id}:
 *   put:
 *     summary: Actualizar un producto (puede incluir imagen nueva)
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
 *         multipart/form-data:
 *           schema:
 *             type: object
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
 *               image:
 *                 type: string
 *                 format: binary
 *     responses:
 *       200:
 *         description: Producto actualizado
 */
router.put('/:id', authenticateToken, upload.single('image'), productController.updateProduct);

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
