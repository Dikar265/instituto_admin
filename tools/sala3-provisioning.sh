#!/usr/bin/env bash
# Script para instalar programas utilizados en Teleinformática.

# Verificar permisos
if [[ $EUID -ne 0 ]]; then
    echo "Se necesitan permisos de administrador para correr este script."
    exit 1
fi

# Actualizar el sistema
apt-get --yes --force-yes update
apt-get --yes --force-yes upgrade

# Instalar CORE
apt-get --yes --force-yes install core-network

# Instalar y configurar acceso a Wireshark
apt-get --yes --force-yes install wireshark
apt-get --yes --force-yes install libcap2-bin
groupadd -g wireshark
usermod -a -G wireshark alumno
chmod 750 /usr/bin/dumpcap
setcap cap_net_raw,cap_net_admin=eip /usr/bin/dumpcap

# Instalar node.js
apt-get --yes --force-yes install curl
curl -sL https://deb.nodesource.com/setup_4.x | sudo -E bash -
apt-get --yes --force-yes install nodejs


# Programas utilizados en Práctica Profesional

# Instalar FileZilla y Atom Editor
apt-get --yes --force-yes install filezilla
#wget -c https://github.com/urkh/atom-i386/raw/master/atom-i386.deb -O atom-i386.deb
#dpkg -i atom-i386.deb
apt-get install gitg

apt-get install -f
apt-get autoremove
rm -f atom-i386.deb

# Arduino IDE
apt-get --yes --force-yes install arduino



