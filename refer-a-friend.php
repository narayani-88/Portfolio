<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refer a Friend - Bhawani Interiors</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
            background: #ffffff;
            color: #333;
            line-height: 1.6;
            padding-top: 100px; /* Adjusted for navbar height */
        }

        /* Container Styles */
        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2%;
        }

        /* Refer Hero Section */
        .refer-hero {
            background: #f9f9f9;
            padding: 80px 0;
            min-height: calc(100vh - 100px);
            display: flex;
            align-items: center;
        }

        .refer-hero .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        /* Left Side - Image */
        .refer-left {
            position: relative;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 600px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .refer-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Offer Circles */
        .offer-circle {
            position: absolute;
            background: #ffffff;
            border-radius: 50%;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 250px;
            width: 220px;
            height: 220px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .offer-circle.top {
            top: 40px;
            left: 25px;
            background: linear-gradient(135deg, #1a2332, #2d3a4a);
            color: #ffffff;
        }

        .offer-circle.bottom {
            bottom: 40px;
            right: 25px;
            background: #ffffff;
            color: #1a2332;
        }

        .offer-circle h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .offer-circle p {
            font-size: 1rem;
            font-weight: 500;
            margin: 0 0 10px 0;
        }

        .logo-icon img {
            width: 35px;
            height: 35px;
            object-fit: cover;
            border-radius: 50%;
            background: #ffffff;
            padding: 2px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: block;
            border: none;
        }

        /* Right Side - Content */
        .refer-right {
            padding: 40px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .refer-right h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1a2332;
            letter-spacing: 0.5px;
        }

        .intro-text {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 40px;
            font-weight: 400;
            line-height: 1.6;
        }

        /* Steps */
        .steps {
            margin-bottom: 40px;
        }

        .step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
            gap: 20px;
        }

        .step-number {
            background: #1a2332;
            color: #ffffff;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        .step-content p {
            font-size: 1.1rem;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding-top: 10px;
        }

        /* Form Section */
        .form-section {
            margin-bottom: 30px;
        }

        .form-section h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: #1a2332;
        }

        .refer-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #1a2332;
            border-radius: 10px;
            font-size: 1rem;
            color: #333;
            background: #ffffff;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2d3a4a;
            box-shadow: 0 0 0 3px rgba(26, 35, 50, 0.1);
        }

        .form-group input::placeholder {
            color: #999;
            font-weight: 400;
        }

        .submit-btn {
            background: #1a2332;
            color: #ffffff;
            padding: 16px 32px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: #2d3a4a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* Terms Note */
        .terms-note {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #1a2332;
        }

        .terms-note p {
            font-size: 0.95rem;
            color: #666;
            margin: 0;
            font-weight: 300;
            line-height: 1.5;
        }

        /* Footer */
        footer {
            background: #1a2332;
            color: #ffffff;
            text-align: center;
            padding: 30px 0;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .refer-hero .container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .refer-right {
                padding: 30px;
            }
            
            .refer-right h1 {
                font-size: 2.4rem;
            }
            
            .image-container {
                height: 500px;
            }
            
            .offer-circle {
                width: 200px;
                height: 200px;
                padding: 25px;
            }
            
            .offer-circle h3 {
                font-size: 1.1rem;
            }
            
            .offer-circle p {
                font-size: 0.9rem;
            }
            
            .logo-icon img {
                width: 30px;
                height: 30px;
            }
        }

        @media (max-width: 768px) {
            .refer-hero {
                padding: 60px 0;
            }
            
            .refer-right h1 {
                font-size: 2rem;
            }
            
            .intro-text {
                font-size: 1.1rem;
            }
            
            .step-number {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
            
            .step-content p {
                font-size: 1rem;
            }
            
            .form-section h3 {
                font-size: 1.2rem;
            }
            
            .submit-btn {
                padding: 14px 28px;
                font-size: 1rem;
            }
            
            .image-container {
                height: 400px;
            }
            
            .offer-circle {
                width: 180px;
                height: 180px;
                padding: 20px;
            }
            
            .offer-circle.top {
                top: 30px;
                left: 20px;
            }
            
            .offer-circle.bottom {
                bottom: 30px;
                right: 20px;
            }
            
            .logo-icon img {
                width: 28px;
                height: 28px;
            }
        }

        @media (max-width: 480px) {
            .refer-right {
                padding: 25px 20px;
            }
            
            .refer-right h1 {
                font-size: 1.8rem;
            }
            
            .step {
                gap: 15px;
            }
            
            .step-number {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }
            
            .step-content p {
                font-size: 0.95rem;
            }
            
            .form-group input {
                padding: 12px 15px;
                font-size: 0.95rem;
            }
            
            .submit-btn {
                padding: 12px 24px;
                font-size: 0.95rem;
            }
            
            .image-container {
                height: 300px;
            }
            
            .offer-circle {
                width: 150px;
                height: 150px;
                padding: 15px;
            }
            
            .offer-circle h3 {
                font-size: 0.9rem;
            }
            
            .offer-circle p {
                font-size: 0.8rem;
            }
            
            .logo-icon img {
                width: 25px;
                height: 25px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="refer-hero">
        <div class="container">
            <div class="refer-left">
                <div class="image-container">
                    <img src="images/other/priscilla-du-preez-XkKCui44iM0-unsplash.jpg" alt="Happy Friends" class="refer-image">
                    <div class="offer-circle top">
                        <h3>TELL YOUR FRIENDS ABOUT BHAWANI INTERIORS!</h3>
                        <p>AND GET A ₹20,000 REWARD FOR YOU</p>
                        <div class="logo-icon">
                            <img src="images/logo/logo-removebg-preview.png?v=2" alt="Bhawani Interiors Logo" class="ootsraep">
                        </div>
                    </div>
                    <div class="offer-circle bottom">
                        <h3>...AND ₹20,000 FOR YOUR FRIENDS</h3>
                        <div class="logo-icon">
                            <img src="images/logo/logo-removebg-preview.png?v=2" alt="Bhawani Interiors Logo" class="ootsraep">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="refer-right">
                <h1>REFER A FRIEND</h1>
                <p class="intro-text">You want to recommend Bhawani Interiors to your friends? Great! You've come to the right place.</p>
                
                <div class="steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <p>Enter your details to receive a referral link.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <p>Share the link with your friends and gift them a ₹20,000 Welcome Reward*.</p>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3>Receive your referral link</h3>
                    <form class="refer-form">
                        <div class="form-group">
                            <input type="text" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" placeholder="Phone Number" required>
                        </div>
                        <button type="submit" class="submit-btn">Get Referral Link</button>
                    </form>
                </div>
                
                <div class="terms-note">
                    <p>*Terms and conditions apply. Reward is given when your friend completes their project with us.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="refer">
        <div class="container">
            <h1>Refer a Friend</h1>
            <h2>Refer Your Friends In 3 Easy Steps</h2>
            <ol>
                <li><strong>YOU REFER A FRIEND:</strong> Fill out this form with your friend’s details.</li>
                <li><strong>YOUR FRIEND SIGNS UP:</strong> Paying a 10% signup fee.</li>
                <li><strong>YOU EARN ₹20,000!</strong> Once your friend hits the 15% payment milestone!</li>
            </ol>
            <h2>Terms & Conditions</h2>
            <ul>
                <li>The referrer is anyone who has referred Bhawani Interiors to their friends/relatives to avail the services offered by Bhawani Interiors.</li>
                <li>The referee is a new customer lead introduced by the referrer to avail Bhawani Interiors services.</li>
                <li>A referral offer is eligible when the referred person signs up and makes a 35% milestone payment against the tax invoice raised by Bhawani Interiors.</li>
                <li>For every successful referral the bonus payout will be made via bank transfer with 5% TDS deduction.</li>
                <li>If the referral client backs out at any given point, the referral bonus commission will not go to the referrer.</li>
                <li>Clients who come through the general referral channel should confirm the source of knowing Bhawani Interiors in the first meeting with the Sales and Design team.</li>
            </ul>
        </div>
    </section>
</body>
</html>
<?php include 'footer.php'; ?>