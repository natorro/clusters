# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
        ('home', '0008_auto_20160125_1954'),
    ]

    operations = [
        migrations.AlterField(
            model_name='article',
            name='description',
            field=models.TextField(verbose_name='Descripci\xf3n General'),
        ),
        migrations.AlterField(
            model_name='article',
            name='headline',
            field=models.CharField(max_length=200, verbose_name='T\xedtulo'),
        ),
    ]
