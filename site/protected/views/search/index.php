
<h1>Поиск по сайту</h1>


<div class="form">
<form method="GET" accept-charset="utf-8">
    <table width="100%">
        <tr>
            <td width="16%"/>
            
                <table>
                    <tr>
                        <td><label for="query">Запрос: </label></td>
                        <td>
                          <input type="text" name="query" id="query" size="30" value="<?php echo $query; ?>" />
                          <input type="submit" value="Искать" />
                        </td>
                    </tr>
                </table>
                
            </td>
            <td width="9%">
        </tr>
    </table>
</form>
</div>
      
<?php
	if ($error) {
		echo($error[0]);
    } 
	else 
	{
		if ($query && $server_error == 0) {
?>
	<br><p><b>Найдено:</b> <?php echo($found_all);?></p>
	<ol start="<?php echo ($page * 10 + 1);?>">

<?php 
	foreach ($found as $item) {
		$url = str_replace('webds/','https://',$item->url);
?>
		<li>
			<a href="<?php echo $url;?>"><?php echo $this->highlight_words($item->title);?></a>

			<ul>
<?php
                if ($item->passages) {
                    foreach ($item->passages->passage as $passage) {
?>
                        <li style="font-size: 85%"><?php echo $this->highlight_words($passage)?></li>
<?php
                    }
                }
?>
                <span style="color: gray; font-size: 85%"><?php echo $url;?></span>
			</ul>
		</li>

<?php
	}
?>

	</ol>
<?php

    $this->print_pager ($found_all, $query, $page);
 
	}else{

		if ($server_error == 1)
			echo "Произошла ошибка сервера";

	}	
	}
?>


