<?php 
session_start();
echo "Welcome". $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
   initial-scale=1.0">
    <title>Daily Planner</title>
    <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Inter:400,800,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="calender.css">
        <link rel="stylesheet" href="addtask.css">

    </head>

    <div class="container">
        <nav>GROUP L DAILY PLANNER</nav>
        <main>CALENDER
            <body class="light">

            <div class="calendar">
                <div class="calendar-header">
                    <span class="month-picker" id="month-picker">February</span>
                    <div class="year-picker">
                <span class="year-change" id="prev-year">
                    <pre><</pre>
                </span>
                        <span id="year">2021</span>
                        <span class="year-change" id="next-year">
                    <pre>></pre>
                </span>
                    </div>
                </div>
                <div class="calendar-body">
                    <div class="calendar-week-day">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar-days"></div>
                </div>
                <div class="calendar-footer">
                    <div class="toggle">
                        <span>Dark Mode</span>
                        <div class="dark-mode-switch">
                            <div class="dark-mode-switch-ident"></div>
                        </div>
                    </div>
                </div>
                <div class="month-list"></div>
            </div>

            <script src="calender.js"></script>
            </body>
        </main>
        <div id="sidebar">

            <div class="dropdown">
                <button class="dropbtn">Allplan</button>
                <div class="dropdown-content">
                    <a href="favourite.html">Favourite</a><br>

                    <div class="dropdown">
                        <button class="dropbtn">Category</button>
                        <div class="dropdown-content">
                            <a href="personal.html" target="_blank">Personal</a>
                            <a href="work.html" target="_blank">Work</a>
                            <a href="life.html" target="_blank">Life</a>
                            <a href="travel.html" target="_blank">Travel</a>
                            <a href="addcat.html" target="_blank">Add Category</a>
                            <a href="notes.html" target="_blank">Notes</a>
                            <a href="share.html" target="_blank">Share</a>
                        </div>
                    </div>
                </div>
            </div>


            <style>
                .dropbtn {
                    background-color: violet;
                    color: white;
                    padding: 16px;
                    font-size: 16px;
                    border: none;
                }

                .dropdown {
                    position: relative;
                    display: inline-block;
                }

                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f1f1f1;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    z-index: 1;
                }

                .dropdown-content a {
                    color: purple;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                }

                .dropdown-content a:hover {
                    background-color: #ddd;
                }

                .dropdown:hover .dropdown-content {
                    display: block;
                }

                .dropdown:hover .dropbtn {
                    background-color: #3e8e41;
                }
            </style>


        </div>


        <div id="content1">TODAYS TASKS

            <p>
                <label>Task 1</label>
                <input type = "text"
                       id = "myText"
                       value = "" />
            </p>
            <p>
                <label>Task 2</label>
                <input type = "text"
                       id = "myText"
                       value = "" />
            </p>
            <p>
                <label>Task 3</label>
                <input type = "text"
                       id = "myText"
                       value = "" />
            </p>

        </div>

        <div id="content2">NEW EVENT

            <body>
            <div class="container">
                <div class="addTask">
                    <input type="text" placeholder="Add a Task">
                    <button>Add</button>
                </div>

                <ol class="notCompleted">
                    <h3>Not Completed</h3>
                </ol>

                <ol class="Completed">
                    <h3>Completed</h3>
                </ol>
            </div>

            <script>
                const input = document.querySelector('input');
                const btn = document.querySelector('.addTask > button');

                btn.addEventListener('click', addList);
                input.addEventListener('keyup', (e)=>{
                    (e.keyCode === 13 ? addList(e) : null);
                })

                function addList(e){
                    const notCompleted = document.querySelector('.notCompleted');
                    const Completed = document.querySelector('.Completed');

                    const newLi = document.createElement('li');
                    const checkBtn = document.createElement('button');
                    const delBtn = document.createElement('button');

                    checkBtn.innerHTML = '<i class="fa fa-check"></i>';
                    delBtn.innerHTML = '<i class="fa fa-trash"></i>';


                    if(input.value !==''){
                        newLi.textContent = input.value;
                        input.value = '';
                        notCompleted.appendChild(newLi);
                        newLi.appendChild(checkBtn);
                        newLi.appendChild(delBtn);
                    }

                    checkBtn.addEventListener('click', function(){
                        const parent = this.parentNode;
                        parent.remove();
                        Completed.appendChild(parent);
                        checkBtn.style.display = 'none';
                    });

                    delBtn.addEventListener('click', function(){
                        const parent = this.parentNode;
                        parent.remove();
                    });
                }

            </script>


        </div>
        <div id="content3">DEADLINE</div>
        <footer>Footer</footer>
    </div>

</body>
</html>