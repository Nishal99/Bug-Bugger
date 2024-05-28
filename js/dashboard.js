document.addEventListener('DOMContentLoaded', () => {
    fetch('/getDashboardData.php')
        .then(response => response.json())
        .then(data => {
            displayMostClickedQuestions(data.mostClickedQuestions);
            displayClickHistory(data.clickHistory);
            displayImprovementAreas(data.improvementAreas);
        });
});

function displayMostClickedQuestions(questions) {
    const list = document.getElementById('mostClickedQuestions');
    questions.forEach(question => {
        const listItem = document.createElement('li');
        listItem.textContent = question;
        list.appendChild(listItem);
    });
}

function displayClickHistory(history) {
    const list = document.getElementById('clickHistory');
    history.forEach(item => {
        const listItem = document.createElement('li');
        listItem.textContent = `${item.timestamp} - ${item.question}`;
        list.appendChild(listItem);
    });
}

function displayImprovementAreas(areas) {
    const list = document.getElementById('improvementAreas');
    areas.forEach(area => {
        const listItem = document.createElement('li');
        listItem.textContent = area;
        list.appendChild(listItem);
    });
}
