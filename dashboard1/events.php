<?php
$_SESSION['head'] = "Events";
include("./sidebar.php");
include("./header/side.php");
?>

<link rel="stylesheet" href="./css/events.css">

<h2 class="d-flex justify-content-center text-center mt-5">Create Meeting</h2>

<section class="events ml-5 mt-5 ">
    <div class="container align-content-center justify-content-center d-flex">

        <div class="p-4">
            <form action="./zoom/generateLink.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">For:</label>
                    <select class="form-control"  aria-label="Default select example" name="for" required>
                        <option value="all" selected >All</option>
                        <option value="student">Students</option>
                        <option value="boys">Boys Only</option>
                        <option value="girls">Girls Only</option>
                        <option value="transgender">TransGender</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Topic</label>
                    <input type="text" class="form-control" name="topic" id="topic"  aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="number" class="form-control" name="duration" id="duration" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="datetime-local" class="form-control" name="date" id="date" required>
                </div>

                <button type="submit" class="btn btn-primary profile-button">Submit</button>
            </form>
        </div>
    </div>
</section>
