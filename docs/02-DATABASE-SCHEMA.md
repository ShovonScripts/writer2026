# ডাটাবেজ স্কিমা

## users
সিস্টেমের একমাত্র ইউজার — লেখক/অ্যাডমিন।

| কলাম | টাইপ | নোট |
|---|---|---|
| id | bigint, PK | |
| name | varchar | |
| email | varchar, unique | |
| password | varchar (hashed) | |
| email_verified_at | timestamp, nullable | |
| remember_token | varchar, nullable | |
| timestamps | | created_at, updated_at |

## books

| কলাম | টাইপ | নোট |
|---|---|---|
| id | bigint, PK | |
| title_bn | varchar | |
| title_en | varchar | |
| slug | varchar, unique | SEO ফ্রেন্ডলি URL |
| description_bn | text | |
| description_en | text | |
| cover_image | varchar | ফাইল পাথ / media library id |
| genre | varchar / FK to categories | |
| published_year | year, nullable | |
| is_featured | boolean, default false | হোমপেজে দেখানোর জন্য |
| status | enum('draft','published') | |
| timestamps | | |

## book_links
একটা বইয়ের একাধিক বাহ্যিক কেনার লিংক (Rokomari, Amazon ইত্যাদি)।

| কলাম | টাইপ | নোট |
|---|---|---|
| id | bigint, PK | |
| book_id | bigint, FK → books | |
| platform_name | varchar | যেমন: "Rokomari", "Amazon" |
| url | varchar | বাহ্যিক কেনার লিংক |
| icon | varchar, nullable | আইকন ক্লাস/ইমেজ পাথ |
| sort_order | integer, default 0 | বাটন সাজানোর ক্রম |
| timestamps | | |

## posts (ব্লগ)

| কলাম | টাইপ | নোট |
|---|---|---|
| id | bigint, PK | |
| title_bn | varchar | |
| title_en | varchar | |
| slug | varchar, unique | |
| content_bn | longtext | rich text HTML |
| content_en | longtext | rich text HTML |
| excerpt_bn | varchar, nullable | |
| excerpt_en | varchar, nullable | |
| featured_image | varchar, nullable | |
| category_id | bigint, FK → categories, nullable | |
| published_at | timestamp, nullable | |
| status | enum('draft','published') | |
| timestamps | | |

## categories

| কলাম | টাইপ | নোট |
|---|---|---|
| id | bigint, PK | |
| name_bn | varchar | |
| name_en | varchar | |
| slug | varchar, unique | |
| type | enum('book','post') | একই টেবিল বই ও পোস্ট দুটোর ক্যাটাগরির জন্য ব্যবহারযোগ্য |
| timestamps | | |

## events (ঐচ্ছিক মডিউল)

| কলাম | টাইপ | নোট |
|---|---|---|
| id | bigint, PK | |
| title_bn | varchar | |
| title_en | varchar | |
| description_bn | text, nullable | |
| description_en | text, nullable | |
| event_date | date | |
| location | varchar, nullable | |
| timestamps | | |

## pages
স্ট্যাটিক পেজ (About, Contact) এর কনটেন্ট ম্যানেজ করার জন্য।

| কলাম | টাইপ | নোট |
|---|---|---|
| id | bigint, PK | |
| slug | varchar, unique | যেমন: "about", "contact" |
| title_bn | varchar | |
| title_en | varchar | |
| content_bn | longtext | |
| content_en | longtext | |
| timestamps | | |

## settings
কী-ভ্যালু স্টাইল সাইট-ওয়াইড সেটিংস।

| কলাম | টাইপ | নোট |
|---|---|---|
| id | bigint, PK | |
| key | varchar, unique | যেমন: "facebook_url", "seo_default_title" |
| value | text, nullable | |
| timestamps | | |

## contact_messages (ঐচ্ছিক — Contact ফর্ম সাবমিশন সংরক্ষণ)

| কলাম | টাইপ | নোট |
|---|---|---|
| id | bigint, PK | |
| name | varchar | |
| email | varchar | |
| message | text | |
| is_read | boolean, default false | |
| timestamps | | |

## রিলেশনশিপ সামারি
- `Book` hasMany `BookLink`
- `Book` belongsTo `Category` (nullable)
- `Post` belongsTo `Category` (nullable)
- `Category` hasMany `Book` / `Post` (টাইপ অনুযায়ী)
