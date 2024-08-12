<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
		<div class="container">
			<form action="">
				<h1>Digite seu CEP </h1>
				<input type="text" name="" id="cep" value="93540290" class="form-control">
				<button type="button" class="btn btn-primary" onclick="busca()">Buscar</button>
				<hr>
				<label>Rua:<br>
				<input name="rua" type="text" id="rua_" size="60" class="form-control" /></label><br />
				<label>Bairro:<br>
				<input name="bairro" type="text" id="bairro_" size="40" class="form-control" /></label><br />
				<label>Cidade:<br>
				<input name="cidade" type="text" id="cidade_" size="40" class="form-control" /></label><br />
				<label>Estado:<br>
				<select id="uf_" class="form-control">
					<option value="AC">Acre</option>
					<option value="AL">Alagoas</option>
					<option value="AP">Amapá</option>
					<option value="AM">Amazonas</option>
					<option value="BA">Bahia</option>
					<option value="CE">Ceará</option>
					<option value="DF">Distrito Federal</option>
					<option value="ES">Espírito Santo</option>
					<option value="GO">Goiás</option>
					<option value="MA">Maranhão</option>
					<option value="MT">Mato Grosso</option>
					<option value="MS">Mato Grosso do Sul</option>
					<option value="MG">Minas Gerais</option>
					<option value="PA">Pará</option>
					<option value="PB">Paraíba</option>
					<option value="PR">Paraná</option>
					<option value="PE">Pernambuco</option>
					<option value="PI">Piauí</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="RN">Rio Grande do Norte</option>
					<option value="RS">Rio Grande do Sul</option>
					<option value="RO">Rondônia</option>
					<option value="RR">Roraima</option>
					<option value="SC">Santa Catarina</option>
					<option value="SP">São Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
					<option value="EX">Estrangeiro</option>
				</select></label><br />
				<label>IBGE:<br>
				<input name="ibge" type="text" id="ibge_" size="8" class="form-control" /></label><br />
				<br>
				<button type="button" class="btn btn-danger" onclick="reset()">Limpar</button>
			</form>
		</div>
	<script>
	function busca(){
		var param1 = document.getElementById('cep').value;
		$.ajax({
			method: "POST",
			url: "busca_objeto.php",
			data: { cep_: param1 }
		})
		.done(function( response ) {
			let v = JSON.parse(response);
			if(v.status=="ok"){
				document.getElementById('uf_').value = v.Estado;
				document.getElementById('cidade_').value = v.Cidade;
				document.getElementById('bairro_').value = v.Bairro;
				document.getElementById('rua_').value = v.Rua;
				document.getElementById('ibge_').value = v.Ibge;
			}else{
				alert("Seu cep não foi localizado, por favor digite o endereço");
			}
		});
	}	
	</script>
	</body>
</html>







