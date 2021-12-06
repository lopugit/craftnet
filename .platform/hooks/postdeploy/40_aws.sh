#!/usr/bin/env bash

mkdir /home/ec2-user/.aws
printf '[backup]\naws_access_key_id=`{"Fn::GetOptionSetting": {"Namespace": "aws:elasticbeanstalk:application:environment", "OptionName": "BACKUP_S3_ACCESS_KEY_ID"}}`\naws_secret_access_key=`{"Fn::GetOptionSetting": {"Namespace": "aws:elasticbeanstalk:application:environment", "OptionName": "BACKUP_S3_SECRET_ACCESS_KEY"}}`' > /home/ec2-user/.aws/credentials
printf '[profile backup]\nregion=`{"Fn::GetOptionSetting": {"Namespace": "aws:elasticbeanstalk:application:environment", "OptionName": "REGION"}}`' > /home/ec2-user/.aws/config