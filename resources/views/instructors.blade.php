
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Instrutores</div>

                <div class="card-body">
                    <ul>
                        @foreach ($instructors as $instructor)
                            <li>{{ $instructor->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
