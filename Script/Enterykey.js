
    // Función para manejar la pulsación de teclas en los campos de texto
    function handleEnterKey(event, elementId) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Evitar el comportamiento predeterminado (enviar formulario)

            // Obtener el elemento del campo de texto por su ID
            var textarea = document.getElementById(elementId);

            // Insertar un salto de línea en la posición actual del cursor
            var cursorPosition = textarea.selectionStart;
            var textBeforeCursor = textarea.value.substring(0, cursorPosition);
            var textAfterCursor = textarea.value.substring(cursorPosition);

            textarea.value = textBeforeCursor + '<br>' + textAfterCursor;

            // Ajustar la posición del cursor después de insertar el salto de línea
            textarea.selectionStart = cursorPosition + 4;
            textarea.selectionEnd = cursorPosition + 4;
        }
    }
