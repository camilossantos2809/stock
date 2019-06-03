const deleteById = (id) => {
    console.log(id)
    fetch(`usuario.php?delete=${id}`)
        .then(response => response)
        .then(result => {
            console.log(result)
            alert(`Usuario ${id} deletado`)
            location.reload()
        })
}