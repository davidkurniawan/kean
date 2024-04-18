<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<table border='1'>
	<thead>
		<tr>
			<th>Nama</th>
			<th>Link</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $val): ?>
		<tr>
			<td><?php echo $val['nama'] ?></td>
			<td>
				<p>
					Assalamu'alaikum Warahmatullahi Wabarakatuh.
					<br>
					<br>
					Maha suci Allah yang telah menjadikan segala sesuatu lebih indah dan sempurna.
					<br>
					<br>
					Izinkan kami mengundang Bapak/Ibu/Sahabat sekalian untuk dapat menghadiri acara pernikahan kami.
					<br>
					<br>
					Link undangan :
					<br>
					<br>
					<a href="<?php echo $val['url'] ?>"><?php echo $val['url'] ?></a>
					<br>
					<br>
					Kehadiran, doa dan restu anda semua adalah kado terindah bagi kami. Tiada yang dapat kami ungkapkan selain rasa terima kasih dari hati yang tulus dan dalam.
					<br>
					<br>
					Jangan lupa menggunakan protokol kesehatan dengan memakai masker
					<br>
					<br>
					Kami yang berbahagia
					Ayu & David
				</p>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
</body>
</html>