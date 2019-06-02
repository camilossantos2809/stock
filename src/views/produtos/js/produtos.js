const deleteById = (id) => {
    console.log(id)
    fetch(`produtos.php?delete=${id}`)
        .then(response => response)
        .then(result => {
            console.log(result)
            alert(`Produto ${id} deletado`)
            location.reload()
        })
}