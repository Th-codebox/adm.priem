<h1>Скачать сертификат</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Список',array('index')); ?></li>
	<li><?php echo CHtml::link('Просмотр',array('view', 'serial'=>$model->serial)); ?></li>
</ul><!-- actions -->

<h3>Вы скачиваете <font color=red>Личный</font> ключ сертификата для <?= $model->common_name ?> &lt;<?= $model->email ?>&gt;</h3>
<h3><font color=red>Не выставляйте этот файл в публичный доступ!</font></h3>

<div class="form">
<?php echo CHtml::beginForm(); ?>
	<div class="row">
		<strong>File type: </strong>
		<select name="dl_type">
			<option value="PKCS#12">PKCS#12 Сертификат (для IE)</option>
			<option value="PEMCERT">PEM Сетификат</option>
			<option value="PEMKEY">PEM Личный ключ</option>
			<option value="PEMBUNDLE">PEM Пакет: Ключ + Сертификат</option>
			<option value="PEMCABUNDLE">PEM Пакет с сертификатом CA</option>
		</select>
	</div>
	<div class="row submit">
        <?php echo CHtml::submitButton('Скачать'); ?>
    </div>

<?php echo CHtml::endForm(); ?>
</div>
