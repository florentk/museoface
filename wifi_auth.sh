curl -v -L  http://172.20.24.20/upload/custom/cp_guest_musee/auth/index.html
sleep 1
curl -v -F cmd=authenticate -F email=contact@museomix.fr  -L  http://172.20.24.20/auth/index.html/u
