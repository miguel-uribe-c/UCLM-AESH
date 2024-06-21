// app.js

// Importar dependencias
const express = require('express');
const mongoose = require('mongoose');
const path = require('path');

// Crear la aplicación de Express
const app = express();

// Conectar a MongoDB
mongoose.connect('mongodb://localhost/ventas_db', {
  useNewUrlParser: true,
  useUnifiedTopology: true
}).then(() => {
  console.log("Conectado a MongoDB");
}).catch(err => {
  console.error("Error al conectar a MongoDB", err);
});

// Configurar EJS como motor de plantillas
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

// Middleware para analizar el cuerpo de las solicitudes
app.use(express.urlencoded({ extended: true }));

// Importar las rutas
const userRoutes = require('./routes/users');
app.use('/users', userRoutes);

// Ruta principal
app.get('/', (req, res) => {
  res.send('Bienvenido a la aplicación de ventas');
});

// Iniciar el servidor
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Servidor ejecutándose en http://localhost:${PORT}`);
});

app.set('view engine', 'ejs');