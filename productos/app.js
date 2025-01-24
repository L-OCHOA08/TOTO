// VARIABLES

const searcherDesk = document.querySelector('.searcher--desktop');
const searcher = document.querySelector('.searcher');
const contenedor = document.querySelector('#productos');
const producto = document.querySelectorAll('.product')
const filter = document.querySelector('#filter--button');
const filtros = document.querySelector('.filtros');
const filtrarBoton = document.querySelector('#filtros--input');
const maximo = document.querySelector('#hasta');

// EVENT LISTENERS

searcherDesk.addEventListener('keyup', (e)=>{
    if (e.key === 'Enter') {
        event.preventDefault();
        buscar(searcherDesk);
    }
    
})

searcher.addEventListener('keyup', (e) =>{
    if (e.key === 'Enter') {
        event.preventDefault();
        buscar(searcher)
    }
})

filtros.addEventListener('submit', (e)=>{
    e.preventDefault();
    
    filtrarCat();
})


filter.addEventListener('change', ()=>{
    if (filter.checked) {
        filtros.classList.add('visible');
        maximo.style='visibility: visible;';
        filtrarBoton.style='visibility: visible;';
    } else{
        filtros.classList.remove('visible');
        maximo.style='visibility: hidden;';
        filtrarBoton.style='visibility: hidden;';
    }
})


document.addEventListener('DOMContentLoaded', cargarProductos(stock));

filtrarPrecio()


// FUNCIONES

function cargarProductos(stock) {
    stock.forEach(stockk => {
        const { id, marca, modelo, precioMinorista, precioMayorista, img, stock } = stockk;

        if (stock >= 1) {
            const producto = document.createElement('div');
            producto.classList.add('product');
            producto.id = `${marca}`;
            producto.dataset.modelo = `${modelo}`;
            producto.dataset.id = `${id}`
            contenedor.appendChild(producto);
    
            const imagenProd = document.createElement('img');
            imagenProd.classList.add('product--img');
            imagenProd.src = img
            producto.appendChild(imagenProd);
    
            const contenedorTextos = document.createElement('div');
            contenedorTextos.classList.add('product--text');
            producto.appendChild(contenedorTextos);
    
            const productoTitulo = document.createElement('h3');
            productoTitulo.classList.add('product--title');
            productoTitulo.textContent = marca + ' ' + modelo;
            contenedorTextos.appendChild(productoTitulo);
    
            const precios = document.createElement('div');
            precios.classList.add('product--price');
            contenedorTextos.appendChild(precios);
    
            const minorista = document.createElement('p');
            minorista.classList.add('product--price--minorist');
            minorista.textContent = 'Minorista: ' + precioMinorista;
            precios.appendChild(minorista);
    
            const mayorista = document.createElement('p');
            mayorista.classList.add('product--price--mayorist');
            mayorista.textContent = 'Mayorista: ' + precioMayorista;
            precios.appendChild(mayorista);
    
            const agregarBoton = document.createElement('button');
            agregarBoton.dataset.id = `${id}`
            agregarBoton.classList.add('product--button');
            agregarBoton.classList.add('agregar-carrito');
            agregarBoton.textContent = 'Agregar';
            producto.appendChild(agregarBoton);
        }
    });
}

