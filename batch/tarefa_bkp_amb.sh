#/bin/bash
#U_PASTA="/var/www/ambulatorio/bkp/"
U_PASTA="/home/10973787724/Desktop/ambulatorio/bkp/"
U_DATA=$(/bin/date +%Y%m%d%H%M%S)
U_CAMINHO="backup-$U_DATA.sql"
U_HOST="localhost"
U_USER="root"
U_DATABASE="ambulatorio"
#
cd $U_PASTA
mysqldump -h $U_HOST -u $U_USER -p'Bu$carta5' --databases $U_DATABASE > $U_CAMINHO
gzip $U_CAMINHO
echo "Backup executado"

#---- GIT
cd /home/10973787724/Desktop/ambulatorio/bkp/
git add *
git commit -m "$U_DATA" 
git push
