const addProdLancamento = () => {
    const inputProduto = document.querySelector('#produto_id')
    const inputQtde = document.querySelector("#qtde_unitaria")
    const inputValor = document.querySelector("#total_prod")
    const tableBody = document.querySelector("table>tbody")
    const newLine = `<tr><td>${inputProduto.value}</td><td>${inputQtde.value}</td><td>${inputValor.value}</td></tr>`
    const tr = document.createElement('tr')
    tr.innerHTML = newLine
    tableBody.appendChild(tr)
}

const getCabecalho = () => {
    const inputCliente = document.querySelector("#cliente")
    const inputNf = document.querySelector("#numero_nf")
    const inputData = document.querySelector("#data_mvto")
    return {
        cliente: inputCliente.value,
        nf: inputNf.value,
        data: inputData.value
    }
}

const getProdutos = () => {
    const tableBody = document.querySelectorAll("table>tbody tr")
    const rows = Array.from(tableBody)
    return rows.map(row => {
        let arr = Array.from(row.children)
        return {
            id: arr[0].textContent,
            qtde: arr[1].textContent,
            valor: arr[2].textContent
        }
    })
}

const sendVenda = () => {
    const cabecalho = getCabecalho()
    const produtos = getProdutos()
    const data = {
        cabecalho: cabecalho,
        produtos: produtos
    }
    console.log(JSON.stringify(data))
    fetch('venda.php', {
        method: 'post',
        body: JSON.stringify(data)
    }).then(response => console.log(response))
        .then(data => console.log(data))
}

document.addEventListener('DOMContentLoaded', function () {
    let elems = document.querySelectorAll('.fixed-action-btn');
    M.FloatingActionButton.init(elems, {});
});
