<?php

require_once "./backend/db.php";
function getContactInfo()
{

    global $conn;

    $sql = "SELECT `address`, `phone`, `email`, `address_link`, `phone_link`, `email_link` FROM company where id=1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

?>

<?php

$company_info = getContactInfo();
$backgroundImage = 'divvyxcantine.jpg'

?>

<?php include_once "./includes/header.php"; ?>

<?php include_once "./partials/contact-banner.php"; ?>
<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="contact-full-section py-5">
    <div class="contact-container container py-5">
        <p class="custom-heading mb-5">Contact us</p>

        <div class="contact-info-row row">
            <div class="col-md-4 contact-box address-box">
                <div class="contact-box-content">
                    <div class="contact-box-title">Address</div>
                    <a href="<?php echo $company_info["address_link"] ?>" class="contact-box-value" target="_blank"><?php echo $company_info["address"] ?></a>
                </div>
            </div>

            <div class="col-md-4 contact-box address-box">
                <div class="contact-box-content">
                    <div class="contact-box-title">Email</div>
                    <a href="<?php echo $company_info["email_link"] ?>" class="contact-box-value" target="_blank"><?php echo $company_info["email"] ?></a>
                </div>
            </div>

            <div class="col-md-4 contact-box address-box">
                <div class="contact-box-content">
                    <div class="contact-box-title">Telephone</div>
                    <a href="<?php echo $company_info["phone_link"] ?>" class="contact-box-value" target="_blank"><?php echo $company_info["phone"] ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<div class="contact-form-map-section py-5">
    <div class="container contact-form-container py-4">
        <p class="custom-heading mb-5">Get in Touch</p>

        <div class="row">
            <!-- Contact Form Column -->
            <div class="col-md-6 contact-form-container">
                <form id="contactForm" class="contact-form">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstName">First Name*</label>
                                <input type="text" class="form-control" id="firstName" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="lastName">Last Name*</label>
                                <input type="text" class="form-control" id="lastName" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email">Email Address*</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="message">Message*</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="custom-button-transparent-green">Send Message</button>
                </form>
            </div>

            <!-- Map Column -->
            <div class="col-md-6 contact-map-container">
                <div class="map-wrapper">
                    <!-- Google Maps iframe (replace src with your actual location) -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.1805427706013!2d35.635611499999996!3d33.8850038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f3c1df6b6c493%3A0xfe8faa898290f236!2sBroumana%20Villa!5e0!3m2!1sen!2slb!4v1747295477880!5m2!1sen!2slb"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space mb-3 mb-md-5 pb-2 pb-md-3"></div>

<div class="space mt-3 mt-md-5 pt-2 pt-md-3"></div>
<?php include_once "./includes/footer.php"; ?>