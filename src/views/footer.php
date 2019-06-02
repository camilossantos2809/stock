</div>

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