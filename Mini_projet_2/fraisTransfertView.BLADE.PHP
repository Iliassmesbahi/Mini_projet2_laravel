<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calcul des frais de transfert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="/fraisTransfert" method="POST" class="border p-4 rounded shadow">
                @csrf
            <fieldset>
                <legend class="text-center mb-4">Calcul des frais de transfert de colis</legend>
                <div class="mb-3">
                    <label for="colis" class="form-label">N° de colis</label>
                    <input type="number" id="colis" name="colis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mode de transport</label>
                    <div class="form-check">
                        <input type="radio" id="express" name="mode_transport" value="express" class="form-check-input" required>
                        <label for="express" class="form-check-label">Express</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="normal" name="mode_transport" value="normal" class="form-check-input">
                        <label for="normal" class="form-check-label">Normal</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="distance" class="form-label">Distance</label>
                    <div class="input-group">
                        <input type="number" id="distance" name="distance" class="form-control" required>
                        <span class="input-group-text">KM</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="poids" class="form-label">Poids</label>
                    <div class="input-group">
                        <input type="number" id="poids" name="poids" class="form-control" required>
                        <span class="input-group-text">KG</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="cout" class="form-label">Coût total</label>
                    <input type="text" id="cout" name="cout" value="{{ request('cout') }}" class="form-control" readonly>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Valider</button>
                    <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





//EX2


Route::view('/frais/{cout?}','fraisTransfertView')->name("frais");
Route::post('/fraisTransfert',function(Request $request){
$poids=$request->input('colis');
$distance=$request->input('distance');
$express=$request->input('express');
if($poids<10){
    $cout=$distance*0.5; 
}else{
    $cout=$distance*($poids/10)*0.3;
}
if($express){
    $cout+=$cout+0.2;
}
return redirect()->route('frais',['cout' => $cout]);
});

