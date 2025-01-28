// VARIABLES
const carrito = document.querySelector('#carrito');
const productosLista = document.querySelector('#productos');
const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');
const contenedorCarrito = document.querySelector('#lista-carrito tbody');
let articulosCarrito = [];

// EVENT LISTENERS

cargarEventListeners();
function cargarEventListeners() {

    document.addEventListener('DOMContentLoaded', ()=>{
        articulosCarrito = JSON.parse( localStorage.getItem('carrito') ) || [];

        carritoHTML()
    })

    carrito.addEventListener('click', eliminarCurso);

    productosLista.addEventListener('click', agregarCurso);

    vaciarCarritoBtn.addEventListener('click', () => {
        articulosCarrito = []; // RESETEAMOS EL ARREGLO

        limpiarCarrito();
    })
}

// FUNCIONES
function agregarCurso(e) {
    e.preventDefault();
    

    if (e.target.classList.contains('agregar-carrito')) {
        const productoSeleccionado = e.target.parentElement;
        leerDatosCurso(productoSeleccionado);
    }
}

function eliminarCurso(e) {
    if (e.target.classList.contains('borrar-curso')) {
        const productoID = e.target.getAttribute('data-id');

        articulosCarrito = articulosCarrito.filter( producto => producto.id !== productoID );

        carritoHTML()
    }
}

function leerDatosCurso(producto) {
    const infoProducto = {
        imagen: producto.querySelector('img').src,
        titulo: producto.querySelector('h3').textContent,
        precioMinorista: producto.querySelector('.product--price--minorist').textContent,
        precioMayorista: producto.querySelector('.product--price--mayorist').textContent,
        id: producto.querySelector('.agregar-carrito').getAttribute('data-id'),
        cantidad: 1
    }
    console.log(infoProducto.id);
    

    const existe = articulosCarrito.some( producto => producto.id === infoProducto.id );
    if (existe) {
        
        const producto = articulosCarrito.map( producto =>{
            if (producto.id === infoProducto.id) {
                producto.cantidad++;
                return producto;
            } else{
                return producto;
            }
        } );
        articulosCarrito = [...producto]
    } else{
        articulosCarrito = [...articulosCarrito, infoProducto];
    }
    
    console.log(articulosCarrito);
    

    carritoHTML();
}

function carritoHTML() {
    
    limpiarCarrito();

    articulosCarrito.forEach( producto => {
        const { id, imagen, titulo, precioMinorista, precioMayorista, cantidad } = producto;
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>
            <img src='${imagen}' width='100'>
        </td>
        <td>
            ${titulo}
        </td>
        <td>
            ${precioMinorista}, ${precioMayorista}
        </td>
        <td>
            ${cantidad}
        </td>
        <td>
            <a href='#' class='borrar-curso' data-id='${id}'>X</a>
        </td>
        `;
        
        contenedorCarrito.appendChild(row);
    })

    sincronizarStorage();
}

function sincronizarStorage() {
    localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
}


function limpiarCarrito() {
    while (contenedorCarrito.firstChild) {
        contenedorCarrito.removeChild(contenedorCarrito.firstChild)
    }
}