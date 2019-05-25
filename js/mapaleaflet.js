var map = L.map('map').setView([25.869398, -97.504474], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([51.5, -0.09]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    .openPopup();

L.marker([25.866031, -97.557686]).addTo(map)
    .bindPopup('ROTONDA LAS BRISAS <br>Una rotonda de la colonia brisas!')
    .openPopup();


L.marker([25.853165, -97.515900]).addTo(map)
    .bindPopup('PARQUE Y CANCHAS MARIANO <br> un parque mediano ubicado en la colonia mariano')
    .openPopup();


L.marker([25.855935, -97.520073]).addTo(map)
    .bindPopup('ROTONDA PASEO RESIDENCIAL <br> unbicado en una zona centrica')
    .openPopup();


L.marker([25.850945, -97.497419]).addTo(map)
    .bindPopup('PARQUE DEL SATELITE <br> La colonia satelite tiene buenos lugares!')
    .openPopup();