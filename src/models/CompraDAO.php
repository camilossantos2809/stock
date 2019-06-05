<?php
require_once 'Dao.php';

class CompraDAO extends Dao
{

    private function getLastId()
    {
        return parent::getAll("select max(id) as max_id from mov_estoque");
    }

    public function save($compra, $prods)
    {

        foreach ($this->getLastId() as $row) {
            $id = ['id' => $row['max_id'] + 1];
        }
        $sqlVenda = "INSERT INTO mov_estoque (id, entr_saida, numero_nf, data_mvto, valor_total, fornecedor_id, usuario_id) 
                    VALUES (:id, 'E', :numero_nf, :data_mvto, :valor_total, :fornecedor_id, :usuario_id)";

        parent::save($sqlVenda, $compra + $id);

        foreach ($prods as $prod) {
            $sqlVendaProd = "INSERT into mov_estoque_produto(mov_estoque_id, produto_id, qtde_unitaria, valor_total)
                        values (:id, :produto_id, :qtde_unitaria, :valor_total)";
            parent::save($sqlVendaProd, $prod + $id);
        }
        return $id;
    }
}