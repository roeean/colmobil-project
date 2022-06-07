# Backend (port 8000)

כדי להתקין את המערכת, יש ב- Repository שני קבצים שיש לשים לב אליהם:
1. הקובץ **docker-compose.yaml** (תצורת ה- containers שצריך להקים ב- docker)
2. הקובץ **db.sql** (מסד הנתונים שיש לטעון לאחר מכן).

במסד הנתונים קיימים כ- 6 דגמים של יונדאי וכ- 22 רמות גימור (כ- post types שונים, כמפורט בהמשך).



**כמו כן, יצרתי את ה- plugin הבא:**
- התוסף **Hyundai API**: פלאג-אין שאני יצרתי אשר מהווה את ממשק ה- API של הפרויקט, בחרתי להכין ממשק משלי ולא להשתמש ב- wp-json/wp הרגיל משום שהיה לי צורך להגדיר מספר getters (למשל, כאשר שולחים get ל- Model מסוים, מקבלים גם ערכים כמו רמת הגימור הזולה ביותר, אשר לא שמורים באותו Post)

**שאר ה- plugins שעשיתי בהם שימוש:**
- התוסף **Custom Post Type UI**: פלאג-אין לניהול ה- Post types (בפרויקט זה הגדרתי את Models עבור הדגמים ואת Levels עבור רמות הגימור)
- התוסף **Advanced Custom Fields & ACF to REST API**: פלאג-אין לניהול ה- Custom fields שהגדרתי (בפרויקט זה הגדרתי גרופ בשם Levels עם ה- fields הרלוונטים לרמות הגימור)
- התוסף **WordPress REST API Authentication**: עבור אבטחת ממשק ה- API. אני משתמש בגרסת ה- Pro כי רק באמצעותה ניתן להגדיר API Key (בגרסה החינמית כבר לא אפשרי)
- התוסף **JWT Authentication for WP-API**: תוסף שאני אוהב להשתמש בו עבור Authentication, לא עשיתי בו שימוש הפעם אך השארתי אותו למקרה ותרצה שארחיב את הפרויקט

(הערה קטנה בנוגע ל- Wordpress REST API Authentication - ה- lincese כבר מוגדר מראש ויטען אוטומטית עם ה-DB, אך במידה ויש בעיות עם התוסף אשלח לך את ה- lincese בנפרד)

>**Wordpress Credentials:**
>- username: admin
>.- password: admin

>**phpMyAdmin Credientials:**
>- username: wordpress
>- password: wordpress

# Frontend (port 3000)

**ב- Repository קיימת תיקייה בשם frontend אשר מכילה את פרויקט ה- React שלי.**

השתמשתי בין היתר ב- packages הבאים:

- התוסף **Hyundai API**: פלאג-אין שאני יצרתי אשר מהווה את ממשק ה- API של הפרויקט, בחרתי להכין ממשק משלי ולא להשתמש ב- wp-json/wp הרגיל משום שהיה לי צורך להגדיר מספר getters (למשל, כאשר שולחים get ל- Model מסוים, מקבלים גם ערכים כמו רמת הגימור הזולה ביותר, אשר לא שמורים באותו Post)
- axios: עבור קריאות ה- api
- react-router-dom: עבור הגדרת הראטור.
- bootstrap & font-awesome: עבור העיצוב.
- nprogress: תוסף שאני אוהב, אני משתמש בו כדי להציג progressBar בראש החלון בזמן טעינת הנתונים.
- prop-types: עבור הגדרת props-type ספציפיים, אני לא יודע אם אתם עושים בו שימוש, אז השתמשתי בו בכמה מקומות רק כדי להציג.ֿ

**הערות:**

1. ניסיתי להציג כמה שיותר תכונות של react בפרויקט, לכן ישנם מס׳ components שמוגדרים כ- Class וגם כאלו מסוג SFC.\
2. כדי למנוע קריאות API מיותרות, יצרתי מעין Store באמצעות React Context - כאשר נכנסים לעמוד דגם מסוים על מנת לצפות ברמות הגימור, הנתונים הרלוונטים נשמרים ב- context ייעודי על מנת שאם המשתמש יכנס שוב ושוב לאותו עמוד דגם, לא תתבצע טעינה חוזרת של אותם הנתונים (המערכת תבדוק האם הם כבר נטענו ובמידה וכן תטען אותם מה- store במקום באמצעות קריאת api.
3. לא עשיתי שימוש ב- Redux כי לדעתי מדובר במערכת קטנה, אך אם תרצה אוכל לשלוח גרסה נוספת
4. בנוגע ל- reuter, ההגדרה מאוד בסיסית, לא התבקשתי בתרגיל להגדיר middlewares, אך החשיבות שלהם ברורה לי
5. מבחינת עיצוב השתמשתי בקבצי css ולא בקבצי scss, אך אני בקיא בשתי הגישות.
