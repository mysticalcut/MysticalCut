// back/controllers/ProductController.js

const ProductModel = require('../models/productModel');

class ProductController {

  // 🔹 Crear producto
  async createProduct(req, res) {
    try {
      const { name, price, description, amount, id_category } = req.body;
      const product = await ProductModel.createProduct({ name, price, description, amount, id_category });
      res.status(201).json({ message: 'Producto creado correctamente', product });
    } catch (error) {
      console.error('Error al crear producto:', error);
      res.status(500).json({ error: 'Error al crear el producto' });
    }
  }

  // 🔹 Obtener todos los productos
  async getProducts(req, res) {
    try {
      const products = await ProductModel.getAllProducts();
      res.json(products);
    } catch (error) {
      console.error('Error al obtener productos:', error);
      res.status(500).json({ error: 'Error al obtener los productos' });
    }
  }

  // 🔹 Obtener producto por ID
  async getProductById(req, res) {
    try {
      const { id } = req.params;
      const product = await ProductModel.getProductById(id);
      if (!product) {
        return res.status(404).json({ message: 'Producto no encontrado' });
      }
      res.json(product);
    } catch (error) {
      console.error('Error al obtener el producto:', error);
      res.status(500).json({ error: 'Error al obtener el producto' });
    }
  }

  // 🔹 Actualizar producto
  async updateProduct(req, res) {
    try {
      const { id } = req.params;
      const updatedProduct = await ProductModel.updateProduct(id, req.body);
      res.json({ message: 'Producto actualizado correctamente', updatedProduct });
    } catch (error) {
      console.error('Error al actualizar producto:', error);
      res.status(500).json({ error: 'Error al actualizar el producto' });
    }
  }

  // 🔹 Cambiar estado del producto (activo/inactivo)
  async updateProductStatus(req, res) {
    try {
      const { id } = req.params;
      const { id_status } = req.body;
      await ProductModel.updateProductStatus(id, id_status);
      res.json({ message: 'Estado del producto actualizado correctamente' });
    } catch (error) {
      console.error('Error al cambiar estado del producto:', error);
      res.status(500).json({ error: 'Error al cambiar el estado del producto' });
    }
  }

  // 🔹 Eliminar producto (cambia estado a inactivo)
  async deleteProduct(req, res) {
    try {
      const { id } = req.params;
      await ProductModel.updateProductStatus(id, 3); // 3 = Inactivo
      res.json({ message: 'Producto eliminado correctamente' });
    } catch (error) {
      console.error('Error al eliminar producto:', error);
      res.status(500).json({ error: 'Error al eliminar el producto' });
    }
  }

  // 🔹 Obtener productos inactivos
  async getInactiveProducts(req, res) {
    try {
      const products = await ProductModel.getProductsByStatus(3);
      res.json(products);
    } catch (error) {
      console.error('Error al obtener productos inactivos:', error);
      res.status(500).json({ error: 'Error al obtener los productos inactivos' });
    }
  }
}

module.exports = new ProductController();
