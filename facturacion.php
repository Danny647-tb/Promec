<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Promec.Jr S.A.S | Facturaciòn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="icon" href="img/Logo2.png" type="image/x-icon">
    <!-- ICONOS DE MENU -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- ESTILOS DEL MENU -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- ESTILOS DEL MENU -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        .container {
            width: 210mm; /* A4 width */
            padding: 10mm;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>

</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f4;
}
.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    border: 1px solid #ccc;
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.header, .info, .table-container, .total-container, .observations {
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 8px;
    background-color: #fafafa;
}
.header {
    text-align: center;
}
.header h1 {
    margin: 0;
    font-size: 24px;
    color: #333;
}
.header p {
    margin: 5px 0;
    font-size: 14px;
    color: #555;
}
.info {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.info .left, .info .right {
    width: 48%;
}
.info div, .total-container div {
    margin-bottom: 10px;
}
table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}
th {
    background-color: #f9f9f9;
    font-weight: bold;
}
.total {
    text-align: right;
    font-weight: bold;
}
input[type="text"], input[type="number"], textarea, input[type="datetime-local"] {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}
textarea {
    resize: vertical;
}
.table-container td input[type="text"] {
    font-size: 12px;
}
.table-container td input[type="number"] {
    font-size: 12px;
}
.observations input[type="text"] {
    font-size: 14px;
}
.add-row, .remove-row {
    margin: 10px 0;
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;
}
.remove-row {
    background-color: #dc3545;
}
.remove-row:disabled {
    background-color: #6c757d;
    cursor: not-allowed;
}

