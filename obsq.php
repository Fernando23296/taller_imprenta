<h1 class="page-header">Observaciones Quemado</h1>

<div class="well well-sm text-right">
  <a class="btn btn-primary" href="?oq=Obsq&a=ObsqCrud">Nuevo Registro</a>

    <a  class="btn btn-primary" href="inicioorig.html">Menú</a>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th style="width:180px;">fecha</th>
        <th style="width:180px;">hora</th>
        <th style="width:100px;">observacion</th>
        <th style="width:120px;">IDORDEN</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ObsqListar() as $r): ?>
        <tr>
            <td><?php echo $r->fecha; ?></td>
            <td><?php echo $r->hora; ?></td>
            <td><?php echo $r->observacion; ?></td>
            <td><?php echo $r->idotq; ?></td>


            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?oq=Obsq&a=ObsqEliminar&idobsq=<?php echo $r->idobsq; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
