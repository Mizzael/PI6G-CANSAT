$("#buscar").click(function () {
    // alert ("Entro aquis");\
    var id = [];
    var Fecha = [];
    var TemR = [];
    var HumR = [];
    var HumT = [];
    var TemA = [];
    $("#tablaLecturas").html(`
        <thead class="thead-dark">
            <tr>
            <th scope="col"> #</th>
            <th scope="col">Fecha/Hora</th>
            <th scope="col">Voltios V</th>
            <th scope="col">Temperatura del  Aire °C</th>
            <th scope="col">Hummedad del Aire %</th>
            <th scope="col">Presión Atmosferica  %</th>
            </tr>
        </thead>
    `);

    $.post(baseurl.concat("Estado/ObtenerLecturas"),
        function (data) {
            // alert(data);
            var obj = JSON.parse(data);

            $.each(obj, function (i, item) {
                id.push(item.id);
                Fecha.push(item.lec_FechaHora);
                TemR.push(item.lec_TemR);
                HumR.push(item.lec_HumR);
                HumT.push(item.lec_HumT);
                TemA.push(item.lec_TemA);

                $("#tablaLecturas").append(
                    '<tr>' +
                    '<th scope="row">' + id + '</th>' +
                    '<td>' + Fecha + '</td>' +
                    '<td>' + TemR + '</td>' +
                    '<td>' + HumR + '</td>' +
                    '<td>' + HumT + '</td>' +
                    '<td>' + TemA + '</td>' +
                    '</tr>'
                );
                id = [];
                Fecha = [];
                TemR = [];
                HumR = [];
                HumT = [];
                TemA = [];
            });

        });


});

$('#filtro').keyup(function () {

    $("#tablaLecturas").html(`
        <thead class="thead-dark">
            <tr>
            <th scope="col"> #</th>
            <th scope="col">Fecha/Hora</th>
            <th scope="col">Voltios V</th>
            <th scope="col">Temperatura del  Aire °C</th>
            <th scope="col">Hummedad del Aire %</th>
            <th scope="col">Presión Atmosferica  %</th>
            </tr>
        </thead>
    `);

    var text = ($('#filtro').val());
    $.post(baseurl.concat("Estado/ObtenerLecturasbyFecha"),
        { texto: text },
        function (data) {
            var obj = JSON.parse(data);
            var output = '';
            $.each(obj, function (i, item) {
                output +=
                    '<tr>' +
                    '<th scope="row">' + item.id + '</th>' +
                    '<td>' + item.lec_FechaHora + '</td>' +
                    '<td>' + item.lec_TemR + '</td>' +
                    '<td>' + item.lec_HumR + '</td>' +
                    '<td>' + item.lec_HumT + '</td>' +
                    '<td>' + item.lec_TemA + '</td>' +
                    '</tr>'
            });
            $("#tablaLecturas").append(output);
        });
});


