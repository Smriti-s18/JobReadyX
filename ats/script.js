document.getElementById('resumeForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch('process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let resultDiv = document.getElementById('result');
        let suggestionsDiv = document.getElementById('suggestions');
        let ctx = document.getElementById('scoreChart').getContext('2d');

        if (data.error) {
            resultDiv.innerHTML = `<p>Error: ${data.error}</p>`;
            suggestionsDiv.innerHTML = '';
        } else {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Score'],
                    datasets: [{
                        label: 'Resume Score',
                        data: [data.score],
                        backgroundColor: ['rgba(0, 123, 255, 0.5)'],
                        borderColor: ['rgba(0, 123, 255, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });

            suggestionsDiv.innerHTML = `
                <h2>Suggestions for Improvement:</h2>
                <ul>${data.suggestions.map(s => `<li>${s}</li>`).join('')}</ul>
            `;
        }
    })
    .catch(error => console.error('Error:', error));
});
