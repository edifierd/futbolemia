<?php if(isset($this->_paginacion)): ?>

<nav aria-label="Page navigation" style=" text-align:center; margin-bottom:30px;">
    <ul class="pagination" >
        <?php if($this->_paginacion['primero']): ?>

            <li>
            <a class="pagina" pagina="<?php echo $this->_paginacion['primero']; ?>" href="#lista_registros">&Lt;</a>
            </li>

        <?php else: ?>

            <li class="disabled"><span>&Lt;</span></li>

        <?php endif; ?>

        <?php if($this->_paginacion['anterior']): ?>

            <li><a class="pagina" pagina="<?php echo $this->_paginacion['anterior']; ?>" href="#lista_registros">&lt;</a></li>

        <?php else: ?>

            <li class="disabled"><span>&lt;</span></li>

        <?php endif; ?>

        <?php for($i = 0; $i < count($this->_paginacion['rango']); $i++): ?>

            <?php if($this->_paginacion['actual'] == $this->_paginacion['rango'][$i]): ?>

                <li class="active"><span><?php echo $this->_paginacion['rango'][$i]; ?></span></li>

            <?php else: ?>

                <li>
                    <a class="pagina" pagina="<?php echo $this->_paginacion['rango'][$i]; ?>" rubro="" >
                        <?php echo $this->_paginacion['rango'][$i]; ?>
                    </a>
                </li>

            <?php endif; ?>

        <?php endfor; ?>

        <?php if($this->_paginacion['siguiente']): ?>

            <li><a class="pagina" pagina="<?php echo $this->_paginacion['siguiente']; ?>" href="#lista_registros">&gt;</a></li>

        <?php else: ?>

            <li class="disabled"><span>&gt;</span></li>

        <?php endif; ?>

        <?php if($this->_paginacion['ultimo']): ?>

            <li><a class="pagina" pagina="<?php echo $this->_paginacion['ultimo']; ?>" href="#lista_registros">&Gt;</a></li>

        <?php else: ?>

            <li class="disabled"><span>&Gt;</span></li>

        <?php endif; ?>
    </ul>
</nav>


<?php endif; ?>