<?php 
    $arquivoE = "teste1.csv";
    $arquivoI =  "teste.csv";

    
    
    function gerarArquivo1($export){
		$delimitador = ',';
		$cerca =  '"';
		$contador =0 ;
        $f = fopen($export,'r');

        if($f){
            $cabecalho = fgetcsv($f,0,$delimitador,$cerca);

            while(!feof($f)){
				
                $linha = fgetcsv($f,0,$delimitador,$cerca);
                if(!$linha){
                    continue;
                }
				foreach($linha as $key => $value){
				echo "<hr>".$key."= ".$value."</hr>";
				}
                $registro = array_combine($cabecalho,$linha);

				$array[$contador]['titulo_1'] = $registro['titulo_1'];
				$array[$contador]['titulo_2'] = $registro['titulo_2'];
				$contador++;
            }
        }
		
		return $array;
    }
	function gerarArquivo2($export){
		$delimitador = ',';
		$cerca =  '"';
		$contador =0 ;
        $f = fopen($export,'r');

        if($f){
            $cabecalho = fgetcsv($f,0,$delimitador,$cerca);

            while(!feof($f)){
				
                $linha = fgetcsv($f,0,$delimitador,$cerca);
                if(!$linha){
                    continue;
                }
				foreach($linha as $key => $value){
				echo "<hr>".$key."= ".$value."</hr>";
				}
                $registro = array_combine($cabecalho,$linha);

				$array[$contador]['Texto_1'] = $registro['Texto_1'];
				$array[$contador]['Texto_2'] = $registro['Texto_2'];
				$contador++;
            }
        }
		
		return $array;
    }

	function gerarResultado($array1,$array2){
		
		$fp = fopen('resultado.csv','w');
		$resultado;
		for($i=0;$i< count($array1);$i++){
			$resultado[$i]['titulo_texto_1'] = $array1[$i]['titulo_1'] + $array2[$i]['Texto_1'];
			$resultado[$i]['titulo_texto_2'] = $array1[$i]['titulo_2'] + $array2[$i]['Texto_2'];
		}
		foreach ($resultado as $linha) {
			fputcsv($fp, $linha);
		}

		fclose($fp);
	}

	$array1 = gerarArquivo1($arquivoI);
	$array2 = gerarArquivo2($arquivoE);
	
	gerarResultado($array1,$array2);
?>