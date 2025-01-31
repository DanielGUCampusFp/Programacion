document.addEventListener('DOMContentLoaded', () => {
    // Se obtienen los elementos del DOM donde se mostrarán los costes
    const totalCostDiv = document.getElementById('total-cost');
    const planBaseCostDiv = document.getElementById('plan-base-cost');

    // Se definen los precios de los diferentes planes base
    const preciosPlanBase = {
        Basico: 9.99,
        Estandar: 13.99,
        Premium: 17.99
    };

    // Se definen los precios de los paquetes adicionales
    const preciosPaquetes = {	
        Deporte: 6.99,
        Cine: 7.99,
        Infantil: 4.99
    };

    // Función para calcular el costo total de la suscripción
    const calcularTotal = () => {
        let total = 0;

        // Se obtiene el precio del plan base y se añade al total
        const planBaseCost = preciosPlanBase[planBase] || 0;
        total += planBaseCost;
        planBaseCostDiv.textContent = `${planBaseCost.toFixed(2)}€`; // Se muestra el precio del plan base

        // Se suman los precios de los paquetes adicionales seleccionados
        paquetes.forEach(paquete => {
            const precioPaquete = preciosPaquetes[paquete.paquete] || parseFloat(paquete.precio);
            total += precioPaquete;
        });

        // Se muestra el precio total de la suscripción en el DOM
        totalCostDiv.textContent = `Precio total: ${total.toFixed(2)}€`;
    };

    // Se ejecuta la función de cálculo al cargar la página
    calcularTotal();
});
