<x-user-layout title="Home" keywords="Del Donation Care">

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="vertical-middle">

                    <div class="heading-block center border-bottom-0">
                        <h1>Terima kasih atas donasi anda</h1>
                        <span>Bantuan anda sangat berarti.</span>
                        <br>
                        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke beranda</a>
                    </div>

                </div>

            </div>
        </div>
    </section>
</x-user-layout>
<script>
    ribuan('amount');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
