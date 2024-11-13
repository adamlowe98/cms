document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Simulate login
    document.getElementById('studentInfo').style.display = 'block';
});

document.getElementById('studentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const studentName = document.getElementById('studentName').value;
    const studentAge = document.getElementById('studentAge').value;
    const studentList = document.getElementById('studentList');
    const studentEntry = document.createElement('div');
    studentEntry.textContent = `Name: ${studentName}, Age: ${studentAge}`;
    studentList.appendChild(studentEntry);
    document.getElementById('studentForm').reset();
});
