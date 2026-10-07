# EcoTech Innovators Society — Student Club Website
**ICS 2102: Web Development | Semester Mini Project**

> A fully-featured, responsive PHP student club website for the **EcoTech Innovators Society** — a university student club combining computing, IoT, and sustainable technology.

---

## 🌐 Live URL
> _Deployed on Render — URL available after deployment steps below._

---

## 📁 Project Structure

```
web/
├── index.php           # Page 1: Home (Hero, stats, countdown, event previews, CTA)
├── about.php           # Page 2: About Us (Vision, mission, objectives, committee table)
├── events.php          # Page 3: Events (JS array filter, category tabs, schedule table)
├── gallery.php         # Page 4: Gallery (Lightbox modal, mouseover/click events)
├── join.php            # Page 5: Join/Contact (Full form, validation, flash message)
├── process_join.php    # PHP: Server-side form processing, DB insert
├── submissions.php     # PHP: Admin view — retrieve and display DB records
├── includes/
│   ├── db.php          # PDO helper (auto SQLite init, MySQL fallback)
│   ├── header.php      # Shared HTML <head> + sticky navigation
│   └── footer.php      # Shared semantic footer + JS loading
├── assets/
│   ├── css/style.css   # Earthy Warmth design system (all CSS variables, layout)
│   ├── js/main.js      # Mobile nav, countdown timer
│   ├── js/events.js    # Array/Object events catalog, filter, RSVP
│   ├── js/gallery.js   # Lightbox modal, keyboard events, mouseover/out
│   └── js/validation.js # Real-time form validation, regex, conditional logic
│   └── images/         # AI-generated & curated photos
├── database/schema.sql # SQL schema for members and contacts tables
├── data/               # Runtime SQLite database (gitignored, auto-created)
├── Dockerfile          # Apache + PHP 8.2 container for Render deployment
└── render.yaml         # Render Blueprint auto-deploy configuration
```

---

## ✅ Assignment Requirements Coverage

| Requirement | Implementation |
|---|---|
| **5+ Interconnected Pages** | `index.php`, `about.php`, `events.php`, `gallery.php`, `join.php` |
| **HTML — headings, paragraphs, links, images, lists, tables, forms** | All pages, `<table>` in `about.php` & `events.php` |
| **CSS — box model, positioning, backgrounds, navigation** | `assets/css/style.css` — full design system |
| **External CSS file** | `assets/css/style.css` |
| **JavaScript — variables, operators, conditionals, loops, functions** | All `.js` files |
| **JavaScript — form validation** | `validation.js` — regex, `if/else`, event listeners |
| **JavaScript — interactive feature** | Gallery lightbox + keyboard nav (`gallery.js`) |
| **JavaScript — arrays, objects** | `events.js` — `clubEvents` array of objects |
| **JavaScript — events (onclick, onload, mouseover, mouseout)** | `main.js`, `events.js`, `gallery.js`, `validation.js` |
| **PHP — process form** | `process_join.php` — sanitize, validate, insert |
| **PHP — display response** | Flash message via `$_SESSION` on `join.php` |
| **PHP — database storage and retrieval** | PDO SQLite in `includes/db.php`, display in `submissions.php` |
| **Deployment / Hosting** | Render.com via Docker — `Dockerfile` + `render.yaml` |

---

## 🚀 Deployment on Render

### Step 1 — Push to GitHub
```bash
git push origin main
```

### Step 2 — Create a Render Web Service
1. Go to [https://dashboard.render.com](https://dashboard.render.com)
2. Click **"New +"** → **"Web Service"**
3. Connect your GitHub repository: `tawanabennyg-cpu/student-club`
4. Render detects the `Dockerfile` automatically
5. Set **Name**: `ecotech-innovators-society`
6. Set **Plan**: Free
7. Click **"Deploy Web Service"**

### Step 3 — Get your URL
Render provides a public URL like: `https://ecotech-innovators-society.onrender.com`

---

## 💻 Running Locally (XAMPP)

```bash
# Start Apache & MySQL in XAMPP Control Panel, then:
# Copy project to C:\xampp\htdocs\web
# Navigate to: http://localhost/web/
```

Or use the PHP built-in server:
```bash
C:\xampp\php\php.exe -S localhost:8000
# Then open: http://localhost:8000
```

---

## 🎨 Design System
- **Theme**: Earthy Warmth Palette (defined in `design.md`)
- **Fonts**: Outfit (headings) + Plus Jakarta Sans (body) from Google Fonts
- **Colors**: `#322122`, `#483232`, `#63473d`, `#9e755d`, `#b09575`, `#f7f4e6`

---

## 📚 Course Information
- **Course**: ICS 2102 — Web Development
- **Project**: Semester Mini Project
- **Student**: Tawana Benny G
- **GitHub**: [tawanabennyg-cpu/student-club](https://github.com/tawanabennyg-cpu/student-club)
