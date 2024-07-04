<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#courses">Courses</a></li>
            <li><a href="#cart">Cart</a></li>
            <li><a href="#transaction">Transaction</a></li>

            <li class="np">
                <a href="#notification" onclick="showNotifications(event)">
                    <box-icon name='bell' color='white' ></box-icon>
                    <span class="notification-count">3</span>
                </a>
                <div class="notification-box" id="notification-box">
                    <div id="notificationContainer"></div>
                </div>
            </li>

            <li class="wrapper">
                <input id="toggler" type="checkbox">
                <label for="toggler">
                    <img src="pric.png" alt="Profile">
                </label>
                <div class="dropdown">
                    <a href="#">Name</a>
                    <br>
                    <hr style="width: 240px;">
                    <br>
                    <a href="#"><box-icon name='lock'></box-icon> Privacy and Security</a>
                    <br>
                    <a href="#"><box-icon name='globe' color='black'></box-icon> Language</a>
                    <br>
                    <a href="#"><box-icon type='solid' name='user-detail'></box-icon> Apply as Instructor</a>
                </div>
            </li>
        </ul>
    </nav>



    <script>
        function showNotifications(event) {
            event.preventDefault();

            var notificationBox = document.getElementById('notification-box');
            notificationBox.classList.toggle('show');
        }

        function updateNotification() {
            fetch('notification.php')
                .then(response => response.text())
                .then(data => {
                    const notificationContainer = document.getElementById('notificationContainer');
                    const newNotification = document.createElement('div');
                    newNotification.className = 'notification-item';
                    newNotification.innerHTML = data;
                    notificationContainer.appendChild(newNotification);

                    // Update notification count
                    var notificationCount = document.querySelector('.notification-count');
                    var currentCount = parseInt(notificationCount.textContent);
                    notificationCount.textContent = currentCount + 1;
                })
                .catch(error => console.error('Error:', error));
        }

        // Update the notification every 5 seconds
        setInterval(updateNotification, 10000);

        // Initial update
        updateNotification();
    </script>
</body>
</html>
