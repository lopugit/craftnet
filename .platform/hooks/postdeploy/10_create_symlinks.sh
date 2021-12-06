#!/usr/bin/env bash

rm -rf /var/app/current/web/cpresources
ln -sf /efs/cpresources /var/app/current/web/cpresources
chown -R webapp:webapp /var/app/current/cpresources