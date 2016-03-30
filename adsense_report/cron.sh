#!/bin/sh
#craw report data
DAY1=`date -d '-1 day' +%Y-%m-%d`
DAY2=`date -d '-3 day' +%Y-%m-%d`
#20 0 * * * /bin/sh /usr/deploy/adsense_report/cron.sh 
/usr/local/cellar/php55/bin/php /usr/deploy/adsense_report/admob.php $DAY2 $DAY1
/usr/local/cellar/php55/bin/php /usr/deploy/adsense_report/adsense.php $DAY2 $DAY1

#send mail
#0 6 * * * /usr/local/cellar/php54/bin/php /data/scripts/statics/andplus/sendmail/sendmail.php
#0 6 * * * /usr/local/cellar/php54/bin/php /data/scripts/statics/andplus/sendmail/send_adsense.php
