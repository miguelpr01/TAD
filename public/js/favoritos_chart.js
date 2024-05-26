document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("favoritosChart").getContext("2d");
    var favoritosChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: JSON.parse(
                document.getElementById("chartData").dataset.labels
            ),
            datasets: [
                {
                    label: "Número de Favoritos",
                    data: JSON.parse(
                        document.getElementById("chartData").dataset.values
                    ),
                    backgroundColor: "#90EE90",
                    borderColor: "#90EE90", 
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
});
