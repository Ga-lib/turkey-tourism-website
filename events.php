<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Transport - Turkey Tourism</title>
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
                    <li><a href="events.php" class="active">Events & Transport</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h2>Events &amp; Getting Around</h2>
            <p>Festivals, culture, and every way to explore Turkey</p>
        </div>
    </div>

    <div class="container">

        <!-- Events Section -->
        <div class="animate-on-scroll">
            <h2>Upcoming Events in Turkey</h2>
        </div>

        <div class="events-list" id="eventsList">
            <?php
            $sql = "SELECT * FROM events ORDER BY Date ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="event-card animate-on-scroll">';
                    echo '  <h3>' . htmlspecialchars($row['EventName']) . '</h3>';
                    echo '  <p class="event-date">📅 ' . date('F j, Y', strtotime($row['Date'])) . '</p>';
                    echo '  <p><strong>📍 Location:</strong> ' . htmlspecialchars($row['Location']) . '</p>';
                    echo '  <p>' . htmlspecialchars($row['Description']) . '</p>';
                    echo '</div>';
                }
            } else {
                // Fallback static events if DB is empty
                $events = [
                    [
                        'name'  => 'Istanbul International Film Festival',
                        'date'  => 'April 5 – 16, 2025',
                        'loc'   => 'Istanbul',
                        'desc'  => 'One of the oldest and most prestigious film festivals in the region, screening hundreds of national and international films across iconic Istanbul venues.'
                    ],
                    [
                        'name'  => 'Tulip Festival',
                        'date'  => 'April 1 – 30, 2025',
                        'loc'   => 'Istanbul — Emirgan Park & City-wide',
                        'desc'  => 'Istanbul transforms into a sea of colour as over 30 million tulips bloom across the city\'s parks and squares, celebrating Turkey\'s historic bond with the flower.'
                    ],
                    [
                        'name'  => 'Cappadocia Hot-Air Balloon Festival',
                        'date'  => 'July 18 – 21, 2025',
                        'loc'   => 'Göreme, Cappadocia',
                        'desc'  => 'Dozens of vivid balloons fill the skies above Cappadocia\'s fairy chimneys in a spectacular multi-day festival of flight, music, and local cuisine.'
                    ],
                    [
                        'name'  => 'Bodrum International Ballet Festival',
                        'date'  => 'August 2 – 10, 2025',
                        'loc'   => 'Bodrum Castle, Muğla',
                        'desc'  => 'World-class ballet performances staged inside the magnificent 15th-century Bodrum Castle, with the Aegean Sea as a breathtaking backdrop.'
                    ],
                    [
                        'name'  => 'Whirling Dervishes Ceremony (Şeb-i Arûs)',
                        'date'  => 'December 10 – 17, 2025',
                        'loc'   => 'Konya',
                        'desc'  => 'The anniversary of Rumi\'s death is commemorated with the sacred Sema ceremony — the iconic whirling ritual of the Mevlevi Order, drawing pilgrims and visitors worldwide.'
                    ],
                    [
                        'name'  => 'International Antalya Film Festival',
                        'date'  => 'October 4 – 11, 2025',
                        'loc'   => 'Antalya',
                        'desc'  => 'Turkey\'s oldest film festival celebrating its golden jubilee, showcasing Turkish and international cinema along the stunning Turkish Riviera.'
                    ],
                ];
                foreach ($events as $e) {
                    echo '<div class="event-card animate-on-scroll">';
                    echo '  <h3>' . $e['name'] . '</h3>';
                    echo '  <p class="event-date">📅 ' . $e['date'] . '</p>';
                    echo '  <p><strong>📍 Location:</strong> ' . $e['loc'] . '</p>';
                    echo '  <p>' . $e['desc'] . '</p>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <div class="ornament">✦ &nbsp; ✦ &nbsp; ✦</div>

        <!-- Transport Section -->
        <div class="transport-section animate-on-scroll">
            <h2>Transportation in Turkey</h2>
            <p>Turkey has an extensive and well-connected transport network, making it straightforward to travel between its diverse regions — whether you're hopping between cities or heading deep into Anatolia.</p>

            <div class="transport-options">
                <div class="transport-item">
                    <span class="transport-icon">✈️</span>
                    <h4>Domestic Flights</h4>
                    <p>Turkey has over 55 airports. Turkish Airlines, Pegasus, and AnadoluJet connect major cities. Flights between Istanbul and key cities are frequent and affordable.</p>
                </div>
                <div class="transport-item">
                    <span class="transport-icon">🚌</span>
                    <h4>Intercity Buses</h4>
                    <p>Turkey's long-distance bus network is excellent. Operators like Flixbus, Metro Turizm, and Kamil Koç run comfortable, affordable coaches between virtually all cities.</p>
                </div>
                <div class="transport-item">
                    <span class="transport-icon">🚆</span>
                    <h4>High-Speed Rail (YHT)</h4>
                    <p>High-speed trains connect Istanbul, Ankara, Konya, and Eskişehir at speeds up to 250 km/h. TCDD operates the national rail network with modern amenities.</p>
                </div>
                <div class="transport-item">
                    <span class="transport-icon">🚗</span>
                    <h4>Car Rental</h4>
                    <p>Ideal for exploring coastal roads and rural Anatolia. International agencies operate at all major airports. A valid driving licence is required; roads are generally well maintained.</p>
                </div>
                <div class="transport-item">
                    <span class="transport-icon">🚇</span>
                    <h4>City Metro & Tram</h4>
                    <p>Istanbul's Istanbulkart covers metro, tram, bus, and ferry. Ankara, Izmir, and Bursa also have modern metro systems for affordable urban travel.</p>
                </div>
                <div class="transport-item">
                    <span class="transport-icon">⛴️</span>
                    <h4>Ferries & Sea Buses</h4>
                    <p>Essential in Istanbul for crossing the Bosphorus. IDO ferries connect the European and Asian shores, plus routes to the Princes' Islands and coastal Aegean towns.</p>
                </div>
            </div>

            <div class="transport-tips">
                <h3>🧭 Essential Transport Tips</h3>
                <ul>
                    <li>Turkey drives on the <strong>right-hand side</strong> of the road</li>
                    <li>Book intercity buses online in advance, especially during public holidays</li>
                    <li>The <strong>Istanbulkart</strong> smart card works across all public transport in Istanbul — get one at the airport</li>
                    <li>Taxis in Istanbul use meters; always insist the meter is running or agree on a price beforehand</li>
                    <li>Ride-hailing apps <strong>BiTaksi</strong> and <strong>Uber</strong> operate in major cities</li>
                    <li>A <strong>4WD vehicle</strong> is recommended for visiting remote areas of Eastern Anatolia</li>
                    <li>Domestic flights are often the fastest option between far-apart destinations like Istanbul and Van</li>
                </ul>
            </div>
        </div>

        <div class="ornament">✦ &nbsp; ✦ &nbsp; ✦</div>

        <!-- Practical Info -->
        <div class="animate-on-scroll">
            <h2>Practical Information</h2>
        </div>
        <div class="features-grid animate-on-scroll">
            <div class="feature-card">
                <span class="feature-icon">🕐</span>
                <h3>Time Zone</h3>
                <p>Turkey Standard Time (TRT) — UTC+3 year-round. No daylight saving time is observed.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🔌</span>
                <h3>Electricity</h3>
                <p>220V / 50Hz. Type C and F plugs (European standard). Bring an adapter if travelling from the UK or US.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🌐</span>
                <h3>Language</h3>
                <p>Turkish is the official language. English is widely spoken in tourist areas, hotels, and restaurants.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🏥</span>
                <h3>Health & Safety</h3>
                <p>Turkey has excellent private hospitals in major cities. Travel insurance including medical cover is strongly recommended.</p>
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
                <p>📞 +90 312 000 0000</p>
                <p>✉️ info@goturkey.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Ministry of Culture and Tourism, Republic of Turkey. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('visible'), i * 90);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
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
    </style>

</body>
</html>