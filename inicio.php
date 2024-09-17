<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Promec.Jr S.A.S | Inicio</title>
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

    <style>
        /* Estilos del calendario */
        .calendar-container {
            border: 1px solid #333;
            border-radius: 10px;
            padding: 10px;
            background-color: #222;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            margin: auto;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
        }

        .calendar-header h1 {
            font-size: 1.25em;
            color: #E74C3C;
        }

        .calendar-header button {
            background-color: #E74C3C;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .calendar-header button:hover {
            background-color: #C0392B;
        }

        .calendar-grid-header {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            background-color: #333;
            color: #E74C3C;
            text-align: center;
            font-weight: bold;
            border-radius: 5px;
        }

        .calendar-grid-header div {
            padding: 8px;
            border-right: 1px solid #444;
        }

        .calendar-grid-header div:last-child {
            border-right: none;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1px;
        }

        .calendar-grid div {
            height: 80px;
            background-color: #444;
            color: #fff;
            text-align: right;
            padding: 8px;
            cursor: pointer;
            border: 1px solid #333;
            position: relative;
        }

        .calendar-grid div.today {
            background-color: #E74C3C;
            color: #fff;
        }

        .calendar-grid div:hover {
            background-color: #666;
        }

        .calendar-grid div.has-reminder::after {
            content: '•';
            color: #E74C3C;
            font-size: 1.5em;
            position: absolute;
            top: 5px;
            right: 5px;
        }

        .reminders-container {
            margin-top: 20px;
            color: #fff;
        }

        #todayButton, #addReminderButton {
            background-color: #E74C3C;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-right: 10px;
        }

        #todayButton:hover, #addReminderButton:hover {
            background-color: #C0392B;
        }

        #reminderModal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6);
        }

        .modal-content {
            background-color: #333;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
            color: #fff;
        }

        .modal-content input, .modal-content button {
            margin-bottom: 10px;
            width: 100%;
        }

        .modal-content input[type="date"] {
            border: 1px solid #444;
            background-color: #555;
            color: #fff;
        }

        .modal-content button {
            background-color: #E74C3C;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .modal-content button:hover {
            background-color: #C0392B;
        }

        #closeModal {
            color: #fff;
            float: right;
            font-size: 1.5em;
            cursor: pointer;
        }

        #closeModal:hover {
            color: #E74C3C;
        }

        .reminder-item {
            background-color: #444;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            position: relative;
        }

        .reminder-item button {
            background-color: #E74C3C;
            color: #fff;
            border: none;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .reminder-item button:hover {
            background-color: #C0392B;
        }

        /* Estilos de la lista de tareas */
        .task-list {
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .task-form {
            margin-bottom: 20px;
        }

        .task-form input {
            margin-bottom: 10px;
        }

        .task-item {
            background-color: #444;
            color: #fff;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            position: relative;
            display: flex;
            align-items: center;
        }

        .task-item .task-text {
            flex: 1;
        }

        .task-item input[type="checkbox"] {
            margin-right: 10px;
        }

        .task-item.completed .task-text {
            text-decoration: line-through;
            color: #999;
        }

        .task-item button.delete-task {
            background-color: #E74C3C;
            color: #fff;
            border: none;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .task-item button.delete-task:hover {
            background-color: #C0392B;
        }
        
    </style>
</head>

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
                        <a href="Login/signin.php" class="dropdown-item">Iniciar Sesión</a>
                        <a href="Login/signup.php" class="dropdown-item">Registrarse</a>
                        <a href="index.php" class="dropdown-item">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- FIN DE MENU LATERAL -->

    <div class="content">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <!-- Calendario y recordatorios -->
                <div class="col-md-6">
                    <div class="calendar-container">
                        <div class="calendar-header">
                            <button id="prevMonth">&lt;</button>
                            <h1 id="currentMonthYear"></h1>
                            <button id="nextMonth">&gt;</button>
                        </div>
                        <div class="calendar-grid-header">
                            <div>Dom</div>
                            <div>Lun</div>
                            <div>Mar</div>
                            <div>Mié</div>
                            <div>Jue</div>
                            <div>Vie</div>
                            <div>Sáb</div>
                        </div>
                        <div class="calendar-grid" id="calendarGrid"></div>
                        <button id="todayButton">Volver a hoy</button>
                        <button id="addReminderButton">Agregar Recordatorio</button>
                        <div id="reminderModal" class="modal">
                            <div class="modal-content">
                                <span id="closeModal">&times;</span>
                                <h2>Agregar Recordatorio</h2>
                                <input type="date" id="reminderDate">
                                <input type="text" id="reminderText" placeholder="Escribe tu recordatorio aquí">
                                <button id="saveReminder">Guardar</button>
                            </div>
                        </div>
                        <div id="remindersContainer" class="reminders-container"></div>
                    </div>
                </div>

                <!-- Lista de tareas -->
                <div class="col-md-6">
                <img src="img/Logo2.png" alt="Logo" class="logo">
                    <div class="task-list">
                        <h4>Lista de tareas diarias</h4>
                        <!-- Formulario para añadir tareas -->
                        <div class="task-form">
                            <input type="text" id="taskInput" placeholder="Nueva tarea" class="form-control mb-2">
                            <button id="addTask" class="btn btn-custom">Añadir Tarea</button>
                        </div>
                        <!-- Lista de tareas -->
                        <ul id="taskList">
                            <!-- Tareas se añadirán aquí dinámicamente -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script>
        let currentDate = new Date();
        const reminders = {};

        function renderCalendar() {
            const currentMonthYear = document.getElementById('currentMonthYear');
            const calendarGrid = document.getElementById('calendarGrid');
            calendarGrid.innerHTML = ''; // Limpiar el calendario
            
            const month = currentDate.getMonth();
            const year = currentDate.getFullYear();
            const today = new Date();

            currentMonthYear.innerText = `${currentDate.toLocaleString('es-ES', { month: 'long' })} ${year}`;
            
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            // Llenar con espacios vacíos al principio
            for (let i = 0; i < firstDay; i++) {
                calendarGrid.innerHTML += '<div></div>';
            }
            
            // Añadir días del mes
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.textContent = day;
                
                if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                    dayElement.classList.add('today');
                }
                
                const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                if (reminders[dateStr]) {
                    dayElement.classList.add('has-reminder');
                }

                dayElement.addEventListener('click', () => {
                    document.getElementById('reminderDate').value = dateStr;
                    document.getElementById('reminderModal').style.display = 'block';
                });

                calendarGrid.appendChild(dayElement);
            }
        }

        // Navegar por meses
        document.getElementById('prevMonth').addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        document.getElementById('nextMonth').addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        // Botón de hoy
        document.getElementById('todayButton').addEventListener('click', () => {
            currentDate = new Date();
            renderCalendar();
        });

        // Agregar recordatorio
        document.getElementById('addReminderButton').addEventListener('click', () => {
            document.getElementById('reminderModal').style.display = 'block';
        });

        document.getElementById('closeModal').addEventListener('click', () => {
            document.getElementById('reminderModal').style.display = 'none';
        });

        document.getElementById('saveReminder').addEventListener('click', () => {
            const date = document.getElementById('reminderDate').value;
            const text = document.getElementById('reminderText').value;

            if (date && text) {
                if (!reminders[date]) {
                    reminders[date] = [];
                }
                reminders[date].push(text);
                const reminderContainer = document.getElementById('remindersContainer');
                const reminder = document.createElement('div');
                reminder.classList.add('reminder-item');
                reminder.innerHTML = `${date}: ${text} <button class="deleteReminderButton">Eliminar</button>`;
                reminderContainer.appendChild(reminder);
                document.getElementById('reminderModal').style.display = 'none';
                document.getElementById('reminderDate').value = '';
                document.getElementById('reminderText').value = '';
                renderCalendar();
            }
        });

        // Eliminar recordatorio
        document.getElementById('remindersContainer').addEventListener('click', (event) => {
            if (event.target.classList.contains('deleteReminderButton')) {
                const reminderItem = event.target.parentElement;
                const reminderText = reminderItem.textContent.split(':')[0];
                const date = reminderText.split(' ')[0];
                const reminderContent = reminderItem.textContent.split(':')[1].split(' ')[1];

                reminders[date] = reminders[date].filter(reminder => reminder !== reminderContent);

                if (reminders[date].length === 0) {
                    delete reminders[date];
                }

                reminderItem.remove();
                renderCalendar();
            }
        });

        // Inicialización del calendario
        renderCalendar();

        // Agregar tarea
        document.getElementById('addTask').addEventListener('click', () => {
            const taskInput = document.getElementById('taskInput');
            const taskText = taskInput.value.trim();

            if (taskText) {
                const taskList = document.getElementById('taskList');
                const taskItem = document.createElement('li');
                taskItem.classList.add('task-item');

                taskItem.innerHTML = `
                    <input type="checkbox" class="task-checkbox">
                    <span class="task-text">${taskText}</span>
                    <button class="delete-task">X</button>
                `;

                taskList.appendChild(taskItem);
                taskInput.value = '';
            }
        });

        // Marcar tarea como completada y eliminar tarea
        document.getElementById('taskList').addEventListener('click', (event) => {
            if (event.target.classList.contains('task-checkbox')) {
                const taskItem = event.target.parentElement;
                taskItem.classList.toggle('completed');
            }

            if (event.target.classList.contains('delete-task')) {
                event.target.parentElement.remove();
            }
        });
    </script>
    
    <iframe
        id="map"
        src="https://www.openstreetmap.org/export/embed.html?bbox=-0.15%2C51.5%2C0.15%2C51.6&amp;layer=mapnik"
        style="border: 1px solid black"
        allowfullscreen=""
        loading="lazy"
    ></iframe>
    <style>
        #map {
            height: 200px; /* Ajusta el tamaño del mini mapa aquí */
            width: 100%; /* Ajusta el ancho del mini mapa aquí */
            border: 0; /* Elimina el borde del iframe */
        }
    </style>
</body>

</html>
