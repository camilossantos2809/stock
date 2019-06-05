const addProdLancamento = () => {
    const inputProduto = document.querySelector('#produto_id')
    const inputQtde = document.querySelector("#qtde_unitaria")
    const inputValor = document.querySelector("#total_prod")
    const tableBody = document.querySelector("table>tbody")
    const newLine = `<tr><td>${inputProduto.value}</td><td>${inputQtde.value}</td><td>${inputValor.value}</td></tr>`
    const tr = document.createElement('tr')
    tr.innerHTML = newLine
    tableBody.appendChild(tr)
    inputProduto.value = ""
    inputQtde.value = ""
    inputValor.value = ""
    inputProduto.focus()
}

const getCabecalho = () => {
    const inputForn = document.querySelector("#fornecedor")
    const inputNf = document.querySelector("#numero_nf")
    const inputData = document.querySelector("#data_mvto")
    const inputValor = document.querySelector("#valor_total")
    return {
        fornecedor_id: inputForn.value,
        numero_nf: inputNf.value,
        data_mvto: inputData.value,
        valor_total: inputValor.value
    }
}

const getProdutos = () => {
    const tableBody = document.querySelectorAll("table>tbody tr")
    const rows = Array.from(tableBody)
    return rows.map(row => {
        let arr = Array.from(row.children)
        return {
            produto_id: arr[0].textContent,
            qtde_unitaria: arr[1].textContent,
            valor_total: arr[2].textContent
        }
    })
}

const clearAll = () => {
    const inputForn = document.querySelector("#fornecedor")
    const inputNf = document.querySelector("#numero_nf")
    const inputValor = document.querySelector("#valor_total")
    const tableBody = document.querySelectorAll("table>tbody tr")
    for(let tr of tableBody) {
        tr.remove()
    }
    inputForn.value = ""
    inputNf.value=""
    inputValor.value = ""
}

const sendVenda = (usuario_id) => {
    const cabecalho = getCabecalho()
    const produtos = getProdutos()

    cabecalho.usuario_id = usuario_id

    let urlParams = new URLSearchParams()
    urlParams.append('cabecalho', JSON.stringify(cabecalho))
    urlParams.append('produtos', JSON.stringify(produtos))

    let headers = new Headers()
    headers.append("Content-Type", "application/x-www-form-urlencoded")

    fetch('compra.php', {
        method: 'POST',
        body: urlParams.toString(),
        headers: headers
    }).then(response => console.log(response))
        .then(data => clearAll())
        .catch(err=>console.error(err))
}

document.addEventListener('DOMContentLoaded', function () {
    let elems = document.querySelectorAll('.fixed-action-btn');
    M.FloatingActionButton.init(elems, {});
});
