<?php
    $sql = 'select * from infors where id=1';$result = mysqli_query($conexao, $sql);$dadosescola = mysqli_fetch_array($result);
?><footer id="footer">
    <div class="fluid-container">
        <div class="row justify-content-around">
            <div><p>&copy; <?=$dadosescola['abbr']?></p></div>
            <div><a href="/ajuda">Ajuda</a></div>
        </div>
    </div>
</footer>