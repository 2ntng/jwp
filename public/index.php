<?php
require("header.php");
require("config/database.php");
$profile_id = isset($_GET['id']) ? $_GET['id'] : 1;

require("nav.php");
?>


<!-- lending -->
<?php
$sql = "SELECT full_name, description FROM tb_profiles WHERE id = {$profile_id}";
$profile = mysqli_fetch_object($conn->query($sql));

if (is_null($profile)) {
    die("Profile not found");
}
?>
<div class="container-block py-5 bg-light">
    <div class="container-md">
        <div class="row align-items-center">
            <!--- text --->
            <div class="col-md-6 mb-2">
                <h3>Hello,</h3>
                <h2>I&#8217;m <?= $profile->full_name ?></h2>
                <h5><?= $profile->description ?></h5>
                <!-- <h5></h5> -->
                <a href="https://www.linkedin.com/in/2ntng/" type="button" class="btn btn-primary">Hire me</a>
                <a href="https://drive.google.com/file/d/1dPCNifz83x0zXxNb5jqfZZigWt0ZKwQf/view?usp=sharing" type="button" class="btn btn-outline-primary">Download CV</a>
            </div>
            <!-- model -->
            <div class="col-md-6 mb-2 text-center">
                <img class="img-fluid" style="max-height: 80vh;" alt="model" class="model" src="https://www.indotechpren.org/assets/img/avatar.png">
            </div>
        </div>
    </div>
</div>

<!-- services -->
<?php
$sql = "SELECT name, description, link FROM tb_services WHERE profile_id = {$profile_id}";
$services = mysqli_fetch_all($conn->query($sql), MYSQLI_ASSOC);
?>
<div id="services" class="container-block py-5 text-center">
    <div class="container align-items-center">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>Services</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($services as $service) : ?>
                <div class="col-md-4">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= $service["name"] ?></h5>
                            <p class="card-text"><?= $service["description"] ?></p>
                            <a href="<?= $service["link"] ?>" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- testimonials -->
<?php
$sql = "SELECT rate, author, gender, R.description FROM tb_reviews R 
        LEFT JOIN tb_services S ON R.service_id = S.id 
        WHERE S.profile_id = {$profile_id}";
$reviews = mysqli_fetch_all($conn->query($sql), MYSQLI_ASSOC);
?>
<div id="testimonials" class="container-block py-5 bg-light text-center">
    <div class="container align-items-center">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>What Our Client Says...</h2>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <?php foreach ($reviews as $review) : ?>
                <div class="col-md-6 p-2">
                    <div class="card shadow-sm h-100">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body text-start">
                                    <p class="card-text"><?= $review["description"] ?></p>
                                    <h5 class="card-title" style="color:#<?= $review["gender"] ? '0D7DB0' : 'C00E59' ?>"><?= $review["author"] ?></h5>
                                    <p class="card-text">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                            <i class="<?= $i < $review["rate"] ? "fas" : "far" ?> fa-star" aria-hidden="true" style="color:#CD9A19"></i>
                                        <?php endfor; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- contact -->
<?php
$sql = "SELECT icon, link FROM tb_contacts C 
        LEFT JOIN tb_medias M ON C.media_id = M.id 
        WHERE C.profile_id = {$profile_id}";
$contacts = mysqli_fetch_all($conn->query($sql), MYSQLI_ASSOC);
?>
<div id="contact" class="container-block bg-dark text-white py-5 text-center">
    <div class="container align-items-center">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>Interested In Using Our Services?</h2>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <?php foreach ($contacts as $contact) : ?>
                    <a href="<?= $contact["link"] ?>" class="btn btn-lg btn-outline-light rounded-circle">
                        <i class="fab <?= $contact["icon"] ?>"></i>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<?php
$sql = "WITH Ratings AS (
            SELECT 1 AS n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5
        )
        SELECT
            COALESCE(SUM(CASE WHEN gender = 1 THEN 1 ELSE 0 END), 0) AS male_count,
            COALESCE(SUM(CASE WHEN gender = 0 THEN 1 ELSE 0 END), 0) AS female_count
        FROM Ratings
        LEFT JOIN tb_reviews ON rate = n
        GROUP BY n
        ORDER BY n";
$reviews_count = mysqli_fetch_all($conn->query($sql), MYSQLI_NUM);
$reviews_count = array_map(null, ...$reviews_count); // transpose array
?>

<!-- Chart -->
<script type="text/javascript">
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["1-Star", "2-Star", "3-Star", "4-Star", "5-Star"],
            datasets: [{
                    label: "Male",
                    backgroundColor: '#5BC4F3',
                    data: <?= json_encode($reviews_count[0]) ?>,
                },
                {
                    label: "Female",
                    type: "bar",
                    backgroundColor: "#F576AB",
                    data: <?= json_encode($reviews_count[1]) ?>,
                }
            ],
        },
        options: {
            maintainAspectRatio: true,
            legend: {
                display: true
            },
            title: {
                text: 'Reviews Chart',
                display: true,
                fontSize: 20,
                fontStyle: "bold",
                fontColor: '#333'
            },
            fontStyle: 'bold',
            scales: {
                xAxes: [{
                    ticks: {
                        fontSize: 15,
                        fontColor: '#333'
                    },
                    position: "bottom",
                    stacked: true,
                    display: true
                }],
                yAxes: [{
                    type: 'linear',
                    id: "stacked_testY",
                    display: true,
                    position: "left",
                    scaleLabel: {
                        display: true
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                        min: 0,
                    },

                }]
            },
        }
    });
</script>

<?php require("footer.php"); ?>