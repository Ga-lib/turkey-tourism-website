<?php
include 'config.php';

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $conn->real_escape_string(trim($_POST['fullname']));
    $email    = $conn->real_escape_string(trim($_POST['email']));
    $subject  = $conn->real_escape_string(trim($_POST['subject']));
    $message  = $conn->real_escape_string(trim($_POST['message']));

    if ($fullname && $email && $subject && $message) {
        $sql = "INSERT INTO contact_messages (FullName, Email, Subject, MessageBody) VALUES ('$fullname', '$email', '$subject', '$message')";
        if ($conn->query($sql) === TRUE) {
            $success_message = "Thank you, <strong>" . htmlspecialchars($_POST['fullname']) . "</strong>! Your message has been received. Our team will get back to you shortly. 🇹🇷";
        } else {
            $error_message = "Something went wrong. Please try again later.";
        }
    } else {
        $error_message = "Please fill in all fields before submitting.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Turkey Tourism</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <div class="header-content">
            <div class="logo-section">
                <h1>🇹🇷 <span>Turkey</span> Tourism</h1>
                <p class="tagline">Where East Meets West &mdash; A Land of Wonders</p>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="attractions.php">Tourist Attractions</a></li>
                    <li><a href="history.php">History & Culture</a></li>
                    <li><a href="events.php">Events & Transport</a></li>
                    <li><a href="contact.php" class="active">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h2>Contact Us</h2>
            <p>We're here to help you plan your perfect Turkish journey</p>
        </div>
    </div>

    <div class="container">

        <div class="contact-wrapper animate-on-scroll">

            <!-- Left: Contact Info Panel -->
            <div class="contact-info">
                <div>
                    <h3>Get in Touch</h3>
                    <p>Whether you need travel advice, information about attractions, or help with planning your itinerary — our team is ready to assist you.</p>
                </div>

                <div class="contact-info-item">
                    <span class="ci-icon">📍</span>
                    <div>
                        <strong>Visit Us</strong>
                        <span>Ministry of Culture and Tourism<br>İsmet İnönü Bulvarı No:5<br>Emek, Ankara, Turkey</span>
                    </div>
                </div>

                <div class="contact-info-item">
                    <span class="ci-icon">📞</span>
                    <div>
                        <strong>Call Us</strong>
                        <span>+90 312 470 80 00<br>Mon–Fri, 09:00 – 18:00 TRT</span>
                    </div>
                </div>

                <div class="contact-info-item">
                    <span class="ci-icon">✉️</span>
                    <div>
                        <strong>Email Us</strong>
                        <span>info@goturkey.com<br>We respond within 1–2 business days</span>
                    </div>
                </div>

                <div class="contact-info-item">
                    <span class="ci-icon">🌐</span>
                    <div>
                        <strong>Official Website</strong>
                        <span>www.goturkey.com</span>
                    </div>
                </div>

                <div class="contact-socials">
                    <p style="font-size:0.85em; opacity:0.7; margin-bottom:10px; text-transform:uppercase; letter-spacing:1px;">Follow Us</p>
                    <div class="social-links">
                        <a href="#" class="social-btn">𝕏</a>
                        <a href="#" class="social-btn">f</a>
                        <a href="#" class="social-btn">in</a>
                        <a href="#" class="social-btn">📸</a>
                    </div>
                </div>
            </div>

            <!-- Right: Contact Form -->
            <div class="contact-form">
                <h2>Send Us a Message</h2>

                <?php if ($success_message): ?>
                    <div class="success-message"><?php echo $success_message; ?></div>
                <?php endif; ?>

                <?php if ($error_message): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
                <?php endif; ?>

                <form method="POST" action="contact.php" id="contactForm" novalidate>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="fullname">Full Name <span class="required">*</span></label>
                            <input type="text" id="fullname" name="fullname"
                                   placeholder="e.g. Ahmet Yılmaz"
                                   value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email"
                                   placeholder="e.g. ahmet@example.com"
                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject <span class="required">*</span></label>
                        <input type="text" id="subject" name="subject"
                               placeholder="e.g. Cappadocia travel enquiry"
                               value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message <span class="required">*</span></label>
                        <textarea id="message" name="message"
                                  placeholder="Tell us how we can help you plan your visit to Turkey..."
                                  required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    </div>

                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span>Send Message &nbsp;✉️</span>
                    </button>

                </form>
            </div>
        </div>

        <div class="ornament">✦ &nbsp; ✦ &nbsp; ✦</div>

        <!-- FAQ Section -->
        <div class="faq-section animate-on-scroll">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Do I need a visa to visit Turkey?
                        <span class="faq-arrow">▼</span>
                    </button>
                    <div class="faq-answer">
                        <p>Citizens of many countries can obtain an e-Visa online before travelling via the official Turkish e-Visa portal (evisa.gov.tr). Some nationalities may enter visa-free. Check the official portal for your specific country's requirements.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        What is the best time of year to visit Turkey?
                        <span class="faq-arrow">▼</span>
                    </button>
                    <div class="faq-answer">
                        <p>Spring (April–June) and Autumn (September–October) offer the most pleasant weather across most of Turkey with mild temperatures and fewer crowds. Summer is ideal for coastal resorts, while winter suits Cappadocia and ski resorts in Uludağ.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        What currency is used in Turkey?
                        <span class="faq-arrow">▼</span>
                    </button>
                    <div class="faq-answer">
                        <p>The Turkish Lira (TRY / ₺) is the official currency. ATMs are widely available in cities and tourist areas. Major credit and debit cards are accepted at most hotels, restaurants, and shops, though carrying some cash is advisable in rural areas.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Is Turkey safe for tourists?
                        <span class="faq-arrow">▼</span>
                    </button>
                    <div class="faq-answer">
                        <p>Turkey's major tourist destinations — Istanbul, Cappadocia, the Aegean and Mediterranean coasts — are generally safe and welcoming to international visitors. As with any destination, exercise normal travel precautions and check your government's current travel advice before departure.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        How do I get from Istanbul Airport to the city centre?
                        <span class="faq-arrow">▼</span>
                    </button>
                    <div class="faq-answer">
                        <p>Istanbul Airport (IST) is connected to the city by the Airport Metro (M11 line) to Gayrettepe, Havaist (HAVAŞ) airport buses to multiple city locations, taxis, and private transfer services. The metro is the fastest and most affordable option for reaching central Istanbul.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-brand">
                <h3>🇹🇷 Turkey Tourism</h3>
                <p>The official tourism portal of the Republic of Turkey. Dedicated to sharing the beauty, history, and culture of this extraordinary country with the world.</p>
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="attractions.php">Tourist Attractions</a></li>
                    <li><a href="history.php">History & Culture</a></li>
                    <li><a href="events.php">Events & Transport</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>Contact</h4>
                <p>📍 Ministry of Culture & Tourism<br>Ankara, Turkey</p>
                <p>📞 +90 312 470 80 00</p>
                <p>✉️ info@goturkey.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Ministry of Culture and Tourism, Republic of Turkey. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('visible'), i * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

        // FAQ accordion
        function toggleFaq(btn) {
            const item = btn.parentElement;
            const answer = item.querySelector('.faq-answer');
            const arrow = btn.querySelector('.faq-arrow');
            const isOpen = item.classList.contains('open');

            document.querySelectorAll('.faq-item.open').forEach(el => {
                el.classList.remove('open');
                el.querySelector('.faq-answer').style.maxHeight = '0';
                el.querySelector('.faq-arrow').style.transform = 'rotate(0deg)';
            });

            if (!isOpen) {
                item.classList.add('open');
                answer.style.maxHeight = answer.scrollHeight + 'px';
                arrow.style.transform = 'rotate(180deg)';
            }
        }

        // Form submit feedback
        document.getElementById('contactForm')?.addEventListener('submit', function() {
            const btn = document.getElementById('submitBtn');
            btn.innerHTML = '<span>Sending... ⏳</span>';
            btn.disabled = true;
        });
    </script>

    <style>
        .page-hero {
            background: linear-gradient(135deg, var(--dark-red) 0%, var(--crimson) 60%, var(--deep-red) 100%);
            padding: 60px 40px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .page-hero-content { position: relative; z-index: 1; }
        .page-hero h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.6em;
            font-weight: 900;
            margin-bottom: 10px;
            text-shadow: 0 2px 12px rgba(0,0,0,0.3);
        }
        .page-hero p { font-size: 1.05em; opacity: 0.85; letter-spacing: 1px; }

        /* Form row */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 600px) { .form-row { grid-template-columns: 1fr; } }

        .required { color: var(--crimson); }

        /* Error message */
        .error-message {
            background: rgba(192,57,43,0.08);
            color: var(--dark-red);
            padding: 16px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
            border: 1px solid rgba(192,57,43,0.25);
        }

        /* Social links */
        .contact-socials { margin-top: auto; }
        .social-links { display: flex; gap: 10px; }
        .social-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9em;
            transition: var(--transition);
        }
        .social-btn:hover { background: rgba(255,255,255,0.3); transform: translateY(-3px); }

        /* FAQ */
        .faq-section { margin: 20px 0 40px; }
        .faq-section h2 { margin-bottom: 28px; }
        .faq-list { display: flex; flex-direction: column; gap: 12px; }
        .faq-item {
            background: white;
            border-radius: var(--radius);
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            overflow: hidden;
        }
        .faq-question {
            width: 100%;
            text-align: left;
            padding: 20px 24px;
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'Raleway', sans-serif;
            font-size: 1em;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            transition: var(--transition);
        }
        .faq-question:hover { color: var(--crimson); background: rgba(192,57,43,0.03); }
        .faq-arrow {
            font-size: 0.75em;
            color: var(--crimson);
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }
        .faq-answer p {
            padding: 0 24px 20px;
            font-size: 0.94em;
            color: var(--text-muted);
            line-height: 1.8;
            border-top: 1px solid #f0f0f0;
            padding-top: 16px;
        }
        .faq-item.open .faq-question { color: var(--crimson); }
    </style>

</body>
</html>