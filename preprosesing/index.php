<?php
/*
WWW.SISTEMPHP.COM 081959109190
Pembuatan:
------------------------------------------
- Web
- Toko Online
- Sistem Informasi
- Sistem Pakar
- Sistem Pendukung Keputusan
- SMS Gateway
- Wordpres theme & Plugin
 
------------------------------------------
*/
 
$kalimat = "Saya membuat script ini ketika hendak memodifikasi dan mengambil kata tertentu pada sebuah kalimat atau paragraf dan menggantinya secara otomatis dengan kata yang lain. Nah untuk kegunaannya sebenarnya tergantung dari kebutuhan masing-masing. karena pada dasarnya setiap script php seperti ini adalah tergantung situasi dan kondisi. Contoh yang lain misalnya jika Anda hendak membuat program atau script sensor untuk kata-kata terentu pada sebuah komentar Anda juga dapat menggunakan script ini untuk membuatnya. Contoh lain lagi misalnya script ini digunakan untuk membuat pencarian dalam sebuah database dengan menggunakan query yang di inputkan oleh user. Dan contoh lain masih banyak lagi.";

//menghilangkan tanda baca
$kalimat=preg_replace("/[[:punct:]]+/"," ",$kalimat);

//agar kecil semua
$kalimat=strtolower($kalimat);


// $pecah = strtok($kalimat, " ");

//menghitung keseluruhan kata dan menjadikan array
$words=str_word_count($kalimat,1);
//pencocokan kata atau stopword
$stopwords=file('stopword.txt', FILE_IGNORE_NEW_LINES);
$words=array_values(array_diff($words,$stopwords));
//hitung tf
$tf = array_values(array_count_values($words));

// // kata yg unik
//$kata_unik_curr = array_unique($words);
$kata_unik = array_values(array_unique($words));

// menghitung jumlah kalimat $count_words=str_word_count($kalimat,0);
//$pecah = strtok($words, " ");


echo '<p>'.$kalimat.'</p>';
// //Loop through colors array
// foreach($tf as $value){
//     echo $value . "<br>";
// }



print_r($tf);
echo '<br/> <br/>';
print_r($kata_unik);



echo '<br/> <br/>';

//jumlah kata unik
$jum_kata_unik=count($kata_unik);

//echo $jum_kata_unik;
	$i=0;
	while ( $i< $jum_kata_unik) {
			require_once ('stemming.php');
			$teksAsli = $kata_unik[$i];
			//echo "Teks asli : ".$teksAsli.'<br/>';
			$stemming = stemming($teksAsli);
			if ($stemming=='') {
			echo "Kata dasar : ".$words[$i].'<br/>';
			}
			else{
			echo "Kata dasar : ".$stemming.'<br/>';
			}
			$i++;
 		}		

 
// $i=0;
// while ($pecah){
// 	$tokenisasi[$i]=$pecah;
//  echo "array [$i] = ".$pecah.'<br/>';
//  $pecah = strtok(" ");
//  $i++;
// }

//echo $words[2];
 
?>