</style>
<body>

    <!-- INICIO DE MENU LATERAL -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="inicio.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary">Promec.Jr</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="img/Logo2.png" alt="" style="width: 40px; height: 40px;">
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Claudia Molano</h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="inicio.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Inicio</a>
                <a href="inventario.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Inventario</a>
                <a href="clientes.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Clientes</a>
                <a href="cotizacion.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Cotización</a>
                <a href="facturacion.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Facturación</a>
                <a href="produccion.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Producción</a>
                <a href="papelera.php" class="nav-item nav-link"><i class="fa fa-trash-alt me-2"></i>Archivados</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Configuración</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="signin.html" class="dropdown-item">Iniciar Sesión</a>
                        <a href="signup.html" class="dropdown-item">Registrarse</a>
                        <a href="blank.html" class="dropdown-item">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- FIN DE MENU LATERAL -->

    <div class="container">
        <!-- Contenido del formulario aquí -->
        <!-- (similar al contenido que ya tienes en tu formulario) -->
        <div class="header">
        <img src="img/Logo2.png" alt="Logo" class="logo">
        <h1>PROMEC JR SAS | FACTURACIÒN</h1>
        <p class="fixed-info">NIT: 901.089.449-4</p>
            <p class="fixed-info">Dirección: Calle 107 b # 49e - 19, Bogotá, Colombia</p>
            <p class="fixed-info">Tel: (031) 2184137</p>
            <p class="fixed-info">Email: promec.jr.sas@gmail.com</p>
            <br>
            <p class="fixed-info">RES.DIAN No. Número Autorización Electrónica 18764057850850 aprobado en 20231011 prefijo 
            <br>PM
            desde el número 237 al 500 Vigencia: 12 Meses
            </p>
        </div>

        <div class="info">
            <div class="left">
                <div><strong>Facturación Electrónica No.:</strong> <input type="text" id="quoteNumber" value="PM 313"></div>
                <div><strong>Fecha y hora de Facturación:</strong> <input type="datetime-local" id="quoteDate" value="2024-08-08T15:59"></div>
                <div><strong>Validez de la Facturación:</strong> <input type="datetime-local" id="validityDate" value="2024-08-09T15:59"></div>
            </div>
            <div class="right">
                <div><strong>Nombre del Cliente:</strong> <input type="text" id="clientName" value="MOLINO EL LOBO SA"></div>
                <div><strong>NIT & C.C.:</strong> <input type="text" id="clientNIT" value="860.440.006-5"></div>
                <div><strong>Fecha de Vencimiento:</strong> <input type="datetime-local" id="dueDate" value="2024-09-08T00:00"></div>
            </div>
        </div>

        <div class="info">
            <div class="left">
                <div><strong>Razón Social:</strong> <input type="text" id="socialReason" value="MOLINO EL LOBO SA"></div>
                <div><strong>Dirección:</strong> <input type="text" id="address" value="CL 16 16-88"></div>
                <br>
                <p class="fixed-info">CONDICIONES DE FACTURACIÓN <br>
                <br> La firma del comprador en este documento significa la aceptación de la mercancía y la obligación de pagar en los términos y condiciones estipuladas y su conformidad con el pacto de
                reserva de dominio que aquí se establece. Este documento se asimila en todos sus efectos a una letra de cambio según Art 774 del código de Comercio. Nuestra responsabilidad cesa al entregar la mercancía a los
                transportadores. Reclamos por roturas o saqueo deben hacerse al transportador.
                </p>
            </div>
            <div class="right">
                <div><strong>Vendedor:</strong> <input type="text" id="salesPerson" value="Claudia Molano"></div>
                <div><strong>Teléfono:</strong> <input type="text" id="phone" value="(031) 3362799"></div>
                <div><strong>Centro de Costo:</strong> <input type="text" id="costCenter" value="0"></div>
            </div>
        </div>

        <div class="table-container">
            <button class="add-row" onclick="addRow()">Agregar Producto</button>
            <button class="remove-row" id="removeRowBtn" onclick="removeRow()" disabled>Eliminar Producto</button>
            <table id="quoteTable">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Vr. Unitario</th>
                        <th>Impto. Cargo</th>
                        <th>Impto. Rete.</th>
                        <th>Vr. Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="number" class="itemNumber" value="1" readonly></td>
                        <td><input type="text" class="itemDescription" value="Solicitud de Facturación - Tratado de puertas de madera para mantenimiento y pintura"></td>
                        <td><input type="number" class="itemQuantity" value="2" oninput="calculateTotals()"></td>
                        <td><input type="number" class="itemUnitPrice" value="185000" oninput="calculateTotals()"></td>
                        <td><input type="text" class="itemVAT" value="19%" readonly></td>
                        <td><input type="text" class="itemRetentions" value="4%" readonly></td>
                        <td><input type="text" class="itemTotal" readonly></td>
                    </tr>
                    <tr>
                        <td><input type="number" class="itemNumber" value="2" readonly></td>
                        <td><input type="text" class="itemDescription" value="TRANSPORTE IDA Y VUELTA EL LARGO"></td>
                        <td><input type="number" class="itemQuantity" value="2" oninput="calculateTotals()"></td>
                        <td><input type="number" class="itemUnitPrice" value="100000" oninput="calculateTotals()"></td>
                        <td><input type="text" class="itemVAT" value="19%" readonly></td>
                        <td><input type="text" class="itemRetentions" value="4%" readonly></td>
                        <td><input type="text" class="itemTotal" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="total-container">
            <div class="total"><strong>Total Bruto:</strong> <input type="text" id="totalGross" readonly></div>
            <div class="total"><strong>Total IVA:</strong> <input type="text" id="totalIVA" readonly></div>
            <div class="total"><strong>Total Rete. Fuente:</strong> <input type="text" id="totalRetentions" readonly></div>
            <div class="total"><strong>Total Neto:</strong> <input type="text" id="totalNet" readonly></div>
        </div>

        <div class="observations">
            <div><strong>Valor en Letras:</strong> <input type="text" id="valueInWords"></div>
            <div><strong>Observaciones:</strong> <textarea id="observations" rows="4"></textarea></div>
        </div>
        <button id="downloadPDF">Descargar PDF</button>
    </div>

    <script>
        function addRow() {
            const table = document.getElementById('quoteTable').getElementsByTagName('tbody')[0];
            const rowCount = table.rows.length + 1;
            const row = table.insertRow();

            row.innerHTML = `
                <td><input type="number" class="itemNumber" value="${rowCount}" readonly></td>
                <td><input type="text" class="itemDescription"></td>
                <td><input type="number" class="itemQuantity" oninput="calculateTotals()"></td>
                <td><input type="number" class="itemUnitPrice" oninput="calculateTotals()"></td>
                <td><input type="text" class="itemVAT" value="19%" readonly></td>
                <td><input type="text" class="itemRetentions" value="4%" readonly></td>
                <td><input type="text" class="itemTotal" readonly></td>
            `;

            document.getElementById('removeRowBtn').disabled = false;
        }

        function removeRow() {
            const table = document.getElementById('quoteTable').getElementsByTagName('tbody')[0];
            if (table.rows.length > 1) {
                table.deleteRow(-1);
            }
            if (table.rows.length === 1) {
                document.getElementById('removeRowBtn').disabled = true;
            }
            calculateTotals();
        }

        function calculateTotals() {
            const table = document.getElementById('quoteTable').getElementsByTagName('tbody')[0];
            let totalGross = 0;
            let totalIVA = 0;
            let totalRetentions = 0;
            let totalNet = 0;

            for (let i = 0; i < table.rows.length; i++) {
                const quantity = parseFloat(table.rows[i].querySelector('.itemQuantity').value) || 0;
                const unitPrice = parseFloat(table.rows[i].querySelector('.itemUnitPrice').value) || 0;
                const vatRate = 0.19; // 19%
                const retentionsRate = 0.04; // 4%

                const total = quantity * unitPrice;
                const iva = total * vatRate;
                const retentions = total * retentionsRate;
                const net = total + iva - retentions;

                table.rows[i].querySelector('.itemTotal').value = net.toFixed(2);
                
                totalGross += total;
                totalIVA += iva;
                totalRetentions += retentions;
                totalNet += net;
            }

            document.getElementById('totalGross').value = totalGross.toFixed(2);
            document.getElementById('totalIVA').value = totalIVA.toFixed(2);
            document.getElementById('totalRetentions').value = totalRetentions.toFixed(2);
            document.getElementById('totalNet').value = totalNet.toFixed(2);
        }

        document.getElementById('downloadPDF').addEventListener('click', () => {
            const { jsPDF } = window.jspdf;
            const container = document.querySelector('.container');

            html2canvas(container, { scale: 3 }).then(canvas => { // Aumenta la escala a 3 para mejor calidad
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgWidth = 210; // Width of A4 in mm
                const pageHeight = 295; // Height of A4 in mm
                const imgHeight = canvas.height * imgWidth / canvas.width;
                let heightLeft = imgHeight;

                // Añadir la primera página con la imagen
                pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                // Añadir páginas adicionales si es necesario
                while (heightLeft >= 0) {
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 0, -heightLeft, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                // Guardar el PDF
                pdf.save('factura.pdf');
            });
        });
    </script>


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    

</body>
</html>