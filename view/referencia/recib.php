<h1 class="page-header">Insumo Recibidos</h1>

<div class="well well-sm text-right">



    <a  class="btn btn-primary" href="inicioorig.html">Menú</a>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th style="width:180px;">Encargado Almacen</th>
        <th style="width:180px;">Codigo Insumo</th>
        <th style="width:100px;">Descripcion Insumo</th>
        <th style="width:120px;">Cantidad</th>
        <th style="width:120px;">Fecha</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->RecibListar() as $r): ?>
        <tr>
            <td><?php echo $r->enc_almacen; ?></td>
            <td><?php echo $r->cod_insumo; ?></td>
            <td><?php echo $r->des_insumo; ?></td>
            <td><?php echo $r->cantidad; ?></td>
            <td><?php echo $r->fecha; ?></td>

            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?r=Recib&a=RecibEliminar&idalmacen_rec=<?php echo $r->idalmacen_rec; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
