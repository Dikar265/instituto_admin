#!/usr/bin/env bash
# Script para instalar programas utilizados en las asignaturas que utilizan la Sala 2

# Verificar permisos
if [[ $EUID -ne 0 ]]; then
    echo "Se necesitan permisos de administrador para correr este script."
    exit 1
fi

# Actualizar el sistema
apt-get update
apt-get upgrade

# Instalar SQLite Browser
apt-get --yes --force-yes install sqlitebrowser

# Instalar PostgreSQL
apt-get --yes --force-yes install postgresql
apt-get --yes --force-yes install postgresql-client
apt-get --yes --force-yes install postgresql-contrib
apt-get --yes --force-yes install pgadmin3

# Instalar Mongodb
apt-get --yes --force-yes install mongodb

# Instalar Atom Editor
wget -c https://github.com/urkh/atom-i386/raw/master/atom-i386.deb -O atom-i386.deb
dpkg -i atom-i386.deb
apt-get install -f
apt-get autoremove
rm -f atom-i386.deb

