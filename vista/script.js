// Se añade un evento al formulario que se ejecutará cuando el usuario intente enviarlo
document.getElementById("formulario").addEventListener("submit", function(event) {

    // No se manda el formulario hasta que se verifiquen las especificaciones puestas
    event.preventDefault();

    // Se obtienen los valores de los campos del formulario
    let edad = parseInt(document.getElementById("edad").value, 10);
    let planSeleccionado = document.getElementById("tipo_plan_base").value;
    let duracion = document.getElementById("duracion_suscripcion").value;
    let paquetesSeleccionados = document.querySelectorAll("input[name='paquetes[]']:checked");

    // Validación 1: Los usuarios menores de 18 años deben seleccionar el paquete "Infantil"
    if (edad < 18 && !document.querySelector("input[name='paquetes[]'][value='Infantil']").checked) {
        alert("Los usuarios menores de 18 años deben seleccionar el paquete Infantil");
        return; // Se detiene la ejecución del formulario
    }

    // Validación 2: Los usuarios con Plan Básico solo pueden seleccionar un paquete adicional
    if (planSeleccionado === "Basico" && paquetesSeleccionados.length > 1) {
        alert("Los usuarios del Plan Básico solo pueden seleccionar un paquete adicional");
        return; // Se detiene la ejecución del formulario
    }

    // Validación 3: El paquete "Deporte" solo está disponible con la duración "Anual"
    if (document.querySelector("input[name='paquetes[]'][value='Deporte']").checked && duracion !== "Anual") {
        alert("El paquete Deporte solo está disponible si la duración del contrato es anual");  
        return; // Se detiene la ejecución del formulario
    }

    // Si todas las validaciones se cumplen, se permite el envío del formulario
    event.target.submit();
});
