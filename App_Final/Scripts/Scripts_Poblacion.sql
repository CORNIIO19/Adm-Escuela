INSERT INTO usuarios (username, password, nombre, tipo) VALUES
('admin',    '$2y$10$Z.TdVR4HUM4W9hwQK.SxPOl43SUFMV8qK0p9d6K14WxSSYLR1mY6a', 'Administrador Demo', 'Administrador'),
('tesorero', '$2y$10$1S2bCePBgp5oVaxPzTX0pu7foig26Yw3ZrWEXfI2a7p0nEy7eXguO', 'Tesorero Demo',       'Control Escolar'),
('tutor',    '$2y$10$Tz9AQtbbWDlJ65hPYxunN.g.PC3Jk1wYlNjizAI7dJ9jG64GU7O5K', 'Tutor Demo',           'Tutor');

INSERT INTO alumnos (matricula, nombre, apellido, estatus) VALUES
('A001','Carlos','Ramírez','activo'),
('A002','María','López','activo'),
('A003','Luis','Fernández','activo');

INSERT INTO pagos (alumno_id, fecha_pago, mes_pagado, año, monto, forma_pago, estatus_pago) VALUES
(1,'2025-01-10','Enero',   2025, 1500.00, 'efectivo',      'pagado'),
(1,'2025-02-10','Febrero', 2025, 1500.00, 'transferencia', 'pagado'),
(2,'2025-01-12','Enero',   2025, 1500.00, 'efectivo',      'pagado');
