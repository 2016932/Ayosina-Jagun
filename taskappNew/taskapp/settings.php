<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Settings Page</title>
    <link rel="stylesheet" href="styles/style2.css">
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


</head>
<body>
<div class="container">
    <div class="leftbox">
        <nav>
            <a onclick="tabs(0)" class="tab active">
                <i class="fas fa-user"></i>
            </a>
            <a onclick="tabs(1)" class="tab">
                <i class="far fa-credit-card"></i>
            </a>
            <a onclick="tabs(2)" class="tab">
                <i class="fas fa-tv"></i>
            </a>
            <a onclick="tabs(3)" class="tab">
                <i class="fa fa-tasks"></i>
            </a>
            <a onclick="tabs(4)" class="tab">
                <i class="fa fa-cog"></i>
            </a>
        </nav>
    </div>
    <!-- the leftbox class and div ends here -->

    <!-- the class and div for (rightbox) starts here -->
    <div class="rightbox">
        <div class="profile tabShow">
            <h1>Personal Info</h1>
            <h2>Full Name</h2>
            <input type="text" class="input" value="Jane Doe">
            <h2>Birthday</h2>
            <input type="text" class="input" value="April 20, 1992">
            <h2>Gender</h2>
            <input type="text" class="input" value="Female">
            <h2>Email Address</h2>
            <input type="text" class="input" value="example@example.com">
            <h2>Password</h2>
            <input type="password" class="input" value="Jane Doe">
            <button class="btn">Update</button>

        </div>
        <div class="payment tabShow">
            <h1>Payment Info</h1>
            <h2>Payment Method</h2>
            <input type="text" class="input" value="MasterCard - 0202 **** ****7335">
            <h2>Billing Address</h2>
            <input type="text" class="input" value="234 holburn street">
            <h2>ZipCode</h2>
            <input type="text" class="input" value="223456">
            <h2>Billing Date</h2>
            <input type="text" class="input" value="April 20, 2021">
            <h2>Redeem Card</h2>
            <input type="password" class="input" value="Enter Gift Code">

            <button class="btn">Update</button>

        </div>
        <div class="subscription tabShow">
            <h1>Subscription Info</h1>
            <h2>Payment Date</h2>
            <p>May 12, 2021</p>
            <h2>Next Charges</h2>
            <p>$80.56 <span>includes tax</span></p>
             <h2>Plan</h2>
            <p>Limited Plan</p>
            <h2>Monthly</h2>
            <p>$107.99/month</p>
              <button class="btn">Update</button>

        </div>
        <div class="privacy tabShow">
            <h1>Privacy Settings</h1>
            <h2>Manage Email Notifications</h2>
            <input type="text" class="input" value="">
            <h2>Manage Privacy Settings</h2>
            <input type="text" class="input" value="">
            <h2>View Terms of Use</h2>
            <input type="text" class="input" value="">
            <h2>Personalized Ad Experience</h2>
            <input type="text" class="input" value="">
            <h2>Protect Account</h2>
            <input type="text" class="input" value="">
            <button class="btn">Update</button>

        </div>
        <div class="settings tabShow">
            <h1>Account Settings</h1>
            <h2>Sync Watchlist</h2>
            <input type="text" class="input" value="">
            <h2>Hold Subscription</h2>
            <input type="text" class="input" value="">
            <h2>Cancel Subscription</h2>
            <input type="text" class="input" value="">
            <h2>Your Devices</h2>
            <input type="text" class="input" value="">
            <h2>Referrals</h2>
            <input type="text" class="input" value="">
            <button class="btn">Update</button>

        </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
const tabBtn = document.querySelectorAll(".tab");
const tab = document.querySelectorAll(".tabShow");
function tabs(panelIndex){
    tab.forEach(function(node){
        node.style.display="none";
    });
    tab[panelIndex].style.display= "block";
}
tabs(0);

</script>

<script>
$(".tab").click(function(){
    $(this).addClass("active").siblings()
    .removeClass("active");
})
</script>
</body>
</html>