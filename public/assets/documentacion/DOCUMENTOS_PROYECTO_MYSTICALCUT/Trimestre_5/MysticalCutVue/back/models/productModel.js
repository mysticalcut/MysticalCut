const db = require('../config/db');  // Asegúrate de que db esté correctamente configurado

// 🔹 Crear producto
exports.createProduct = (productData) => {
    const { name, price, description, amount, id_category } = productData;
    const query = 'INSERT INTO product (name, price, description, amount, id_category) VALUES (?, ?, ?, ?, ?)';
    return new Promise((resolve, reject) => {
        db.query(query, [name, price,  description, amount, id_category], (err, result) => {
            if (err) return reject(err);
            resolve({ id: result.insertId, name, price, description, amount, id_category });
        });
    });
};

// 🔹 Obtener todos los productos
exports.getAllProducts = () => {
    const query = 'SELECT * FROM product WHERE id_status != 3'; // Solo productos activos y bloqueados
    return new Promise((resolve, reject) => {
        db.query(query, (err, results) => {
            if (err) return reject(err);
            resolve(results);
        });
    });
};

// 🔹 Obtener producto por ID
exports.getProductById = (id) => {
    const query = 'SELECT * FROM product WHERE id_product = ?';
    return new Promise((resolve, reject) => {
        db.query(query, [id], (err, results) => {
            if (err) return reject(err);
            if (results.length === 0) return reject(new Error('Producto no encontrado'));
            resolve(results[0]);
        });
    });
};

// 🔹 Actualizar producto
exports.updateProduct = (id, productData) => {
    const { name, price, description, amount, id_category } = productData;
    const updateQuery = `
        UPDATE product 
        SET name = ?, price = ?, description = ?, amount = ?, id_category = ?
        WHERE id_product = ?
    `;
    return new Promise((resolve, reject) => {
        db.query(updateQuery, [name, price, description, amount, id_category, id], (err, result) => {
            if (err) return reject(err);
            if (result.affectedRows === 0) return reject(new Error('Producto no encontrado'));
            resolve({ id, name, price, description, amount, id_category });
        });
    });
};

// 🔹 Actualizar estado del producto
exports.updateProductStatus = (id, id_status) => {
    const query = 'UPDATE product SET id_status = ? WHERE id_product = ?';
    return new Promise((resolve, reject) => {
        db.query(query, [id_status, id], (err, result) => {
            if (err) return reject(err);
            if (result.affectedRows === 0) return reject(new Error('Producto no encontrado'));
            resolve(result);
        });
    });
};

// 🔹 Obtener productos por estado
exports.getProductsByStatus = (id_status) => {
    const query = 'SELECT * FROM product WHERE id_status = ?';
    return new Promise((resolve, reject) => {
        db.query(query, [id_status], (err, results) => {
            if (err) return reject(err);
            resolve(results);
        });
    });
};
