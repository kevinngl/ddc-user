<div class="card mt-4">
    <div class="card-header"><strong>Donatur</strong></div>
    <div class="card-body">
        <ol class="list-group list-group">
            @foreach ($donation as $item)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $item['donator']['name'] }}</div>
                        {{ $item['comment'] }}
                        <p>{{ strftime('%e %B %Y, %H:%M', strtotime($item['payment']['transactionTime'])) }}
                            WIB</p>
                    </div>
                    <span class="badge bg-primary">Rp. {{ number_format($item['payment']['amount']) }}</span>
                </li>
            @endforeach
            @if (empty($donation))
                <p class="text-center">Belum ada donasi yang masuk</p>
            @endif
        </ol>
    </div>
</div><!-- Post Single - Author End -->
