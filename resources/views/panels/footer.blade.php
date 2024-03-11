<footer class="footer {{($configData['footerType']=== 'footer-hidden') ? 'd-none':''}} footer-light">
    <p class="clearfix mb-0">
        <div class="card p-1 m-0 p-sm-1">
            <div class="row">
                {{-- Logo --}}
                <div class="col-md-1 text-center">
                    <img width="64" height="64" src="{{ asset('images/website/logo-babel-footer.png') }}" alt="Logo Pemprov Kep. Babel">
                </div>
                {{-- Title --}}
                <div class="col-md-6 text-center text-md-left">
                    <h3>Provinsi Kepulauan Bangka Belitung</h3>
                    <h5>Jl. Pulau Lepar, Komplek Perkantoran Terpadu Pemerintah Provinsi Kepulauan Bangka Belitung</h5>
                </div>
                {{-- Contact --}}
                <div class="col-md-5 text-center text-md-right">
                    Telepon : <strong>0717-6242141</strong><br>
                    Faximile : <strong>0717-6242141</strong><br>
                    Email : <strong>informasi@babelprov.go.id</strong>
                </div>
            </div>
        </div>
    </p>
</footer>
