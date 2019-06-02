const deleteById = (id) => {
    console.log(id)
    fetch(`fornecedor.php?delete=${id}`)
        .then(response => response)
        .then(result => {
            console.log(result)
            alert(`Fornecedor ${id} deletado`)
            location.reload()
        })
}