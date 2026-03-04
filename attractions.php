<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Attractions - Turkey Tourism</title>
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
                    <li><a href="attractions.php" class="active">Tourist Attractions</a></li>
                    <li><a href="history.php">History & Culture</a></li>
                    <li><a href="events.php">Events & Transport</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <div class="page-hero">
        <div class="page-hero-content">
            <h2>Famous Tourist Destinations</h2>
            <p>From ancient ruins to breathtaking landscapes — Turkey has it all</p>
        </div>
    </div>

    <div class="container">

        <!-- Filter Bar -->
        <div class="filter-bar animate-on-scroll">
            <span class="filter-label">Filter by region:</span>
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="istanbul">Istanbul</button>
            <button class="filter-btn" data-filter="aegean">Aegean</button>
            <button class="filter-btn" data-filter="cappadocia">Cappadocia</button>
            <button class="filter-btn" data-filter="mediterranean">Mediterranean</button>
            <button class="filter-btn" data-filter="eastern">Eastern</button>
        </div>

        <!-- Attractions from DB -->
        <div class="attractions-grid" id="attractionsGrid">
            <?php
            $sql = "SELECT * FROM attractions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="attraction-card animate-on-scroll">';
                    echo '  <div class="attraction-img-wrap">';
                    echo '    <img src="/turkey_tourism/' . htmlspecialchars($row['ImagePath']) . '" alt="' . htmlspecialchars($row['Name']) . '" loading="lazy">';
                    echo '    <span class="attraction-badge">Must See</span>';
                    echo '  </div>';
                    echo '  <div class="attraction-info">';
                    echo '    <p class="attraction-location">📍 ' . htmlspecialchars($row['Location']) . '</p>';
                    echo '    <h3>' . htmlspecialchars($row['Name']) . '</h3>';
                    echo '    <p>' . htmlspecialchars($row['Description']) . '</p>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                // Fallback static cards if DB is empty
                $fallback = [
                    ['name' => 'Hagia Sophia', 'location' => 'Istanbul', 'desc' => 'A breathtaking masterpiece of Byzantine architecture, later converted to an Ottoman mosque, standing at the heart of Istanbul for nearly 1,500 years.', 'badge' => 'Iconic'],
                    ['name' => 'Cappadocia', 'location' => 'Nevşehir', 'desc' => 'A surreal volcanic landscape of fairy chimneys, cave hotels, and underground cities — best experienced from a hot-air balloon at dawn.', 'badge' => 'Must See'],
                    ['name' => 'Ephesus', 'location' => 'İzmir / Aegean', 'desc' => 'One of the best-preserved ancient Roman cities in the world, home to the grand Library of Celsus and the Temple of Artemis.', 'badge' => 'UNESCO'],
                    ['name' => 'Pamukkale', 'location' => 'Denizli', 'desc' => 'Gleaming white terraced pools of calcium-rich thermal waters cascading down hillsides, alongside the ancient ruins of Hierapolis.', 'badge' => 'UNESCO'],
                    ['name' => 'Topkapi Palace', 'location' => 'Istanbul', 'desc' => 'The opulent administrative heart of the Ottoman Empire for 400 years, housing priceless imperial treasures and overlooking the Bosphorus.', 'badge' => 'Historic'],
                    ['name' => 'Mount Nemrut', 'location' => 'Adıyaman / Eastern', 'desc' => 'A remote mountaintop sanctuary where colossal stone heads of ancient gods sit dramatically at 2,150m, best visited at sunrise.', 'badge' => 'UNESCO'],
                ];
                foreach ($fallback as $item) {
                    echo '<div class="attraction-card animate-on-scroll">';
                    echo '  <div class="attraction-img-wrap" style="background: linear-gradient(135deg,#C0392B,#6E1B14); height:240px; display:flex; align-items:center; justify-content:center;">';
                    echo '    <span style="font-size:4em;">🏛️</span>';
                    echo '    <span class="attraction-badge">' . $item['badge'] . '</span>';
                    echo '  </div>';
                    echo '  <div class="attraction-info">';
                    echo '    <p class="attraction-location">📍 ' . $item['location'] . '</p>';
                    echo '    <h3>' . $item['name'] . '</h3>';
                    echo '    <p>' . $item['desc'] . '</p>';
                    echo '  </div>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <div class="ornament">✦ &nbsp; ✦ &nbsp; ✦</div>

        <!-- 5-Day Itinerary -->
        <div class="animate-on-scroll">
            <h2>Sample 7-Day Turkey Itinerary</h2>
            <table class="itinerary-table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Location</th>
                        <th>Highlights</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Day 1</td>
                        <td>Istanbul — Historic Peninsula</td>
                        <td>Hagia Sophia, Blue Mosque, Topkapı Palace, and the Grand Bazaar</td>
                    </tr>
                    <tr>
                        <td>Day 2</td>
                        <td>Istanbul — Bosphorus & Beyoğlu</td>
                        <td>Bosphorus cruise, Galata Tower, Dolmabahçe Palace, and Istiklal Avenue</td>
                    </tr>
                    <tr>
                        <td>Day 3</td>
                        <td>Cappadocia</td>
                        <td>Hot-air balloon ride at sunrise, Göreme Open-Air Museum, fairy chimneys, and cave hotels</td>
                    </tr>
                    <tr>
                        <td>Day 4</td>
                        <td>Cappadocia — Underground</td>
                        <td>Derinkuyu Underground City, Ihlara Valley hike, and Uçhisar Castle at sunset</td>
                    </tr>
                    <tr>
                        <td>Day 5</td>
                        <td>Pamukkale & Hierapolis</td>
                        <td>Thermal travertine terraces, ancient Hierapolis ruins, and the Antique Pool swim</td>
                    </tr>
                    <tr>
                        <td>Day 6</td>
                        <td>Ephesus & Şirince</td>
                        <td>Library of Celsus, Temple of Artemis, and the charming hilltop village of Şirince</td>
                    </tr>
                    <tr>
                        <td>Day 7</td>
                        <td>Bodrum</td>
                        <td>Bodrum Castle, Mausoleum at Halicarnassus, Aegean seafront, and coastal boat trip</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Travel Tips -->
        <div class="transport-section animate-on-scroll" style="margin-top: 50px;">
            <h2>Visitor Tips</h2>
            <div class="transport-options">
                <div class="transport-item">
                    <span class="transport-icon">🗓️</span>
                    <h4>Best Time to Visit</h4>
                    <p>April–June and September–October offer mild weather and fewer crowds across most of Turkey.</p>
                </div>
                <div class="transport-item">
                    <span class="transport-icon">💳</span>
                    <h4>Currency</h4>
                    <p>Turkish Lira (TRY). ATMs are widely available; cards accepted in most tourist areas.</p>
                </div>
                <div class="transport-item">
                    <span class="transport-icon">🛂</span>
                    <h4>Visa</h4>
                    <p>Many nationalities can obtain an e-Visa online before travel via the official e-Visa portal.</p>
                </div>
                <div class="transport-item">
                    <span class="transport-icon">🌡️</span>
                    <h4>Weather</h4>
                    <p>Coastal regions are Mediterranean; inland Anatolia has hot summers and cold winters.</p>
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
                <p>📞 +90 312 000 0000</p>
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
                    setTimeout(() => entry.target.classList.add('visible'), i * 80);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

        // Filter buttons
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const filter = btn.dataset.filter;
                document.querySelectorAll('.attraction-card').forEach(card => {
                    const location = card.querySelector('.attraction-location')?.textContent.toLowerCase() || '';
                    if (filter === 'all' || location.includes(filter)) {
                        card.style.display = '';
                        card.style.animation = 'fadeInUp 0.4s ease both';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>

    <style>
        /* Page hero */
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
        .page-hero p {
            font-size: 1.05em;
            opacity: 0.85;
            letter-spacing: 1px;
        }

        /* Filter bar */
        .filter-bar {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 36px;
            padding: 20px 24px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
        }
        .filter-label {
            font-weight: 700;
            font-size: 0.88em;
            color: #555;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-right: 6px;
        }
        .filter-btn {
            padding: 8px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 50px;
            background: white;
            color: #555;
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            font-size: 0.85em;
            cursor: pointer;
            transition: all 0.25s ease;
        }
        .filter-btn:hover, .filter-btn.active {
            background: var(--crimson);
            border-color: var(--crimson);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(192,57,43,0.25);
        }
    </style>

</body>
</html>