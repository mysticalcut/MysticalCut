// back/controllers/ProductController.js

const ProductModel = require('../models/productModel');
const path = require('path');

class ProductController {
  // 🔹 Crear producto
  async createProduct(req, res) {
    try {
      const { name, price, description, amount, id_category } = req.body;
      const image = req.file ? req.file.filename : req.body.image || null;

      const product = await ProductModel.createProduct({
        name,
        price,
        description,
        amount,
        id_category,
        image
      });

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

  // 🔹 Obtener productos inactivos
  async getInactiveProducts(req, res) {
  try {
    const products = await ProductModel.getInactiveProducts();
    res.json(products);
  } catch (error) {
    console.error("Error al obtener productos inactivos:", error);
    res.status(500).json({ error: "Error al obtener productos inactivos" });
  }
}

async activateProduct(req, res) {
  try {
    const productId = req.params.id;
    await ProductModel.updateProductStatus(productId, 1); // 1 = Activo
    res.json({ message: 'Producto activado correctamente' });
  } catch (error) {
    console.error("Error al activar producto:", error);
    res.status(500).json({ error: "Error al activar producto" });
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

      const existingProduct = await ProductModel.getProductById(id);
      if (!existingProduct) {
        return res.status(404).json({ message: 'Producto no encontrado' });
      }

      const image = req.file ? req.file.filename : req.body.image;

      const updatedProduct = await ProductModel.updateProduct(id, {
        ...req.body,
        image
      });

      res.json({ message: 'Producto actualizado correctamente', updatedProduct });
    } catch (error) {
      console.error('Error al actualizar producto:', error);
      res.status(500).json({ error: 'Error al actualizar el producto' });
    }
  }

  // 🔹 Cambiar estado del producto (activo/bloqueado)
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

  

}

module.exports = new ProductController();