function filtrarPrecio() {

    let filterMaximo = document.querySelector('#hasta');
    filterMaximo.addEventListener('keyup', ()=>{
        let filterMax = document.querySelector('#hasta').value;

    stock.forEach(stockk =>{
        const { id, marca, modelo, precioMinorista, precioMayorista, img, categoria} = stockk;
        if (filterMax >= precioMinorista) {
            const producto = document.createElement('div');
            producto.dataset.id = `${id}`
            producto.classList.add('product');
            producto.id = `${marca}`;
            producto.dataset.modelo = `${modelo}`;
            contenedor.appendChild(producto);
    
            const imagenProd = document.createElement('img');
            imagenProd.classList.add('product--img');
            imagenProd.src = img
            producto.appendChild(imagenProd);
    
            const contenedorTextos = document.createElement('div');
            contenedorTextos.classList.add('product--text');
            producto.appendChild(contenedorTextos);
    
            const productoTitulo = document.createElement('h3');
            productoTitulo.classList.add('product--title');
            productoTitulo.textContent = marca + ' ' + modelo;
            contenedorTextos.appendChild(productoTitulo);
    
            const precios = document.createElement('div');
            precios.classList.add('product--price');
            contenedorTextos.appendChild(precios);
    
            const minorista = document.createElement('p');
            minorista.classList.add('product--price--minorist');
            minorista.textContent = 'Minorista: ' + precioMinorista;
            precios.appendChild(minorista);
    
            const mayorista = document.createElement('p');
            mayorista.classList.add('product--price--mayorist');
            mayorista.textContent = 'Mayorista: ' + precioMayorista;
            precios.appendChild(mayorista);
    
            const agregarBoton = document.createElement('button');
            agregarBoton.dataset.id = `${id}`
            agregarBoton.classList.add('product--button');
            agregarBoton.classList.add('agregar-carrito');
            agregarBoton.textContent = 'Agregar';
            producto.appendChild(agregarBoton);
        } else if (!filterMax) {
            const producto = document.createElement('div');
            producto.dataset.id = `${id}`
            producto.classList.add('product');
            producto.id = `${marca}`;
            producto.dataset.modelo = `${modelo}`;
            contenedor.appendChild(producto);
    
            const imagenProd = document.createElement('img');
            imagenProd.classList.add('product--img');
            imagenProd.src = img
            producto.appendChild(imagenProd);
    
            const contenedorTextos = document.createElement('div');
            contenedorTextos.classList.add('product--text');
            producto.appendChild(contenedorTextos);
    
            const productoTitulo = document.createElement('h3');
            productoTitulo.classList.add('product--title');
            productoTitulo.textContent = marca + ' ' + modelo;
            contenedorTextos.appendChild(productoTitulo);
    
            const precios = document.createElement('div');
            precios.classList.add('product--price');
            contenedorTextos.appendChild(precios);
    
            const minorista = document.createElement('p');
            minorista.classList.add('product--price--minorist');
            minorista.textContent = 'Minorista: ' + precioMinorista;
            precios.appendChild(minorista);
    
            const mayorista = document.createElement('p');
            mayorista.classList.add('product--price--mayorist');
            mayorista.textContent = 'Mayorista: ' + precioMayorista;
            precios.appendChild(mayorista);
    
            const agregarBoton = document.createElement('button');
            agregarBoton.dataset.id = `${id}`
            agregarBoton.classList.add('product--button');
            agregarBoton.classList.add('agregar-carrito');
            agregarBoton.textContent = 'Agregar';
            producto.appendChild(agregarBoton);
        } 
        
        else{
            limpiarHTML()
        }
    })
    })
    
}

function filtrarCat() {
    const selector = document.querySelector('#selectorCateg').value;

    stock.forEach(stockk =>{
        const { id, marca, modelo, precioMinorista, precioMayorista, img, categoria} = stockk;
        if (categoria == selector) {
            const producto = document.createElement('div');
            producto.dataset.id = `${id}`
            producto.classList.add('product');
            producto.id = `${marca}`;
            producto.dataset.modelo = `${modelo}`;
            contenedor.appendChild(producto);
    
            const imagenProd = document.createElement('img');
            imagenProd.classList.add('product--img');
            imagenProd.src = img
            producto.appendChild(imagenProd);
    
            const contenedorTextos = document.createElement('div');
            contenedorTextos.classList.add('product--text');
            producto.appendChild(contenedorTextos);
    
            const productoTitulo = document.createElement('h3');
            productoTitulo.classList.add('product--title');
            productoTitulo.textContent = marca + ' ' + modelo;
            contenedorTextos.appendChild(productoTitulo);
    
            const precios = document.createElement('div');
            precios.classList.add('product--price');
            contenedorTextos.appendChild(precios);
    
            const minorista = document.createElement('p');
            minorista.classList.add('product--price--minorist');
            minorista.textContent = 'Minorista: ' + precioMinorista;
            precios.appendChild(minorista);
    
            const mayorista = document.createElement('p');
            mayorista.classList.add('product--price--mayorist');
            mayorista.textContent = 'Mayorista: ' + precioMayorista;
            precios.appendChild(mayorista);
    
            const agregarBoton = document.createElement('button');
            agregarBoton.dataset.id = `${id}`
            agregarBoton.classList.add('product--button');
            agregarBoton.classList.add('agregar-carrito');
            agregarBoton.textContent = 'Agregar';
            producto.appendChild(agregarBoton);
        } else{
            limpiarHTML()
        }
    })
}


function buscar(buscador) {
    const query = buscador.value.trim().toLowerCase()
    const producto = document.querySelectorAll('.product')
    producto.forEach(productos => {
        const productoId = productos.getAttribute('id').toLowerCase()
        console.log(productoId);
        if (query != productoId) {
            productos.classList.add('invisible')
        } else{
            productos.classList.remove('invisible')
        }
    })
    
    
}

function limpiarHTML() {
   while (contenedor.firstChild) {
    contenedor.removeChild(contenedor.firstChild) 
   }
}