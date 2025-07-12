<!DOCTYPE html>
<html>
<head>
    <title>Perfume Store Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Available Perfumes</h1>
    <div class="row">
        @foreach ($perfumes as $perfume)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $perfume['name'] }}</h5>
                        <p class="card-text">Price: ${{ $perfume['price'] }}</p>
                        <p class="card-text">Category: {{ $perfume['category_name'] ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
