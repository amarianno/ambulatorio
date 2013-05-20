#/bin/bash
U_PASTA="/var/www/ambulatorio/bkp/"
U_DATA=$(/bin/date +%Y%m%d%H%M%S)
U_CAMINHO="backup-$U_DATA.sql"
U_HOST="localhost"
U_USER="root"
U_PASSWORD="Bu$carta5"
U_DATABASE="ambulatorio"
#
cd $U_PASTA
mysqldump -h $U_HOST -u $U_USER -p$U_PASSWORD $U_DATABASE > $U_CAMINHO
gzip $U_CAMINHO
echo "Backup executado"
