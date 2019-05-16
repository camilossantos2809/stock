</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        M.updateTextFields();
        M.AutoInit();

        const elems = document.querySelectorAll('.tooltipped');
        M.Tooltip.init(elems, {});
    });
</script>
</body>

</html>