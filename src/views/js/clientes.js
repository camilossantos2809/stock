const deleteById = (id) => {
    console.log(id)
    fetch(`clientes.php?delete=${id}`)
        .then(response => response)
        .then(result => {
            alert(`Cliente ${id} deletado`)
            location.reload()
        })
}